<?php
session_start();
unset($_SESSION["k2"]);
include "ConnectDB.php";
/*if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
}else{*/
        $_SESSION["menutab"] = 6;
        $_SESSION["nofooter"] = 1;
	$DB = new ConnectDB();
	$DB->connect();
        $bankvar = "";
	//$kkk = $DB->searchk2($_SESSION["Uid"],$bankvar);
	//$numberk2_form = $DB->getnumrow();
        
	$numberk2 = (int)$numberk2_form + 1;
	$k2_number = "K2-".$_SESSION["Uid"];
	$nu = sprintf("%04d", $numberk2);
	$totalk2_number = $k2_number.$nu;
	$_SESSION["k2_number"] = $totalk2_number;
	


	$ar = $DB->getNameHospital();
        $get_nurse = $DB->getAllNurseAutoComplete();
        $totalnurse = $DB->getnumrow(); 
        $i=0;
        $txtnurse = '"';
        for($i=0;$i<$totalnurse;$i++){
            $txtnurse .= $get_nurse[$i].'","';
        }
            $txtnurse .= '*"';
        
        $get_op = $DB->getAllOperatorAutoComplete();
        $totalop = $DB->getnumrow(); 
        $i=0;
        $txtop = '"';
        for($i=0;$i<$totalop;$i++){
            $txtop .= $get_op[$i].'","';
        }
            $txtop .= '*"';
         
        include "index.php";
?>

<html>
<head>

    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript"src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>

</head>
<body>
<form action="k2_check.php" method="post" name="form1">
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
    </div>
    <div class="span8">
       
    <table class ="table table-hover table-bordered">
        <tr>
            <td colspan='6'> 
                <div class="inline text-right">
<!--                    <div class="thumbnail span3 img-circle">
                        <img src="img_logo/pajac.png">
                    </div>
                    <div class="thumbnail span3 img-circle">
                        <img src="img_logo/PH_logo.png">
                    </div>-->
                    <h4>Police Advance Joint Academic Course</h4>
                    <h4>Hip Knee Registry Form Ver. 1.0 K2</h4>
                </div>
            </td>
        </tr>
<!--        <tr>
            <td colspan='6'>
                <div class="thumbnail span4 offset8">
                    <img data-src="holder.js/300x200/auto/#ccc:#444444/text:For sticker identification" alt="1" class="img-polaroid">         
                </div>
            </td>
        </tr>-->
        <tr>
            <td colspan='6'>
                <div class="inline">
                    <h4>Patient Details</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1' class="span4">
                <div class="inline">
                    <h6>Patient consent : </h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                      <label class="radio inline">
                        <input type="radio" name="txt4" value="1">
                        Yes
                      </label>
                      <label class="radio inline">
                        <input type="radio" name="txt4" value="2">
                        No
                      </label>
                      <label class="radio inline">
                        <input type="radio" name="txt4" value="3">
                        No Recorded
                      </label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1'>
                <div class="inline">
                    <h6>HN : </h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                    <input class="input-medium" type="text" name="txt3h" value="xxxxxxxxx" disabled="disabled">
                    <input class="input-medium" type="hidden" name="txt3" value="">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1'>
                <div class="inline">
                    <h6>Body Mass Index : </h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                    Height(cm)
                    <input class="input-small" type="text" name="txt5h" value="xxxxxxxxx" disabled="disabled">
                    <input class="input-small" type="hidden" name="txt5" value="">
                    Weight(kg)
                    <input class="input-small" type="text" name="txt6h" value="xxxxxxxxx" disabled="disabled">
                    <input class="input-small" type="hidden" name="txt6" value="">
                    BMI
                    <input class="input-small" type="text" name="txt7h" value="xxxxxxxxx" disabled="disabled">
                    <input class="input-small" type="hidden" name="txt7" value="">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1'>
                <div class="inline">
                    <h6>Police Patient Type : </h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt8" value="1">
                        Expected Excellent Result(Single Joint OA)
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt9" value="1">
                        Expected Good Result (Multiple Joint involvement/Previous Arthroplasty)
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt10" value="1">
                        Expected Fair (Multiple Joint involvement/Remaining OA of Other Joint)
                      </label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                
            </td>
        </tr>
        <tr>
            <td colspan='6'>
                <div class="inline">
                    <h4>Operation Details</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1' class="span4">
                <div class="inline">
                    <h6>Operation  Date (YYYY-MM-DD): </h6>
                </div>
            </td>
            <td colspan='5'>
                <DIV class="inline">
                    <div id="datetimepicker2" class="input-append">
                                <input data-format="yyyy-MM-dd" class="input-small" type="text" name="txt11"></input>
                                <span class="add-on">
                                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                  </i>
                                </span>
                    </div>
                    <script type="text/javascript">
                    $(function() {
                      $('#datetimepicker2').datetimepicker({
                        pickTime: false
                      });
                    });
                    </script>
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan='1'>
                <div class="inline">
                    <h6>Anesthetic Types : </h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt12" value="1">
                        General
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt13" value="1">
                        Regional - Nerve Block
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt14" value="1">
                        Regional - Epidural
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt15" value="1">
                        Regional - Spinal (Intrathecal)
                      </label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1'>
                <div class="inline">
                    <h6>Patient ASA Grade : </h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                      <label class="radio inline"><input type="radio" name="txt16" value="1">1</label>
                      <label class="radio inline"><input type="radio" name="txt16" value="2">2</label>
                      <label class="radio inline"><input type="radio" name="txt16" value="3">3</label>
                      <label class="radio inline"><input type="radio" name="txt16" value="4">4</label>
                      <label class="radio inline"><input type="radio" name="txt16" value="5">5</label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1'>
                <div class="inline">
                    <h6>Sides : </h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                    <!--                      
                      <label class="radio">
                        <input type="radio" name="txt17" value="1">
                        Right
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt17" value="2">
                        Left
                      </label>
                    -->
                    <input class="input-small" type="text" name="txt17h" value="side" disabled="disabled">
                    <input class="input-small" type="hidden" name="txt17" value="">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='6'>
                <div class="inline">
                    <h4>Diagnosis and Assessment</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1'>
                <div class="inline">
                    <h6>Indication for Surgery : </h6>
                </div>
            </td>
            <td colspan='3'>
                <div class="inline">
                    <label class="checkbox">
                        <input type="checkbox" name="txt18" value="1">
                        Loosening
                    </label>
                    
                    <label class="checkbox">
                        <input type="checkbox" name="txt20" value="2">
                        Infection
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt21" value="2">
                        Implant breakage
                    </label>
                    
                    <label class="checkbox">
                        <input type="checkbox" name="txt25" value="1">
                        Fracture
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt26" value="1">
                        Other
                    </label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox">
                        <input type="checkbox" name="txt19" value="1">
                        Lysis
                    </label>
                    <BR>
                    <label class="checkbox inline">
                        <input type="checkbox" name="txt22" value="2">
                        Femoral
                    </label>
                    <label class="checkbox inline">
                        <input type="checkbox" name="txt23" value="2">
                        Tibia
                    </label>
                    <label class="checkbox inline">
                        <input type="checkbox" name="txt24" value="2">
                        Patella
                    </label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h4>Pre-Operative RangeMotion (Degree)</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan='1'>
                <div class="inline">
                    <h6>Indication for Surgery : </h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                    <label class="radio inline">
                        <input type="radio" name="txt27" value="1">
                        < 10
                    </label>
                    
                    <label class="radio inline">
                        <input type="radio" name="txt27" value="2">
                        10 - 30
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="txt27" value="3">
                        > 30
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="txt27" value="4">
                        N/A
                    </label>
                </div>
            </td>
        </tr>
        
        <tr>
            <td colspan="1">
                <div class="inline">
                    <h6>Flexion</h6>
                </div>
            </td>
            <td colspan='5'>
                <div class="inline">
                    <label class="radio inline">
                        <input type="radio" name="txt28" value="1">
                        < 70
                    </label>
                    
                    <label class="radio inline">
                        <input type="radio" name="txt28" value="2">
                       70 - 90
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="txt28" value="3">
                        91 - 110
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="txt28" value="4">
                        > 110
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="txt28" value="5">
                        N/A
                    </label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Femorotiblai Angle : </h6>
                    <h6>(Upright X-ray)</h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <input type="text" class="input-medium" name="txt29">
                </div>
            </td>
        </tr>
        
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h4>Thrmboprophylaxis Regiment</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                    <h6>Chemical : </h6>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt48" value="1">Aspirin</label>
                    <label class="checkbox"><input type="checkbox" name="txt49" value="1">LMWH</label>
                    <label class="checkbox"><input type="checkbox" name="txt50" value="1">Pentasaccharide</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt51" value="1">Warfarin</label>
                    <label class="checkbox"><input type="checkbox" name="txt52" value="1">Direct Thrombin Inhibitor</label>
                    <label class="checkbox"><input type="checkbox" name="txt53" value="1">Other</label>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <label class="checkbox"></label>
                    <label class="checkbox"></label>
                    <label class="checkbox"><input type="checkbox" name="txt54" value="1">None</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Mechanical : </h6>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt55" value="1">Foot Pump</label>
                    <label class="checkbox"><input type="checkbox" name="txt56" value="1">Stocking</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt57" value="1">Intermittent Calf Compression</label>
                    <label class="checkbox"><input type="checkbox" name="txt58" value="1">Other</label>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <label class="checkbox"></label>
                    <label class="checkbox"><input type="checkbox" name="txt59" value="1">None</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Peri-Operative injection : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <input type="text" class="input-medium" name="txt60">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h4>Surgical Procedure</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Procedure : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt61" value="1">Primary Total Prosthetic Replacement Using Cement</label>
                    <label class="checkbox"><input type="checkbox" name="txt62" value="1">Primary Total Prosthetic Replacement Not Using Cement</label>
                    <label class="checkbox"><input type="checkbox" name="txt63" value="1">Unicondylar Knee Replacement</label>
                    <label class="checkbox"><input type="checkbox" name="txt64" value="1">Patello-Femoral Replacement</label>
                    <label class="checkbox"><input type="checkbox" name="txt65" value="1">Hybrid</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Approach</h6>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt66" value="1">Medial Parapatellar</label>
                    <label class="checkbox"><input type="checkbox" name="txt67" value="5">Mid-Vastus</label>
                    <label class="checkbox"><input type="checkbox" name="txt68" value="3">Quadricep</label>
                    <label class="checkbox"><input type="checkbox" name="txt72" value="4">Other</label>
                </div>
            </td>
            <td colspan="3">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt69" value="1">Laterral Parapatellar</label>
                    <label class="checkbox"><input type="checkbox" name="txt70" value="5">Sub-vastus</label>
                    <label class="checkbox"><input type="checkbox" name="txt71" value="3">Quadricep Split</label>
                </div>
            </td>
            
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Computer Assist : </h6>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="radio inline"><input type="radio" name="txt73" value="1">Yes</label>
                    <label class="radio inline"><input type="radio" name="txt73" value="2">No</label>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    System : <input type="text" class="input-medium" name="txt74">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h4>Femoral Component (Check the provided box or fill out by hand)</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Company : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <input type="text" class="input-medium" name="txt75">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Prosthesis name : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <input type="text" class="input-medium" name="txt76">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Product : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    Reference No. <input type="text" class="input-medium" name="txt77">
                    Lot No. <input type="text" class="input-medium" name="txt78">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Cement : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <label class="radio inline"><input type="radio" name="txt79" value="1">Yes</label>
                    <label class="radio inline"><input type="radio" name="txt79" value="2">No</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Stem : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <label class="radio inline"><input type="radio" name="txt80" value="1">Yes</label>
                    <label class="radio inline"><input type="radio" name="txt80" value="2">No</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Augemtation : </h6>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt81" value="1">Cement</label>
                    <label class="checkbox"><input type="checkbox" name="txt82" value="1">Autograft</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt83" value="1">Metal</label>
                    <label class="checkbox"><input type="checkbox" name="txt84" value="1">Allogtaft</label>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <label class="checkbox"></label>
                    <label class="checkbox"><input type="checkbox" name="txt85" value="1">Other</label>
                </div>
            </td>
        </tr>
        
        
        
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h4>Tibial Component (Check the provided box or fill out by hand)</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Company : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <input type="text" class="input-medium" name="txt30">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Prosthesis name : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <input type="text" class="input-medium" name="txt31">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Product : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    Reference No. <input type="text" class="input-medium" name="txt32">
                    Lot No. <input type="text" class="input-medium" name="txt33">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Cement : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <label class="radio inline"><input type="radio" name="txt34" value="1">Yes</label>
                    <label class="radio inline"><input type="radio" name="txt34" value="2">No</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Stem : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <label class="radio inline"><input type="radio" name="txt35" value="1">Yes</label>
                    <label class="radio inline"><input type="radio" name="txt35" value="2">No</label>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Augemtation : </h6>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt36" value="1">Cement</label>
                    <label class="checkbox"><input type="checkbox" name="txt37" value="1">Autograft</label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox"><input type="checkbox" name="txt38" value="1">Metal</label>
                    <label class="checkbox"><input type="checkbox" name="txt39" value="1">Allogtaft</label>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <label class="checkbox"></label>
                    <label class="checkbox"><input type="checkbox" name="txt40" value="1">Other</label>
                </div>
            </td>
        </tr>
        
        
        
        
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h4>Patellar Component (Check the provided box or fill out by hand)</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Company : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <input type="text" class="input-medium" name="txt41">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Prosthesis name : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <input type="text" class="input-medium" name="txt42">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Product : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    Reference No. <input type="text" class="input-medium" name="txt43">
                    Lot No. <input type="text" class="input-medium" name="txt44">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                    <h6>Cement : </h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <label class="radio inline"><input type="radio" name="txt45" value="1">Yes</label>
                    <label class="radio inline"><input type="radio" name="txt45" value="2">No</label>
                </div>
            </td>
        </tr>
        
        <tr>
            <td colspan="3">
                <div class="inline text-center">
                    <input type="text" class="input-medium" name="txt46">
                </div>
            </td>
            <td colspan="3">
                <div class="inline text-center">
                    <input type="text" class="input-medium" name="txt47">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="inline text-center">
                    <h6>Surgeon In Charge</h6>
                </div>
            </td>
            <td colspan="3">
                <div class="inline text-center">
                    <h6>Date</h6>
                </div>
            </td>
        </tr>
        
        
        <tr>
            <td colspan='6'>
                <div class="inline text-center">
                    <button type="submit" value="Save changes" class="btn btn-large btn-primary">Save changes</button>
                    <button class="btn btn-large btn-inverse" type="reset">&nbsp;&nbsp;Reset&nbsp;&nbsp;</button>
                </div>
            </td>
        </tr>
    </table>
    </div>
  </div>
</div>

</form>
</body>
</html>


<?php
//}

include "footer.php";
?>
