<?
session_start();
include "../ConnectDB.php";
include "fnc.php";
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?>Please Login<br><input type="button" name="btnClose" value="Close" OnClick="window.close();"><?
}else{
    
    
    
        $DB = new ConnectDB();
	$DB->connect();
        
        $getlist = new fncPNP();
        $listpop = $getlist->getpatientsinfo($_GET['hn']);
        $hospital = $getlist->gethospital($listpop[0][5]);
        
        //print_r($hospital);
        //print_r($listpop);
        $visit = array("Pre Op.","6 wk","3 mo","6 mo","1 yr","2 yr","3 yr","4 yr","5 yr","6 yr","7 yr","8 yr","9 yr","10 yr","11 yr","12 yr","13 yr","14 yr","15 yr");
        
              $getWMK = $DB->getwomacid($_GET['hn']);
              $getWMKrow = $DB->getwomacrow($_GET['hn']);
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
              //chekpoint
              for($count=0;$count<=18;$count++){
                  if($point0[$count][3]=='R'){
                    switch ($point0[$count][1]) {
                        case '0' :$Rp[0] =$point0[$count][2];break;
                        case '1' :$Rp[1] =$point0[$count][2];break;
                        case '2' :$Rp[2] =$point0[$count][2];break;
                        case '3' :$Rp[3] =$point0[$count][2];break;
                        case '4' :$Rp[4] =$point0[$count][2];break;
                        case '5' :$Rp[5] =$point0[$count][2];break;
                        case '6' :$Rp[6] =$point0[$count][2];break;
                        case '7' :$Rp[7] =$point0[$count][2];break;
                        case '8' :$Rp[8] =$point0[$count][2];break;
                        case '9' :$Rp[9] =$point0[$count][2];break;
                        case '10':$Rp[10]=$point0[$count][2];break;
                        case '11':$Rp[11]=$point0[$count][2];break;
                        case '12':$Rp[12]=$point0[$count][2];break;
                        case '13':$Rp[13]=$point0[$count][2];break;
                        case '14':$Rp[14]=$point0[$count][2];break;
                        case '15':$Rp[15]=$point0[$count][2];break;
                        case '16':$Rp[16]=$point0[$count][2];break;
                        case '17':$Rp[17]=$point0[$count][2];break;
                        case '18':$Rp[18]=$point0[$count][2];break;
                    }
                  }else if($point0[$count][3]=='L'){
                      switch ($point0[$count][1]) {
                        case '0' :$Lp[0] =$point0[$count][2];break;
                        case '1' :$Lp[1] =$point0[$count][2];break;
                        case '2' :$Lp[2] =$point0[$count][2];break;
                        case '3' :$Lp[3] =$point0[$count][2];break;
                        case '4' :$Lp[4] =$point0[$count][2];break;
                        case '5' :$Lp[5] =$point0[$count][2];break;
                        case '6' :$Lp[6] =$point0[$count][2];break;
                        case '7' :$Lp[7] =$point0[$count][2];break;
                        case '8' :$Lp[8] =$point0[$count][2];break;
                        case '9' :$Lp[9] =$point0[$count][2];break;
                        case '10':$Lp[10]=$point0[$count][2];break;
                        case '11':$Lp[11]=$point0[$count][2];break;
                        case '12':$Lp[12]=$point0[$count][2];break;
                        case '13':$Lp[13]=$point0[$count][2];break;
                        case '14':$Lp[14]=$point0[$count][2];break;
                        case '15':$Lp[15]=$point0[$count][2];break;
                        case '16':$Lp[16]=$point0[$count][2];break;
                        case '17':$Lp[17]=$point0[$count][2];break;
                        case '18':$Lp[18]=$point0[$count][2];break;
                    }
                  }
                  if($point1[$count][3]=='R'){
                    switch ($point1[$count][1]) {
                        case '0' :$Rp[0] =$point1[$count][2];break;
                        case '1' :$Rp[1] =$point1[$count][2];break;
                        case '2' :$Rp[2] =$point1[$count][2];break;
                        case '3' :$Rp[3] =$point1[$count][2];break;
                        case '4' :$Rp[4] =$point1[$count][2];break;
                        case '5' :$Rp[5] =$point1[$count][2];break;
                        case '6' :$Rp[6] =$point1[$count][2];break;
                        case '7' :$Rp[7] =$point1[$count][2];break;
                        case '8' :$Rp[8] =$point1[$count][2];break;
                        case '9' :$Rp[9] =$point1[$count][2];break;
                        case '10':$Rp[10]=$point1[$count][2];break;
                        case '11':$Rp[11]=$point1[$count][2];break;
                        case '12':$Rp[12]=$point1[$count][2];break;
                        case '13':$Rp[13]=$point1[$count][2];break;
                        case '14':$Rp[14]=$point1[$count][2];break;
                        case '15':$Rp[15]=$point1[$count][2];break;
                        case '16':$Rp[16]=$point1[$count][2];break;
                        case '17':$Rp[17]=$point1[$count][2];break;
                        case '18':$Rp[18]=$point1[$count][2];break;
                    }
                  }else if($point1[$count][3]=='L'){
                      switch ($point1[$count][1]) {
                        case '0' :$Lp[0] =$point1[$count][2];break;
                        case '1' :$Lp[1] =$point1[$count][2];break;
                        case '2' :$Lp[2] =$point1[$count][2];break;
                        case '3' :$Lp[3] =$point1[$count][2];break;
                        case '4' :$Lp[4] =$point1[$count][2];break;
                        case '5' :$Lp[5] =$point1[$count][2];break;
                        case '6' :$Lp[6] =$point1[$count][2];break;
                        case '7' :$Lp[7] =$point1[$count][2];break;
                        case '8' :$Lp[8] =$point1[$count][2];break;
                        case '9' :$Lp[9] =$point1[$count][2];break;
                        case '10':$Lp[10]=$point1[$count][2];break;
                        case '11':$Lp[11]=$point1[$count][2];break;
                        case '12':$Lp[12]=$point1[$count][2];break;
                        case '13':$Lp[13]=$point1[$count][2];break;
                        case '14':$Lp[14]=$point1[$count][2];break;
                        case '15':$Lp[15]=$point1[$count][2];break;
                        case '16':$Lp[16]=$point1[$count][2];break;
                        case '17':$Lp[17]=$point1[$count][2];break;
                        case '18':$Lp[18]=$point1[$count][2];break;
                    }
                  }
              }
              
              include './call_framework.php';
?>
    <form name="frmMain" action="" method="post">
         <div class="span5">
             <center><h1>Patient information</h1></center>
                  <?
                    //age
                    if($listpop[0][7]==0){ $age = "#n/a";
                    }else{ $age =$listpop[0][7]; }
                    //Weight
                    if($listpop[0][9]==0){ $Weight = "#n/a";
                    }else{ $Weight =$listpop[0][9]; }
                    //height
                    if($listpop[0][10]==0){ $Height = "#n/a";
                    }else{ $Height =$listpop[0][10]; }
                    //BMI
                    if($listpop[0][11]==0){ $BMI = "#n/a";
                    }else{ $BMI =$listpop[0][11]; }
                    //Operator
                    if(substr($listpop[0][12],0,3)=="999"){ $operator = " - ";
                    }else{ 
                        $operator = $getlist->getoperator($listpop[0][12]);
                    }
                  ?>  
                  <h3>HN : <?echo $_GET['hn'];?> &nbsp;&nbsp;&nbsp;Hospital : <?echo $hospital[1];?></h3>
                  <h5>Name : <?echo $listpop[0][3]."  ".$listpop[0][4];?> Age : <?echo $age;?></h5>
                  <h5>Sex  : <?echo $listpop[0][8];?> Weight : <?echo $Weight;?> Height : <?echo $Height;?></h5>
                  <h5>BMI  : <?echo $BMI;?></h5>
                  <h5>Operator  : <?echo $operator[1]." ".$operator[2];?></h5>

                  <h3 class="text-center">Visit Point</h3>
         </div>

          <div class="container-fluid">
              <div class="row-fluid">
                <div class="span2">
                  <!--Sidebar content-->
                </div>
                <div class="span8">
                  <table class="table table-bordered table-condensed table-hover">
                      <tr>
                          <td rowspan="2">
                              <div class="inline  text-center">
                                  <h3>Visit Time</h3>
                              </div>
                          </td>
                          <td colspan="2" >
                              <div class="inline text-center">
                                  <h4>TKA</h4>
                              </div>
                          </td>
                          <td colspan="2">
                              <div class="inline text-center">
                                  <h4>HIP</h4>
                              </div>
                          </td>
                      </tr>
                      <tr>    
                          <td>
                              <div class="inline text-center text-warning">
                                  <h4>RT</h4>
                              </div>
                          </td>
                          <td>
                              <div class="inline text-center text-error">
                                  <h4>LT</h4>
                              </div>
                          </td>
                          <td>
                              <div class="inline text-center text-warning">
                                  <h4>RT</h4>
                              </div>
                          </td>
                          <td>
                              <div class="inline text-center text-error">
                                  <h4>LT</h4>
                              </div>
                          </td>
                      </tr>
                          <?
                                  for($l=0;$l<=18;$l++){
                                               $Rclass = " text-warning";
                                               $Lclass = " text-error";
                                               if($Rp[$l] == ""){
                                                   $Rp[$l]=0;
                                                   $Rclass =" muted";
                                               }
                                               if($Lp[$l] == ""){
                                                   $Lp[$l]=0;
                                                   $Lclass = " muted";
                                               }
                                               //$text = printf("[%-'-10s]",  $visit[$l]);
                                               //echo "<br>".$visit[$l]."--- RT = ".$Rp[$l]." || --- LT = ".$Lp[$l];
                                               ?>
                                              <tr>
                                                  <td>
                                                      <div class='inline text-center'>
                                                          <h6><?echo $visit[$l]?></h6>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="inline text-center<?echo $Rclass?>">
                                                          <h6><?echo $Rp[$l]?></h6>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class="inline text-center<?echo $Lclass?>">
                                                          <h6><?echo $Lp[$l]?></h6>
                                                      </div>
                                                  </td> 
                                                  <td>
                                                      <div class='inline text-center muted'>
                                                          <h6>-</h6>
                                                      </div>
                                                  </td>
                                                  <td>
                                                      <div class='inline text-center muted'>
                                                          <h6>-</h6>
                                                      </div>
                                                  </td>
                                              </tr>    





                                               <?
                                  }

                          ?>
                      <tr>
                          <td colspan="5">
                              <div class="inline text-center">
                                  <input type="button" class="btn btn-large btn-inverse" name="btnClose" value="Close" OnClick="window.close();">
                              </div>
                          </td>
                      </tr>
            </table>
                </div>
              </div>
          </div>
    </form>



<?

}
?>