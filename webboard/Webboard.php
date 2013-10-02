<?
session_start();
include '../ConnectDB.php';
include './call_framework_wb_bs3.php';
include './wb_class.php';

switch ($_GET['GruopID']) {
    case 1:
        $_SESSION["WbGroup"] = 1;
        $breadcrumb = "<li class='active'><a href='#'>Hip</a></li>";
        break;
    case 2:
        $_SESSION["WbGroup"] = 2;
        $breadcrumb = "<li class='active'><a href='#'>Knee</a></li>";
        break;
    case 3:
        $_SESSION["WbGroup"] = 3;
        $breadcrumb = "<li class='active'><a href='#'>Orthopedics</a></li>";
        break;
    default:
        ?>
        <head>
            <META HTTP-EQUIV="Refresh" CONTENT="0;URL=Webboard_Category.php">
        </head>
        <?
        break;
}
//echo "   session = ".$_SESSION["WbGroup"];

$DB = new ConnectDB();
$wb_class = new wb_class();
$DB->connect();
$sql = "";

$wb_class->GetAllTopic($sql, $_SESSION["WbGroup"]);
$Num_Rows = $wb_class->getnumrow();

$Per_Page = 10;   // Per Page

$Page = $_GET["Page"];
$_SESSION["Page"] = $_GET["Page"];

if (!$_GET["Page"]) {
    $Page = 1;
}

$Prev_Page = $Page - 1;
$Next_Page = $Page + 1;

$Page_Start = (($Per_Page * $Page) - $Per_Page);
if ($Num_Rows <= $Per_Page) {
    $Num_Pages = 1;
} else if (($Num_Rows % $Per_Page) == 0) {
    $Num_Pages = ($Num_Rows / $Per_Page);
} else {
    $Num_Pages = ($Num_Rows / $Per_Page) + 1;
    $Num_Pages = (int) $Num_Pages;
}

$sql = " order  by QuestionID DESC LIMIT " . $Page_Start . "," . $Per_Page;
$AllTopic = $wb_class->GetAllTopic($sql, $_SESSION["WbGroup"]);

//print_r($AllTopic);
?>

<html>
    <body>
        <?
        if ($_SESSION["name"] == "" || $_SESSION["lastname"] == "") {
            ?>
            <div class="container">
                <div class="row">
                    <div class="alert alert-warning text-center">
                        <a href="#" class="alert-link">
                            <h1><strong>Please Login First!!</strong></h1>
                        </a>
                    </div>
                </div>
            </div>
            <META HTTP-EQUIV="Refresh" CONTENT="3;URL=Webboard_Category.php">

            <?
        } else {
            ?>
            <div class="container">
                <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="Webboard_Category.php">PAJAC Webboard Community</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="../index.php">Back to home</a></li>
                            <li><a href="Webboard_Category.php">Main</a></li>
                            <?
                            if ($_SESSION["WbGroup"] == 1) {
                                ?><li class="active"><?
                                } else {
                                    ?><li><?
                                    }
                                    ?>
                                <a href="Webboard.php?GruopID=1">Hip</a></li>
                            <?
                            if ($_SESSION["WbGroup"] == 2) {
                                ?><li class="active"><?
                                } else {
                                    ?><li><?
                                    }
                                    ?>
                                <a href="Webboard.php?GruopID=2">Knee</a></li>
                            <?
                            if ($_SESSION["WbGroup"] == 3) {
                                ?><li class="active"><?
                                } else {
                                    ?><li><?
                                    }
                                    ?>
                                <a href="Webboard.php?GruopID=3">Orthopedics</a></li>
                            <li><a href="../Check_Logout.php">Logout</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
                <br>
                <br>

                <div class="row">
                    <?
                    include './wb_login.php';
                    include './rule.php';
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-6 visible-lg">
                        <ol class="breadcrumb">
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="Webboard_Category.php">Webboard</a></li>
                            <?
                            echo $breadcrumb;
                            ?>
                        </ol>
                    </div>
                    <div class="col-lg-6 inline text-right">
                        <a href="NewQuestion.php" class="btn btn-lg btn-info">New Topic</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        Total <?= $Num_Rows; ?> Record : <?= $Num_Pages; ?> Page :
                        <?
                        if ($Prev_Page) {
                            echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&GruopID=".$_GET['GruopID']."'><< Back</a> ";
                        }

                        for ($i = 1; $i <= $Num_Pages; $i++) {
                            if ($i != $Page) {
                                echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&GruopID=".$_GET['GruopID']."'>$i</a> ]";
                            } else {
                                echo "<b> $i </b>";
                            }
                        }
                        if ($Page != $Num_Pages) {
                            echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&GruopID=".$_GET['GruopID']."'>Next>></a> ";
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <table class="table-bordered table table-condensed">
                            <tr>
                                <!--<td><div class="inline text-center">QuestionID</div></td>-->
                                <td><div class="inline text-center">Question</div></td>
                                <td><div class="inline text-center">Name</div></td>
                                <td><div class="inline text-center">CreateDate</div></td>
                                <td><div class="inline text-center">View</div></td>
                                <td><div class="inline text-center">Reply</div></td>
                            </tr>
                            <?
                            if ($AllTopic == 0) {
                                ?>
                                <td colspan="5">
                                    <div class="inline text-center">
                                        No Topic
                                    </div>
                                </td>
                                <?
                            } else {
                                for ($i = 0; $i < count($AllTopic); $i++) {
                                    ?>
                                    <tr>
            <!--                                        <td>
                                            <div class="inline text-center">
                                        <? // echo $AllTopic[$i][0]  ?>
                                            </div>
                                        </td>-->
                                        <td>
                                            <div class="inline tex-left">
                                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="ViewWebboard.php?QuestionID=<? echo $AllTopic[$i][0]; ?>"><? echo $AllTopic[$i][2]; ?></a> 
                                                <?
                                                switch (substr($AllTopic[$i][8], -4)) {
                                                    case ".pdf":
                                                        ?>&nbsp;&nbsp;<span class="badge">doc</span><?
                                                        break;
                                                    case ".gif" || ".jpg" || ".jpeg" || ".png":
                                                        ?>&nbsp;&nbsp;<span class="badge">pic</span><?
                                                        break;
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inline text-center">
                                                <? echo $AllTopic[$i][4] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inline text-center">
                                                <? echo $AllTopic[$i][1] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inline text-center">
                                                <? echo $AllTopic[$i][5] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="inline text-center">
                                                <? echo $AllTopic[$i][6] ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?
                                }
                            }
                            ?>
                        </table>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <br>
                        Total <?= $Num_Rows; ?> Record : <?= $Num_Pages; ?> Page :
                        <?
                        if ($Prev_Page) {
                            echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&GruopID=".$_GET['GruopID']."'><< Back</a> ";
                        }

                        for ($i = 1; $i <= $Num_Pages; $i++) {
                            if ($i != $Page) {
                                echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&GruopID=".$_GET['GruopID']."'>$i</a> ]";
                            } else {
                                echo "<b> $i </b>";
                            }
                        }
                        if ($Page != $Num_Pages) {
                            echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&GruopID=".$_GET['GruopID']."'>Next>></a> ";
                        }
                        $DB->sqlclose();
                        ?>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 visible-lg">
                        <br>
                        <ol class="breadcrumb">
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="Webboard_Category.php">Webboard</a></li>
                            <?
                                echo $breadcrumb;
                            ?>
                        </ol>
                    </div>
                    <div class="col-lg-6 inline text-right">
                        <a href="NewQuestion.php" class="btn btn-lg btn-info">New Topic</a>
                    </div>
                </div>
            </div>
            <?
        }
        ?>
    </body>

</html>
