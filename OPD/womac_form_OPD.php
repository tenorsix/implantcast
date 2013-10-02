<?php
session_start();
include "../ConnectDB.php";
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php"><?
}else{
	$DB = new ConnectDB();
	$DB->connect();
        $bankvar = "";
	//$getname = "signature = '".$_SESSION["name"]."  ".$_SESSION["lastname"]."'";
        $getPatients = "hn = '".$_GET['hn']."'";
	//$kkk = $DB->search_womac($getname,$bankvar);
        $kkk = $DB->search_womac($getPatients,$bankvar);
	//echo $getname."<hr>";
        //echo $kkk[0][0]."<hr>";
	//print_r($kkk);
	$numberwomac_form = $DB->getnumrow();
	$numberwomac = (int)$numberwomac_form + 1;
	$womac_number = "WMK-".$_GET['hn'];
	$nu = sprintf("%04d", $numberwomac);
	$totalwomac_number = $womac_number.$nu;
	//echo $numberwomac."<hr>";
	//echo $totalwomac_number."<hr>";
	$_SESSION["womac_number"] = $totalwomac_number;
	


	/*$ar = $DB->getNameHospital();
	for($kkkk=0;$kkkk<$DB->getnumrow();$kkkk++)
	print $ar[$kkkk][0]."-".$ar[$kkkk][1]."<br>";*/
        include './call_framework_bs3.php';
        
?>
<script language="JavaScript">
	function fncCalBMI()
	{
		 if(isNaN(document.form1.txt7.value) || document.form1.txt7.value == "")
		 {
			alert('(Weight)Please input Number only.');
                        document.form1.txt7.value = 0;
			document.form1.txt7.focus();
			return false;
		 }

		 if(isNaN(document.form1.txt8.value) || document.form1.txt8.value == "")
		 {
			alert('(Height)Please input Number only.');
                        document.form1.txt8.value = 0;
			document.form1.txt8.focus();
			return false;
		 }
                 var W = parseFloat(document.form1.txt7.value);
                 var H = parseFloat(document.form1.txt8.value);
                 var BMI = (W/(H*H))*10000;
		 document.form1.txt9.value = BMI.toFixed(2);  
                 document.form1.txt9h.value = BMI.toFixed(2); 
	}
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
        function fncChecktxt1()
	{  
                 //alert('test');
                 document.form1.txt7.value = ""
		 document.form1.txt7.focus();	    
	}
        function fncChecktxt2()
	{  
                 //alert('test');
                 document.form1.txt8.value = ""
		 document.form1.txt8.focus();	    
	}
</script>

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
<form action="womac_check_OPD.php" method="post" name="form1">
<div class="container row">
    <div class="col-lg-2">
        
    </div>
    <div class="col-lg-10">
		<table class='table table-bordered table-condensed table-hover table-responsive'>
				
				<tr>
                                    <td colspan ='4' class="col-lg-6">
                                        <DIV class="inline text-center">
                                            <h4>Create WOMAC Knee Form</h4>
                                        </DIV> 
                                    </td>
				</tr>
                                <tr>
                                    <td class="col-lg-3">
                                        <DIV class="inline">
                                            <H5>WOMAC No. :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3' class="col-lg-3">
                                        <DIV class="inline">
                                            <input class="form-control" type="text" name="text1h" value="<?echo $_SESSION["womac_number"];?>" disabled="disabled">
                                            <input type="hidden" name="txt1" value="<?echo $_SESSION["womac_number"];?>">
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
                                            <input class="form-control" type="text" name="txt2h" value="<?echo $date_txt?>" disabled="disabled">
                                            <input class="form-control" type="hidden" name="txt2" value="<?echo $date_send?>">
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
                                            
                                            <input class="form-control" type="text" name="txt3h" value="<?echo $_GET['name']?>" disabled="disabled">
                                            <input class="form-control" type="hidden" name="txt3" value="<?echo $_GET['name']?>">
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
                                            
                                            <input class="form-control" type="text" name="txt4h" value="<?echo $_GET['hn']?>" disabled="disabled">
                                            <input class="form-control" type="hidden" name="txt4" value="<?echo $_GET['hn']?>">
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
                                            
                                            <input class="form-control" type="text" name="txt5h" value="<?echo $_GET['age']?>" disabled="disabled">
                                            <input class="form-control" type="hidden" name="txt5" value="<?echo $_GET['age']?>">
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
                                        switch ($_GET['sex']){
                                            case 'Male' :
                                                //$male = "checked";
                                                //$female = "";
                                            break;
                                            case 'Female' :
                                                //$male = "";
                                                //$female = "checked";
                                            break;
                                        }
                                    ?>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <h5>
                                                <input class="form-control" type="text" name="txt6h" value="<?echo $_GET['sex']?>" disabled="disabled">
                                                <input class="form-control" type="hidden" name="txt6" value="<?echo $_GET['sex']?>">
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
                                            <input class="form-control" type="text" name="txt7" OnChange="JavaScript:fncCalBMI();" OnClick="JavaScript:fncChecktxt1();" value="<?echo $_GET['weight'];?>" onload="JavaScript:fncCalBMI();">
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
                                            <input class="form-control" type="text" name="txt8" OnChange="JavaScript:fncCalBMI();" OnClick="JavaScript:fncChecktxt2();"value="<?echo $_GET['height'];?>" onload="JavaScript:fncCalBMI();">
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
                                            <input class="form-control" type="hidden" name="txt9" value="<?echo $_GET['bmi'];?>">
                                            <input class="form-control" type="text" name="txt9h" value="<?echo $_GET['bmi'];?>" disabled="disabled"> *( Weight / Height^2 )
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
                                                //echo " ***** ".$kkk[0][9]; //side 
                                                switch ($kkk[0][9]) {
                                                    case 'R':
                                                ?>
                                                    <h5>
                                                     <label class="radio">
                                                       <input type="radio" name="txt10" value="Left">
                                                       <h5>Left</h5>
                                                     </label>  
                                                        <?
                                                            echo $_SESSION['chkside'];
                                                            unset($_SESSION['chkside']);
                                                        ?>
                                                    </h5>
                                                <?
                                                    break;
                                                    case 'L':
                                                ?>
                                                    <h5>
                                                    <label class="radio">
                                                       <input type="radio" name="txt10" value="Right">
                                                       <h5>Right</h5>
                                                    </label>
                                                        <?
                                                            echo $_SESSION['chkside'];
                                                            unset($_SESSION['chkside']);
                                                        ?>
                                                    </h5>
                                                <?
                                                    break;
                                                    default:
                                                ?>
                                                    <h5>
                                                     <label class="radio">
                                                       <input type="radio" name="txt10" value="Right">
                                                       <h5>Left</h5>
                                                     </label>
                                                     <label class="radio">
                                                       <input type="radio" name="txt10" value="Left">
                                                       <h5>Right</h5>
                                                     </label>  
                                                        <?
                                                            echo $_SESSION['chkside'];
                                                            unset($_SESSION['chkside']);
                                                        ?>
                                                    </h5>
                                            
                                                <?

                                                    
                                                    break;
                                                }
                                            ?>
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Number of Visit :</h5>
                                        </DIV>
                                    </td>
<!--                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <input class="form-control" type="text" name="txt12h" value="Pre Op." disabled="disabled">
                                            <input class="form-control" type="hidden" name="txt12" value="0">
                                        </DIV>
                                    </td>-->
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                            <select name="txt12" class="form-control">
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
                                            <h5>Walking On Flat :</h5>
                                        </div>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                            <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="1">1</label></div>
                                            <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="2">2</label></div>
                                            <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="3">3</label></div>
                                            <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="4">4</label></div>                   
                                          <!--<label class="radio inline"><input type="radio" name="f1" onclick="displayResult1(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
				<tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Going Up/Down Stair :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="4">4</label></div>
                                          <!--<label class="radio inline"><input type="radio" name="f2" onclick="displayResult2(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Night Pain :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <div class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="4">4</label></div>
                                          <!--<label class="radio inline"><input type="radio" name="f3" onclick="displayResult3(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Sitting or Lying :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                              <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="1">1</label></div>
                                              <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="2">2</label></div>
                                              <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="3">3</label></div>
                                              <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="4">4</label></div>
                                              <!--<label class="radio inline"><input type="radio" name="f4" onclick="displayResult4(this.value)"value="5">5</label>-->    
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Standing Upright :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                            <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="1">1</label></div>
                                            <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="2">2</label></div>
                                            <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="3">3</label></div>
                                            <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f5" onclick="displayResult5(this.value)"value="4">4</label></div>
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
                                            <h5>Knee joint stiffness in the morning :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="4">4</label></div>
                                          <!--<label class="radio inline"><input type="radio" name="f6" onclick="displayResult6(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Knee joint stiffness later in the day :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f7" onclick="displayResult7(this.value)"value="4">4</label></div>
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
                                            <h5>Descending stairs :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="4">4</label></div>
                                          <!--<label class="radio inline"><input type="radio" name="f8" onclick="displayResult8(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <H5>Ascending stairs :</H5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                           <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="1">1</label></div>
                                           <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="2">2</label></div>
                                           <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="3">3</label></div>
                                           <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="4">4</label></div>
                                          <!--<label class="radio inline"><input type="radio" name="f9" onclick="displayResult9(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Rising from sitting :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                           <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="1">1</label></div>
                                           <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="2">2</label></div>
                                           <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="3">3</label></div>
                                           <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="4">4</label></div>
                                          <!--<label class="radio inline"><input type="radio" name="f10" onclick="displayResult10(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Standing :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f11" onclick="displayResult11(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Bending to floor/pick up object :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="4">4</label></div>
                                          <!--<label class="radio inline"><input type="radio" name="f12" onclick="displayResult12(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Walking on flat (Funt.) :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="4">4</label></div>
                                          <!--<label class="radio inline"><input type="radio" name="f13" onclick="displayResult13(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Getting in/out of car :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f14" onclick="displayResult14(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Going shopping :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f15" onclick="displayResult15(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Putting on socks :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f16" onclick="displayResult16(this.value)"value="5">5</label>-->
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Raising from bed :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f17" onclick="displayResult17(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Taking off socks :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <div class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f18" onclick="displayResult18(this.value)"value="5">5</label>-->
                                        </div>      
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Lying in bed(turn over, ect) :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f19" onclick="displayResult19(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Getting in/out of restroom :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f20" onclick="displayResult20(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Sitting :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f21" onclick="displayResult21(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Getting on/off toilet :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f22" onclick="displayResult22(this.value)"value="5">5</label>-->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Heavy domestic duties(scrubbing floor, ect) :</h5>
                                        </DIV>
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="4">4</label></div>
                                          <!-- <label class="radio inline"><input type="radio" name="f23" onclick="displayResult23(this.value)"value="5">5</label> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <DIV class="inline">
                                            <h5>Light domestic duties(cooking, ect) :</h5>
                                        </DIV>
                                       
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="row">
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="1">1</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="2">2</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="3">3</label></div>
                                          <div class="col-lg-1"><label class="radio inline"><input type="radio" name="f24" onclick="displayResult24(this.value)"value="4">4</label></div>
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
                                            <h4>Total WOMAC Score (0 - 96) :</h4>
                                        </DIV> 
                                    </td>
                                    <td colspan ='3'>
                                        <DIV class="inline">
                                          <input class="form-control" type="hidden" id="f25" name="f25" >
                                          <input class="form-control" type="text" id="f25h" name="f25h" disabled="disabled">                                            
                                        </DIV>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan ='4' align = "center">
                                        <DIV class="inline text-center">
                                            <button type="submit" value="Save changes" class="btn btn-primary">Save changes</button>
                                            <a href="main_opd.php" class="btn btn-inverse">Back</a>
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
