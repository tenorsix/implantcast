<?php
session_start();
include "../ConnectDB.php";
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php"><?
}else{
	$DB = new ConnectDB();
	$DB->connect();
        $text1 = "womac_id = '".$_GET['wmk_id']."'";
        $text2 = "";
        $wmkinfo = $DB->search_womac($text1, $text2);
        //print_r($wmkinfo);
        
        include './call_framework.php';
?>
<script language="JavaScript">

        function displayResult1(score){document.getElementById("cal1").value=score;sumscore();}
        function displayResult2(score){document.getElementById("cal2").value=score;sumscore();}
        function displayResult3(score){document.getElementById("cal3").value=score;sumscore();}
        function displayResult4(score){document.getElementById("cal4").value=score;sumscore();}
        function displayResult5(score){document.getElementById("cal5").value=score;sumscore();}
        function displayResult6(score){document.getElementById("cal6").value=score;sumscore();}
        function displayResult7(score){document.getElementById("cal7").value=score;sumscore();}
        function displayResult8(score){document.getElementById("cal8").value=score;sumscore();}
        function displayResult9(score){document.getElementById("cal9").value=score;sumscore();}
        function displayResult10(score){document.getElementById("cal10").value=score;sumscore();}
        function displayResult11(score){document.getElementById("cal11").value=score;sumscore();}
        function displayResult12(score){document.getElementById("cal12").value=score;sumscore();}
        function displayResult13(score){document.getElementById("cal13").value=score;sumscore();}
        function displayResult14(score){document.getElementById("cal14").value=score;sumscore();}
        function displayResult15(score){document.getElementById("cal15").value=score;sumscore();}
        function displayResult16(score){document.getElementById("cal16").value=score;sumscore();}
        function displayResult17(score){document.getElementById("cal17").value=score;sumscore();}
        function displayResult18(score){document.getElementById("cal18").value=score;sumscore();}
        function displayResult19(score){document.getElementById("cal19").value=score;sumscore();}
        function displayResult20(score){document.getElementById("cal20").value=score;sumscore();}
        function displayResult21(score){document.getElementById("cal21").value=score;sumscore();}
        function displayResult22(score){document.getElementById("cal22").value=score;sumscore();}
        function displayResult23(score){document.getElementById("cal23").value=score;sumscore();}
        function displayResult24(score){document.getElementById("cal24").value=score;sumscore();}
        function sumscore(){
               
                var sum;
                sum = parseInt(document.form1.c1.value) + parseInt(document.form1.c2.value) + parseInt(document.form1.c3.value) + 
                        parseInt(document.form1.c4.value) + parseInt(document.form1.c5.value) + parseInt(document.form1.c6.value) + 
                        parseInt(document.form1.c7.value) + parseInt(document.form1.c8.value) + parseInt(document.form1.c9.value) + 
                        parseInt(document.form1.c10.value) + parseInt(document.form1.c11.value) + parseInt(document.form1.c12.value) +
                        parseInt(document.form1.c13.value) + parseInt(document.form1.c14.value) + parseInt(document.form1.c15.value) + 
                        parseInt(document.form1.c16.value) + parseInt(document.form1.c17.value) + parseInt(document.form1.c18.value) + 
                        parseInt(document.form1.c19.value)+ parseInt(document.form1.c20.value) + parseInt(document.form1.c21.value) + 
                        parseInt(document.form1.c22.value) + parseInt(document.form1.c23.value)+ parseInt(document.form1.c24.value);
                
                
                document.form1.f25.value = parseInt(sum);
                document.form1.f25h.value = parseInt(sum);
        }
</script>

<html>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <a class="brand" href="main_or.php">PAJAC O.R. Management System</a>
    <ul class="nav">
      <li><a href="../index.php">Back to home</a></li>
      <li class="active"><a href="main_or.php">Main</a></li>
      <li><a href="RNP_form.php">Register New Patient</a></li>
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
    
<form action="womac_check_followup.php" method="post" name="form1">
<div class="container">
  <div class="container">
		<table class ="table table-hover table-bordered">
				
				<tr>
                                    <td colspan ='4'>
                                        <DIV class="inline text-center">
                                            <h4>Create WOMAC Knee Form<small>&nbsp;&nbsp;( Follow Up )</small></h4>
                                        </DIV> 
                                    </td>
				</tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <H5>WOMAC No. :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <input class="input-medium" type="text" name="text1h" value="<?echo $wmkinfo[0][0];?>" disabled="disabled">
                                            <input type="hidden" name="txt1" value="<?echo $wmkinfo[0][0];?>">
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <H5>Date :</H5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <? 
                                            $date = getdate();
                                            //print_r($date);
                                            $date_txt = $date[mday]." ".$date[month]." ".$date[year];
                                            $date_send = $date[year]."-".$date[mon]."-".$date[mday];
                                        ?>
                                        <DIV class="inline">
                                            <input class="input-medium" type="text" name="txt2h" value="<?echo $date_txt?>" disabled="disabled">
                                            <input class="input-medium" type="hidden" name="txt2" value="<?echo $date_send?>">
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <H5>Name :</H5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            
                                            <input class="input-medium" type="text" name="txt3h" value="<?echo $wmkinfo[0][2];?>" disabled="disabled">
                                            <input class="input-medium" type="hidden" name="txt3" value="<?echo $wmkinfo[0][2];?>">
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>HN :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            
                                            <input class="input-medium" type="text" name="txt4h" value="<?echo $wmkinfo[0][3];?>" disabled="disabled">
                                            <input class="input-medium" type="hidden" name="txt4" value="<?echo $wmkinfo[0][3];?>">
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Age :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            
                                            <input class="input-medium" type="text" name="txt5h" value="<?echo $wmkinfo[0][4];?>" disabled="disabled">
                                            <input class="input-medium" type="hidden" name="txt5" value="<?echo $wmkinfo[0][4];?>">
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Sex :</h5>
                                        </div>
                                    </td>
                                    <?
                                        switch ($wmkinfo[0][5]){
                                            case 'M' :
                                                //$male = "checked";
                                                //$female = "";
                                                $sex = "Male";
                                            break;
                                            case 'F' :
                                                //$male = "";
                                                //$female = "checked";
                                                $sex = "Female";
                                            break;
                                        }
                                    ?>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <h5>
                                                <input class="input-medium" type="text" name="txt6h" value="<?echo $sex;?>" disabled="disabled">
                                                <input class="input-medium" type="hidden" name="txt6" value="<?echo $sex;?>">
                                                <!--
                                              <label class="radio">
                                                <input type="radio" name="txt6" value="Male" <?//echo $male;?>>
                                                Male
                                              </label>
                                              <label class="radio">
                                                <input type="radio" name="txt6" value="Female" <?//echo $female;?>>
                                                Female
                                              </label>
                                                -->
                                            </h5>
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Weight (kg.) :</h5> 
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <input class="input-medium" type="text" name="txt7" OnChange="JavaScript:fncCalBMI();" OnClick="JavaScript:fncChecktxt1();" value="<?echo $wmkinfo[0][6];?>" onload="JavaScript:fncCalBMI();">
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Height (cm.) :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <input class="input-medium" type="text" name="txt8" OnChange="JavaScript:fncCalBMI();" OnClick="JavaScript:fncChecktxt2();"value="<?echo $wmkinfo[0][7];?>" onload="JavaScript:fncCalBMI();">
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>BMI :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <input class="input-medium" type="hidden" name="txt9" value="<?echo $wmkinfo[0][8];?>">
                                            <input class="input-medium" type="text" name="txt9h" value="<?echo $wmkinfo[0][8];?>" disabled="disabled"> *( Weight / Height^2 )
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Side (If Bilateral use 2 form) :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                    <?
                                        switch ($wmkinfo[0][9]){
                                            case 'R' :
                                                //$male = "checked";
                                                //$female = "";
                                                $side = "Right";
                                            break;
                                            case 'L' :
                                                //$male = "";
                                                //$female = "checked";
                                                $side = "Left";
                                            break;
                                        }
                                    ?>
                                            <input class="input-medium" type="hidden" name="txt10" value="<?echo $side;?>">
                                            <input class="input-medium" type="text" name="txt10h" value="<?echo $side;?>" disabled="disabled">
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Number of Visit :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <select name="txt12">.
                                                  <option value="0">Pre Op.</option>
                                                  <option value="1">6 wk</option>
                                                  <option value="2">3 mo</option>
                                                  <option value="3">6 mo</option>
                                                  <option value="4">1 yr</option>
                                                  <option value="5">2 yr</option>
                                                  <option value="6">3 yr</option>
                                                  <option value="7">4 yr</option>
                                                  <option value="8">5 yr</option>
                                                  <option value="9">6 yr</option>
                                                  <option value="10">7 yr</option>
                                                  <option value="11">8 yr</option>
                                                  <option value="12">9 yr</option>
                                                  <option value="13">10 yr</option>
                                                  <option value="14">11 yr</option>
                                                  <option value="15">12 yr</option>
                                                  <option value="16">13 yr</option>
                                                  <option value="17">14 yr</option>
                                                  <option value="18">15 yr</option>
                                            </select>
                                        </DIV>
                                    </td>
                                </tr>
				<tr>
                                    <td colspan ='4'> 
                                        <DIV class="inline text-center">
                                            <h4>Score <small>0 = Never, 1 = Rarely, 2 = Sometime, 3 = Often, 4 = Always</small></h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan ='4'> 
                                        <DIV class="inline text-center">
                                            <H4>Pain</H4>
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Walking On Flat :<SMALL> ( last point = <?echo " ".$wmkinfo[0][19]." )"?></SMALL></h5>
                                        </div>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
				<tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Going Up/Down Stair :<SMALL> ( last point = <?echo " ".$wmkinfo[0][20]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Night Pain :<SMALL> ( last point = <?echo " ".$wmkinfo[0][21]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <div class="inline">
                                          <label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Sitting or Lying :<SMALL> ( last point = <?echo " ".$wmkinfo[0][22]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                              <label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="1">1</label>
                                              <label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="2">2</label>
                                              <label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="3">3</label>
                                              <label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="4">4</label>
                                              <!--<label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="5">5</label>-->    
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Standing Upright :<SMALL> ( last point = <?echo " ".$wmkinfo[0][23]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan ='4'> 
                                        <DIV class="inline text-center">
                                            <H4>Stiffness</H4>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Knee joint stiffness in the morning :<SMALL> ( last point = <?echo " ".$wmkinfo[0][24]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)" value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Knee joint stiffness later in the day :<SMALL> ( last point = <?echo " ".$wmkinfo[0][25]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan ='4'> 
                                        <DIV class="inline text-center">
                                            <h4>Function</h4>
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Descending stairs :<SMALL> ( last point = <?echo " ".$wmkinfo[0][26]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <H5>Ascending stairs :<SMALL> ( last point = <?echo " ".$wmkinfo[0][27]." )"?></SMALL></H5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Rising from sitting :<SMALL> ( last point = <?echo " ".$wmkinfo[0][28]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Standing :<SMALL> ( last point = <?echo " ".$wmkinfo[0][29]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Bending to floor/pick up object :<SMALL> ( last point = <?echo " ".$wmkinfo[0][30]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Walking on flat (Funt.) :<SMALL> ( last point = <?echo " ".$wmkinfo[0][31]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="4">4</label>
                                          <!--<label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Getting in/out of car :<SMALL> ( last point = <?echo " ".$wmkinfo[0][32]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Going shopping :<SMALL> ( last point = <?echo " ".$wmkinfo[0][33]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Putting on socks :<SMALL> ( last point = <?echo " ".$wmkinfo[0][34]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="5">5</label>-->
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Raising from bed :<SMALL> ( last point = <?echo " ".$wmkinfo[0][35]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Taking off socks :<SMALL> ( last point = <?echo " ".$wmkinfo[0][36]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                          <label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="5">5</label>-->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Lying in bed(turn over, ect) :<SMALL> ( last point = <?echo " ".$wmkinfo[0][37]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Getting in/out of restroom :<SMALL> ( last point = <?echo " ".$wmkinfo[0][38]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Sitting :<SMALL> ( last point = <?echo " ".$wmkinfo[0][39]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Getting on/off toilet :<SMALL> ( last point = <?echo " ".$wmkinfo[0][40]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Heavy domestic duties(scrubbing floor, ect) :<SMALL> ( last point = <?echo " ".$wmkinfo[0][41]." )"?></SMALL></h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="5">5</label> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Light domestic duties(cooking, ect) :<SMALL> ( last point = <?echo " ".$wmkinfo[0][42]." )"?></SMALL></h5>
                                        </DIV>
                                       
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="1">1</label>
                                          <label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="2">2</label>
                                          <label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="3">3</label>
                                          <label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="4">4</label>
                                          <!-- <label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="5">5</label> -->
                                        </div>
                                    </td>
                                </tr>
                                <!--   hidden text for cal score -->
                                <tr>
                                    <td colspan ='4'>
                                        <input class="input-mini" type="hidden" id="cal1" name="c1" value="0">
                                        <input class="input-mini" type="hidden" id="cal2" name="c2"  value="0">
                                        <input class="input-mini" type="hidden" id="cal3" name="c3"  value="0">
                                        <input class="input-mini" type="hidden" id="cal4" name="c4"  value="0">
                                        <input class="input-mini" type="hidden" id="cal5" name="c5"  value="0">
                                        <input class="input-mini" type="hidden" id="cal6" name="c6" value="0">
                                        <input class="input-mini" type="hidden" id="cal7" name="c7"  value="0">
                                        <input class="input-mini" type="hidden" id="cal8" name="c8"  value="0">
                                        <input class="input-mini" type="hidden" id="cal9" name="c9"  value="0">
                                        <input class="input-mini" type="hidden" id="cal10" name="c10"  value="0">
                                        <input class="input-mini" type="hidden" id="cal11" name="c11"  value="0">
                                        <input class="input-mini" type="hidden" id="cal12" name="c12"  value="0">
                                        <input class="input-mini" type="hidden" id="cal13" name="c13"  value="0">
                                        <input class="input-mini" type="hidden" id="cal14" name="c14"  value="0">
                                        <input class="input-mini" type="hidden" id="cal15" name="c15"  value="0">
                                        <input class="input-mini" type="hidden" id="cal16" name="c16"  value="0">
                                        <input class="input-mini" type="hidden" id="cal17" name="c17"  value="0">
                                        <input class="input-mini" type="hidden" id="cal18" name="c18"  value="0">
                                        <input class="input-mini" type="hidden" id="cal19" name="c19"  value="0">
                                        <input class="input-mini" type="hidden" id="cal20" name="c20"  value="0">
                                        <input class="input-mini" type="hidden" id="cal21" name="c21"  value="0">
                                        <input class="input-mini" type="hidden" id="cal22" name="c22"  value="0">
                                        <input class="input-mini" type="hidden" id="cal23" name="c23"  value="0">
                                        <input class="input-mini" type="hidden" id="cal24" name="c24"  value="0">
                                    </td>
                                </tr>
                                        
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h4>Total WOMAC Score (0 - 96) :<SMALL> ( last point = <?echo " ".$wmkinfo[0][43]." )"?></SMALL></h4>
                                        </DIV> 
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <input class="input-medium" type="hidden" id="f25" name="f25" >
                                          <input class="input-medium" type="text" id="f25h" name="f25h" disabled="disabled">                                            
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan ='4' align = "center">
                                        <DIV class="inline text-center">
                                            <button type="submit" value="Save changes" class="btn btn-primary">Up Date</button>
                                            <a href="RNP_view.php" class="btn btn-inverse">Back</a>
                                        </DIV>
                                    </td>
                                </tr>
                                
		</table>
    </div>
</div>

</form>
</body>
</html>


<?php
}

include "footer.php";
?>
