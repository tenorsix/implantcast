<?php
session_start();


include "../ConnectDB.php";
include "fnc.php";

    $DB = new ConnectDB();
    $DB->connect();

    $ChkDB = new fncPNP();
    $RepleteHN = $ChkDB->chkHN($_POST['txt3']);
    

//if($RepleteHN['CHN'] > 0 || $_POST['txt1'] =="" || $_POST['txt2'] =="" || $_POST['txt3'] =="" || $_POST['txt4'] =="" || $_POST['txt5'] =="" || $_POST['txt6'] ==""){
if($RepleteHN['CHN'] > 0 || $_POST['txt1'] =="" || $_POST['txt2'] =="" || $_POST['txt3'] ==""){    
    echo "error";
    if($_POST['txt1'] ==""){
        $_SESSION["RNP_txt1"] = "<span class='badge badge-important'> Please fill Name</span>";
    }else{
        $_SESSION["RNP_txt1_1"] = $_POST['txt1'];
    }
    if($_POST['txt2'] ==""){
        $_SESSION["RNP_txt2"] = "<span class='badge badge-important'> Please fill Last Name</span>";
    }else{
        $_SESSION["RNP_txt2_1"] = $_POST['txt2'];
    }
    if($_POST['txt3'] ==""){
        $_SESSION["RNP_txt3"] = "<span class='badge badge-important'> Please fill HN</span>";
    }else{
        $_SESSION["RNP_txt3_1"] = $_POST['txt3'];
    }
    /*if($_POST['txt4'] ==""){
        $_SESSION["RNP_txt4"] = "<span class='badge badge-important'> Please fill AN</span>";
    }else{
        $_SESSION["RNP_txt4_1"] = $_POST['txt4'];
    }*/
    /*if($_POST['txt5'] ==""){
        $_SESSION["RNP_txt5"] = "<span class='badge badge-important'> Please choose Hospital</span>";
    }else{
        $_SESSION["RNP_txt5_1"] = $_POST['txt5'];
    }*/
    /*if($_POST['txt6'] ==""){
        $_SESSION["RNP_txt6"] = "<span class='badge badge-important'> Please choose Birthday Date</span>";
    }else{
        $_SESSION["RNP_txt6_1"] = $_POST['txt6'];
    }*/
    /*if($_POST['txt8'] == 0 || $_POST['txt8'] == ""){
        $_SESSION["RNP_txt8"] = "<span class='badge badge-important'> Please fill Weight</span>";
    }else{
        $_SESSION["RNP_txt8_1"] = $_POST['txt8'];
    }*/
    /*if($_POST['txt9'] == 0 || $_POST['txt9'] == ""){
        $_SESSION["RNP_txt9"] = "<span class='badge badge-important'> Please fill Height</span>";
    }else{
        $_SESSION["RNP_txt9_1"] = $_POST['txt9'];
    }*/
    /*if($_POST['txt11'] == 0 || $_POST['txt11'] == ""){
        $_SESSION["RNP_txt11"] = "<span class='badge badge-important'> Please fill Operator</span>";
    }else{
        $_SESSION["RNP_txt11_1"] = $_POST['txt11'];
    }*/
    
    ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=RNP_form.php"><?
    
}else{
    
    include './call_framework.php';

    
?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <a class="brand" href="main_or.php">PAJAC O.R. Management System</a>
    <ul class="nav">
      <li><a href="../index.php">Back to home</a></li>
      <li><a href="main_or.php">Main</a></li>
      <li  class="active"><a href="#">Register New Patient</a></li>
      <li><a href="../Check_Logout.php">Logout</a></li>
    </ul>
  </div>
</div>
    
<div class="container">
    <div class="inline">
        <br>
        <h1>O.R. Management System</h1>
        <h3>Welcome <?echo $_SESSION["name"]."  ".$_SESSION["lastname"];?></h3>
    </div>
</div> 
    
<div class="container">
    <div class="container">
		<table class ="table table-hover table-bordered">
                    <tr>
                        <td colspan="4">
                            <DIV class="inline">
                                <h4>New Patients Information</h4>
                            </DIV>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <DIV class="inline">
                                <h4>Name : </h4><?echo $_POST['txt1']."  ".$_POST['txt2'];?>
                            </DIV>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <DIV class="inline">
                                <h4>HN : </h4><?echo $_POST['txt3'];?>
                            </DIV>
                        </td>
                        <td colspan="1">
                            <DIV class="inline">
                                <h4>AN : </h4>
                                <?
                                    if($_POST['txt4']==""){
                                        echo "-";
                                    }else{
                                        echo $_POST['txt4'];
                                    }
                                ?>
                            </DIV>
                        </td>
                        <td colspan="2">
                            <DIV class="inline">
                                <h4>Hospital : </h4>
                                <?
                                    if($_POST['txt5']==""){
                                        echo "-";
                                    }else{
                                        echo $_POST['txt5'];
                                    }
                                ?>
                            </DIV>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <DIV class="inline">
                                <h4>Sex : </h4><?echo $_POST['txt7'];?>
                            </DIV>
                        </td>
                        <td colspan="1">
                            <DIV class="inline">
                                <h4>Weight : </h4>
                                <?
                                    if($_POST['txt8']==""){
                                        echo "-";
                                    }else{
                                        echo $_POST['txt8']." Kg.";
                                    }
                                ?>
                            </DIV>
                        </td>
                        <td colspan="1">
                            <DIV class="inline">
                                <h4>Height : </h4>
                                <?
                                    if($_POST['txt9']==""){
                                        echo "-";
                                    }else{
                                        echo $_POST['txt9']." cm.";
                                    }
                                ?>
                            </DIV>
                        </td>
                        <td colspan="1">
                            <DIV class="inline">
                                <h4>BMI : </h4>
                                <?
                                    if($_POST['txt10']==""){
                                        echo "-";
                                    }else{
                                        echo $_POST['txt10'];
                                    }
                                ?>
                            </DIV>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <DIV class="inline">
                                <h4>Birthyear(A.D.) : </h4>
                                <?
                                    if($_POST['txt6']==""){
                                        echo "-";
                                    }else{
                                        echo $_POST['txt6'];
                                    }
                                ?>
                            </DIV>
                        </td>
                        <td colspan="2">
                            <DIV class="inline">
                                <h4>AGE : </h4>
                                <?
                                        echo $_POST['txt12']." Years";
                                        $age = $_POST['txt12'];
                                ?>
                            </DIV>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <DIV class="inline">
                                <h4>Operator : </h4>
                                <?
                                    if($_POST['txt11']==""){
                                        echo "-";
                                    }else{
                                        echo $_POST['txt11'];
                                    }
                                ?>
                            </DIV>
                        </td>
                    </tr>
                    <?
                        $_SESSION["RNP_txt1_1"] = $_POST['txt1'];
                        $_SESSION["RNP_txt2_1"] = $_POST['txt2'];
                        $_SESSION["RNP_txt3_1"] = $_POST['txt3'];
                        $_SESSION["RNP_txt4_1"] = $_POST['txt4'];
                        $_SESSION["RNP_txt5_1"] = $_POST['txt5'];
                        $_SESSION["RNP_txt6_1"] = $_POST['txt6'];
                        $_SESSION["RNP_txt7_1"] = $_POST['txt7'];
                        $_SESSION["RNP_txt8_1"] = $_POST['txt8'];
                        $_SESSION["RNP_txt9_1"] = $_POST['txt9'];
                        $_SESSION["RNP_txt10_1"] = $_POST['txt10'];
                        $_SESSION["RNP_txt11_1"] = $_POST['txt11'];
                        $_SESSION["RNP_txt12_1"] = $_POST['txt12'];
                    ?>
                    <tr >
                        <td colspan="4">
                            <DIV class="inline text-center">
                                <a href="RNP_Confirm.php?name=<?echo $_POST['txt1']?>&lastname=<?echo $_POST['txt2']?>&HN=<?echo $_POST['txt3']?>&AN=<?echo $_POST['txt4']?>&Hospital=<?echo $_POST['txt5']?>&BDate=<?echo $_POST['txt6']?>&age=<?echo $age?>&sex=<?echo $_POST['txt7']?>&wg=<?echo $_POST['txt8']?>&hi=<?echo $_POST['txt9']?>&bmi=<?echo $_POST['txt10']?>&operator=<?echo $_POST['txt11']?>" class="btn btn-large btn-primary">
                                    &nbsp;Confirm&nbsp;</a>
                                <a href="RNP_form.php" class="btn btn-large btn-danger">
                                    &nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
                            </DIV>
                        </td>
                    </tr>
                </table>
    </div>
  </div>  

<?
/*
    echo "Name = ".$_POST['txt1']."<BR>";
    echo "Last Name = ".$_POST['txt2']."<BR>";
    echo "HN = ".$_POST['txt3']."<BR>";
    echo "AN = ".$_POST['txt4']."<BR>";
    echo "Hospital = ".$_POST['txt5']."<BR>";
    echo "Date = ".$_POST['txt6']."<BR>";
    echo "Sex = ".$_POST['txt7']."<BR>";
    echo "WG = ".$_POST['txt8']."<BR>";
    echo "HI = ".$_POST['txt9']."<BR>";
    echo "BMI = ".$_POST['txt10']."<BR>";
    echo getAge($_POST['txt6'])."<BR>"; 
 */

}
include "footer.php";
?>
<html>
    
</html>

