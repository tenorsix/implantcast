<?
session_start();


//echo $_GET["search"];


if($_GET["search"]=='' || strlen($_GET["search"]) == 0){
?>
    <table class='table table-bordered table-condensed table-hover table-responsive'>
    <!--        
            <tr>
            <td>
                <div class="inline text-center">
                    <h4>HN</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Name</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Case info</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Date</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Status</h4>
                </div>
            </td>
        </tr>-->
<!--        <tr>
            <td colspan="5">
                <div class="inline text-center">
                    Please input text
                </div>
            </td>
        </tr>-->
    </table>

<?
}  else {
    
    include '../ConnectDB.php';
    include '../OR/fnc.php';
    $DB = new ConnectDB();
    $DB->connect();
    $getlist = new fncPNP();
    $list = $getlist->getpatients_opd($_SESSION["hid"],$_GET["search"]);
    $listcount = $getlist->getpatientsrow();
    
    
    
    
    
    
    
?>
    <table class='table table-bordered table-condensed table-hover table-responsive'>
        <tr>
            <td colspan="6">
                <div class="inline text-center">
                    <h2>Patients  <small>found <?echo $listcount." people(s)"?></small> </h2>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="inline text-center">
                    <h4>HN</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Name</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Follower Up</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Womac</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Date</h4>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <h4>Status</h4>
                </div>
            </td>
        </tr>
        <?
           if($listcount==0){
        ?>
        <tr>
            <td colspan="5">
                <div class="inline text-center">
                        Sorry. No Patients in Database
                </div>
            </td>
        </tr> 
        <tr>
            <td colspan="5">
                <div class="inline text-center">
                    <button class="btn btn-large btn-success">Add New Patients</button>
                </div>
            </td>
        </tr>
        <?
           } 
           for($i=0;$i<$listcount;$i++){
        ?>
        <tr>
            <td>
                <div class="inline">
                    <?
                        echo $list[$i][1];
                    ?>
                </div>
            </td>
            <td>
                <div class="inline">
                    <?
                        echo $list[$i][3]."  ".$list[$i][4];
                    ?>
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <a href="opd_followup.php?name=<?echo $list[$i][3]."  ".$list[$i][4];?>&hn=<?echo $list[$i][1];?>&age=<?echo $list[$i][7];?>&sex=<?echo $list[$i][8];?>&weight=<?echo $list[$i][9];?>&height=<?echo $list[$i][10];?>&bmi=<?echo $list[$i][11];?>" class="btn btn-success btn-mini">OPD Follow Up</a>
                </div>
            </td>
            <td>
                <?
                    $listOpHistory = $getlist->getOpHistory($list[$i][1]);
                    $listOpcount = $getlist->getpatientsrow();
                    $chkRL = "";
                    for($k=0;$k<$listOpcount;$k++){
                        $chkRL .= $listOpHistory[$k][9];
                    }
                    if($chkRL == "RL" || $chkRL == "LR"){
                ?>
                        <DIV class="inline text-center">
                            <a href="#" class="btn btn-mini btn-inverse disabled">Full Case of TKA</a>
                        </DIV>
                <?
                    }else{
                ?>
                        <div class="inline text-center">
                            <a href="womac_form_OPD.php?name=<?echo $list[$i][3]."  ".$list[$i][4];?>&hn=<?echo $list[$i][1];?>&age=<?echo $list[$i][7];?>&sex=<?echo $list[$i][8];?>&weight=<?echo $list[$i][9];?>&height=<?echo $list[$i][10];?>&bmi=<?echo $list[$i][11];?>" class="btn btn-mini btn-primary">WOMAC TKA</a>                                
                        </div>
                <?
                    }
                ?>
                
            </td>
            <td>
                <div class="inline text-center">
                </div>
            </td>
            <td>
                <div class="inline text-center">
                    <a href="#focus<?echo $focus;?>" class="btn btn-mini btn-info" OnClick="fncOpenPopup(<?echo "'".$list[$i][1]."'"?>);">View Data</a>
                </div>
            </td>
        </tr>
        <?
           }
        
        
        ?>
    </table>
    <? 
        include "footer.php";
   
}
?>







