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
	$getname = $_SESSION["name"]."  ".$_SESSION["lastname"];
	$kkk = $DB->searchforedit_k1($_GET["k1id"]);   
        //print_r($kkk);
        
        
        
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
    
<form action="Check_k1_edit.php" method="post" name="form1">
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
                    <input class="input-small" type="text" name="txt1h" value="<?echo $kkk[0];?>" disabled="disabled">
                    <input type="hidden" name="txt1" value="<?echo $kkk[0];?>">
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
                    <input class="input-small" type="text" name="txt2h" value="<?echo $kkk[1]?>" disabled="disabled">
                    <input class="input-small" type="hidden" name="txt2" value="<?echo $kkk[1]?>">
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
                    <input class="input-small" type="text" name="txt3h" value="<?echo $kkk[79]?>" disabled="disabled">
                    <input class="input-small" type="hidden" name="txt3" value="<?echo $kkk[79]?>">
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
                <DIV class="inline">
                    <h6>Operation Date : </h6>
                </DIV>
            </td>
            <td colspan ='1' class="span2">
                <div id="datetimepicker2" class="input-append">
                                <input data-format="yyyy-MM-dd" class="input-small" type="text" name="txt4" value="<?echo $kkk[3]?>"></input>
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
            <td colspan ='2'>
                <div class="inline">
                        <select class="input-large" name="txt5">
                            <option  value="<? echo $kkk[4]?>" selected="selected"><? echo $kkk[82]?></option>
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
            <td colspan ='1'>
                <div class="inline text-right"></div>
            </td>
            <td colspan ='1'>
                <div class="inline text-right">
                    <h6>Side :</h6>
                </div>
            </td>
            <td colspan ='1'>
                <div class="inline">
                    <? 
                        //check Bilateral side
                        $chkBilateral = $DB->chkBilateral($kkk[1]);
                        
                        switch ($kkk[5]) {
                            case '1':
                                $side = 'Right';
                                $sidenum = 1;
                            break;
                            case '2':
                                $side = 'Left';
                                $sidenum = 2;
                            break;
                        }
                    ?>
                        <input class="input-small" type="text" name="txt6h" value="<?echo $side?>" disabled="disabled">
                        <input class="input-small" type="hidden" name="txt6" value="<?echo $sidenum?>">
                    <?
                        //echo $chkBilateral;
                        if($chkBilateral==2){
                    ?>
                            This case is Bilateral
                    <?
                        }
                    ?>
                </div>
            </td>
            
            
        </tr>
        <tr>
            <td colspan ='2' class="span3">
                <DIV class="inline">
                    <h6>Operation Total knee arthroplasty :</h6>
                </DIV>
            </td>
            <td colspan ='4'>
                <DIV class="inline">
                    <DIV class="inline">
                        <?
                            //Operation Total knee arthroplasty 
                            if($kkk[6]==1)
                                $CAS="checked";
                            if($kkk[7]==1)
                                $MIS="checked";
                            if($kkk[8]==1)
                                $Conventional="checked";
                            if($kkk[9]==1)
                                $PSI="checked";
                        ?>
                      <label class="checkbox">
                        <input type="checkbox" name="txt7" value="1" <?echo $CAS?>>
                        CAS
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt8" value="1" <?echo $MIS?>>
                        MIS
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt9" value="1" <?echo $Conventional?>>
                        Conventional
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt10" value="1" <?echo $PSI?>>
                        PSI
                      </label>
                    </DIV>
                </DIV>
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
                    <input type="text" class="input-medium" name="txt11" style="margin: 0 auto;" data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' value="<?echo $kkk[10];?>" autocomplete="off">
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Assistant 1 :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
                    <input type="text" class="input-medium" name="txt12" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' value="<?echo $kkk[11];?>" autocomplete="off">
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Assistant 2 :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                    <input type="text" class="input-medium" name="txt13" style="margin: 0 auto;" data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' value="<?echo $kkk[12];?>" autocomplete="off">
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Assistant 3 :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
                    <input type="text" class="input-medium" name="txt14" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtop;?>]' value="<?echo $kkk[13];?>" autocomplete="off">
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan ='1'>
                <DIV class="inline">
                    <h6>Anesthetist :</h6>
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline">
                    <input type="text" class="input-medium" name="txt15" style="margin: 0 auto;" data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' value="<?echo $kkk[14];?>" autocomplete="off">
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Instrument Nurse :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
					<?
						list($txt16v1,$txt16v2,$txt16v3) = split(":", $kkk[15]);			
					?>
                                        <input type="text" class="input-medium" name="txt16v1" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' value="<?echo $txt16v1;?>" autocomplete="off"><br><br>
					<input type="text" class="input-medium" name="txt16v2" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' value="<?echo $txt16v2;?>" autocomplete="off"><br><br>
					<input type="text" class="input-medium" name="txt16v3" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' value="<?echo $txt16v3;?>" autocomplete="off">
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
                    <input type="text" class="input-medium" name="txt17" value="<?echo $kkk[16]?>">
                </DIV>
            </td>
            <td colspan ='1'>
                <DIV class="inline text-right">
                    <h6>Circulate Nurse :</h6>
                </DIV>
            </td>
            <td colspan ='3'>
                <DIV class="inline">
					<?
						list($txt18v1,$txt18v2,$txt18v3) = split(":", $kkk[17]);					
					?>
                                        <input type="text" class="input-medium" name="txt18v1" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' value="<?echo $txt18v1;?>" autocomplete="off"><br><br>
					<input type="text" class="input-medium" name="txt18v2" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' value="<?echo $txt18v2;?>" autocomplete="off"><br><br>
					<input type="text" class="input-medium" name="txt18v3" style="margin: 0 auto;"data-provide="typeahead" data-items="5" data-source='[<?echo $txtnurse;?>]' value="<?echo $txt18v3;?>" autocomplete="off">
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
                        <input data-format="hh:mm" class="input-mini" type="text" name="txt19" value="<?echo $kkk[18]?>"></input>
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
                        <input data-format="hh:mm" class="input-mini" type="text" name="txt20" value="<?echo $kkk[19]?>"></input>
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
                    <?
                        if($kkk[20]==1){
                            $On = "checked";
                        }else{
                            $Non = "checked";
                        }
                        if($kkk[77]==1){
                            $Sponge = "checked";
                        }
                    ?>
                      <label class="radio">
                            <input type="radio" name="txt21" value="1" <?echo $On;?>>
                            On 
                        <DIV class="inline">
                            <input class="input-mini" type="text" name="txt22" value="<?echo $kkk[21]?>">&nbsp;mmHg
                            <input class="input-mini" type="text" name="txt23" value="<?echo $kkk[22]?>">&nbsp;minutes
                        </DIV>
                        
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt21" value="2" <?echo $Non?>>
                        Non tourniquet
                      </label>
                </DIV>
            </td>
            <td colspan ='4'>
                <DIV class="inline">
                   <h6>Sponge Count :</h6>
                        <label class="checkbox offset1">
                            
                            <input type="checkbox" name="txt82" value="1" <?echo $Sponge?>>
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
            <?
                //Finding
                if($kkk[23]==1)$OA = "checked";
                if($kkk[24]==1)$Onn = "checked";
                if($kkk[25]==1)$RA = "checked";
                if($kkk[26]==1)$PT = "checked";
                if($kkk[27]==1)$PH = "checked";
                if($kkk[28]==1)$OIJD = "checked";
            
            
            ?>
            <td colspan ='1'>
                <DIV class="inline">
                    <DIV class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt24" value="1" <?echo $OA?>>
                        1°OA
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt25" value="1" <?echo $Onn?>>
                        ON
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt26" value="1" <?echo $RA?>>
                        RA
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt27" value="1" <?echo $PT?>>
                        Post Traumatic
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt28" value="1" <?echo $PH?>>
                        Post HTO
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt29" value="1" <?echo $OIJD?>>
                        Other inflammatory joint disease
                      </label>
                    </DIV>
                </DIV>
            </td>
            <td colspan ='4'>
                <DIV class="inline">
                    <h6>
                        Pre op. ROM :
                        <input class="input-mini" type="text" name="txt30" value="<?echo $kkk[29]?>">&nbsp;dg
                    </h6>
                </DIV>
                <DIV class="inline">
                    <h6>
                        Pre op. X-ray (+valgus, -varus)
                    </h6>
                    <?
                                switch ($kkk[30]) {
                                    case '2': $Valgus = "checked";
                                    break;
                                    case '1': $Varus = "checked";
                                    break;
                                    default: $None = "checked";
                                    break;
                                }
                    
                    ?>
                      <label class="radio">
                          <input type="radio" name="txt31" value="3" <?echo $None?>>
                        None
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt31" value="1" <?echo $Varus?>>
                        Varus
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt31" value="2" <?echo $Valgus?>>
                        Valgus
                      </label>
                      
                    <input class="input-mini" type="text" name="txt32" value="<?echo $kkk[32]?>">&nbsp;dg
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
                    <?
                        //Femur
                        $countarray = 1;
                        switch (substr($kkk[32],0,1)){
                            case '1' : $ck1[$countarray] = "checked"; $ck2[$countarray] = ""; $ck3[$countarray] = ""; break;
                            case '2' : $ck1[$countarray] = ""; $ck2[$countarray] = "checked"; $ck3[$countarray] = ""; break;
                            case '3' : $ck1[$countarray] = ""; $ck2[$countarray] = ""; $ck3[$countarray] = "checked"; break;
                        }$countarray++;
                        switch (substr($kkk[32],1,1)){
                            case '1' : $ck1[$countarray] = "checked"; $ck2[$countarray] = ""; $ck3[$countarray] = ""; break;
                            case '2' : $ck1[$countarray] = ""; $ck2[$countarray] = "checked"; $ck3[$countarray] = ""; break;
                            case '3' : $ck1[$countarray] = ""; $ck2[$countarray] = ""; $ck3[$countarray] = "checked"; break;
                        }$countarray++;
                        switch (substr($kkk[32],2,1)){
                            case '1' : $ck1[$countarray] = "checked"; $ck2[$countarray] = ""; $ck3[$countarray] = ""; break;
                            case '2' : $ck1[$countarray] = ""; $ck2[$countarray] = "checked"; $ck3[$countarray] = ""; break;
                            case '3' : $ck1[$countarray] = ""; $ck2[$countarray] = ""; $ck3[$countarray] = "checked"; break;
                        }
                    ?>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt33" value="1" <?echo $ck1[1]?>> 
                        CR
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt33" value="2" <?echo $ck2[1]?>>
                        PS
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt33" value="3" <?echo $ck3[1]?>>
                        UKA
                      </label>
                    </div>
                    <DIV class="inline">
                        <h6>Cemented/Cementless Type :</h6>
                    </DIV>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt34" value="1" <?echo $ck1[2]?>>
                        Cemented
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt34" value="2" <?echo $ck2[2]?>>
                        Cementless
                      </label>
                    </div>
                    <DIV class="inline">
                        <h6>Component Type :</h6>
                    </DIV>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt35" value="1" <?echo $ck1[3]?>>
                        CoCr 
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt35" value="2" <?echo $ck2[3]?>>
                        Tin
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt35" value="3" <?echo $ck3[3]?>>
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
                    <?
                        //Tibial
                        $countarray = 1;
                        switch (substr($kkk[33],0,1)){
                            case '1' : $ck1[$countarray] = "checked"; $ck2[$countarray] = ""; $ck3[$countarray] = ""; break;
                            case '2' : $ck1[$countarray] = ""; $ck2[$countarray] = "checked"; $ck3[$countarray] = ""; break;
                            case '3' : $ck1[$countarray] = ""; $ck2[$countarray] = ""; $ck3[$countarray] = "checked"; break;
                        }$countarray++;
                        switch (substr($kkk[33],1,1)){
                            case '1' : $ck1[$countarray] = "checked"; $ck2[$countarray] = ""; $ck3[$countarray] = ""; break;
                            case '2' : $ck1[$countarray] = ""; $ck2[$countarray] = "checked"; $ck3[$countarray] = ""; break;
                            case '3' : $ck1[$countarray] = ""; $ck2[$countarray] = ""; $ck3[$countarray] = "checked"; break;
                        }$countarray++;
                        switch (substr($kkk[33],2,1)){
                            case '1' : $ck1[$countarray] = "checked"; $ck2[$countarray] = ""; $ck3[$countarray] = ""; break;
                            case '2' : $ck1[$countarray] = ""; $ck2[$countarray] = "checked"; $ck3[$countarray] = ""; break;
                            case '3' : $ck1[$countarray] = ""; $ck2[$countarray] = ""; $ck3[$countarray] = "checked"; break;
                        }
                    ?>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt36" value="1" <?echo $ck1[1]?>>
                        Fix Bearing
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt36" value="2" <?echo $ck2[1]?>>
                        Mobile Bearing
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt36" value="3" <?echo $ck3[1]?>>
                        Medial Pivot
                      </label>
                    </DIV>
                    <DIV class="inline">
                        <h6>Cemented/Cementless Type :</h6>
                    </DIV> 
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt37" value="1" <?echo $ck1[2]?>>
                        Cemented
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt37" value="2" <?echo $ck2[2]?>>
                        Cementless
                      </label>
                    </DIV>
                    <DIV class="inline">
                        <h6>Component Type :</h6>
                    </DIV>
                    <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt38" value="1" <?echo $ck1[3]?>>
                        CoCr 
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt38" value="2" <?echo $ck2[3]?>>
                        Tin
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt38" value="3" <?echo $ck3[3]?>>
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
                    <?
                        switch ($kkk[34]){
                            case '1' : $Normal = "checked"; $Baja = ""; $Alta = ""; break;
                            case '2' : $Normal = ""; $Baja = "checked"; $Alta = ""; break;
                            case '3' : $Normal = ""; $Baja = ""; $Alta = "checked"; break;
                        }
                    ?>
                </DIV>
                <DIV class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt39" value="1" <?echo $Normal?>>
                        Normal
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt39" value="2" <?echo $Baja?>>
                        Baja
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt39" value="3" <?echo $Alta?>>
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
                            <option  value="<?echo $kkk[35]?>"><?echo $kkk[84]?></option>
                    <?
                        $brand =$DB->getBrand();
                        for($i=0;$i<count($brand);$i++){
                            //echo $Diagnosis[$i]."<br>";
                            ?><option  value="<?echo $i?>"><?echo $brand[$i]?></option><?
                        }
                    ?>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="1">
                <div class="inline">
                    <h6>Technique :</h6>
                </div>
            </td>
            <?
                if($kkk[36]==1)$gt="checked";
                if($kkk[37]==1)$mt="checked";
                if($kkk[38]==1)$co="checked";
            ?>
            <td colspan="5">
                <div class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt41" value="1" <?echo $gt?>>
                        Gap technique
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt42" value="1" <?echo $mt?>>
                        Measurement technique
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt43" value="1" <?echo $co?>>
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
            <?
                if($kkk[39]==1)$Medial="checked";
                if($kkk[40]==1)$Midvastus="checked";
                if($kkk[41]==1)$Quad="checked";
                if($kkk[42]==1)$Subvastus="checked";
                if($kkk[43]==1)$Lateral="checked";
                
            ?>
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
                        <input type="checkbox" name="txt44" value="1" <?echo $Medial;?>>
                        Medial parapatella
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt45" value="1" <?echo $Midvastus;?>>
                        Midvastus
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt46" value="1" <?echo $Quad;?>>
                        Quad. Spearing
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt47" value="1" <?echo $Subvastus;?>>
                        Subvastus
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt48" value="1" <?echo $Lateral;?>>
                        Lateral parapatella
                      </label> 
                    </div>
                    <div class="inline">
                        <h6>- Install tracker at femur </h6>    
                    </div>    
                    <?
                        switch ($kkk[44]) {
                            case '1':   $Install1 = "checked";
                            break;
                            case '2':   $Install2 = "checked";
                            break;
                        }
                    ?>
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt49" value="1" <?echo $Install1?>>
                        Done
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt49" value="2" <?echo $Install2?>>
                        None
                      </label>
                    </div>
                    <div class="inline">
                        <h6>- First bone cut</h6>    
                    </div> 
                    <?
                        switch ($kkk[45]) {
                            case '1':   $bonecut1 = "checked";
                            break;
                            case '2':   $bonecut2 = "checked";
                            break;
                        }
                    ?>
                    
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt50" value="1" <?echo $bonecut1?>>
                        Proximal tibial
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt50" value="2" <?echo $bonecut2?>>
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
                    <?
                    switch ($kkk[46]) {
                        case 1:   $pnone = "checked";
                        break;
                        case 2:   $medial = "checked";
                        break;
                        case 3:   $lateral = "checked";
                        break;
                    }
                    ?>
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt51" value="1" <?echo $pnone?>>
                        None
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt51" value="2" <?echo $medial?>>
                        Medial
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt51" value="3" <?echo $lateral?>>
                        lateral
                      </label>
                    </div>
                    <div class="inline">
                        <h6>- Additional bone cut at</h6>    
                    </div>
                    <?
                    switch ($kkk[47]) {
                        case '1':   $nonee = "checked";
                        break;
                        case '2':   $Proximal = "checked";
                        break;
                        case '3':   $Distal = "checked";
                        break;
                    }
                    ?>
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt52" value="1" <?echo $nonee?>>
                        None
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt52" value="2" <?echo $Proximal?>>
                        Proximal tibial
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt52" value="3" <?echo $Distal?>>
                        Distal femur
                      </label>
                    </div>
                    <div class="inline">
                        <h6>- Down sizing</h6>    
                    </div> 
                    <?
                    switch ($kkk[48]) {
                        case '1':   $noneee = "checked";
                        break;
                        case '2':   $Tibialc = "checked";
                        break;
                        case '3':   $Femoralc = "checked";
                        break;
                    }
                    ?>
                    <div class="inline offset1">
                      <label class="radio">
                        <input type="radio" name="txt53" value="1" <?echo $noneee?>>
                        None
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt53" value="2" <?echo $Tibialc?>>
                        Tibial component
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt53" value="3" <?echo $Femoralc?>>
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
                    <input class="input-medium" type="text" name="txt54" value="<?echo $kkk[49]?>">
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <input class="input-medium" type="text" name="txt55" value="<?echo $kkk[50]?>">
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
                    <input class="input-medium" type="text" name="txt56" value="<?echo $kkk[51]?>">
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                    <input class="input-medium" type="text" name="txt57" value="<?echo $kkk[52]?>">
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
            <?
                if($kkk[53]==1)$Circumferential = "checked";
                if($kkk[54]==1)$Osteophytectomy = "checked";
                if($kkk[55]==1)$Facetectomy = "checked";
            ?>
            <td colspan="2">
                <div class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt58" value="1" <?echo $Circumferential?>>
                        Circumferential electrocautery
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt59" value="1" <?echo $Osteophytectomy?>>
                        Osteophytectomy
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" name="txt60" value="1" <?echo $Facetectomy?>>
                        Facetectomy
                      </label>
                </div>
            </td>
                <?
                    switch ($kkk[56]) {
                        case '1':   $Resurfacing = "checked";
                        break;
                        default :   $Resurfacing = ""; 
                                    $kkk[57] = "-";
                                    $kkk[58] = "-";
                        break;
                    }
                ?>
            <td colspan="3">
                <div class="inline">
                      <label class="checkbox">
                        <input type="checkbox" name="txt61" value="1" <?echo $Resurfacing?>>
                        Resurfacing 
                      </label>
                        size<input class="input-mini" type="text" name="txt62" value="<?echo $kkk[57]?>">&nbsp;rest
                            <!--<input class="input-mini" type="hidden" name="txt63" value="<?//echo $kkk[58]?>">-->
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
            <?
                    switch ($kkk[59]) {
                        case '1':   $AYes = "checked";
                        break;
                        case '2':   $ANo = "checked";
                                    $kkk[60] = "";
                                    $kkk[61] = "";
                                    $kkk[62] = "";
                                    $kkk[63] = "";
                        break;
                    }
            ?>
            <td colspan="1">
                <div class="inline">
                    <label class="radio">
                        <input type="radio" name="txt64" value="1" <? echo $AYes?>>
                        Yes
                      </label>
                      <label class="radio">
                        <input type="radio" name="txt64" value="2" <? echo $ANo?>>
                        No
                      </label>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                <?
                    if($kkk[60]==1)$Atibia = "checked";
                    switch ($kkk[61]) {
                        case '1':   $t1 = "checked";
                        break;
                        case '2':   $t2 = "checked";
                        break;
                        case '3':   $t3 = "checked";
                        break;
                        case '4':   $t4 = "checked";
                        break;
                        default :   $Atibia = "";
                                    $t1 = "";
                                    $t2 = "";
                                    $t3 = "";
                                    $t4 = "";
                        break;
                    }
                ?>
                    <label class="checkbox">
                        <input type="checkbox" name="txt65" value="1" <?echo $Atibia?>>Tibia
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt66" value="1" <?echo $t1?>>Cement
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt66" value="2" <?echo $t2?>>Bone graft
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt66" value="3" <?echo $t3?>>Metal
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt66" value="4" <?echo $t4?>>Stem
                    </label>
                </div>
            </td>
            <td colspan="1">
                <div class="inline">
                <?
                    if($kkk[62]==1)$AFemur = "checked";
                    switch ($kkk[63]) {
                        case '1':   $f1 = "checked";
                        break;
                        case '2':   $f2 = "checked";
                        break;
                        case '3':   $f3 = "checked";
                        break;
                        case '4':   $f4 = "checked";
                        break;
                        default :   $AFemur = "";
                                    $f1 = "";
                                    $f2 = "";
                                    $f3 = "";
                                    $f4 = "";
                        break;
                    }
                ?>
                    <label class="checkbox">
                        <input type="checkbox" name="txt67" value="1" <?echo $AFemur?>>Femur
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt68" value="1" <?echo $f1?>>Cement
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt68" value="2" <?echo $f2?>>Bone graft
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt68" value="3" <?echo $f3?>>Metal
                    </label>
                    <label class="radio">
                        <input type="radio" name="txt68" value="4" <?echo $f4?>>Stem
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
            <?
                if($kkk[71]==1){
                    $incom8 = "checked";
                    $kkk[64] = "";
                    $kkk[65] = "";
                    $kkk[66] = "";
                    $kkk[67] = "";
                    $kkk[68] = "";
                    $kkk[69] = "";
                    $kkk[70] = "";
                }else{
                    if($kkk[64]==1)$incom1 = "checked";
                    if($kkk[65]==1)$incom2 = "checked";
                    if($kkk[66]==1)$incom3 = "checked";
                    if($kkk[67]==1)$incom4 = "checked";
                    if($kkk[68]==1)$incom5 = "checked";
                    if($kkk[69]==1)$incom6 = "checked";
                    if($kkk[70]==1)$incom7 = "checked";
                }
                
            
            ?>
            <td colspan="2">
                <div class="inline">
                    <label class="checkbox">
                        <input type="checkbox" name="txt69" value="1" <?echo $incom1?>>&nbsp;Femoral notching
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt70" value="1" <?echo $incom2?>>&nbsp;Partial avulsion patellar ligament
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt71" value="1" <?echo $incom3?>>&nbsp;Complete avulsion patellar ligament
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt72" value="1" <?echo $incom4?>>&nbsp;Patellar fracture
                    </label>
                </div>
            </td>
            <td colspan="3">
                <div class="inline">
                    <label class="checkbox">
                        <input type="checkbox" name="txt73" value="1" <?echo $incom5?>>&nbsp;Femoral fracture
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt74" value="1" <?echo $incom6?>>&nbsp;Tibia fracture
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt75" value="1" <?echo $incom7?>>&nbsp;Torn MCL/PCL
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" name="txt76" value="1" <?echo $incom8?>>&nbsp;None
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
                    <textarea name="txt77" rows="3" cols="50"><?echo $kkk[72]?></textarea>
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
                    <textarea name="txt78" rows="3" cols="50"><?echo $kkk[73]?></textarea>
                </DIV>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="inline">
                    <h6>Estimated blood loss <input class="input-small" type="text" name="txt79" value="<?echo $kkk[74]?>">&nbsp;ml.</h6>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="inline">
                    <h6>
                        Signature 
                        <input class="input-large" type="text" name="txt80h" value="<?echo $kkk[87]." ".$kkk[88]?>" disabled="disabled">
                        <input type="hidden" name="txt80" value="<?echo $kkk[75]?>">
						<!-- <input class="input-large" type="text" name="txt80h" value="<?//echo $_SESSION["name"]."  ".$_SESSION["lastname"];?>"disabled="disabled">
                        <input type="hidden" name="txt80" value="<?//echo $_SESSION["name"]."  ".$_SESSION["lastname"];?>"> -->
                    </h6>
                </div>
            </td>
            <td colspan="3">
                <div class="inline">
                    <h6>
                        Date 
                        <input class="input-large" type="text" name="txt81h" value="<?echo $kkk[76]?>" disabled="disabled">
                        <input type="hidden" name="txt81" value="<?echo $kkk[76]?>">
                        <!--<div id="datetimepicker1" class="input-append">
                                <input data-format="yyyy-MM-dd" class="input-small" type="text" name="txt81" value="<?//echo $kkk[76]?>"></input>
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
                        </script>-->
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
