<?
session_start();

include '../ConnectDB.php';
include './call_framework_wb_bs3.php';
include './wb_class.php';

switch ($_SESSION["WbGroup"]) {
    case 1:
        $_SESSION["WbGroup"] = 1;
        $breadcrumb = "<li class='active'><a href='./Webboard.php?Page=" . $_SESSION["Page"] . "&GruopID=" . $_SESSION["WbGroup"] . "'>Hip</a></li>";
        break;
    case 2:
        $_SESSION["WbGroup"] = 2;
        $breadcrumb = "<li class='active'><a href='./Webboard.php?Page=" . $_SESSION["Page"] . "&GruopID=" . $_SESSION["WbGroup"] . "'>Knee</a></li>";
        break;
    case 3:
        $_SESSION["WbGroup"] = 3;
        $breadcrumb = "<li class='active'><a href='./Webboard.php?Page=" . $_SESSION["Page"] . "&GruopID=" . $_SESSION["WbGroup"] . "'>Orthopedics</a></li>";
        break;
    default:
        ?>
        <head>
            <META HTTP-EQUIV="Refresh" CONTENT="0;URL=Webboard_Category.php">
        </head>
        <?
        break;
}
$DB = new ConnectDB();
$wb_class = new wb_class();
$DB->connect();
?>
<html>
    <script type="text/javascript">
        function chk() {
            if (document.frmMain.txtDetails.value == "")
            {
                alert('Please insert Details');
                document.frmMain.txtDetails.focus();
                return false;
            }


            var fty = new Array(".gif", ".jpg", ".jpeg", ".png", ".pdf"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด     
            var a = document.frmMain.file.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a     
            var permiss = 0; // เงื่อนไขไฟล์อนุญาต  
            a = a.toLowerCase();
            if (a != "") {
                for (i = 0; i < fty.length; i++) { // วน Loop ตรวจสอบไฟล์ที่อนุญาต     
                    if (a.lastIndexOf(fty[i]) >= 0) {  // เงื่อนไขไฟล์ที่อนุญาต     
                        permiss = 1;
                        break;
                    } else {
                        continue;
                    }
                }
                if (permiss == 0) {
                    alert("Please upload file gif, jpg, jpeg, png, pdf only");
                    return false;
                }
            }
        }
    </script>  
    <head>

    </head>
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

                <?
                //*** Select Question ***//
                $objResult = $wb_class->SelectQuestion($_GET["QuestionID"]);
                //*** Update View ***//
                $wb_class->UpdateView($_GET["QuestionID"]);
                ?>
                <div class="row">
                    <div class="col-lg-12 visible-lg">
                        <br>
                        <ol class="breadcrumb">
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="Webboard_Category.php">Webboard</a></li>
                            <?
                            echo $breadcrumb;
                            ?>
                            <li><a href="#"><?= $objResult["Question"]; ?></a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <table class="table table-bordered alert alert-gray">
                        <tr>
                            <td>
                                <div class="inline text-left">
                                    &nbsp;&nbsp;&nbsp;<br><h2><strong>+++&nbsp;<?= $objResult["Question"]; ?>&nbsp;+++</strong></h2> <br>  
                                </div>
                                <div class="inline text-left">
                                    <?
                                    echo "<Br>" . nl2br($objResult["Details"]);
                                    ?>
                                </div>
                                <br><br>
                                <div class="inline text-center">
                                    <?
                                    if (substr($objResult["UploadFile"], -4) == ".PNG" ||
                                            substr($objResult["UploadFile"], -4) == ".png" ||
                                            substr($objResult["UploadFile"], -4) == ".JPG" ||
                                            substr($objResult["UploadFile"], -4) == ".jpg" ||
                                            substr($objResult["UploadFile"], -4) == "jpeg" ||
                                            substr($objResult["UploadFile"], -4) == "JPEG" ||
                                            substr($objResult["UploadFile"], -4) == ".gif" ||
                                            substr($objResult["UploadFile"], -4) == ".GIF") {
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <a href="wb_image/<? echo $objResult["UploadFile"]; ?>" class="thumbnail">
                                                    <img src="wb_image/<? echo $objResult["UploadFile"]; ?>" alt="wb_image/<? echo $objResult["UploadFile"]; ?>" class="img-rounded">
                                                </a>
                                            </div>
                                        </div>

                                        <?
                                    }
                                    ?>                                    
                                </div>
                                <br><br>
                                <div class="inline text-left">
                                    <?
                                    if ($objResult["UploadFile"] == "") {
                                        
                                    } else {
                                        ?>
                                        <strong>Attachment : </strong>
                                        <a href="wb_image/<? echo $objResult["UploadFile"]; ?>"><? echo $objResult["UploadFile"]; ?></a>
                                        <?
                                    }
                                    ?>


                                    <br>
                                    <br>
                                    <strong>Name</strong> :&nbsp;&nbsp;<?= $objResult["Name"]; ?> 
                                </div>
                                <div class="inline text-right">
                                    <strong>View</strong>  :&nbsp;&nbsp;<?= $objResult["View"]; ?> 
                                    <strong>Reply</strong>  :&nbsp;&nbsp;<?= $objResult["Reply"]; ?>
                                    <strong>Create Date</strong> :&nbsp;&nbsp;<?= $objResult["CreateDate"]; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <?
                    $objResult2 = $wb_class->GetRely($_GET["QuestionID"]);

                    $ReplyRows = $wb_class->getnumrow();

                    for ($intRows = 0; $intRows < $ReplyRows; $intRows++) {
                        ?> 
                        <table class="table table-bordered alert alert-gray">
                            <tr>
                                <td>
                                    <div class="inline text-left">
                                        <strong>Reply # <?= $intRows + 1; ?></strong>
                                    </div>
                                    <div class="inline text-left">
                                        <? echo "<br><br>" . nl2br($objResult2[$intRows][3]); ?>
                                        <br><br>
                                        <div class="inline text-center">
                                            <?
                                            if (substr($objResult2[$intRows][5], -4) == ".PNG" ||
                                                    substr($objResult2[$intRows][5], -4) == ".png" ||
                                                    substr($objResult2[$intRows][5], -4) == ".JPG" ||
                                                    substr($objResult2[$intRows][5], -4) == ".jpg" ||
                                                    substr($objResult2[$intRows][5], -4) == "jpeg" ||
                                                    substr($objResult2[$intRows][5], -4) == "JPEG" ||
                                                    substr($objResult2[$intRows][5], -4) == ".gif" ||
                                                    substr($objResult2[$intRows][5], -4) == ".GIF") {
                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-3">
                                                        <a href="wb_image/<? echo $objResult2[$intRows][5]; ?>" class="thumbnail">
                                                            <img src="wb_image/<? echo $objResult2[$intRows][5]; ?>" alt="wb_image/<? echo $objResult2[$intRows][5]; ?>" class="img-rounded">
                                                        </a>
                                                    </div>
                                                </div>

                                                <?
                                            }
                                            ?>                                    
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="inline text-left">
                                        <?
                                        if ($objResult2[$intRows][5] == "") {
                                            
                                        } else {
                                            ?>
                                            <strong>Attachment : </strong>
                                            <a href="wb_image/<? echo $objResult2[$intRows][5]; ?>"><? echo $objResult2[$intRows][5]; ?></a>
                                            <?
                                        }
                                        ?>
                                        <br>
                                        <br>
                                        <strong>Name :</strong>
                                        <?= $objResult2[$intRows][4]; ?>  
                                    </div>
                                    <div class="inline text-right">
                                        <strong>Create Date :</strong>
                                        <?= $objResult2[$intRows][2]; ?>
                                    </div>
                                </td>
                            </tr>
                        </table><br>
                        <?
                    }
                    ?>
                    <form action="Reply_confirm.php?Action=Save" method="post" name="frmMain" id="frmMain" enctype="multipart/form-data" onsubmit="return chk();">
                        <table class="table table-bordered alert alert-gray">
                            <tr>
                                <td>
                                    <div class="inline text-right">
                                        <strong>Details</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="inline text-left">
                                        <textarea name="txtDetails" cols="50" rows="5" id="txtDetails" class="form-control"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inline text-right">
                                        <strong>Picture or File</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="inline">
                                        <input type="file" name="fileUpload" id="file">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inline text-right">
                                        <strong>Name</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="inline">
                                        <input name="txtNameh" type="text" class="form-control" id="txtName" value="<? echo $_SESSION["userid"]; ?>" disabled="disabled">
                                        <input name="txtName" type="hidden" class="form-control" value="<? echo $_SESSION["userid"]; ?>">
                                        <input name="txtID" type="hidden" class="form-control" value="<? echo $_GET["QuestionID"]; ?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input name="btnSave" type="submit" class="btn btn-lg btn-success" id="btnSave" value="Submit">
                                </td>
                            </tr>
                        </table>


                    </form>
                    </body>
                    </html>
                </div>
                <div class="row">
                    <div class="col-lg-12 visible-lg">
                        <br>
                        <ol class="breadcrumb">
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="Webboard_Category.php">Webboard</a></li>
                            <?
                            echo $breadcrumb;
                            ?>
                            <li><a href="#"><?= $objResult["Question"]; ?></a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <?
        }
        $DB->sqlclose();
        ?>
