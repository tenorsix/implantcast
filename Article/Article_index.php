<?php
session_start();
include "../ConnectDB.php";
include "./Article_Class.php";
$_SESSION["page"] = '3';
$DB = new ConnectDB();
$DB->connect();
$bankvar = "";
$Allarticle = $DB->getAllArticle($bankvar);
$numberarticle = $DB->getnumrow();

$Article_Class = new Article();



if ($_POST['txt1'] == "" || $_POST['txt2'] == "" || $_POST['txt3'] == "") {
    //echo $_POST['txt1']."*****".$_POST['txt2']."*****".$_POST['txt3']."*****".$_POST['txt4'];
} else {
    $Article_Class ->insertcomment($_POST['txt3'], $_POST['txt1'], $_POST['txt2'], $_POST['txt4']);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>PAJAC: Police Advance Joint Acedemic Center</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <!-- Le styles -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../assets/css/docs.css" rel="stylesheet">
        <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet">

        <!--<link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">-->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/pajac46x46.png">
        <script src="http://code.jquery.com/jquery.js"></script>
        <!-- <script src="assests/js/bootstrap.min.js"></script> -->

        <? //include './navbar.php'; ?>
    <div class="container">
        <div class="container">
                <!--<img src="images/banner1.jpg" width="100%">-->
                <!--<img src="images/banner2.jpg" width="100%">-->
            <img src="../images/1-1.gif" width="100%">
            <img src="../images/2-1.gif" width="100%" class="visible-desktop">
            <div class="container thumbnail visible-desktop" >
                <img src="../images/3-1.jpg" width="80%">
            </div>
            <img src="../images/4-1.jpg" width="100%" class="visible-desktop">
        </div>    
    </div>



</head>




<body>
    <br>

    <div class="container">
        <ul class="nav nav-pills">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../FAQs.php">FAQs</a></li>
            <li class="active"><a href="#">Article</a></li>
            <li><a href="#">News & Event</a></li>
            <li><a href="../webboard/Webboard_Category.php">Webboard</a></li>
            <li><a href="#">Contract Us</a></li>
        </ul>   
    </div>
    <div class="container alert alert-info2">
        <form class="form" method="post" name="form1" id="form1" action="../Check_Login.php">
            <?
            if ($_SESSION["name"] == "" || $_SESSION["lastname"] == "") {
                if ($_SESSION["loginerror"] == "1") {
                    ?>
                    <div class="container span3">
                        <div class="inline text-left">
                            <h2><strong>Login </strong>&nbsp;
                                <a href="#" data-toggle="popover" title="Hint" data-content="สำหรับผู้ใช้งานระบบ ทันทึกข้อมูล หากต้องการใช้งานติดต่อ Administrator ครับ                  ขอบคุณครับ       "data-placement="top"><small> hint</small></a></h2>
                        </div>
                        <div class="inline text-left">
                            <input type="text" class="input-large" name="user" placeholder="youremail@parjac.org">
                            <input type="password" class="input-large" name="pass" placeholder="Password">
                            <button type="submit" class="btn btn-primary">Login</button><br>
                            <span class="badge badge-important">Log In Fail ( ID or Password incorrect )</span>
                        </div>
                    </div> 
                    <?
                    $_SESSION["name"] = "";
                    $_SESSION["lastname"] = "";
                    $_SESSION["loginerror"] = "";
                } else {
                    ?>
                    <div class="container span3">
                        <div class="inline text-left">
                            <strong>Login </strong>&nbsp;
                            <a href="#" data-toggle="popover" title="Hint" data-content="สำหรับผู้ใช้งานระบบ ทันทึกข้อมูล หากต้องการใช้งานติดต่อ Administrator ครับ                  ขอบคุณครับ       "data-placement="top"><small> hint</small></a>
                        </div>
                        <div class="inline text-left">
                            <input type="text" class="input-large" name="user" placeholder="youremail@parjac.org">
                            <input type="password" class="input-large" name="pass" placeholder="Password">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div> 
                    <?
                }
            } else {
                ?>
                <div class="container span3">
                    <h5><strong>Welcome <? echo $_SESSION["name"] . "  " . $_SESSION["lastname"]?></strong></h5>
                    <?
                    if ($_SESSION["userlv"] < 6 && $_SESSION["userlv"] != "")  {
                        ?>
                        <div class="inline"><a href="OR/main_or.php" class="btn btn-warning btn-block">OR Management</a></div>
                        <div class="inline"><a href="OPD/main_opd.php" class="btn btn-info btn-block">OPD Management</a></div>
                        <?
                    }
                    ?>
                    <div class="inline"><a href="#"><h6>Profile</h6></a></div>
                    <div class="inline"><a href="#"><h6>Change Password</h6></a></div>

                    <div class="inline"><a href="../Check_Logout.php" class="btn btn-inverse btn-block">Logout</a></div>
                </div>

                <?
            }
            ?> 

        </form>
        <div class="container span1">

        </div>
        <div class="container span8">
            <h2>Article
                <?
                if ($_SESSION["userlv"] < 6 && $_SESSION["userlv"] != "") {
                    ?>
                    <a href="Addnew_Article.php" class="btn btn-small btn-success">Add New Article</a> 
                    <?
                } else {
                    
                }
                ?>
            </h2> 
            <div class="container span8">
                <?
                for ($i = 0; $i < $numberarticle; $i++) {

                    $articletxt = $Article_Class ->manage_string($Allarticle[$i][4]);
                    ?>

                    <div class="container span8">

                        <li>
                            <div class="caption">
                                <strong><a href="#myModal<? echo $i; ?>" role="button" data-toggle="modal"><? echo $Allarticle[$i][1] . " ...."; ?></a></strong>&nbsp;&nbsp;&nbsp;   
<!--                                <a href="#myModal<? echo $i; ?>" role="button" class="btn btn-primary btn-mini" data-toggle="modal">Read More...</a>-->
                                <?
                                if ($_SESSION["userlv"] < 6 && $_SESSION["userlv"] != "") {
                                    ?>
                                    <a href="EditArticle.php?ID=<?=$Allarticle[$i][0]?>" class="btn btn-inverse btn-mini">Edit Article</a>
                                    <?
                                }
                                ?>

                            </div>
                        </li>      

                        <div id="myModal<? echo $i; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel<? echo $i; ?>"><? echo $Allarticle[$i][3]; ?></h3>
                            </div>
                            <div class="modal-body">
                                <?
                                if ($Allarticle[$i][2] != "") {
                                    ?>
                                <div class="container">
                                    <div class="container span4"></div>
                                    <div class="container span4">
                                    <a href="images/<? echo $Allarticle[$i][2]; ?>" class="thumbnail">
                                        <img src="images/<? echo $Allarticle[$i][2]; ?>" alt="images/<? echo $Allarticle[$i][2]; ?>" class="img-rounded">
                                    </a>
                                    </div>
                                    <div class="container span4"></div>
                                </div>
                                    
                                <br>
                                    <?
                                }
                                ?>
                                <p><? echo $articletxt; ?></p>
                                <?
                                $lastcomment = $Article_Class ->getAllPost($Allarticle[$i][0]);
                                ?>
                            </div>
                            <div class="modal-footer">
                                <div class="inline text-left">
                                    <form method="post" action="Article_index.php">
                                        <div class="inline text-left">
                                            <strong>Comment #<? echo $lastcomment; ?></strong><br>
                                        </div>
                                        <div class="inline text-left">
                                            <strong>Name : </strong><input type="text" class="input-medium" name="txt1" placeholder="Your Name"><br>
                                        </div>
                                        <textarea rows="4" cols="50" name="txt2" id="mybox">
                                        </textarea>
                                        <!--Article id-->
                                        <input type="hidden" name="txt3" value="<? echo $Allarticle[$i][0] ?>"> 
                                        <!--post number-->
                                        <input type="hidden" name="txt4" value="<? echo $lastcomment ?>"> 

                                        <button type="submit" class="btn btn-primary btn-large">Send</button>
                                    </form>
                                </div>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div> 
                        <hr> 
                    </div>
                    <?
                }
                ?>                                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row-fluid">
            <img src="../images/footerline.jpg" width="100%" height="2" >
            <div class="center">
                <h6><p class="text-center">Operative Note for Total Knee Arthroplasty Report System Beta Test</p></h6>
                <h6><p class="text-center">Contact Administrator : virojlarb@pajac.org, admin@pajac.org</p></h6>
            </div>
        </div>
    </div>
</body>




<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../assets/js/bootstrap-transition.js"></script>
<script src="../assets/js/bootstrap-alert.js"></script>
<script src="../assets/js/bootstrap-modal.js"></script>
<script src="../assets/js/bootstrap-dropdown.js"></script>
<script src="../assets/js/bootstrap-scrollspy.js"></script>
<script src="../assets/js/bootstrap-tab.js"></script>
<script src="../assets/js/bootstrap-tooltip.js"></script>
<script src="../assets/js/bootstrap-popover.js"></script>
<script src="../assets/js/bootstrap-button.js"></script>
<script src="../assets/js/bootstrap-collapse.js"></script>
<script src="../assets/js/bootstrap-carousel.js"></script>
<script src="../assets/js/bootstrap-typeahead.js"></script>
<script src="../assets/js/bootstrap-affix.js"></script>

<script src="../assets/js/holder/holder.js"></script>
<script src="../assets/js/google-code-prettify/prettify.js"></script>

<script src="../assets/js/application.js"></script>

<script type="text/javascript">
    $('#mybox').live('keydown', function(e) {
        var keyCode = e.keyCode || e.which;

        if (keyCode == 9) {
            e.preventDefault();
            //alert('tab pressed');
            obj.focus();
        }
    });
</script>

</html>
