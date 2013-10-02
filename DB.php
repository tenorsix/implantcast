<?php
session_start();
/*if ($_SESSION["id"]=="" || $_SESSION["pass"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
}*/

class pdffunction{
	

	private $dbhost = "localhost";
	private $dbuser = "root";	
	private $dbpassword = "root";
	private $dbname = "pajacv2";
	private $errmsg = "";
	private $rs = "";
	private $numrow = 0;
//	private $dbhost = "203.150.228.114";
//	private $dbuser = "pajac2013v2";	
//	private $dbpassword = "pajac2013";
//	private $dbname = "pajac_betav2";
//	private $errmsg = "";
//	private $rs = "";
//	private $numrow = 0;

	function connect(){
		mysql_connect($this->dbhost,$this->dbuser,$this->dbpassword)or die($this->errmsg = "can't connect DB Host");
		mysql_select_db($this->dbname)or die($this->errmsg = "can't connect to logintest");
		mysql_query("SET character_set_results=utf8");
		mysql_query("SET character_set_client=utf8");
		mysql_query("SET character_set_connection=utf8");
		//echo "connect\n";
}

function searchforedit_k1($k1number){
		$sqlsearch = "select * 
                    from k1_form,hospital,diagnosis,brand,user 
                    where k1_form.k1number = '".$k1number."' 
                    and k1_form.hid = hospital.hid
                    and k1_form.diagnosis = diagnosis.Diagnosis_id
                    and k1_form.implant_used = brand.brand_id
                    and k1_form.signature = user.Uid";
		//echo $sqlsearch."<br>";
		$answerr = mysql_query($sqlsearch);
		$k1_search = mysql_fetch_array($answerr);
		
		return $k1_search;
}
function getchadate($date) {
                    //echo $date;
                    $YY = substr($date,0,4)+543;
                    $MM = substr($date,5,2);
                    switch ($MM) {
                    case '01': $MM = "มกราคม";
                        break;
                    case '02':$MM = "กุมภาพันธ์";
                        break;
                    case '03':$MM = "มีนาคม";
                        break;
                    case '04':$MM = "เมษายน";
                        break;
                    case '05':$MM = "พฤษภาคม";
                        break;
                    case '06':$MM = "มิถุนายน";
                        break;
                    case '07':$MM = "กรกฎาคม";
                        break;
                    case '08':$MM = "สิงหาคม";
                        break;
                    case '09':$MM = "กันยายน";
                        break;
                    case '10':$MM = "ตุลาคม";
                        break;
                    case '11':$MM = "พฤศจิกายน";
                        break;
                    case '12':$MM = "ธันวาคม";
                        break;

                    }
                    $DD = substr($date,8,2);
                    switch ($DD) {
                    case '01': $DD = "1";
                        break;
                    case '02':$DD = "2";
                        break;
                    case '03':$DD = "3";
                        break;
                    case '04':$DD = "4";
                        break;
                    case '05':$DD = "5";
                        break;
                    case '06':$DD = "6";
                        break;
                    case '07':$DD = "7";
                        break;
                    case '08':$DD = "8";
                        break;
                    case '09':$DD = "9";
                        break;
                    default :$DD = $DD;
                        break;
                    }
                    $txtdate = $DD." ".$MM." ".$YY;
                    
                    
                    return $txtdate;
                }
    function chkBilateral($hn){
                    $sqlsearch = "select * from k1_form
                        where k1_form.hn = '".$hn."';";
                    //echo $sqlsearch."<br>";
                    $answerr = mysql_query($sqlsearch);
                    $num = mysql_num_rows($answerr);
                    return $num;
            }    




            function getpatientsinfo($hn) {
                $sql = "SELECT * FROM patients where hn =".$hn;
                $query = mysql_query($sql);
                $i=0;
                while($k1_search = mysql_fetch_array($query)){
                                for($j=0;$j<=12;$j++)
                                        $array[$i][$j] = $k1_search[$j];
                                $i++;
                }
                return $array;
            }
     }
?>