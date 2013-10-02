<?php
session_start();
class fncPNP{
    
    private $patientsrow = 0;
    
    function getpatientsrow(){
		return $this->patientsrow;
    }
    function chkHN($HN) {
        $sql_check = "SELECT COUNT(HN) AS CHN FROM patients WHERE HN='$HN'";
        $query_check = mysql_query($sql_check);
        $result_check = mysql_fetch_array($query_check);
        return $result_check;      
    }
    function insertpatients($t1,$t2,$t3,$t4,$t5,$t6,$t7,$t8,$t9,$t10,$t11,$t12,$t13) {
            $sql_hid = "SELECT * FROM hospital where hnamet = '".$t5."'";
            $query_hid = mysql_query($sql_hid);
            $hid = mysql_fetch_array($query_hid);
            
            $name = explode(" ", $t12);
            //echo $name[0]."<br>"; // name
            //echo $name[1]."<br>";; // sname
            
            $sql_opid = "SELECT * FROM operator where name = '".$name[0]."' and sname = '".$name[1]."'";
            $query_opid = mysql_query($sql_opid);
            $opid = mysql_fetch_array($query_opid);
            if($opid[0]==""){
                $operatorid = "999".$_SESSION["hid"];
            }else{
                $operatorid = $opid[0];
            }
               
            $sql_insert = " INSERT INTO patients 
                     (patients_id,HN,AN,name,sname,hospital,b_day,age,sex,weight,height,BMI,operator,textsearch) 
                     VALUES ('', '".$t1."','".$t2."','".$t3."','".$t4."','".$hid[0]."','".$t6."','".$t7."','".$t8."','".$t9."','".$t10."','".$t11."','".$operatorid."','".$t13."');";
            //echo $sql_insert;
            mysql_query($sql_insert);
    }
    function getpatients($hid,$search) {
        if(ereg("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})",$search,$time)){
                //print_r($time);
                $years=$time[0];
                if((int)$years > 2400){
                    $years -= 543;
                    $search = $years."-".$time[2]."-".$time[3];
                }
                
                $txtsearch=" AND b_day LIKE '%".$search."%'";
                echo $search;
        }else{
            if($search==""){
                $search=" ";
            }else{
                $txtsearch=" AND textsearch LIKE '%".$search."%'";
            }
        }
        
        
        $sql = "SELECT *
                FROM patients, operator, hospital
                WHERE operator.hid =  '".$hid."'
                AND operator.id = patients.operator
                AND hospital.hid = patients.hospital".$txtsearch;
        //echo $sql;
        $query = mysql_query($sql);
        $patientsrow = mysql_num_rows($query);
        $this->patientsrow = $patientsrow;
        $i=0;
        while($k1_search = mysql_fetch_array($query)){
			for($j=0;$j<=22;$j++)
				$array[$i][$j] = $k1_search[$j];
			$i++;
	}
	return $array;
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
    function gethospital($hid){
        $sql = "SELECT * FROM  hospital WHERE hid =  '".$hid."';";
        $query = mysql_query($sql);
        $list = mysql_fetch_array($query);
        return $list;
    }
    function getoperator($id){
        $sql = "SELECT * FROM  operator WHERE id =  '".$id."';";
        $query = mysql_query($sql);
        $list = mysql_fetch_array($query);
        return $list;
    }
    function getOpHistory($hn) {
        $sql = "SELECT * FROM womac_knee_form where hn = '".$hn."';";
        $query = mysql_query($sql);
        $Opcount = mysql_num_rows($query);
        $this->patientsrow = $Opcount;
        $i=0;
        while($kkk = mysql_fetch_array($query)){
                for($j=0;$j<=44;$j++){
                        $total[$i][$j] = $kkk[$j];
                }
                $i++;
        }
        return $total;            
    }

    
}
?>
