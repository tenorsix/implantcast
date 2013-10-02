<?php
session_start();
include "../ConnectDB.php";
include './opd_class.php';
include "./call_framework_bs3.php";   

$DB = new ConnectDB();
$DB->connect();
$opd = new OPD();
$opd->insert_opd_followup(
        $_POST['txt1'] ,$_POST['txt2'] ,$_POST['txt3'] ,$_POST['txt4'] ,$_POST['txt5'] ,
        $_POST['txt6'] ,$_POST['txt7'] ,$_POST['txt8'] ,$_POST['txt9'] ,$_POST['txt10'],
        $_POST['txt11'],$_POST['txt12'],$_POST['txt13'],$_POST['txt14'],$_POST['txt15'],
        $_POST['txt16'],$_POST['txt17'],$_POST['txt18'],$_POST['txt19'],$_POST['txt20'],
        $_POST['txt21'],$_POST['txt22'],$_POST['txt23'],$_POST['txt24'],$_POST['txt25'],
        $_POST['txt26'],$_POST['txt27'],$_POST['txt28'],$_POST['txt29'],$_POST['txt30'],
        $_POST['txt31']
        );



?>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      
    </button>
      
      <a class="navbar-brand" href="main_opd.php">PAJAC OPD Management System</a>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="../index.php">Back to home</a></li>
      <li class="active"><a href="main_opd.php">Main</a></li>
      <li><a href="../Check_Logout.php">Logout</a></li>
<!--      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>-->
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
      <br>
      <br>
<div class="container">
    <div class="inline text-left">
        <br>
        <h1>OPD Management System</h1>
        <h2>Welcome <?echo $_SESSION["name"]."  ".$_SESSION["lastname"];?></h2>
    </div>
</div> 
<div class="container">  
    <div class="col-lg-4">
        
    </div>
    <div class="col-lg-10">
        <table class='table table-bordered table-condensed table-hover table-responsive'>
            <tr>
                <td class="col-lg-6">
                    <div class="inline text-center">
                        <h2><STRONG>Waiting... Back to Main OPD</STRONG></h2>
                    </div>
                </td>
            </tr>
        </table>
    </div> 
</div> 
</body>
<META HTTP-EQUIV="Refresh" CONTENT="2;URL=main_opd.php">
