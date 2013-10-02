<?php
session_start();
include "../ConnectDB.php";
include "fnc.php";
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php"><?
}else{
	$DB = new ConnectDB();
	$DB->connect();
        
        $getlist = new fncPNP();
        $list = $getlist->getpatients($_SESSION["hid"],$_POST["search"]);
        $listcount = $getlist->getpatientsrow();
        //echo "<br>>>>>>".$_POST['search'];
        include "./call_framework.php";
        //echo $_SESSION["hid"];
        //echo $listcount;
        //print_r($list);
        
        
        
        
                
?> 


<html>
<script language="JavaScript">
	function fncOpenPopup(txt1)
	{
            //alert(txt1);
            window.open('popupview.php?hn='+txt1,'popup-name','width=600,height=600,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
        function fncOpenPDF(id)
	{
            //alert(id);
            window.open('../k1_report.php?k1id='+id,'popup-name','width=600,height=600,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}
</script>
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
    
<div class="container">
    <div class="container">
		<table class ="table table-hover table-bordered">
                    <tr >
                        <td colspan="9">
                            <DIV class="inline text-center">
                                <h4>Your Patients<small>&nbsp;&nbsp;Found&nbsp;&nbsp;<? echo $listcount;?>&nbsp;People&nbsp;</small></h4>
                            </DIV>
                            <DIV class="inline text-center">
                                <form class="form-search" action="main_or.php" method="POST" name="form1">
                                    <INPUT type="text" name="search" class="span6" placeholder="ค้นหาโดย ชื่อ, นามสกุล, หมายเลข HN" autocomplete="off">
                                    <button class="btn btn-inverse" type="submit">Search</button>
                                </form>
                            </DIV>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            <DIV class="inline text-center">
                                <h5>HN</h5>
                            </DIV>
                        </td>
                        <td rowspan="2">
                            <DIV class="inline text-center">
                                <h5>Name</h5>
                            </DIV>
                        </td>
                        <td rowspan="2">
                            <DIV class="inline text-center">
                                <h5>Hospital</h5>
                            </DIV>
                        </td>
                        <td rowspan="2">
                            <DIV class="inline text-center">
                                <h5>Age</h5>
                            </DIV>
                        </td>
                        <td rowspan="2">
                            <DIV class="inline text-center">
                                <h5>Operation History</h5>
                            </DIV>
                        </td>
                        <td colspan="4">
                            <DIV class="inline text-center">
                                <h5>Management</h5>
                            </DIV>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="inline text-center"><h6>Status</h6></div>
                        </td>
                        <td>
                            <div class="inline text-center"><h6>Pre Op.</h6></div>
                        </td>
                        <td>
                            <div class="inline text-center"><h6>Post Op.</h6></div>
                        </td>
                        <td>
                            <div class="inline text-center"><h6>Follow Up</h6></div>
                        </td>
                    </tr>
    <?
        if($listcount == 0){
    ?>
			<tr>
                            <td colspan = '5'>
                                <DIV class="inline">
                                    Sorry. No Patients in Database
                                </DIV>
                            </td>
                        </tr>
    <?
        }else{
            for($i=0;$i<$listcount;$i++){
                
              $listOpHistory = $getlist->getOpHistory($list[$i][1]);
              $listOpcount = $getlist->getpatientsrow();
                
                                
              $getWMK = $DB->getwomacid($list[$i][1]);
              $getWMKrow = $DB->getwomacrow($list[$i][1]);
              /*
              print_r($getWMK);
              echo $getWMKrow."<br>";
              echo "<br>";*/
              //echo $getWMK[0];
              switch ($getWMKrow) {
                  case 1:
                       $point0 = $DB->getvisitpoint($getWMK[0]);  

                      break;
                  case 2:
                       $point0 = $DB->getvisitpoint($getWMK[0]); 
                       $point1 = $DB->getvisitpoint($getWMK[1]);
                      break;
              }
    ?>				
                        <tr>
                            <td>
                                <DIV class="inline">
                                    <a name="<?echo "focus".$i?>"></a>
                                    <?echo $list[$i][1];?>
                                </DIV>
                                
                            </td>
                            <td>
                                <DIV class="inline">
                                    <?echo $list[$i][3]."  ".$list[$i][4];?>
                                </DIV>
                            </td>
                            <td>
                                <DIV class="inline">
                                    <?echo $list[$i][21];?>
                                </DIV>
                            </td>
                            <td>
                                <DIV class="inline">
                                    <?
                                        if($list[$i][7]==0){
                                            echo "#n/a";
                                        }else{
                                            echo $list[$i][7];
                                        }
                                    ?>
                                </DIV>
                            </td>
                            <td>
                                <DIV class="inline">
                                    <?
                                    $k=0;
                                    $Opknee = "";
                                    $chkRL = "";
                                    for($k=0;$k<$listOpcount;$k++){
                                        $Opknee .= " ".$listOpHistory[$k][9]."T  /";
                                        $chkRL .= $listOpHistory[$k][9];
                                        //echo $listOpHistory[$k][9]."<br>";
                                    } 
                                    if($listOpcount >0){
                                            echo $listOpcount." Case";
                                            if($listOpcount == 2)$Opknee = "Bilateral";
                                            echo "<br> Knee - ".$Opknee;
                                            //echo "<br> Hip  - None";
                                    }else{
                                            echo "Never";
                                    }
                                    
                                    ?>
                                </DIV>
                            </td>
                            <td>
                                <div class="inline text-center">
                                    <? $focus = $i-1;?>
                                    <a href="#focus<?echo $focus;?>" class="btn btn-mini btn-info" OnClick="fncOpenPopup(<?echo "'".$list[$i][1]."'"?>);">View Data</a>
                                </div>
                            </td>
                                    <?
                                        //
                                                
                                        if($chkRL == "RL" || $chkRL == "LR"){
                                        }  else {
                                    ?>
                                            <td>
                                                <DIV class="inline text-center">
                                                    <a href="womac_form.php?name=<?echo $list[$i][3]."  ".$list[$i][4];?>&hn=<?echo $list[$i][1];?>&age=<?echo $list[$i][7];?>&sex=<?echo $list[$i][8];?>&weight=<?echo $list[$i][9];?>&height=<?echo $list[$i][10];?>&bmi=<?echo $list[$i][11];?>" class="btn btn-mini btn-primary">WOMAC TKA</a>
                                                </DIV>
                                                
                                            </td>
                                            
                                    <?
                                        }
                                        $checkk1R = $DB->checkk1($list[$i][1],'R');
                                        //print_r($checkk1R);
                                        //echo "<br>";
                                        $checkR = $DB->getnumrow();
                                        
                                        $checkk1L = $DB->checkk1($list[$i][1],'L');
                                        //print_r($checkk1L);
                                        //echo "<br>";
                                        $checkL = $DB->getnumrow();
                                        
                                        $link_url = "k1_form.php?hn=".$list[$i][1]."&hospital=".$list[$i][21]."&side=";
                                        $linkPDFR_url = "k1_report.php?k1id=".$checkk1R;
                                        $linkPDFL_url = "k1_report.php?k1id=".$checkk1L;
                                        $linkeditR_url = "k1_edit.php?k1id=".$checkk1R;
                                        $linkeditL_url = "k1_edit.php?k1id=".$checkk1L;
                                        $linkviewR_url = "k1_view.php?k1id=".$checkk1R;
                                        $linkviewL_url = "k1_view.php?k1id=".$checkk1L;
                                        switch ($chkRL) {
                                        case "RL":
                                            ?>
                                            <td>
                                                <DIV class="inline text-center">
                                                    <a href="#" class="btn btn-mini btn-inverse disabled">Full Case of TKA</a>
                                                </DIV>
                                            </td>
                                            <td>
                                                <DIV class="inline text-center">
                                                    
                                                        <?
                                                            if($checkR == 0){
                                                        ?>
                                                                <a href="<?echo $link_url."R";?>" class="btn btn-mini btn-warning ">K1(RT)</a>
                                                                
                                                        <?
                                                            }else{
                                                        ?>
                                                                <!--<a href="#" class="btn btn-mini btn-warning ">Report(RT)</a>-->
                                                                <div class="dropdown">
                                                                  <a class="dropdown-toggle btn btn-warning btn-mini" data-toggle="dropdown" href="#">View Report RT</a>
                                                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                                    <a href="<? echo $linkeditR_url;?>" class="btn btn-mini btn-warning btn-block">Edit</a>
                                                                    <a href="<? echo $linkviewR_url;?>" class="btn btn-mini btn-warning btn-block">View Report</a>
                                                                    <a href="#" class="btn btn-mini btn-warning btn-block" OnClick="fncOpenPDF(<?echo "'".$checkk1R."'"?>);">Download PDF</a>
                                                                  </ul>
                                                                </div>
                                                        <?        
                                                            }
                                                            
                                                            if($checkL == 0){
                                                        ?>
                                                                <a href="<?echo $link_url."L";?>" class="btn btn-mini btn-danger ">K1(LT)</a>
                                                        <?
                                                            }else{
                                                        ?>
                                                                <!--<a href="#" class="btn btn-mini btn-danger ">Report(LT)</a>-->
                                                                <div class="dropdown">
                                                                  <a class="dropdown-toggle btn btn-danger btn-mini" data-toggle="dropdown" href="#">View Report LT</a>
                                                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                                    <a href="<? echo $linkeditL_url;?>" class="btn btn-mini btn-danger btn-block">Edit</a>
                                                                    <a href="<? echo $linkviewL_url;?>" class="btn btn-mini btn-danger btn-block">View Report</a>
                                                                    <a href="#" class="btn btn-mini btn-danger btn-block" OnClick="fncOpenPDF(<?echo "'".$checkk1L."'"?>);">Download PDF</a>
                                                                  </ul>
                                                                </div>
                                                                
                                                        <?        
                                                            }
                                                        ?>
                                                   
                                                </DIV>
                                            </td>
                                            <td>
                                                <div class="inline text-center">
                                                    <?
                                                       if($point0[0][3]=='R'){
                                                           $wmkR_id = $point0[0][0];
                                                       }else if($point0[0][3]=='L'){
                                                           $wmkL_id = $point0[0][0];
                                                       }
                                                       if($point1[0][3]=='R'){
                                                           $wmkR_id = $point1[0][0];
                                                       }else if($point1[0][3]=='L'){
                                                           $wmkL_id = $point1[0][0];
                                                       }
                                                    ?>
                                                    <div class="btn-group">
                                                        <a href="womac_form_followup.php?wmk_id=<?echo $wmkR_id;?>" class="btn btn-mini btn-warning">RT</a>
                                                        <a href="womac_form_followup.php?wmk_id=<?echo $wmkL_id;?>" class="btn btn-mini btn-danger">LT</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <?
                                        break;
                                        case "LR":
                                            ?>
                                            <td>
                                                <DIV class="inline text-center">
                                                    <a href="#" class="btn btn-mini btn-inverse disabled">Full Case of TKA</a>
                                                </DIV>
                                            </td>
                                            <td>
                                                <DIV class="inline text-center">
                                                        <?
                                                            if($checkR == 0){
                                                        ?>
                                                                <a href="<?echo $link_url."R";?>" class="btn btn-mini btn-warning ">K1(RT)</a>
                                                        <?
                                                            }else{
                                                        ?>
                                                                <!--<a href="#" class="btn btn-mini btn-warning ">Report(RT)</a>-->
                                                                <div class="dropdown">
                                                                  <a class="dropdown-toggle btn btn-warning btn-mini" data-toggle="dropdown" href="#">View Report RT</a>
                                                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                                    <a href="<? echo $linkeditR_url;?>" class="btn btn-mini btn-warning btn-block">Edit</a>
                                                                    <a href="<? echo $linkviewR_url;?>" class="btn btn-mini btn-warning btn-block">View Report</a>
                                                                    <a href="#" class="btn btn-mini btn-warning btn-block" OnClick="fncOpenPDF(<?echo "'".$checkk1R."'"?>);">Download PDF</a>
                                                                  </ul>
                                                                </div>
                                                        <?        
                                                            }
                                                            if($checkL == 0){
                                                        ?>
                                                                <a href="<?echo $link_url."L";?>" class="btn btn-mini btn-danger ">K1(LT)</a>
                                                        <?
                                                            }else{
                                                        ?>
                                                                <!--<a href="#" class="btn btn-mini btn-danger ">Report(LT)</a>-->
                                                                <div class="dropdown">
                                                                  <a class="dropdown-toggle btn btn-danger btn-mini" data-toggle="dropdown" href="#">View Report LT</a>
                                                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                                    <a href="<? echo $linkeditL_url;?>" class="btn btn-mini btn-danger btn-block">Edit</a>
                                                                    <a href="<? echo $linkviewL_url;?>" class="btn btn-mini btn-danger btn-block">View Report</a>
                                                                    <a href="#" class="btn btn-mini btn-danger btn-block" OnClick="fncOpenPDF(<?echo "'".$checkk1L."'"?>);">Download PDF</a>
                                                                  </ul>
                                                                </div>
                                                                
                                                        <?        
                                                            }
                                                        ?>
                                                </DIV>
                                            </td>
                                            <td>
                                                    <?
                                                       if($point0[0][3]=='R'){
                                                           $wmkR_id = $point0[0][0];
                                                       }else if($point0[0][3]=='L'){
                                                           $wmkL_id = $point0[0][0];
                                                       }
                                                       if($point1[0][3]=='R'){
                                                           $wmkR_id = $point1[0][0];
                                                       }else if($point1[0][3]=='L'){
                                                           $wmkL_id = $point1[0][0];
                                                       }
                                                    ?>
                                                <div class="inline text-center">
                                                    <div class="btn-group">
                                                        <a href="womac_form_followup.php?wmk_id=<?echo $wmkR_id;?>" class="btn btn-mini btn-warning">RT</a>
                                                        <a href="womac_form_followup.php?wmk_id=<?echo $wmkL_id;?>" class="btn btn-mini btn-danger">LT</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <?
                                        break;
                                        case "R":
                                                if($checkR == 0){
                                            ?>
                                                <td>
                                                    <DIV class="inline text-center">
                                                        <a href="<?echo $link_url."R";?>" class="btn btn-mini btn-warning ">K1(RT)</a>
                                                    </DIV>
                                                </td>  
                                                <td>
                                                    <?
                                                       if($point0[0][3]=='R'){
                                                           $wmkR_id = $point0[0][0];
                                                       }else if($point0[0][3]=='L'){
                                                           $wmkL_id = $point0[0][0];
                                                       }
                                                       if($point1[0][3]=='R'){
                                                           $wmkR_id = $point1[0][0];
                                                       }else if($point1[0][3]=='L'){
                                                           $wmkL_id = $point1[0][0];
                                                       }
                                                    ?>
                                                    <div class="inline text-center">
                                                        <div class="btn-group">
                                                            <a href="womac_form_followup.php?wmk_id=<?echo $wmkR_id;?>" class="btn btn-mini btn-warning">RT</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?    
                                                }else{
                                            ?>
                                                <td>
                                                    <DIV class="inline text-center">
                                                        <!--<a href="#" class="btn btn-mini btn-warning ">Report(RT)</a>-->
                                                        <div class="dropdown">
                                                          <a class="dropdown-toggle btn btn-warning btn-mini" data-toggle="dropdown" href="#">View Report RT</a>
                                                          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                            <a href="<? echo $linkeditR_url;?>" class="btn btn-mini btn-warning btn-block">Edit</a>
                                                            <a href="<? echo $linkviewR_url;?>" class="btn btn-mini btn-warning btn-block">View Report</a>
                                                            <a href="#" class="btn btn-mini btn-warning btn-block" OnClick="fncOpenPDF(<?echo "'".$checkk1R."'"?>);">Download PDF</a>
                                                          </ul>
                                                        </div>
                                                    </DIV>
                                                </td>  
                                                <td>
                                                    <?
                                                       if($point0[0][3]=='R'){
                                                           $wmkR_id = $point0[0][0];
                                                       }else if($point0[0][3]=='L'){
                                                           $wmkL_id = $point0[0][0];
                                                       }
                                                       if($point1[0][3]=='R'){
                                                           $wmkR_id = $point1[0][0];
                                                       }else if($point1[0][3]=='L'){
                                                           $wmkL_id = $point1[0][0];
                                                       }
                                                    ?>
                                                    <div class="inline text-center">
                                                        <div class="btn-group">
                                                            <a href="womac_form_followup.php?wmk_id=<?echo $wmkR_id;?>" class="btn btn-mini btn-warning">RT</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?        
                                                }
                                            
                                        break;
                                        case "L":
                                                if($checkL == 0){
                                            ?>
                                                <td>
                                                    <DIV class="inline text-center">
                                                        <a href="<?echo $link_url."L";?>" class="btn btn-mini btn-danger ">K1(LT)</a>
                                                    </DIV>
                                                </td>
                                                <td>
                                                    <?
                                                       if($point0[0][3]=='R'){
                                                           $wmkR_id = $point0[0][0];
                                                       }else if($point0[0][3]=='L'){
                                                           $wmkL_id = $point0[0][0];
                                                       }
                                                       if($point1[0][3]=='R'){
                                                           $wmkR_id = $point1[0][0];
                                                       }else if($point1[0][3]=='L'){
                                                           $wmkL_id = $point1[0][0];
                                                       }
                                                    ?>
                                                    <div class="inline text-center">
                                                        <div class="btn-group">
                                                            <a href="womac_form_followup.php?wmk_id=<?echo $wmkL_id;?>" class="btn btn-mini btn-danger">LT</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?      
                                                }else{
                                            ?>
                                                <td>
                                                    <DIV class="inline text-center">
                                                        <!--<a href="#" class="btn btn-mini btn-danger ">Report(LT)</a>-->
                                                        <div class="dropdown">
                                                          <a class="dropdown-toggle btn btn-danger btn-mini" data-toggle="dropdown" href="#">View Report LT</a>
                                                          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                                            <a href="<? echo $linkeditL_url;?>" class="btn btn-mini btn-danger btn-block">Edit</a>
                                                            <a href="<? echo $linkviewL_url;?>" class="btn btn-mini btn-danger btn-block">View Report</a>
                                                            <a href="#" class="btn btn-mini btn-danger btn-block" OnClick="fncOpenPDF(<?echo "'".$checkk1L."'"?>);">Download PDF</a>
                                                          </ul>
                                                        </div>
                                                    </DIV>
                                                </td>
                                                <td>
                                                    <?
                                                       if($point0[0][3]=='R'){
                                                           $wmkR_id = $point0[0][0];
                                                       }else if($point0[0][3]=='L'){
                                                           $wmkL_id = $point0[0][0];
                                                       }
                                                       if($point1[0][3]=='R'){
                                                           $wmkR_id = $point1[0][0];
                                                       }else if($point1[0][3]=='L'){
                                                           $wmkL_id = $point1[0][0];
                                                       }
                                                    ?>
                                                    <div class="inline text-center">
                                                        <div class="btn-group">
                                                            <a href="womac_form_followup.php?wmk_id=<?echo $wmkL_id;?>" class="btn btn-mini btn-danger">LT</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?        
                                                }
                                        break;
                                        default :
                                            ?>
                                                <td>
                                                    <DIV class="inline text-center">
                                                        <a href="#" class="btn btn-mini btn-inverse disabled">Please Create Pre Op. First</a>
                                                    </DIV>
                                                </td>  
                                                <td>
                                                    <div class="inline text-center">
                                                        <a href="#" class="btn btn-mini btn-inverse disabled">Please Create Pre Op. First</a>
                                                    </div>
                                                </td>
                                                        
                                            <?
                                        break;
                                        }
                                    ?>
                                                <!--
                            <td>
                                <div class="inline text-center">
                                    <div class="btn-group">
                                        <a href="womac_form_followup.php" class="btn btn-mini btn-warning">RT</a>
                                        <a href="womac_form_followup.php" class="btn btn-mini btn-danger">LT</a>
                                    </div>
                                    
                                </div>
                            </td>
                                                -->
                        </tr>
                        
    <?      
                        $point0 = array();
                        $point1 = array();
                        $Rp = array();
                        $Lp = array();
            }
        }
                    
                    
    ?>
                </table>
    </div>
  </div>

</body>
</html>
   
<?    
}

include "footer.php";

?>
