<?php
session_start();
include "../ConnectDB.php";
include './opd_class.php';

if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
    ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php"><?
}else{
    $DB = new ConnectDB();
    $DB->connect();
    $opd = new OPD();
    $form_id = $opd->get_followup_id();
    
    $_SESSION["HN"] = $_GET['hn'];
    $_SESSION["Patientnname"] = $_GET['name'];
    
    include './call_framework_bs3.php';
?>
<html>
    <link href="datepicker/css/datepicker.css" rel="stylesheet">
    <script type="text/javascript" src="datepicker/js/bootstrap-datepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="datepicker/js/locales/bootstrap-datepicker.th.js" charset="UTF-8"></script>
    
    <script language="JavaScript">
            function doCallAjax(visit) {
                var side;    
                if(document.form1.side1.checked == false && document.form1.side2.checked == false)
                {
                    alert('Please Check side first');
                    exit();
                }
                if(document.form1.side1.checked == true){
                    side = document.getElementById('side1').value;
                }else if(document.form1.side2.checked == true){
                    side = document.getElementById('side2').value;
                }
                
                  //alert(side);
                  //alert("Testttt >>"+document.getElementById("point"+"["+visit+"]").value);
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
	
		  var url = 'get_point.php';
		  var pmeters = "tPoint=" + side + encodeURI( document.getElementById("point"+"["+visit+"]").value ) ;
                  

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			//HttPRequest.setRequestHeader("Content-length",pmeters.length);
			//HttPRequest.setRequestHeader("Connection","close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{
				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("womacpoint").value = "..";
                                        document.getElementById("womacpointh").value = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'get_point.php';
					}
					else
					{
						document.getElementById("womacpoint").value = HttPRequest.responseText;
                                                document.getElementById("womacpointh").value = HttPRequest.responseText;
					}
				}
			}

                }   
    </script>
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
<form action="opd_followup_check.php" method="post" name="form1">
    
<div class="container row">
    <div class="col-lg-2">
        
    </div>
    <div class="col-lg-2">
        <table class='table table-bordered table-condensed table-hover table-responsive'>
            <tr>
                <td class="col-lg-4">
                    <div class="inline text-center">
                        <h4><STRONG>Visit</STRONG></h4>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-lg-4">
                    &nbsp;&nbsp;
                    <div class="radio-inline">
                        <label> <input type="radio" id="side1" name="txt31" value="R"> Right </label>
                    </div>
                    <div class="radio-inline">
                        <label> <input type="radio" id="side2" name="txt31" value="L"> Left </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline text-left">
                        <div class="radio-inline"><label><input type="radio" id="point[1]" name="txt26" value="1" onclick="JavaScript:doCallAjax(1);"> 6 Wk</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[2]" name="txt26" value="2" onclick="JavaScript:doCallAjax(2);"> 3 Mo</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[3]" name="txt26" value="3" onclick="JavaScript:doCallAjax(3);"> 6 Mo</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[4]" name="txt26" value="4" onclick="JavaScript:doCallAjax(4);"> 1 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[5]" name="txt26" value="5" onclick="JavaScript:doCallAjax(5);"> 2 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[6]" name="txt26" value="6" onclick="JavaScript:doCallAjax(6);"> 3 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[7]" name="txt26" value="7" onclick="JavaScript:doCallAjax(7);"> 4 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[8]" name="txt26" value="8" onclick="JavaScript:doCallAjax(8);"> 5 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[9]" name="txt26" value="9" onclick="JavaScript:doCallAjax(9);"> 6 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[10]" name="txt26" value="10" onclick="JavaScript:doCallAjax(10);"> 7 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[11]" name="txt26" value="11" onclick="JavaScript:doCallAjax(11);"> 8 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[12]" name="txt26" value="12" onclick="JavaScript:doCallAjax(12);"> 9 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[13]" name="txt26" value="13" onclick="JavaScript:doCallAjax(13);"> 10 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[14]" name="txt26" value="14" onclick="JavaScript:doCallAjax(14);"> 11 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[15]" name="txt26" value="15" onclick="JavaScript:doCallAjax(15);"> 12 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[16]" name="txt26" value="16" onclick="JavaScript:doCallAjax(16);"> 13 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[17]" name="txt26" value="17" onclick="JavaScript:doCallAjax(17);"> 14 Yr</label></div><br>
                        <div class="radio-inline"><label><input type="radio" id="point[18]" name="txt26" value="18" onclick="JavaScript:doCallAjax(18);"> 15 Yr</label></div><br>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-lg-8">
        <table class='table table-bordered table-condensed table-hover table-responsive'>
            <tr>
                <td colspan="3" >
                    <div class="inline text-center">
                        <h3><STRONG>Follow Up Form TKA</STRONG></h3>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-lg-2">
                    <div class="inline text-right">
                        <h5><STRONG>Form No. :</STRONG></h5>
                    </div>
                </td>
                <td class="col-lg-6" colspan="2">
                    <div class="inline text-right">
                        <input type="text" name="txt1h" class="form-control" value="<?=$form_id;?>" disabled="disabled">
                        <input type="hidden" name="txt1" class="form-control" value="<?=$form_id;?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-lg-4">
                    <div class="inline text-right">
                        <h5><STRONG>HN No. :</STRONG></h5>
                    </div>
                </td>
                <td class="col-lg-4" colspan="2">
                    <div class="inline text-right">
                        <input type="text" name="txt2h" class="form-control" value="<?=$_SESSION["HN"];?>" disabled="disabled">
                        <input type="hidden" name="txt2" class="form-control" value="<?=$_SESSION["HN"];?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-lg-4">
                    <div class="inline text-right">
                        <h5><STRONG>Name :</STRONG></h5>
                    </div>
                </td>
                <td class="col-lg-4" colspan="2">
                    <div class="inline text-right">
                        <input type="text" name="txt3h" class="form-control" value="<?=$_SESSION["Patientnname"]?>"disabled="disabled">
                        <input type="hidden" name="txt3" class="form-control" value="<?=$_SESSION["Patientnname"]?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-lg-4">
                    <div class="inline text-right">
                        <h5><STRONG>Date :</STRONG></h5>
                    </div>
                </td>
                <td class="col-lg-4" colspan="2">
                    <div class="inline text-right">
                        <input type="text" id="dp1" name="txt4" class="form-control" autocomplete="off">
                        <script type="text/javascript">
                            $('#dp1').datepicker({
                                format: 'yyyy-mm-dd'
                            });
                        </script>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="inline text-left">
                        <STRONG>S :</STRONG>
                        <!--==========================================================-->
                        <br>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt5" value="1"> Doing Well </label>
                        </div>
                        <br>
                        <!--==========================================================-->
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt6" value="1"> Mild Pain </label>
                        </div>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt7" value="1"> Moderate Pain </label>
                        </div>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt8" value="1"> Severe Pain </label>
                        </div>
                        <!--==========================================================-->
                        <br>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt9" value="1"> Ambulate : </label>
                        </div>
                        <div class="radio-inline">
                            <label> <input type="radio" name="txt10" value="1"> With walker  </label>
                        </div>
                        <div class="radio-inline">
                            <label> <input type="radio" name="txt10" value="2"> Without walker </label>
                        </div>
                        <div class="radio-inline">
                            <label> <input type="radio" name="txt10" value="0" checked="checked"> None </label>
                        </div>
                        <!--==========================================================-->
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="radio-inline">
                            <label> <input type="radio" name="txt11" value="1"> With Assistive aevice  </label>
                        </div>
                        <div class="radio-inline">
                            <label> <input type="radio" name="txt11" value="2"> Without Assistive aevice </label>
                        </div>
                        <div class="radio-inline">
                            <label> <input type="radio" name="txt11" value="0" checked="checked"> None </label>
                        </div>
                        <!--==========================================================-->
                        <br>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt12" value="1"> Start up pain Night Pain</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="inline text-left">
                        <STRONG>O :</STRONG>
                        <!--==========================================================-->
                        <br>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt13" value="1"> Swelling </label>
                        </div>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt14" value="1"> Erythematous </label>
                        </div>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt15" value="1"> Warm </label>
                        </div>
                        <!--==========================================================-->
                        <br>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt16" value="1"> Good Surgicalwound </label>
                        </div>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt17" value="1"> Serous Discharge </label>
                        </div>
                        <!--==========================================================-->
                        <br>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt18" value="1"> Purulent Discharge </label>
                        </div>
                        <!--==========================================================-->
                        <br>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt19" value="1"> Wound Dehiscence </label>
                        </div>
                        <!--==========================================================-->
                        <br>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline text-right">
                        <h5><STRONG>ROM :</STRONG></h5>
                    </div>
                </td>
                <td colspan="2">
                    <div class="inline text-left">
                        <input type="text" name="txt20" class="form-control">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline text-right">
                        <h5><STRONG>WOMAC :</STRONG></h5>
                    </div>
                </td>
                <td colspan="2">
                    <div class="inline text-left">
                        <input type="text" id="womacpointh" name="txt21h" class="form-control" disabled="disabled">
                        <input type="hidden" id="womacpoint" name="txt21" class="form-control">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline text-right">
                        <h5><STRONG>KSS :</STRONG></h5>
                    </div>
                </td>
                <td colspan="2">
                    <div class="inline text-left">
                        <input type="text" name="txt22" class="form-control">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="inline text-right">
                        <h5><STRONG>A : S/P TAK RT/LT </STRONG></h5>
                    </div>
                </td>
                <td colspan="2">
                    <div class="inline text-left">
                        <input type="text" class="form-control" name="txt23" >
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="inline text-left">
                        <h5>
                            <STRONG>P : Advice </STRONG>
                                <label> <input type="checkbox" name="txt24" value="1"> Quadricep Strengthening </label>
                                <label> <input type="checkbox" name="txt25" value="1"> Stretching </label>
                        </h5>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="inline text-left">
                        <h4><STRONG>Investigation</STRONG></h4>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="inline text-left">
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt27" value="1"> X-Ray Both Knee AP Lat (Standing) and Skyline view </label>
                        </div>
                        <!--==========================================================-->
                        <br>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt28" value="1"> CBC </label>
                        </div>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt29" value="1"> ESR </label>
                        </div>
                        <div class="checkbox-inline">
                            <label> <input type="checkbox" name="txt30" value="1"> CRP </label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="inline text-center">
                        <button type="submit" value="Save changes" class="btn btn-lg btn-primary">Save changes</button>
                        <button type="reset" value="Reset" class="btn btn-lg btn-danger">Reset</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>   
</div>
    
</form>
<?
    include './footer.php';

?>        
</body>
</html>
    
    
    
    
    
    
<?    
}
?>
