<?

session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
}

include "ConnectDB.php";
$DBk1 = new ConnectDB();
$DBk1->connect();
$_SESSION["nofooter"] = 1;
include "index.php";
?>

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
    </div>
    <div class="span8">
        <table class ="table table-hover table-bordered table-condensed">
            <tr>
                <td>
                    <div class="inline text-center">
                        <h4>K1 Result (Edit)</h4>
                        <h6 class="text-right">K1-No.           :<?echo " ".$_POST["txt1"];?></h6>
                        <h6 class="text-right">HN               :<?echo " ".$_POST["txt2"];?></h6>
                        <h6 class="text-right">Hospital         :<?echo " ".$_POST["txt3"];?></h6>
                        <?$txtdate = $DBk1->getchadate($_POST["txt4"]);?>
                        <h6 class="text-right">Operation Date   :<?echo " ".$txtdate;?></h6>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Diagnosis : <? 
                                    $Diagnosis = $DBk1->getDiagnosisname($_POST["txt5"]);
                                    echo " ".$Diagnosis[1];?>
                            Side :  <? 
                            //check Bilateral side
                            $chkBilateral = $DBk1->chkBilateral($_POST["txt2"]);
                            if($chkBilateral==2){
                                $textside = " (Bilateral)";
                            }
                            switch ($_POST["txt6"]) {
                                case '1':
                                    echo " Right ".$textside;
                                break;
                                case '2':
                                    echo " Left ".$textside;
                                break;
                            }
                                    ?>
                        </h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Operation Total Knee Arthroplasty : 
                                <?
                                    $textOP = "";
                                    if($_POST["txt7"]=='1'){
                                        $textOP = "  CAS  ";
                                    }
                                    if($_POST["txt8"]=='1'){
                                        if($textOP != ""){
                                            $textOP .= ",";
                                        }
                                        $textOP .= "  MIS  ";
                                    }
                                    if($_POST["txt9"]=='1'){
                                        if($textOP != ""){
                                            $textOP .= ",";
                                        }
                                        $textOP .= "  Conventional  ";
                                    }
                                    if($_POST["txt10"]=='1'){
                                        if($textOP != ""){
                                            $textOP .= ",";
                                        }
                                        $textOP .= "  PSI  ";
                                    }
                                    echo $textOP;
                                ?>
                        </h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Operator :          <? echo " ".$_POST['txt11']?></h6>
                        <h6>Assistant 1 :       <? echo " ".$_POST['txt12']?></h6>
                        <h6>Assistant 2 :       <? echo " ".$_POST['txt13']?></h6>
                        <h6>Assistant 3 :       <? echo " ".$_POST['txt14']?></h6>
                        
                        <h6>Anesthetist :       <? echo " ".$_POST['txt15']?></h6>
						<?
						$txt16 = $_POST['txt16v1'];
						$txt16 .= ":".$_POST['txt16v2'];
						$txt16 .= ":".$_POST['txt16v3'];
						?>
                        <h6>Instrument Nurse :  <? echo " ".$txt16?></h6>
                        <h6>Anesthesia :        <? echo " ".$_POST['txt17']?></h6>
						<?
						$txt18 = $_POST['txt18v1'];
						$txt18 .= ":".$_POST['txt18v2'];
						$txt18 .= ":".$_POST['txt18v3'];
						?>
                        <h6>Circulate Nurse :   <? echo " ".$txt18?></h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Operation Started
                            <?
                                echo " ".$_POST['txt19'];
                                echo " Finished  ".$_POST['txt20'];
                                
                                $Tstarted = $_POST['txt19'].":00";
                                $Tfinished = $_POST['txt20'].":00";
                            ?>
                        </h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Tourniquet : 
                            <?
                               switch ($_POST['txt21']) {
                                    case '1':
                                        echo " On use ".$_POST['txt22']." mmHg ".$_POST['txt23']." minutes";
                                    break;
                                    case '2':
                                        echo " Non Tourniquet";
                                    break;
                               }
                            ?>
                        </h6>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Sponge Count : 
                            <?
                               switch ($_POST['txt82']) {
                                    case '1': echo "Were Check";
                                    break;
                                    default : echo "None Check";
                                    break;
                               }
                            ?>
                        </h6>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Finding :
                                <?
                                    $textFinding = "";
                                    if($_POST["txt24"]=='1'){
                                        $textFinding = "  1°OA  ";
                                    }
                                    if($_POST["txt25"]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  ON  ";
                                    }
                                    if($_POST["txt26"]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  RA  ";
                                    }
                                    if($_POST["txt27"]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  Post Traumatic  ";
                                    }
                                    if($_POST["txt28"]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  Post HTO  ";
                                    }
                                    if($_POST["txt29"]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  Other inflammatory joint disease  ";
                                    }
                                    echo $textFinding;
                                ?>
                        </h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Pre Op. ROM : <?echo " ".$_POST["txt30"]." " ?> degree(s)</h6>
                        <h6>
                            Pre Op. X-ray : 
                            <?
                                switch ($_POST["txt31"]){
                                    case '1':
                                        echo " Varus ".$_POST["txt32"]." degree(s)";
                                    break;
                                    case '2':
                                        echo " Valgus ".$_POST["txt32"]." degree(s)";
                                    break;
                                    case '3':
                                        echo " None Varus/Valgus";
                                    break;
                                }
                            ?> 
                        </h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Prosthesis</h6>
                        <div class="inline offset1">
                            <h6>
                                Femur : 
                             <? 
                                 switch ($_POST["txt33"]) {
                                     case '1':
                                         echo " CR ";
                                     break;

                                     case '2':
                                         echo " PS ";
                                     break;
                                 
                                     case '3':
                                         echo " UKA ";
                                     break;
                                 }
                                 switch ($_POST["txt34"]) {
                                     case '1':
                                         echo " Cemented ";
                                     break;

                                     case '2':
                                         echo " Cementless ";
                                     break;
                                 }
                                 switch ($_POST["txt35"]) {
                                     case '1':
                                         echo " CoCr ";
                                     break;

                                     case '2':
                                         echo " Tin ";
                                     break;
                                 
                                     case '3':
                                         echo " Oxinium ";
                                     break;
                                 }
                            ?>
                            </h6>
                            <h6>
                                Tibial : 
                             <? 
                                 switch ($_POST["txt36"]) {
                                     case '1':
                                         echo " Fix Bearing ";
                                     break;

                                     case '2':
                                         echo " Mobile Bearing ";
                                     break;
                                     case '3':
                                         echo " Medial Pivot ";
                                     break;
                                 }
                                 switch ($_POST["txt37"]) {
                                     case '1':
                                         echo " Cemented ";
                                     break;

                                     case '2':
                                         echo " Cementless ";
                                     break;
                                 }
                                 
                                 switch ($_POST["txt38"]) {
                                     case '1':
                                         echo " CoCr ";
                                     break;

                                     case '2':
                                         echo " Tin ";
                                     break;
                                 
                                     case '3':
                                         echo " Oxinium ";
                                     break;
                                 }
                            ?>
                            </h6>
                            
                            <h6>
                                Patella : 
                                <?
                                    switch ($_POST["txt39"]) {
                                     case '1':
                                         echo " Normal ";
                                     break;

                                     case '2':
                                         echo " Baja ";
                                     break;
                                 
                                     case '3':
                                         echo " Alta ";
                                     break;
                                 }
                                ?>
                            </h6>
                            <h6>
                                Implant Used :
                                <?
                                    $Implant = $DBk1->getBrandname($_POST["txt40"]);
                                    echo " ".$Implant[1];
                                ?>
                            </h6>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Technique : 
                            <?
                                    $textTechnique = "";
                                    if($_POST["txt41"]=='1'){
                                        $textTechnique = "  Gap technique  ";
                                    }
                                    if($_POST["txt42"]=='1'){
                                        if($textTechnique != ""){
                                            $textTechnique .= ",";
                                        }
                                        $textTechnique .= "  Measurement technique  ";
                                    }
                                    if($_POST["txt43"]=='1'){
                                        if($textTechnique != ""){
                                            $textTechnique .= ",";
                                        }
                                        $textTechnique .= "  Combine  ";
                                    }
                                    
                                    echo $textTechnique;
                            ?>
                        </h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Procedure
                        </h6>
                        <DIV class="inline offset1">
                            <h6>- Patient was in supine position</h6>
                            <h6>
                                - Approach
                            </h6> 
                            <DIV class="inline offset1">
                                <?
                                    if($_POST["txt44"]=='1') echo "<h6>\"Medial Parapatella\"</h6>";
                                    if($_POST["txt45"]=='1') echo "<h6>\"Midvastus\"</h6>";
                                    if($_POST["txt46"]=='1') echo "<h6>\"Quad. Spearing\"</h6>";
                                    if($_POST["txt47"]=='1') echo "<h6>\"Subvastus\"</h6>";
                                    if($_POST["txt48"]=='1') echo "<h6>\"Lateral parapatella\"</h6>";
                                    
                                ?>    
                            </DIV>
                            <h6>
                                - Install tracker at femur 
                                <?
                                    switch($_POST["txt49"]){
                                    case '1':
                                        echo "\"Done\"";
                                        break;
                                    case '2':
                                        echo "\"None\"";
                                        break;
                                    }
                                ?>
                            </h6>
                            <h6>
                                - First bone cut
                                <?
                                    switch($_POST["txt50"]){
                                    case '1':
                                        echo "\"Proximal tibial\"";
                                        break;
                                    case '2':
                                        echo "\"Distal femur\"";
                                        break;
                                    }
                                ?>
                            </h6>
                            <h6>- Cut bone step by step</h6>
                            <h6>- Balance flexion and extention gap</h6>
                            <h6>
                                - Pie crusting at
                                <?
                                    switch($_POST["txt51"]){
                                    case '1':
                                        echo "\"None\"";
                                        break;
                                    case '2':
                                        echo "\"Medial\"";
                                        break;
                                    case '3':
                                        echo "\"Lateral\"";
                                        break;
                                    }    
                                
                                ?>
                            </h6>
                            <h6>
                                - Additional bone cut at
                                <?
                                    switch($_POST["txt52"]){
                                    case '1':
                                        echo "\"None\"";
                                        break;
                                    case '2':
                                        echo "\"Proximal Tibia\"";
                                        break;
                                    case '3':
                                        echo "\"Distal Femur\"";
                                        break;
                                    }    
                                
                                ?>
                            </h6>
                            <h6>
                                - Down sizing
                                <?
                                    switch($_POST["txt53"]){
                                    case '1':
                                        echo "\"None\"";
                                        break;
                                    case '2':
                                        echo "\"Tibial Component\"";
                                        break;
                                    case '3':
                                        echo "\"Femoral Component\"";
                                        break;
                                    }    
                                
                                ?>
                            </h6>
                            <h6>
                                - Fix the real component and patellar tracking check then radivac drain was insert. Suture was done layer by layer and Jone's bandage was apply.  
                            </h6>
                               
                        </DIV>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <TABLE class="table-condensed table-bordered table-hover offset1">
                            <tr>
                                <td>
                                    <DIV class="inline">
                                        <h6>Soft tissue balance</h6>
                                    </DIV>
                                </td>
                                <td>
                                    <DIV class="inline">
                                        <h6>Medial</h6>
                                    </DIV>
                                </td>
                                <td>
                                    <DIV class="inline">
                                        <h6>Lateral</h6>
                                    </DIV>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <DIV class="inline">
                                        <h6>Extension (mm.)</h6>
                                    </DIV>
                                </td>
                                <td>
                                    <DIV class="inline text-center">
                                        <h6><?echo $_POST["txt54"]?></h6>
                                    </DIV>
                                </td>
                                <td>
                                    <DIV class="inline text-center">
                                        <h6><?echo $_POST["txt55"]?></h6>
                                    </DIV>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <DIV class="inline">
                                        <h6>Flexion 90° (mm.)</h6>
                                    </DIV>
                                </td>
                                <td>
                                    <DIV class="inline text-center">
                                        <h6><?echo $_POST["txt56"]?></h6>
                                    </DIV>
                                </td>
                                <td>
                                    <DIV class="inline text-center">
                                        <h6><?echo $_POST["txt57"]?></h6>
                                    </DIV>
                                </td>
                            </tr>
                        </TABLE>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Patella Management</h6>
                        <DIV class="inline offset1">
                                <?
                                    if($_POST["txt58"]=='1') echo "<h6>\"Circumferential electrocautery\"</h6>";
                                    if($_POST["txt59"]=='1') echo "<h6>\"Osteophytectomy\"</h6>";
                                    if($_POST["txt60"]=='1') echo "<h6>\"Facetectomy\"</h6>";
                                    
                                    if($_POST["txt62"]=="")$_POST["txt61"]="-";
                                    //if($_POST["txt63"]=="")$_POST["txt62"]="-";
                                    if($_POST["txt61"]=='1') echo "<h6>\"Resurfacing size ".$_POST["txt62"]." rest</h6>";
                                    
                                ?>    
                         </DIV> 
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        
                        <?
                            
                            switch ($_POST["txt64"]) {
                                case '2':
                                    echo "<h6>Augmentation No</h6> ";

                                break;
                                case '1':
                                    
                                    if($_POST["txt65"]=="" && $_POST["txt67"]==""){
                                        echo "<h6>Augmentation No</h6> ";
                                    }else{
                                        echo "<h6>Augmentation Yes</h6> ";
                                        echo "<DIV class='inline offset1'>";
                                        if($_POST["txt65"]=='1'){
                                            switch ($_POST["txt66"]){
                                                case '1':
                                                    echo "<h6>Tibia - Cement</h6>";
                                                break;
                                                case '2':
                                                    echo "<h6>Tibia - Bone graft</h6>";
                                                break;
                                                case '3':
                                                    echo "<h6>Tibia - Metal</h6>";
                                                break;
                                                case '4':
                                                    echo "<h6>Tibia - Stem</h6>";
                                                break;
                                            }
                                        }
                                        if($_POST["txt67"]=='1'){
                                            switch ($_POST["txt68"]){
                                                case '1':
                                                    echo "<h6>Femur - Cement</h6>";
                                                break;
                                                case '2':
                                                    echo "<h6>Femur - Bone graft</h6>";
                                                break;
                                                case '3':
                                                    echo "<h6>Femur - Metal</h6>";
                                                break;
                                                case '4':
                                                    echo "<h6>Femur - Stem</h6>";
                                                break;
                                            }
                                        }
                                    }
                                    echo "</DIV>";
                                break;
                            }

                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Intraop. Compalication</h6>
                        <DIV class="inline offset1">
                        <?
                            if($_POST["txt76"] == '1'){
                                echo "<h6>\"None\"</h6>";
                            }  else {
                                if($_POST["txt69"]=='1') echo "<h6>\"Femoral notching\"</h6>";
                                if($_POST["txt70"]=='1') echo "<h6>\"Partial avulsion patellar ligament\"</h6>";
                                if($_POST["txt71"]=='1') echo "<h6>\"Complete avulsion patellar ligament\"</h6>";
                                if($_POST["txt72"]=='1') echo "<h6>\"Patellar fracture\"</h6>";
                                if($_POST["txt73"]=='1') echo "<h6>\"Femoral fracture\"</h6>";
                                if($_POST["txt74"]=='1') echo "<h6>\"Tibia fracture\"</h6>";
                                if($_POST["txt75"]=='1') echo "<h6>\"Torn MCL/PCL\"</h6>";
                                
                            }
                        
                        
                        ?>
                        </div>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Complication Management</h6>
                        <DIV class="inline offset1">
                            <?
                                if($_POST["txt77"]==""){
                                    $textcomlication = "None";
                                }else{
                                    $textcomlication = $_POST["txt77"];
                                }
                            ?>
                            <h6><? echo "\"".$textcomlication."\""?></h6>
                        </DIV>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Additional Procedure</h6>
                        <DIV class="inline offset1">
                            <?
                                if($_POST["txt78"]==""){
                                    $textAdditional = "None";
                                }else{
                                    $textAdditional = $_POST["txt78"];
                                }
                            ?>
                            <h6><? echo "\"".$textAdditional."\""?></h6>
                        </DIV>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Estimated blood loss : <? echo " ".$_POST["txt79"]." ml."?></h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Signature : <? 
                            $name = $DBk1->getusername($_POST["txt80"]);
                            echo " ".$name[2]." ".$name[3];
                        ?></h6>
                        <?
                            $txtdate = $DBk1->getchadate($_POST["txt81"]);
                        
                        ?>
                        <h6>Date : <? echo " ".$txtdate ?></h6>
                    </DIV>
                </td>
            </tr>
            <tr >
                <td>
                    <DIV class="inline text-center">
                        <a href="k1_confirm_edit.php" class="btn btn-large btn-primary">
                            &nbsp;Confirm&nbsp;</a>
                        <?
                            switch ($_POST["txt6"]){
                                case '1' :
                                    $side = 'R';
                                    break;
                                case '2':
                                    $side = 'L';
                                    break;
                                
                            }
                            
                            $linkcancel = "k1_edit.php?k1id=".$_POST["txt1"];
                        ?>
                        <a href="<?echo $linkcancel;?>" class="btn btn-large btn-danger">
                            &nbsp;&nbsp;Cancel&nbsp;&nbsp;</a>
                    </DIV>
                </td>
            </tr>
        </table> 
    </div>
  </div>
</div>
      
    
    
    
    
    
    
    
<?

include "footer.php";

$_SESSION["k1"][]  = $_POST["txt1"];
$_SESSION["k1"][]  = $_POST["txt2"];
$_SESSION["k1"][]  = $_POST["txt3"];
$_SESSION["k1"][]  = $_POST["txt4"];
$_SESSION["k1"][]  = $_POST["txt5"];
$_SESSION["k1"][]  = $_POST["txt6"];
$_SESSION["k1"][]  = $_POST["txt7"];
$_SESSION["k1"][]  = $_POST["txt8"];
$_SESSION["k1"][]  = $_POST["txt9"];
$_SESSION["k1"][]  = $_POST["txt10"];
$_SESSION["k1"][]  = $_POST["txt11"];
$_SESSION["k1"][]  = $_POST["txt12"];
$_SESSION["k1"][]  = $_POST["txt13"];
$_SESSION["k1"][]  = $_POST["txt14"];
$_SESSION["k1"][]  = $_POST["txt15"];
$_SESSION["k1"][]  = $txt16;
$_SESSION["k1"][]  = $_POST["txt17"];
$_SESSION["k1"][]  = $txt18;
$_SESSION["k1"][]  = $Tstarted;
$_SESSION["k1"][]  = $Tfinished;
$_SESSION["k1"][]  = $_POST["txt21"];
$_SESSION["k1"][]  = $_POST["txt22"];
$_SESSION["k1"][]  = $_POST["txt23"];
$_SESSION["k1"][]  = $_POST["txt24"];
$_SESSION["k1"][]  = $_POST["txt25"];
$_SESSION["k1"][]  = $_POST["txt26"];
$_SESSION["k1"][]  = $_POST["txt27"];
$_SESSION["k1"][]  = $_POST["txt28"];
$_SESSION["k1"][]  = $_POST["txt29"];
$_SESSION["k1"][]  = $_POST["txt30"];
$_SESSION["k1"][]  = $_POST["txt31"];
$_SESSION["k1"][]  = $_POST["txt32"];
$_SESSION["k1"][]  = $_POST["txt33"].$_POST["txt34"].$_POST["txt35"];
$_SESSION["k1"][]  = $_POST["txt36"].$_POST["txt37"].$_POST["txt38"];
$_SESSION["k1"][]  = $_POST["txt39"];
$_SESSION["k1"][]  = $_POST["txt40"];
$_SESSION["k1"][]  = $_POST["txt41"];
$_SESSION["k1"][]  = $_POST["txt42"];
$_SESSION["k1"][]  = $_POST["txt43"];
$_SESSION["k1"][]  = $_POST["txt44"];
$_SESSION["k1"][]  = $_POST["txt45"];
$_SESSION["k1"][]  = $_POST["txt46"];
$_SESSION["k1"][]  = $_POST["txt47"];
$_SESSION["k1"][]  = $_POST["txt48"];
$_SESSION["k1"][]  = $_POST["txt49"];
$_SESSION["k1"][]  = $_POST["txt50"];
$_SESSION["k1"][]  = $_POST["txt51"];
$_SESSION["k1"][]  = $_POST["txt52"];
$_SESSION["k1"][]  = $_POST["txt53"];
$_SESSION["k1"][]  = $_POST["txt54"];
$_SESSION["k1"][]  = $_POST["txt55"];
$_SESSION["k1"][]  = $_POST["txt56"];
$_SESSION["k1"][]  = $_POST["txt57"];
$_SESSION["k1"][]  = $_POST["txt58"];
$_SESSION["k1"][]  = $_POST["txt59"];
$_SESSION["k1"][]  = $_POST["txt60"];
$_SESSION["k1"][]  = $_POST["txt61"];
$_SESSION["k1"][]  = $_POST["txt62"];
$_SESSION["k1"][]  = $_POST["txt63"];
$_SESSION["k1"][]  = $_POST["txt64"];
$_SESSION["k1"][]  = $_POST["txt65"];
$_SESSION["k1"][]  = $_POST["txt66"];
$_SESSION["k1"][]  = $_POST["txt67"];
$_SESSION["k1"][]  = $_POST["txt68"];
$_SESSION["k1"][]  = $_POST["txt69"];
$_SESSION["k1"][]  = $_POST["txt70"];
$_SESSION["k1"][]  = $_POST["txt71"];
$_SESSION["k1"][]  = $_POST["txt72"];
$_SESSION["k1"][]  = $_POST["txt73"];
$_SESSION["k1"][]  = $_POST["txt74"];
$_SESSION["k1"][]  = $_POST["txt75"];
$_SESSION["k1"][]  = $_POST["txt76"];
$_SESSION["k1"][]  = $_POST["txt77"];
$_SESSION["k1"][]  = $_POST["txt78"];
$_SESSION["k1"][]  = $_POST["txt79"];
$_SESSION["k1"][]  = $_POST["txt80"];
$_SESSION["k1"][]  = $_POST["txt81"];
$_SESSION["k1"][]  = $_POST["txt82"];

?>
