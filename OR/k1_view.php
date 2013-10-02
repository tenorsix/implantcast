<?

session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php"><?
}

include "../ConnectDB.php";
$DB = new ConnectDB();
$DB->connect();
include "./call_framework.php";
        $view = $DB->searchforedit_k1($_GET["k1id"]);   
        //print_r($view);

?>

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
<div class="container">
  <div class="container">
        <table class ="table table-hover table-bordered table-condensed">
            <tr>
                <td>
                    <div class="inline text-center">
                        <h4>K1 Result (View)</h4>
                        <h6 class="text-right">K1-No.           :<?echo " ".$view[0];?></h6>
                        <h6 class="text-right">HN               :<?echo " ".$view[1];?></h6>
                        <h6 class="text-right">Hospital         :<?echo " ".$view[79];?></h6>
                        <?$txtdate = $DB->getchadate($view[3]);?>
                        <h6 class="text-right">Operation Date   :<?echo " ".$txtdate;?></h6>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Diagnosis : <? echo " ".$view[82];?>
                            Side :  <? 
                            //check Bilateral side
                            $chkBilateral = $DB->chkBilateral($view[1]);
                            if($chkBilateral==2){
                                $textside = " (Bilateral)";
                            }
                            switch ($view[5]) {
                                case '1':
                                    echo " Right ".$textside;
                                break;
                                case '2':
                                    echo " Left ".$textside;
                                break;;
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
                                    if($view[6]=='1'){
                                        $textOP = "  CAS  ";
                                    }
                                    if($view[7]=='1'){
                                        if($textOP != ""){
                                            $textOP .= ",";
                                        }
                                        $textOP .= "  MIS  ";
                                    }
                                    if($view[8]=='1'){
                                        if($textOP != ""){
                                            $textOP .= ",";
                                        }
                                        $textOP .= "  Conventional  ";
                                    }
                                    if($view[9]=='1'){
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
                        <h6>Operator :          <? echo " ".$view[10]?></h6>
                        <h6>Assistant 1 :       <? echo " ".$view[11]?></h6>
                        <h6>Assistant 2 :       <? echo " ".$view[12]?></h6>
                        <h6>Assistant 3 :       <? echo " ".$view[13]?></h6>
                        <h6>Anesthetist :       <? echo " ".$view[14]?></h6>
                                                <? $inurse = explode(":",$view[15]);?>
                        <h6>Instrument Nurse 1 :  <? echo " ".$inurse[0]?></h6>
                        <h6>Instrument Nurse 2 :  <? echo " ".$inurse[1]?></h6>
                        <h6>Instrument Nurse 3 :  <? echo " ".$inurse[2]?></h6>
                        <h6>Anesthesia :        <? echo " ".$view[16]?></h6>
                                                <? $cnurse = explode(":",$view[17]);?>
                        <h6>Circulate Nurse 1 :   <? echo " ".$cnurse[0]?></h6>
                        <h6>Circulate Nurse 2 :   <? echo " ".$cnurse[1]?></h6>
                        <h6>Circulate Nurse 3 :   <? echo " ".$cnurse[2]?></h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>
                            Operation Started
                            <?
                                echo " ".$view[18];
                                echo " Finished  ".$view[19];
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
                               switch ($view[20]) {
                                    case '1':
                                        echo " On use ".$view[21]." mmHg ".$view[22]." minutes";
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
                               switch ($view[77]) {
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
                                    if($view[23]=='1'){
                                        $textFinding = "  1°OA  ";
                                    }
                                    if($view[24]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  ON  ";
                                    }
                                    if($view[25]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  RA  ";
                                    }
                                    if($view[26]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  Post Traumatic  ";
                                    }
                                    if($view[27]=='1'){
                                        if($textFinding != ""){
                                            $textFinding .= ",";
                                        }
                                        $textFinding .= "  Post HTO  ";
                                    }
                                    if($view[28]=='1'){
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
                        <?
                            if($view[29]==""){
                                $preopdg = '-';
                            }else{
                                $preopdg = $view[29];
                            }
                        ?>
                        <h6>Pre Op. ROM : <?echo " ".$preopdg." " ?> degree(s)</h6>
                        <h6>
                            Pre Op. X-ray : 
                            <?
                                if($view[31]==""){
                                    $vadg = '-';
                                }else{
                                    $vadg = $view[31];
                                }
                                switch ($view[30]){
                                    case '1':
                                        echo " Varus ".$vadg." degree(s)";
                                    break;
                                    case '2':
                                        echo " Valgus ".$vadg." degree(s)";
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
                                 switch (substr($view[32],0,1)) {
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
                                 switch (substr($view[32],1,1)) {
                                     case '1':
                                         echo " Cemented ";
                                     break;

                                     case '2':
                                         echo " Cementless ";
                                     break;
                                 }
                                 switch (substr($view[32],2,1)) {
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
                                 switch (substr($view[33],0,1)) {
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
                                 switch (substr($view[33],1,1)) {
                                     case '1':
                                         echo " Cemented ";
                                     break;

                                     case '2':
                                         echo " Cementless ";
                                     break;
                                 }
                                 
                                 switch (substr($view[33],2,1)) {
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
                                    switch ($view[34]) {
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
                                    echo " ".$view[84];
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
                                    if($view[36]=='1'){
                                        $textTechnique = "  Gap technique  ";
                                    }
                                    if($view[37]=='1'){
                                        if($textTechnique != ""){
                                            $textTechnique .= ",";
                                        }
                                        $textTechnique .= "  Measurement technique  ";
                                    }
                                    if($view[38]=='1'){
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
                                    if($view[39]=='1') echo "<h6>\"Medial Parapatella\"</h6>";
                                    if($view[40]=='1') echo "<h6>\"Midvastus\"</h6>";
                                    if($view[41]=='1') echo "<h6>\"Quad. Spearing\"</h6>";
                                    if($view[42]=='1') echo "<h6>\"Subvastus\"</h6>";
                                    if($view[43]=='1') echo "<h6>\"Lateral parapatella\"</h6>";
                                    
                                ?>    
                            </DIV>
                            <h6>
                                - Install tracker at femur 
                                <?
                                    switch($view[44]){
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
                                    switch($view[45]){
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
                                    switch($view[46]){
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
                                    switch($view[47]){
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
                                    switch($view[48]){
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
                                        <h6><?echo $view[49]?></h6>
                                    </DIV>
                                </td>
                                <td>
                                    <DIV class="inline text-center">
                                        <h6><?echo $view[50]?></h6>
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
                                        <h6><?echo $view[51]?></h6>
                                    </DIV>
                                </td>
                                <td>
                                    <DIV class="inline text-center">
                                        <h6><?echo $view[52]?></h6>
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
                                    if($view[53]=='1') echo "<h6>\"Circumferential electrocautery\"</h6>";
                                    if($view[54]=='1') echo "<h6>\"Osteophytectomy\"</h6>";
                                    if($view[55]=='1') echo "<h6>\"Facetectomy\"</h6>";
                                    
                                    if($view[57]=="")$view[57]="-";
                                    //if($view[58]=="")$view[58]="-";
                                    if($view[56]=='1') echo "<h6>\"Resurfacing size ".$view[57]."\"</h6>";
                                    
                                ?>    
                         </DIV> 
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        
                        <?
                            
                            switch ($view[59]) {
                                case '2':
                                    echo "<h6>Augmentation No</h6> ";

                                break;
                                case '1':
                                    
                                    if($view[60]=="" && $view[62]==""){
                                        echo "<h6>Augmentation No</h6> ";
                                    }else{
                                        echo "<h6>Augmentation Yes</h6> ";
                                        echo "<DIV class='inline offset1'>";
                                        if($view[60]=='1'){
                                            switch ($view[61]){
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
                                        if($view[62]=='1'){
                                            switch ($view[63]){
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
                            if($view[71] == '1'){
                                echo "<h6>\"None\"</h6>";
                            }  else {
                                if($view[64]=='1') echo "<h6>\"Femoral notching\"</h6>";
                                if($view[65]=='1') echo "<h6>\"Partial avulsion patellar ligament\"</h6>";
                                if($view[66]=='1') echo "<h6>\"Complete avulsion patellar ligament\"</h6>";
                                if($view[67]=='1') echo "<h6>\"Patellar fracture\"</h6>";
                                if($view[68]=='1') echo "<h6>\"Femoral fracture\"</h6>";
                                if($view[69]=='1') echo "<h6>\"Tibia fracture\"</h6>";
                                if($view[70]=='1') echo "<h6>\"Torn MCL/PCL\"</h6>";
                                
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
                                if($view[72]==""){
                                    $textcomlication = "None";
                                }else{
                                    $textcomlication = $view[72];
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
                                if($view[73]==""){
                                    $textAdditional = "None";
                                }else{
                                    $textAdditional = $view[73];
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
                        <h6>Estimated blood loss : <? echo " ".$view[74]." ml."?></h6>
                    </DIV>
                </td>
            </tr>
            <tr>
                <td>
                    <DIV class="inline">
                        <h6>Signature : <? echo " ".$view[87]." ".$view[88]?></h6>
                        <?
                            $txtdate = $DB->getchadate($view[76]);
                        
                        ?>
                        <h6>Date : <? echo " ".$txtdate ?></h6>
                    </DIV>
                </td>
            </tr>
            <tr >
                <td>
                    <DIV class="inline text-center">
                        <a href="../k1_report_dl.php?k1id=<?echo $view[0]?>" class="btn btn-large btn-primary">
                            &nbsp;Download PDF&nbsp;</a>
                        <a href="main_or.php" class="btn btn-large btn-inverse">
                            &nbsp;Back&nbsp;</a>
                    </DIV>
                </td>
            </tr>
        </table> 
    </div>
  </div>
      
    
    
    
    
    
    
    
<?

include "footer.php";

?>
