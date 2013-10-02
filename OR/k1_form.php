<?php
session_start();
unset($_SESSION["k1"]);
include "../ConnectDB.php";
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php"><?
}else{
	$DB = new ConnectDB();
	$DB->connect();
        $bankvar = "";
	$kkk = $DB->searchk1($_SESSION["Uid"],$bankvar);
	$numberk1_form = $DB->getnumrow();
        
	$numberk1 = (int)$numberk1_form + 1;
	$k1_number = "K1-".$_SESSION["Uid"];
	$nu = sprintf("%04d", $numberk1);
	$totalk1_number = $k1_number.$nu;
	$_SESSION["k1_number"] = $totalk1_number;
	


	$ar = $DB->getNameHospital();
        $get_nurse = $DB->getAllNurseAutoComplete();
        $i=0;
        $txtnurse = '"';
        for($i=0;$i<count($get_nurse);$i++){
            $txtnurse .= $get_nurse[$i].'","';
        }
            $txtnurse .= '*"';
        
        $get_op = $DB->getAllOperatorAutoComplete();
        $i=0;
        $txtop = '"';
        for($i=0;$i<count($get_op);$i++){
            $txtop .= $get_op[$i].'","';
        }
            $txtop .= '*"';
        /*    
        echo "<br><br><br>".$txtnurse."<br>".count($get_nurse)."<br><br>";
        print_r($get_nurse);
        echo "<br><br><br>".$txtop."<br>".count($get_op)."<br><br>";
        print_r($get_op);
         */
            
        include "./call_framework.php";
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
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <a class="brand" href="main_or.php">PAJAC O.R. Management System</a>
    <ul class="nav">
      <li><a href="../index.php">Back to home</a></li>
      <li class="active"><a href="#">Main</a></li>
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
    
    
<form action="Check_k1.php" method="post" name="form1">
<div class="container">
  <div class="container">
       
    <table class ="table table-hover table-bordered">
        <tr>
            <td colspan ='4'>
                <DIV class="inline">
                    <h4>Create K1 Form<SMALL></SMALL></h4>
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <DIV class="inline text-right">
                    <h6>K1-No. :</h6>
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <DIV class="inline">
                    <input class="input-small" type="text" name="txt1h" value="<?echo $_SESSION["k1_number"];?>" disabled="disabled">
                    <input type="hidden" name="txt1" value="<?echo $_SESSION["k1_number"];?>">
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan ='4'>
                <DIV class="inline">
                    
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <DIV class="inline text-right">
                    <h6>HN : </h6>
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <DIV class="inline">
                    <input class="input-small" type="text" name="txt2h" value="<?echo $_GET['hn']?>" disabled="disabled">
                    <input class="input-small" type="hidden" name="txt2" value="<?echo $_GET['hn']?>">
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan ='4'>
                <DIV class="inline">
                    
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <DIV class="inline text-right">
                    <h6>Hospital : </h6>
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <DIV class="inline">
                    <input class="input-small" type="text" name="txt3h" value="<?echo $_GET['hospital']?>" disabled="disabled">
                    <input class="input-small" type="hidden" name="txt3" value="<?echo $_GET['hospital']?>">
                    <!--<select class="input-medium" name="txt3">
                        <option value="<?//echo $_GET['hospital']?>"><?//echo $_GET['hospital']?></option>
                            <?//for($kkkk=0;$kkkk<$DB->getnumrow();$kkkk++)
                                 //echo "<option  value='".$ar[$kkkk][1]."'>".$ar[$kkkk][1]."</option>";			
                            ?>
                    </select>-->
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan ='4'>
                <DIV class="inline">
                    
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <DIV class="inline text-right">
                    <h6>Operation Date : </h6>
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <div id="datetimepicker2" class="input-append">
                                <input data-format="yyyy-MM-dd" class="input-small" type="text" name="txt4"></input>
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
            </td>
        </tr>
        <tr>
            <td colspan ='1' class="span3">
                <DIV class="inline">
                    <h6>Diagnosis : <!--<input class="input-medium" type="text" name="txt5">--></h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <div class="inline">
                        <select class="input-large" name="txt5">
                            <option  value="0">------Choose------</option>
                    <?
                        $Diagnosis =$DB->getDiagnosis();
                        for($i=0;$i<count($Diagnosis);$i++){
                            //echo $Diagnosis[$i]."<br>";
                            ?><option  value="<?echo $i?>"><?echo $Diagnosis[$i]?></option><?
                        }

                    ?>
                        </select>
                </div>
            </td>
            <td colspan ='2'>
                
            </td>
            <td colspan ='1'>
                <div class="inline text-right">
                    <h6>Side :</h6>
                </div>
            </td>
            <td colspan ='1'>
                <div class="inline">
                    <?  
                        $checksideR = "";
                        $checksideL = "";
                        //echo $_GET['side'];
                        switch ($_GET['side']) {
                            case 'R':
                                $checksideR = "checked";
                                $checksideL = "";
                                $side = 'Right';
                                $sidenum = 1;
                            break;
                            case 'L':
                                $checksideR = "";
                                $checksideL = "checked";
                                $side = 'Left';
                                $sidenum = 2;
                            break;
                        }
                    ?>
                        <input class="input-small" type="text" name="txt6h" value="<?echo $side?>" disabled="disabled">
                        <input class="input-small" type="hidden" name="txt6" value="<?echo $sidenum?>">
                </div>
            </td>
            
            
        </tr>
        <tr>
            <td colspan ='1' class="span3">
                <DIV class="inline">
                    <h6>Operation Total knee arthroplasty :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                    <DIV class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt7" value="1">
                        CAS
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt8" value="1">
                        MIS
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt9" value="1">
                        Conventional
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt10" value="1">
                        PSI
                      </label>
                    </DIV>
                </DIV>
            </td>
            <td colspan ='4'>
                
            </td>
        </tr>
        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Operator :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                    <input type="text" class="input-medium" name="txt11" style="margin: 0 auto;" data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' autocomplete="off">
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Assistant :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
                    1.<input type="text" class="input-medium" name="txt12" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' autocomplete="off"><br>
                    2.<input type="text" class="input-medium" name="txt13" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' autocomplete="off"><br>
                    3.<input type="text" class="input-medium" name="txt14" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' autocomplete="off"><br>

                </DIV>
            </td>
        </tr>
<!--        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Assistant 2 :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Assistant 3 :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
                </DIV>
            </td>
        </tr>-->
        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Circulate Nurse :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                    1.<input type="text" class="input-medium" name="txt18v1" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' autocomplete="off"><br>
                    2.<input type="text" class="input-medium" name="txt18v2" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' autocomplete="off"><br>
                    3.<input type="text" class="input-medium" name="txt18v3" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' autocomplete="off">
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Instrument Nurse :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
                    1.<input type="text" class="input-medium" name="txt16v1" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' autocomplete="off"><br>
                    2.<input type="text" class="input-medium" name="txt16v2" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' autocomplete="off"><br>
                    3.<input type="text" class="input-medium" name="txt16v3" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' autocomplete="off">
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Anesthesia :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                    <input type="text" class="input-medium" name="txt17">
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Anesthetist :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
                    <input type="text" class="input-medium" name="txt15" style="margin: 0 auto;" data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' autocomplete="off">
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Operation Started  :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                    <div id="timepicker_1" class="input-append">
                        <input data-format="hh:mm" class="input-mini" type="text" name="txt19"></input>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                            </i>
                        </span>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                          $('#timepicker_1').datetimepicker({
                            pickDate: false
                          });
                        });
                    </script>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Operation Finished  :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
                    <div id="timepicker_2" class="input-append">
                        <input data-format="hh:mm" class="input-mini" type="text" name="txt20"></input>
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                            </i>
                        </span>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                          $('#timepicker_2').datetimepicker({
                            pickDate: false
                          });
                        });
                    </script>
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Tourniquet :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                      <label class="radio">
                            <input type="radio" name="txt21" value="1">
                            On 
                        <DIV class="inline">
                            <input class="input-mini" type="text" name="txt22" size="10">&nbsp;mmHg
                            <input class="input-mini" type="text" name="txt23" size="10">&nbsp;minutes
                        </DIV>
                        
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt21" value="2" checked>
                        Non tourniquet
                      </label>
                </DIV>
            </td>
            <td colspan ='4'>
                <DIV class="inline">
                   <h6>Sponge Count :</h6>
                        <label class="checkbox offset1">
                            
                            <input type="checkbox" name="txt82" value="1">
                            Checked
                            
                        </label>
                    
                </DIV>
            </td>
            
        </tr>
        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Finding :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                    <DIV class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt24" value="1">
                        1°OA
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt25" value="1">
                        ON
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt26" value="1">
                        RA
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt27" value="1">
                        Post Traumatic
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt28" value="1">
                        Post HTO
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt29" value="1">
                        Other inflammatory joint disease
                      </label>
                    </DIV>
                </DIV>
            </td>
            <td colspan ='4'>
                <DIV class="inline">
                    <h6>
                        Pre op. ROM :
			<input class="input-mini" type="text" name="txt30" >&nbsp;dg
                    </h6>
                </DIV>
                <DIV class="inline">
                    <h6>
                        Pre op. X-ray (+valgus, -varus)
                    </h6>
                      <label class="radio">
                          <input type="radio" name="txt31" value="3" checked="checked">
                        None
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt31" value="1">
                        Varus
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt31" value="2">
                        Valgus
                      </label>
                      
                        <input class="input-mini" type="text" name="txt32" size="5">&nbsp;dg
                </DIV>
            </td>
            
        </tr>
        <tr>
            <td colspan="1">
                <DIV class="inline">
                    <h6>Prosthesis :</h6>
                </DIV>
            </td>
            <td colspan="1">
                <DIV class="inline">
                    <DIV class="inline">
                        <h6>Femur :</h6>
                    </DIV>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt33" value="1" checked> 
                        CR
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt33" value="2">
                        PS
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt33" value="3">
                        UKA
                      </label>
                    </div>
                    <DIV class="inline">
                        <h6>Cemented/Cementless Type :</h6>
                    </DIV>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt34" value="1" checked>
                        Cemented
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt34" value="2">
                        Cementless
                      </label>
                    </div>
                    <DIV class="inline">
                        <h6>Component Type :</h6>
                    </DIV>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt35" value="1" checked>
                        CoCr 
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt35" value="2">
                        Tin
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt35" value="3">
                        Oxinium 
                      </label>
                    </div>
                </DIV>
            </td>
            
            <td colspan="2">
                <DIV class="inline">
                    <DIV class="inline">
                        <h6>Tibial :</h6>
                    </DIV>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt36" value="1" checked>
                        Fix Bearing
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt36" value="2">
                        Mobile Bearing
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt36" value="3">
                        Medial Pivot
                      </label>
                    </DIV>
                    <DIV class="inline">
                        <h6>Cemented/Cementless Type :</h6>
                    </DIV> 
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt37" value="1" checked>
                        Cemented
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt37" value="2">
                        Cementless
                      </label>
                    </DIV>
                    <DIV class="inline">
                        <h6>Component Type :</h6>
                    </DIV>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt38" value="1" checked>
                        CoCr 
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt38" value="2">
                        Tin
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt38" value="3">
                        Oxinium 
                      </label>
                    </div>
                </DIV>
            </td>
            <td colspan ='2'>
                <DIV class="inline">
                    <h6>
                        Patella :
                    </h6>
                </DIV>
                <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt39" value="1" checked>
                        Normal
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt39" value="2">
                        Baja
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt39" value="3">
                        Alta
                      </label>
               </DIV>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                    <h6>Implant used :</h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <select class="input-large" name="txt40">
                            <option  value="0">------Choose------</option>
                    <?
                        $brand =$DB->getBrand();
                        for($i=0;$i<count($brand);$i++){
                            //echo $brand[$i]."<br>";
                            ?><option  value="<?echo $i?>"><?echo $brand[$i]?></option><?
                        }

                    ?>
                    </select>
                    <? //print_r($brand);?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                    <h6>Technique :</h6>
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt41" value="1">
                        Gap technique
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt42" value="1">
                        Measurement technique
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt43" value="1">
                        Combine
                      </label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h4>Procedure</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                    
                </div>
            </td>
            <td colspan="5">
                <div class="inline">
                    <div class="inline">
                        <h6>- Patient was in supine position</h6>
                    </div>
                    <div class="inline">
                        <h6>- Approach</h6>    
                    </div>
                    <div class="inline offset1">
                      <label class="checkbox">
                        <input type="checkbox" name="txt44" value="1">
                        Medial parapatella
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt45" value="1">
                        Midvastus
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt46" value="1">
                        Quad. Spearing
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt47" value="1">
                        Subvastus
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt48" value="1">
                        Lateral parapatella
                      </label> 
                    </div>
                    <div class="inline">
                        <h6>- Install tracker at femur </h6>    
                    </div>    
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt49" value="1" checked>
                        Done
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt49" value="2">
                        None
                      </label>
                    </div>
                    <div class="inline">
                        <h6>- First bone cut</h6>    
                    </div> 
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt50" value="1" checked>
                        Proximal tibial
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt50" value="2">
                        Distal femur
                      </label>
                    </div>
                    <div class="inline">
                        <h6>- Cut bone step by step</h6>    
                    </div>
                    <div class="inline">
                        <h6>- Balance flexion and extension gap</h6>    
                    </div> 
                    <div class="inline">
                        <h6>- Pie crusting at</h6>    
                    </div> 
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt51" value="1" checked>
                        None
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt51" value="2">
                        Medial
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt51" value="3">
                        lateral
                      </label>
                    </div>
                    <div class="inline">
                        <h6>- Additional bone cut at</h6>    
                    </div> 
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt52" value="1" checked>
                        None
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt52" value="2">
                        Proximal tibial
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt52" value="3">
                        Distal femur
                      </label>
                    </div>
                    <div class="inline">
                        <h6>- Down sizing</h6>    
                    </div> 
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt53" value="1" checked>
                        None
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt53" value="2">
                        Tibial component
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt53" value="3">
                        Femoral component
                      </label>
                    </div>
                    <div class="inline">
                        <h6>- Fix the real component and patellar tracking check then radivac drain was insert. Suture was done layer by layer and Jone's bandage was apply.</h6>    
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <h6>Soft tissue balance</h6>
                </div>
            </td>
            <td colspan="1">
                <div class="inline text-center">
                    <h6>Medial</h6>
                </div>
            </td>
            <td colspan="1">
                <div class="inline text-center">
                    <h6>Lateral</h6>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <h6>Extension ( mm. )</h6>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <input class="input-medium" type="text" name="txt54">
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <input class="input-medium" type="text" name="txt55">
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <h6>Flexion 90' ( mm. )</h6>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <input class="input-medium" type="text" name="txt56">
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <input class="input-medium" type="text" name="txt57">
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h6>Patella Management</h6>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                    
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt58" value="1">
                        Circumferential electrocautery
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt59" value="1">
                        Osteophytectomy
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt60" value="1">
                        Facetectomy
                      </label>
                </div>
            </td>
            <td colspan="3">
                <div class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt61" value="1">
                        Resurfacing 
                      </label>
                      size<input class="input-mini" type="text" name="txt62">&nbsp;rest
                      <input class="input-mini" type="hidden" name="txt63">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h6>Augmentation</h6>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                    
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <label class="radio">
                        <input type="radio" name="txt64" value="1">
                        Yes
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt64" value="2" Checked>
                        No
                      </label>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <label class="checkbox">
                        <input type="checkbox" name="txt65" value="1">Tibia
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt66" value="1">Cement
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt66" value="2">Bone graft
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt66" value="3">Metal
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt66" value="4">Stem
                    </label>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <label class="checkbox">
                        <input type="checkbox" name="txt67" value="1">Femur
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt68" value="1">Cement
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt68" value="2">Bone graft
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt68" value="3">Metal
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt68" value="4">Stem
                    </label>
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h6>Intraop. Complication</h6>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline">
                 
                </div>
            </td>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox">
                        <input type="checkbox" name="txt69" value="1">&nbsp;Femoral notching
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt70" value="1">&nbsp;Partial avulsion patellar ligament
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt71" value="1">&nbsp;Complete avulsion patellar ligament
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt72" value="1">&nbsp;Patellar fracture
                    </label>
                </div>
            </td>
            <td colspan="3">
                <div class="inline">
                    <label class="checkbox">
                        <input type="checkbox" name="txt73" value="1">&nbsp;Femoral fracture
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt74" value="1">&nbsp;Tibia fracture
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt75" value="1">&nbsp;Torn MCL/PCL
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt76" value="1" checked="checked">&nbsp;None
                    </label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <DIV class="inline">
                    <h6>Complication management</h6>
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan="">
                <DIV class="inline">
                    
                </DIV>
            </td>
            <td colspan="5">
                <DIV class="inline">
                    <textarea name="txt77" rows="3" cols="50"></textarea>
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <DIV class="inline">
                    <h6>Additional Procedure</h6>
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan="">
                <DIV class="inline">
                    
                </DIV>
            </td>
            <td colspan="5">
                <DIV class="inline">
                    <textarea name="txt78" rows="3" cols="50"></textarea>
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h6>Estimated blood loss <input class="input-small" type="text" name="txt79">&nbsp;ml.</h6>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="inline">
                    <h6>
                        Signature 
                        <input class="input-large" type="text" name="txt80h" value="<?echo $_SESSION["name"]." ".$_SESSION["lastname"];?>"disabled="disabled">
                        <input type="hidden" name="txt80" value="<?echo $_SESSION["Uid"];?>">
                        <!-- <input class="input-large" type="text" name="txt80h" value="<?//echo $_SESSION["name"]." ".$_SESSION["lastname"];?>"disabled="disabled">
                        <input type="hidden" name="txt80" value="<?//echo $_SESSION["name"]." ".$_SESSION["lastname"];?>"> -->
                    </h6>
                </div>
            </td>
            <td colspan="3">
                <div class="inline">
                    <h6>
                        Date 
                        <div id="datetimepicker1" class="input-append">
                                <input data-format="yyyy-MM-dd" class="input-small" type="text" name="txt81"></input>
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
                    </h6>
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

</form>
</body>
</html>


<?php
}

include "footer.php";
?>
