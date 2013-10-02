<?php

session_start();
include "../ConnectDB.php";
include "./call_framework_bs3.php";       

if($_POST['txt10']==""){
    
    $_SESSION['chkside']="<span class='badge badge-important'>Please Choose Side.</span>";
    ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=womac_form.php?name=<?echo $_POST['txt3'];?>&hn=<?echo $_POST['txt4'];?>&age=<?echo $_POST['txt5'];?>&sex=<?echo $_POST['txt6'];?>&weight=<?echo $_POST['txt7'];?>&height=<?echo $_POST['txt8'];?>&bmi=<?echo $_POST['txt9'];?>"><?
    
}
switch ($_POST['txt10']) {
            case 'Right':
                    $txtside = "AND womac_knee_form.side = 'R'";

                break;
            case 'Left':
                    $txtside = "AND womac_knee_form.side = 'L'";

                break;
        }
$DB = new ConnectDB();


$_SESSION['womac'][0] = $_POST['txt1'];
$_SESSION['womac'][1] = $_POST['txt2'];
$_SESSION['womac'][2] = $_POST['txt3'];
$_SESSION['womac'][3] = $_POST['txt4'];
$_SESSION['womac'][4] = $_POST['txt5'];
$_SESSION['womac'][5] = $_POST['txt6'];
$_SESSION['womac'][6] = $_POST['txt7'];
$_SESSION['womac'][7] = $_POST['txt8'];
$_SESSION['womac'][8] = $_POST['txt9'];
$_SESSION['womac'][9] = $_POST['txt10'];
$_SESSION['womac'][10] = $_POST['txt12'];
$_SESSION['womac'][11] = $_POST['txt13'];
$_SESSION['womac'][12] = $_POST['txt14'];
$_SESSION['womac'][13] = $_POST['txt15'];
$_SESSION['womac'][14] = $_POST['cfemur'];
$_SESSION['womac'][15] = $_POST['ctibial'];
$_SESSION['womac'][16] = $_POST['txt16'];
$_SESSION['womac'][17] = $_POST['txt17'];
$_SESSION['womac'][18] = $_POST['txt18'];
$_SESSION['womac'][19] = $_POST['f1'];
$_SESSION['womac'][20] = $_POST['f2'];
$_SESSION['womac'][21] = $_POST['f3'];
$_SESSION['womac'][22] = $_POST['f4'];
$_SESSION['womac'][23] = $_POST['f5'];
$_SESSION['womac'][24] = $_POST['f6'];
$_SESSION['womac'][25] = $_POST['f7'];
$_SESSION['womac'][26] = $_POST['f8'];
$_SESSION['womac'][27] = $_POST['f9'];
$_SESSION['womac'][28] = $_POST['f10'];
$_SESSION['womac'][29] = $_POST['f11'];
$_SESSION['womac'][30] = $_POST['f12'];
$_SESSION['womac'][31] = $_POST['f13'];
$_SESSION['womac'][32] = $_POST['f14'];
$_SESSION['womac'][33] = $_POST['f15'];
$_SESSION['womac'][34] = $_POST['f16'];
$_SESSION['womac'][35] = $_POST['f17'];
$_SESSION['womac'][36] = $_POST['f18'];
$_SESSION['womac'][37] = $_POST['f19'];
$_SESSION['womac'][38] = $_POST['f20'];
$_SESSION['womac'][39] = $_POST['f21'];
$_SESSION['womac'][40] = $_POST['f22'];
$_SESSION['womac'][41] = $_POST['f23'];
$_SESSION['womac'][42] = $_POST['f24'];
$_SESSION['womac'][43] = $_POST['f25'];
$_SESSION['womac'][44] = $_SESSION["name"]."  ".$_SESSION["lastname"];

//print_r($_SESSION['womac']);

switch ($_POST['txt12']){
    case 0 : $visitname = "Pre Op."; break;
    case 1 : $visitname = "6 wk"; break;
    case 2 : $visitname = "3 mo"; break;
    case 3 : $visitname = "6 mo"; break;
    case 4 : $visitname = "1 Yr"; break;
    case 5 : $visitname = "2 Yr"; break;
    case 6 : $visitname = "3 Yr"; break;
    case 7 : $visitname = "4 Yr"; break;
    case 8 : $visitname = "5 Yr"; break;
    case 9 : $visitname = "6 Yr"; break;
    case 10: $visitname = "7 Yr"; break;
    case 11: $visitname = "8 Yr"; break;
    case 12: $visitname = "9 Yr"; break;
    case 13: $visitname = "10 Yr"; break;
    case 14: $visitname = "11 Yr"; break;
    case 15: $visitname = "12 Yr"; break;
    case 16: $visitname = "13 Yr"; break;
    case 17: $visitname = "14 Yr"; break;
    case 18: $visitname = "15 Yr"; break;

}
?>
<html>
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
<div class="container row">
    <div class="col-lg-2">
        
    </div>
    <div class="col-lg-10">
		<table class ="table table-hover table-bordered">
                    <tr>
                        <td colspan="6">
                            <DIV class="inline text-center">
                                <h4>WOMAC Knee information<small>&nbsp;&nbsp;( <?echo $visitname;?> )</small></h4>
                            </DIV> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <DIV class="inline text-center">
                                <h5>HN :</h5>
                                <?echo $_POST['txt4']?>
                            </DIV> 
                        </td>
                        <td colspan="1">
                            <DIV class="inline text-center">
                                <h5>Name :</h5>
                                <?echo $_POST['txt3']."  (".$_POST['txt6'].")"?>
                            </DIV> 
                        </td>
                        <td colspan="1">
                            <DIV class="inline text-center">
                                <h5>Age :</h5>
                                <?echo $_POST['txt5']?>
                            </DIV> 
                        </td>
                        <td colspan="1">
                            <DIV class="inline text-center">
                                <h5>W&nbsp;/&nbsp;H&nbsp;/&nbsp;BMI :</h5>
                                <?echo $_POST['txt7']." Kg. / ".$_POST['txt8']." Cm./ ".$_POST['txt9'];?>
                            </DIV> 
                        </td>
                        <td colspan="1">
                            <DIV class="inline text-center">
                                <h5>Last Visit / Point / Side</h5>
                                <? 
                                
                                if($_POST['f25']=="" || $_POST['f25'] == '0'){
                                    $point = 0;
                                }else{
                                    $point = $_POST['f25'];
                                }
                                
                                ?>
                                <?echo " ".$visitname." / ".$point." pt"." / ".$_POST['txt10'];?>
                            </DIV> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <DIV class="inline text-center">
                                <a href="womac_Confirm_OPD.php" class="btn btn-large btn-primary">
                                    &nbsp;Confirm&nbsp;</a>
                                <a href="womac_form.php_OPD?name=<?echo $_POST['txt3'];?>&hn=<?echo $_POST['txt4'];?>&age=<?echo $_POST['txt5'];?>&sex=<?echo $_POST['txt6'];?>&weight=<?echo $_POST['txt7'];?>&height=<?echo $_POST['txt8'];?>&bmi=<?echo $_POST['txt9'];?>" class="btn btn-large btn-danger">
                                    &nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
                            </DIV>
                        </td>
                    </tr>
                </table>
    </div>
  </div>
        
<?
include "footer.php";
?>   
    </body>
</html>

