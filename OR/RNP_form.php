<?php
session_start();
include "../ConnectDB.php";
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php"><?
}else{

        $_SESSION["navbar"] = 2;
        $_SESSION["nofooter"] = 1;
        $_SESSION["menutab"] = 99;
	$DB = new ConnectDB();
	$DB->connect();
        $hospital = $DB->getNameHospital();
        include "./call_framework.php";
        
        $get_op = $DB->getAllOperatorAutoComplete();
        $txtop = '"';
        for($i=0;$i<count($get_op);$i++){
            $txtop .= $get_op[$i].'","';
        }
            $txtop .= '*"';
?> 


<html>
<script language="JavaScript">
	   var HttPRequest = false;
        function fncCalBMI()
        {
                 if(isNaN(document.form1.txt8.value) || document.form1.txt8.value == "")
                 {
                        alert('(Weight)Please input Number only.');
                        document.form1.txt8.value = 0;
                        document.form1.txt8.focus();
                        return false;
                 }

                 if(isNaN(document.form1.txt9.value) || document.form1.txt9.value == "")
                 {
                        alert('(Height)Please input Number only.');
                        document.form1.txt9.value = 0;
                        document.form1.txt9.focus();
                        return false;
                 }
                 var W = parseFloat(document.form1.txt8.value);
                 var H = parseFloat(document.form1.txt9.value);
                 var BMI = (W/(H*H))*10000;
                 document.form1.txt10.value = BMI.toFixed(2);  
                 document.form1.txt10h.value = BMI.toFixed(2); 
        }
        function fncCalBY(year)
        {
                 if(isNaN(document.form1.txt12.value))
                 {
                        alert('(Age)Please input Number only.');
                        document.form1.txt12.value = 0;
                        document.form1.txt12.focus();
                        return false;
                 }
                
                 var age = year - document.form1.txt12.value;
                 document.form1.txt6.value = age;  
                 document.form1.txt6h.value = age; 
        }
        function fncChecktxt1()
	{  
                 //alert('test');
                 document.form1.txt8.value = ""
		 document.form1.txt8.focus();	    
	}
        function fncChecktxt2()
	{  
                 //alert('test');
                 document.form1.txt9.value = ""
		 document.form1.txt9.focus();	    
	}
        function fncChecktxt3()
	{  
                 //alert('test');
                 document.form1.txt12.value = ""
		 document.form1.txt12.focus();	    
	}
            
	   function doCallAjax() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'RNP_Chk.php';
		  var pmeters = "tHN=" + encodeURI( document.getElementById("HN").value);
                  

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			//HttPRequest.setRequestHeader("Content-length",pmeters.length);
			//HttPRequest.setRequestHeader("Connection","close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'RNP_agree.php';
					}
					else
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				}
				
			}

	   }
</script>
  <head>

    <!--<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" media="screen"href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript"src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>

  </head>
<body>
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
    
    <form action="RNP_agree.php" method="post" name="form1">
<div class="container">
    <div class="container">
		<table class ="table table-hover table-bordered">
                    <tr>
                        <td colspan="4">
                            <DIV class="inline">
                                <h4>Register New Patients</h4>
                            </DIV>
                        </td>
                    </tr>
                    <tr >
                        <td colspan="1">
                            <DIV class="inline">
                                <h5>Name :</h5>
                            </DIV>
                        </td>
                        <td colspan="3">
                            <DIV class="inline">
                                <input class="input-large" type="text" name="txt1" value="<?echo $_SESSION["RNP_txt1_1"];?>" autocomplete="off">
                            </DIV>
                            <?echo $_SESSION["RNP_txt1"];?>
                        </td>
                    </tr>
                    <tr >
                        <td colspan="1">
                            <DIV class="inline">
                                <h5>Last Name :</h5>
                            </DIV>
                            
                        </td>
                        <td colspan="3">
                            <DIV class="inline">
                                <input class="input-large" type="text" name="txt2" value="<?echo $_SESSION["RNP_txt2_1"];?>" autocomplete="off">
                            </DIV>
                            <?echo $_SESSION["RNP_txt2"];?>
                        </td>
                    </tr>
                    <tr >
                        <td colspan="1">
                            <DIV class="inline">
                                <h5>Hospital :</h5>
                            </DIV>
                        </td>
                        <td colspan="3">
                            <DIV class="inline">
                                <select class="input-large" name="txt5">
                                                <?
                                                        if($_SESSION["RNP_txt5_1"]==""){
                                                ?>
                                                            <option value="">-- Choose Hospital -- </option>
                                                <?          for($array=0;$array<$DB->getnumrow();$array++)
                                                            echo "<option  value='".$hospital[$array][1]."'>".$hospital[$array][1]."</option>";           
                                                        }else{
                                                ?>
                                                            <option value="<?echo $_SESSION["RNP_txt5_1"];?>"><?echo $_SESSION["RNP_txt5_1"];?></option>
                                                <?          for($array=0;$array<$DB->getnumrow();$array++)
                                                            echo "<option  value='".$hospital[$array][1]."'>".$hospital[$array][1]."</option>";	
                                                        }
						?>

				</select>
                            </DIV>
                            <?echo $_SESSION["RNP_txt5"];?>
                        </td>
                    </tr>
                    <tr >
                        <td>
                            <DIV class="inline">
                                <h5>HN :</h5>
                            </DIV>
                        </td>
                        <td >
                            <DIV class="inline">
                                <input class="input-large" type="text" name="txt3" id="HN" value="<?echo $_SESSION["RNP_txt3_1"];?>" OnChange="JavaScript:doCallAjax();" onkeyup="JavaScript:doCallAjax();" onclick="JavaScript:doCallAjax();" autocomplete="off"> 
                            </DIV>
                            <?echo $_SESSION["RNP_txt3"];?>
                            <span id="mySpan"></span>
                        </td>
                        <td>
                            <DIV class="inline">
                                <h5>AN :</h5>
                            </DIV>
                        </td>
                        <td >
                            <DIV class="inline">
                                <input class="input-large" type="text" name="txt4" value="<?echo $_SESSION["RNP_txt4_1"];?>" autocomplete="off">
                            </DIV>
                            <?echo $_SESSION["RNP_txt4"];?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Sex :</h5>
                        </td>
                        <td colspan ='3'>
                            <DIV class="inline">
                                <label class="radio">
                                <input type="radio" name="txt7" value="Male" checked>
                                Male
                              </label>
                              <label class="radio">
                                <input type="radio" name="txt7" value="Female">
                                Female
                              </label>
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
                                    <?
                                        if($_SESSION["RNP_txt8_1"] == ""){
                                            $_SESSION["RNP_txt8_1"] = 0;
                                        }
                                    ?>
                                    <input class="input-medium" type="text" name="txt8" OnChange="JavaScript:fncCalBMI();" OnClick="JavaScript:fncChecktxt1();" value="<?echo $_SESSION["RNP_txt8_1"];?>" autocomplete="off">
                                </DIV>
                                <?echo $_SESSION["RNP_txt8"];?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                <h5>Height (cm.) :</h5>
                            </td>
                            <td colspan ='3'>
                                <DIV class="inline">
                                    <?
                                        if($_SESSION["RNP_txt9_1"] == ""){
                                            $_SESSION["RNP_txt9_1"] = 0;
                                        }
                                    ?>
                                    <input class="input-medium" type="text" name="txt9" OnChange="JavaScript:fncCalBMI();" OnClick="JavaScript:fncChecktxt2();"value="<?echo $_SESSION["RNP_txt9_1"];?>" autocomplete="off">
                                </DIV>
                                <?echo $_SESSION["RNP_txt9"];?>
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
                                    <input class="input-medium" type="hidden" name="txt10" value="<?echo $_SESSION["RNP_txt10_1"];?>">
                                    <input class="input-medium" type="text" name="txt10h" value="<?echo $_SESSION["RNP_txt10_1"];?>" disabled="disabled"> *( Weight / Height^2 )
                                </DIV>
                            </td>
                        </tr>
                    <tr >
                        <td colspan="1">
                            <div class="inline">
                                <h5>Age :</h5>
                            </div>
                        </td>
                        <td colspan="1">
                            <div class="inline">
                                <?
                                    if($_SESSION["RNP_txt12_1"] == ""){
                                        $_SESSION["RNP_txt12_1"] = 0;
                                    }
                                    
                                    $today = getdate();
                                    $yr = $today["year"];
                                ?>
                                <input class="input-medium" type="text" name="txt12" OnChange="JavaScript:fncCalBY(<?echo $yr;?>);" OnClick="JavaScript:fncChecktxt3();" value="<?echo $_SESSION["RNP_txt12_1"];?>" autocomplete="off">
                                <?echo $_SESSION["RNP_txt12"];?>
                            </div>
                        </td>
                        <td colspan="1">
                            <DIV class="inline">
                                <h5>Birth year(A.D.):</h5>
                            </DIV>
                        </td>
                        <td colspan="1">
                            <div class="inline">
                                <input class="input-medium" type="text" name="txt6h" value="<?echo $_SESSION["RNP_txt6_1"];?>" disabled="disabled">
                                <input class="input-medium" type="hidden" name="txt6" value="<?echo $_SESSION["RNP_txt6_1"];?>">
                            </div>
<!--                            <DIV class="inline">
                                    <div id="datetimepicker1" class="input-append">
                                        <input class="input-large" data-format="yyyy" type="text" name="txt6" autocomplete="off" value="<?//echo $_SESSION["RNP_txt6_1"];?>"></input>
                                      <span class="add-on">
                                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                        </i>
                                      </span>
                                    </div>
                                  <script type="text/javascript">
                                    $(function() {
                                      $('#datetimepicker1').datetimepicker({
                                        pickTime: false
                                      });
                                    });
                                  </script>
                            </DIV>-->
                            <?echo $_SESSION["RNP_txt6"];?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <DIV class="inline">
                                <h5>Operator :</h5>
                            </DIV>
                        </td>
                        <td colspan="3">
                            <DIV class="inline">
                                <input type="text" class="input-large" name="txt11" style="margin: 0 auto;" data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' autocomplete="off" value="<?echo $_SESSION["RNP_txt11_1"]?>">
                                <?echo $_SESSION["RNP_txt11"];?>
                            </DIV>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <DIV class="inline text-center">
                                <button class="btn btn-large btn-primary" type="submit">Save Change</button>
                                <button class="btn btn-large btn-inverse" type="reset">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                            </DIV>
                        </td>
                    </tr>
                    
                </table>
    </div>
  </div>
    
    
</form>
</body>
</html>
   
<?    
}
$_SESSION["RNP_txt1"] = "";
$_SESSION["RNP_txt2"] = "";
$_SESSION["RNP_txt3"] = "";
$_SESSION["RNP_txt4"] = "";
$_SESSION["RNP_txt5"] = "";
$_SESSION["RNP_txt6"] = "";
$_SESSION["RNP_txt8"] = "";
$_SESSION["RNP_txt9"] = "";
$_SESSION["RNP_txt11"] = "";
$_SESSION["RNP_txt12"] = "";

$_SESSION["RNP_txt1_1"] = "";
$_SESSION["RNP_txt2_1"] = "";
$_SESSION["RNP_txt3_1"] = "";
$_SESSION["RNP_txt4_1"] = "";
$_SESSION["RNP_txt5_1"] = "";
$_SESSION["RNP_txt6_1"] = "";
$_SESSION["RNP_txt8_1"] = "";
$_SESSION["RNP_txt9_1"] = "";
$_SESSION["RNP_txt10_1"] = "";
$_SESSION["RNP_txt11_1"] = "";
$_SESSION["RNP_txt12_1"] = "";
include "footer.php";

?>
