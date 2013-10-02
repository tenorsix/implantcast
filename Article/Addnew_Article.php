<?php
session_start();
include "../ConnectDB.php";
$_SESSION["page"] = '3';
$DB = new ConnectDB();
$DB->connect();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <script type="text/javascript">
            function chk() {
                if (document.form2.txt1.value == "")
                {
                    alert('Please insert Article Header !!');
                    document.form2.txt1.focus();
                    return false;
                }
                if (document.form2.txt3.value == "")
                {
                    alert('Please insert Details');
                    document.form2.txt3.focus();
                    return false;
                }


                var fty = new Array(".gif", ".jpg", ".jpeg", ".png"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด     
                var a = document.form2.file.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a     
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
                        alert("Please upload file gif, jpg, jpeg, png only");
                        return false;
                    }
                }
            }
        </script>  
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
    <div class="container">
        <form class="form" method="post" name="form1" id="form1" action="../Check_Login.php" >
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
                    <h5><strong>Welcome <? echo $_SESSION["name"] . "  " . $_SESSION["lastname"]; ?></strong></h5>
                    <?
                    if ($_SESSION["userlv"] < 6 && $_SESSION["userlv"] != "") {
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
            <h2>Add New Article...</h2>
            <form class="form" method="post" name="form2" id="form2" action="Addnew_Article_Confirm.php" enctype="multipart/form-data" onsubmit="return chk();">
                <table class="table">
                    <tr>
                        <td class="span3">
                            <div class="inline text-right"><strong>Header : </strong></div>
                        </td>
                        <td>
                            <div class="inline text-left">
                                <input type="text" class="input-large" name="txt1" id="txt1" placeholder="Header">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="inline text-right"><strong>Sub Header : </strong></div>
                        </td>
                        <td>
                            <div class="inline text-left">
                                <input type="text" class="input-large" name="txt2" id="txt2" placeholder="SubHeader">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="inline text-right"><strong>Picture :</strong></div>
                        </td>
                        <td>
                            <div class="inline text-left">
                                <input name="fileUpload" type="file" id="file">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="inline text-right"><strong>Detail : </strong></div>
                        </td>
                        <td>
                            <div class="inline text-left">
                                <textarea name="txt3" cols="200" rows="10" id="txt3" class="form-control" style="margin: 0px 0px 10px; width: 500px; height: 400px;"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="inline text-center">
                                <button type="submit" class="btn btn-primary">Add</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                        </td>
                    </tr>
    <!--                <tr>
                        <td>
                            <div class="inline text-right"></div>
                        </td>
                        <td>
                            <div class="inline text-left"></div>
                        </td>
                    </tr>-->
                </table>
            </form>
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
