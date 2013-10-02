<?
session_start();

include '../ConnectDB.php';
include './call_framework_wb_bs3.php';
include './wb_class.php';

switch ($_SESSION["WbGroup"]) {
    case 1:
        $_SESSION["WbGroup"] = 1;
        $breadcrumb = "<li class='active'><a href='Webboard.php?GruopID=1'>Hip</a></li>";
        break;
    case 2:
        $_SESSION["WbGroup"] = 2;
        $breadcrumb = "<li class='active'><a href='Webboard.php?GruopID=2'>Knee</a></li>";
        break;
    case 3:
        $_SESSION["WbGroup"] = 3;
        $breadcrumb = "<li class='active'><a href='Webboard.php?GruopID=3'>Orthopedics</a></li>";
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
            if (document.frmMain.txtQuestion.value == "")
            {
                alert('Please insert New Topic !!');
                document.frmMain.txtQuestion.focus();
                return false;
            }
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
                    <div class="col-lg-12 visible-lg">
                        <br>
                        <ol class="breadcrumb">
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="Webboard_Category.php">Webboard</a></li>
                            <?
                                echo $breadcrumb;
                            ?>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="Topic_confirm.php?Action=Save" method="post" name="frmMain" id="frmMain" enctype="multipart/form-data" onsubmit="return chk();">
                            <table class="table table-bordered table-condensed alert alert-gray">
                                <tr>
                                    <td>
                                        <div class="inline text-right">
                                            <strong>Topic</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inline">
                                            <input name="txtQuestion" type="text" class="form-control" id="txtQuestion" value="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="inline text-right">
                                            <strong>Details</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inline">
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
                                            <input name="txtGroup" type="hidden" class="form-control" value="<? echo $_SESSION["WbGroup"]; ?>">
                                        </div>
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td colspan="2">
                                        <div class="inline">
                                            <img id="imgAvatar">
                                        </div>
                                    </td>
                                </tr>-->
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="inline">
                                            <input name="btnSave" type="Submit" id="button" class="btn btn-lg btn-success" id="btnSave" value="Submit">
                                        </div>
                                    </td>
                                </tr>

                            </table>


                        </form>


                    </div>
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
                        </ol>
                    </div>
                </div>
            </div>

            <?
        }
        ?>









    </body>
</html>
<?
$DB->sqlclose();
?>
