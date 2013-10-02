<?
session_start();
$_SESSION["page"] = '4';
include '../ConnectDB.php';
include './call_framework_wb_bs3.php';
include './wb_class.php';

$DB = new ConnectDB();
$wb_class = new wb_class();
$DB->connect();
?>
<html>
    <body>
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
                        <li class="active"><a href="Webboard_Category.php">Main</a></li>
                        <?
                        if ($_SESSION["name"] == "" || $_SESSION["lastname"] == "") {
                            
                        } else {
                        ?>
                            <li><a href="Webboard.php?GruopID=1">Hip</a></li>
                            <li><a href="Webboard.php?GruopID=2">Knee</a></li>
                            <li><a href="Webboard.php?GruopID=3">Orthopedics</a></li>
                            <li><a href="../Check_Logout.php">Logout</a></li>
                        <?
                        }
                        ?>
                            
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
            <br>
            <br>
            <div class="row">
                <?
                include './wb_login.php';
                include './rule.php';


                //hip row
                $wb_class->GetAllTopic($sql, "1");
                $Num_Rows_hip = $wb_class->getnumrow();
                //Knee
                $wb_class->GetAllTopic($sql, "2");
                $Num_Rows_knee = $wb_class->getnumrow();
                //Orthopedics
                $wb_class->GetAllTopic($sql, "3");
                $Num_Rows_Orthopedics = $wb_class->getnumrow();
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12 visible-lg">
                    <ol class="breadcrumb">
                        <li><a href="../index.php">Home</a></li>
                        <li class="active"><a href="#">Webboard</a></li>
                    </ol>
                </div>
            </div>

            <div class="row alert alert-success visible-lg">
                <div class="col-lg-12 ">
                    <div class="col-sm-4 col-md-2">
                        <a href="Webboard.php?GruopID=1" class="thumbnail">
                            <img src="wb_image/No_Image.png" alt="HIP" class="img-rounded">
                        </a>
                    </div>
                    <div class="inline text-left">
                        <a href="Webboard.php?GruopID=1" class="btn btn-lg btn-default"><h3>ข้อสะโพก (Hip)&nbsp;&nbsp;&nbsp;<span class="label label-primary"><? echo $Num_Rows_hip ?></span></h3></a>
                    </div>
                </div>
            </div>
            <div class="row alert alert-success visible-lg">
                <div class="col-lg-12">
                    <div class="col-sm-4 col-md-2">
                        <a href="Webboard.php?GruopID=2" class="thumbnail">
                            <img src="wb_image/No_Image.png"  alt="KNEE" class="img-rounded">
                        </a>
                    </div>
                    <div class="inline text-left">
                        <a href="Webboard.php?GruopID=2" class="btn btn-lg btn-default"><h3>ข้อเข่า (Knee)&nbsp;&nbsp;&nbsp;<span class="label label-primary"><? echo $Num_Rows_knee ?></span></h3></a>

                    </div>
                </div>
            </div>
            <div class="row alert alert-success visible-lg">
                <div class="col-lg-12">
                    <div class="col-sm-4 col-md-2">
                        <a href="Webboard.php?GruopID=3" class="thumbnail">
                            <img src="wb_image/No_Image.png"  alt="KNEE" class="img-rounded">
                        </a>
                    </div>
                    <div class="inline text-left">
                        <a href="Webboard.php?GruopID=3" class="btn btn-lg btn-default"><h3>กระดูกและข้อทั่วไป (Orthopedics)&nbsp;&nbsp;&nbsp;<span class="label label-primary"><? echo $Num_Rows_Orthopedics ?></span></h3></a>
                    </div>
                </div>
            </div>
            <div class="hidden-lg">
                <div class="row alert alert-success">
                    <div class="col-lg-12">
                        <a href="Webboard.php?GruopID=1" class="btn btn-lg btn-block btn-default"><h3>ข้อสะโพก (Hip)&nbsp;&nbsp;&nbsp;<span class="label label-primary"><? echo $Num_Rows_hip ?></span></h3></a>
                        <a href="Webboard.php?GruopID=2" class="btn btn-lg btn-block btn-default"><h3>ข้อเข่า (Knee)&nbsp;&nbsp;&nbsp;<span class="label label-primary"><? echo $Num_Rows_knee ?></span></h3></a>
                        <a href="Webboard.php?GruopID=3" class="btn btn-lg btn-block btn-default"><h3>กระดูกและข้อทั่วไป (Orthopedics)&nbsp;&nbsp;&nbsp;<span class="label label-primary"><? echo $Num_Rows_Orthopedics ?></span></h3></a>
                    </div>
                </div>
            </div>
        </div>



    </body>
</html>
