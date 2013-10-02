<?php
class ConnectDB{
	private $dbhost = "localhost";
	private $dbuser = "root";	
	private $dbpassword = "root";
	private $dbname = "pajacv2";
	private $errmsg = "";
	private $rs = "";
	private $numrow = 0;
//        private $dbhost = "203.150.228.114";
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
        function sqlclose() {
                mysql_close();
        }
	function login($u,$p){
		$sql = "select * from user where id = '".$u."' and pass = '".$p."';";
		$rs = mysql_query($sql);
		$rowuser = mysql_fetch_array($rs);
		//echo "num rows".mysql_num_rows($rs);
		if(mysql_num_rows($rs)==0){
			return false;
		}else{
			return true;
		}
	}
	function getname($uuu,$ppp){
		$sqlquery = "select * from user where id = '".$uuu."' and pass = '".$ppp."';";
		//echo "\n".$sqlquery."\n";
		$result = mysql_query($sqlquery);
		//echo mysql_num_rows($result);
		$rowuser = mysql_fetch_array($result);
		return $rowuser;
	}
        function getusername($id){
		$sqlquery = "select * from user where Uid = '".$id."';";
		//echo "\n".$sqlquery."\n";
		$result = mysql_query($sqlquery);
		//echo mysql_num_rows($result);
		$rowuser = mysql_fetch_array($result);
		return $rowuser;
	}
	function geterrmsg(){
		return $this->errmsg;
	}
        function getopid($name,$sname) {
                $sql_id = "SELECT * FROM operator where name = '".$name."' and sname = '".$sname."'";
                $query_id = mysql_query($sql_id);
                $id = mysql_fetch_array($query_id); 
                return $id[0];
        }
	function insertk1($txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7,$txt8,$txt9,$txt10,$txt11,$txt12,$txt13,$txt14,$txt15,$txt16,$txt17,$txt18,$txt19,$txt20,
                $txt21,$txt22,$txt23,$txt24,$txt25,$txt26,$txt27,$txt28,$txt29,$txt30,$txt31,$txt32,$txt33,$txt34,$txt35,$txt36,$txt37,$txt38,$txt39,$txt40,
                $txt41,$txt42,$txt43,$txt44,$txt45,$txt46,$txt47,$txt48,$txt49,$txt50,$txt51,$txt52,$txt53,$txt54,$txt55,$txt56,$txt57,$txt58,$txt59,$txt60,
                $txt61,$txt62,$txt63,$txt64,$txt65,$txt66,$txt67,$txt68,$txt69,$txt70,$txt71,$txt72,$txt73,$txt74,$txt75,$txt76,$txt77,$txt78){

		$txt5 = (int)$txt5;
		$txt36 = (int)$txt36;
		$txt5 += 1;
		$txt36 += 1;
                
		$hospital = "select hid from hospital where hnamet LIKE '%".$txt3."%';";
		$ans = mysql_query($hospital);
		$total = mysql_fetch_array($ans);
		$txt3 = $total[0];

		$sqlinsert = "insert into k1_form values ('".$txt1."','".$txt2."','".$txt3."','".$txt4."','".$txt5."
		','".$txt6."','".$txt7."','".$txt8."','".$txt9."','".$txt10.
		"','".$txt11."','".$txt12."','".$txt13."','".$txt14."','".$txt15."
		','".$txt16."','".$txt17."','".$txt18."','".$txt19."','".$txt20."','".$txt21."
		','".$txt22."','".$txt23."','".$txt24."','".$txt25."','".$txt26."','".$txt27."
		','".$txt28."','".$txt29."','".$txt30."','".$txt31."','".$txt32."','".$txt33."
		','".$txt34."','".$txt35."','".$txt36."','".$txt37."','".$txt38."','".$txt39."
		','".$txt40."','".$txt41."','".$txt42."','".$txt43."','".$txt44."','".$txt45."
		','".$txt46."','".$txt47."','".$txt48."','".$txt49."','".$txt50."','".$txt51."
		','".$txt52."','".$txt53."','".$txt54."','".$txt55."','".$txt56."','".$txt57."
		','".$txt58."','".$txt59."','".$txt60."','".$txt61."','".$txt62."','".$txt63."
		','".$txt64."','".$txt65."','".$txt66."','".$txt67."','".$txt68."','".$txt69."
		','".$txt70."','".$txt71."','".$txt72."','".$txt73."','".$txt74."','".$txt75."
		','".$txt76."','".$txt77."','".$txt78."');";

		//echo $sqlinsert;

		mysql_query($sqlinsert);
	}
        function checkk1($hn,$side) {
            switch ($side) {
                case 'R':
                        $numside = 1;
                    break;
                case 'L':
                        $numside = 2;
                    break;
                default:
                        $numside = 1;
                    break;
            }
                
            
                $sqlsearch = "select * from k1_form where hn = '".$hn."' and side =".$numside.";";
		//echo $sqlsearch;
		$answerr = mysql_query($sqlsearch);
		$num = mysql_num_rows($answerr);
		$this->numrow = $num;
		$i=0;
		/*while($k1_search = mysql_fetch_array($answerr)){
			$array[$i] = $k1_search[$i];
			$i++;
		}*/
                $k1_search = mysql_fetch_array($answerr);
                $k1id = $k1_search[0];
		return $k1id; 
            
        }
	function searchk1($operator,$switch){
                
		$sqlsearch = "select * from k1_form where signature = '".$operator."' ".$switch.";";
		//echo $sqlsearch;
		$answerr = mysql_query($sqlsearch);
		$num = mysql_num_rows($answerr);
		$this->numrow = $num;
		$i=0;
		while($k1_search = mysql_fetch_array($answerr)){
			for($j=0;$j<=77;$j++)
				$array[$i][$j] = $k1_search[$j];
			$i++;
		}
		return $array;
	}
	/*function searchh1($operator,$switch){
		$sqlsearch = "select * from h1_form where signature = '".$operator."' ".$switch.";";
		//echo $sqlsearch;
		$answerr = mysql_query($sqlsearch);
		$num = mysql_num_rows($answerr);
		$this->numrow = $num;
		$i=0;
		while($k1_search = mysql_fetch_array($answerr)){
			for($j=0;$j<=79;$j++)
				$array[$i][$j] = $k1_search[$j];
			$i++;
		}
		return $array;
	}*/

	function chkBilateral($hn){
		$sqlsearch = "select * from k1_form
                    where k1_form.hn = '".$hn."';";
		//echo $sqlsearch."<br>";
		$answerr = mysql_query($sqlsearch);
		$num = mysql_num_rows($answerr);
		return $num;
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
	function pdfform($k,$o){
		$sql = "select * from k1_form where k1number = '".$k."' and signature = '".$o."';";
		//echo $sql;
		$rs = mysql_query($sql);
		$num = mysql_num_rows($rs);
		$this->numrow = $num;
		$rss = mysql_fetch_array($rs);
		return $rss;
	}
	function pdfform1($k,$o){
		$sql = "select * from h1_form where h1number = '".$k."' and signature = '".$o."';";
		//echo $sql;
		$rs = mysql_query($sql);
		$num = mysql_num_rows($rs);
		$this->numrow = $num;
		$rss = mysql_fetch_array($rs);
		return $rss;
	}
	function getnumrow(){
		return $this->numrow;
	}
        
	function getUid($i,$p){
		$sql = "select Uid from user where id = '".$i."' and pass = '".$p."';";
		$Ui = mysql_query($sql);
		$Uid = mysql_fetch_array($Ui);
		return $Uid["Uid"];
	}
	function getNameHospital(){
		$sql = "select * from hospital;";
		$nameHospital = mysql_query($sql);
		//$name = mysql_fetch_array($nameHospital);
		$rob = mysql_num_rows($nameHospital);
		$this->numrow = $rob;
		$i=0;
		while($aaa = mysql_fetch_array($nameHospital)){
			for($j=0;$j<=2;$j++)
				$array[$i][$j] = $aaa[$j];
			$i++;
		}
		return $array;
	}
	/*function inserth1(	$txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7,$txt8,$txt9,$txt10,$txt11,$txt12,$txt13,$txt14,$txt15,$txt16,$txt17,$txt18,$txt19,$txt20,
						$txt21,$txt22,$txt23,$txt24,$txt25,$txt26,$txt27,$txt28,$txt29,$txt30,$txt31,$txt32,$txt33,$txt34,$txt35,$txt36,$txt37,$txt38,$txt39,$txt40,
						$txt41,$txt42,$txt43,$txt44,$txt45,$txt46,$txt47,$txt48,$txt49,$txt50,$txt51,$txt52,$txt53,$txt54,$txt55,$txt56,$txt57,$txt58,$txt59,$txt60,
						$txt61,$txt62,$txt63,$txt64){

		$sqlinsert = "insert into h1_form values ('".$txt1."','".$txt2."','".$txt3."','".$txt4."','".$txt5."
		','".$txt6."','".$txt7."','".$txt8."','".$txt9."','".$txt10.
		"','".$txt11."','".$txt12."','".$txt13."','".$txt14."','".$txt15."
		','".$txt16."','".$txt17."','".$txt18."','".$txt19."','".$txt20."','".$txt21."
		','".$txt22."','".$txt23."','".$txt24."','".$txt25."','".$txt26."','".$txt27."
		','".$txt28."','".$txt29."','".$txt30."','".$txt31."','".$txt32."','".$txt33."
		','".$txt34."','".$txt35."','".$txt36."','".$txt37."','".$txt38."','".$txt39."
		','".$txt40."','".$txt41."','".$txt42."','".$txt43."','".$txt44."','".$txt45."
		','".$txt46."','".$txt47."','".$txt48."','".$txt49."','".$txt50."','".$txt51."
		','".$txt52."','".$txt53."','".$txt54."','".$txt55."','".$txt56."','".$txt57."
		','".$txt58."','".$txt59."','".$txt60."','".$txt61."','".$txt62."','".$txt63."
		','".$txt64."');";
		mysql_query($sqlinsert);
	}*/
	function editk1(
                $txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7,$txt8,$txt9,$txt10,
                $txt11,$txt12,$txt13,$txt14,$txt15,$txt16,$txt17,$txt18,$txt19,$txt20,
                $txt21,$txt22,$txt23,$txt24,$txt25,$txt26,$txt27,$txt28,$txt29,$txt30,
                $txt31,$txt32,$txt33,$txt34,$txt35,$txt36,$txt37,$txt38,$txt39,$txt40,
                $txt41,$txt42,$txt43,$txt44,$txt45,$txt46,$txt47,$txt48,$txt49,$txt50,
                $txt51,$txt52,$txt53,$txt54,$txt55,$txt56,$txt57,$txt58,$txt59,$txt60,
                $txt61,$txt62,$txt63,$txt64,$txt65,$txt66,$txt67,$txt68,$txt69,$txt70,
                $txt71,$txt72,$txt73,$txt74,$txt75,$txt76,$txt77,$txt78,$txt79){
            
                $sql = "UPDATE k1_form SET 
                    op_date ='".$txt4."'
                    ,diagnosis ='".$txt5."'
                    ,otka_css ='".$txt7."'
                    ,otkka_mis ='".$txt8."'
                    ,otka_con ='".$txt9."'
                    ,otka_psi ='".$txt10."'
                    ,operator ='".$txt11."'
                    ,ass1 ='".$txt12."'
                    ,ass2 ='".$txt13."'
                    ,ass3 ='".$txt14."'
                    ,anesthetist ='".$txt15."'
                    ,ins_nurse ='".$txt16."'
                    ,anesthesia ='".$txt17."'
                    ,cir_nurse ='".$txt18."'  
                    ,operation_start ='".$txt19."'
                    ,operation_finish ='".$txt20."'        
                    ,tourniquet_status ='".$txt21."'
                    ,caseon_mmhg ='".$txt22."'
                    ,caseon_min ='".$txt23."'
                    ,1oa ='".$txt24."'
                    ,onn ='".$txt25."'
                    ,ra ='".$txt26."'
                    ,post_traumatic ='".$txt27."'
                    ,post_hto ='".$txt28."'
                    ,oijd ='".$txt29."'
                    ,preop_rom ='".$txt30."'
                    ,varus_valgus_status ='".$txt31."'
                    ,degree ='".$txt32."'
                    ,prosthesis_f ='".$txt33."'
                    ,prosthesis_t ='".$txt34."'
                    ,prosthesis_p ='".$txt35."'
                    ,implant_used ='".$txt36."'
                    ,gap ='".$txt37."'         
                    ,measurement ='".$txt38."'
                    ,combine ='".$txt39."'
                    ,medial_para ='".$txt40."'
                    ,midvastus ='".$txt41."'
                    ,quad_spearing ='".$txt42."'
                    ,subvastus ='".$txt43."'
                    ,lateral_para ='".$txt44."'
                    ,itf ='".$txt45."'
                    ,first_bone_cut ='".$txt46."'
                    ,pie_crusting ='".$txt47."'
                    ,additional_bone_cut ='".$txt48."'
                    ,down_sizing ='".$txt49."'
                    ,em ='".$txt50."'   
                    ,el ='".$txt51."'
                    ,fm ='".$txt52."'
                    ,fl ='".$txt53."'
                    ,ce ='".$txt54."'
                    ,oste ='".$txt55."'                        
                    ,facetectomy ='".$txt56."'
                    ,resurfacing ='".$txt57."'
                    ,size ='".$txt58."'
                    ,thickness = '-'
                    ,augmentation ='".$txt60."'
                    ,aug_tibia ='".$txt61."'
                    ,aug_tibia_ch ='".$txt62."'
                    ,aug_femur ='".$txt63."'
                    ,aug_femur_ch ='".$txt64."'
                    ,femoral_not ='".$txt65."'
                    ,papl ='".$txt66."'
                    ,capl ='".$txt67."'
                    ,pf ='".$txt68."'
                    ,ff ='".$txt69."'
                    ,tf ='".$txt70."'
                    ,torn ='".$txt71."'
                    ,none ='".$txt72."'
                    ,com_mana ='".$txt73."'
                    ,add_pro ='".$txt74."'
                    ,blood_loss ='".$txt75."'    
                    ,sponge_count ='".$txt78."'
                    where k1number = '".$txt1."';";
		//echo "**".$sql."**";
		mysql_query($sql);
		
	}
        function AddNewArticle($aticle_head,$aticle_picture,$aticle_subhead,$aticle_text) {
                $sql = "INSERT INTO `aticle` (`aticle_id`, `aticle_head`, `aticle_picture`, `aticle_subhead`, `aticle_text`) 
                    VALUES ('', '".$aticle_head."', '".$aticle_picture."', '".$aticle_subhead."', '".$aticle_text."');";
                //echo "<br>".$sql;
		mysql_query($sql);
            
        }
        function EditArticle($aticle_id,$aticle_head,$aticle_picture,$aticle_subhead,$aticle_text) {
                $sql = "UPDATE aticle SET 
                    aticle_head = '".$aticle_head."',
                    aticle_picture = '".$aticle_picture."',
                    aticle_subhead = '".$aticle_subhead."',
                    aticle_text ='".$aticle_text."'
                    where aticle_id = '".$aticle_id."'";
                //echo "<br>".$sql;
		$ans = mysql_query($sql);
            
        }
        function getAllArticle($text) {
                if($text == ""){
                    $text = "1";
                }
                $sql = "select * from aticle where ".$text.";";
                $answerr = mysql_query($sql);
		$num = mysql_num_rows($answerr);
		$this->numrow = $num;
		$i=0;
		while($AllArticle = mysql_fetch_array($answerr)){
			for($j=0;$j<=4;$j++)
				$array[$i][$j] = $AllArticle[$j];
			$i++;
		}
               
		return $array;
            
        }
        function search_womac($text,$text2){
		$sqlsearchtxt = "select * from womac_knee_form where ".$text." ".$text2.";";
		//echo $sqlsearchtxt;
                $answerrtxt = mysql_query($sqlsearchtxt);
		$numwomac = mysql_num_rows($answerrtxt);
		$this->numrow = $numwomac;
		$i=0;
                while($womac_search = mysql_fetch_array($answerrtxt)){
			for($j=0;$j<=44;$j++)
				$arraywomac[$i][$j] = $womac_search[$j];
			$i++;
		}
		return $arraywomac;
	}
        function getwomacid($hn){
		$sqlsearchtxt = "select * from womac_knee_form where hn = ".$hn.";";
		//echo $sqlsearchtxt;
                $answerrtxt = mysql_query($sqlsearchtxt);
		$i=0;
                while($womac_search = mysql_fetch_array($answerrtxt)){
			
			$arraywomac[$i] = $womac_search[0];
			$i++;
		}
		return $arraywomac;
	}
        function getwomacrow($hn){
		$sqlsearchtxt = "select * from womac_knee_form where hn = ".$hn.";";
		//echo $sqlsearchtxt;
                $answerrtxt = mysql_query($sqlsearchtxt);
		$numwomac = mysql_num_rows($answerrtxt);
		
		return $numwomac;
	}
	function AddVisitPoint($womac_id,$visit,$point){
		$sql = "INSERT INTO `visit_point` (`womac_id`, `visit`, `point`) VALUES ('".$womac_id."', '".$visit."', '".$point."');";
                //echo "<br>".$sql;
		mysql_query($sql);
	}
        function Checkvisitpoitn($womac_id,$visit){
		$sql = "SELECT * FROM  visit_point WHERE womac_id = '".$womac_id."' and visit = '".$visit."'";
                $answerrtxt = mysql_query($sql);
                $numwomac = mysql_num_rows($answerrtxt);
                return $numwomac;
	}
        function Editvisitpoint($womac_id,$visit,$point){
                $sql = "UPDATE visit_point
                    SET point = '".$point."'
                    WHERE womac_id = '".$womac_id."' 
                    AND visit = '".$visit."'";
                //echo $sql;
                $ans = mysql_query($sql);
        }
        function getvisitpoint($wmkid){
		$sql = "SELECT visit_point.womac_id, visit_point.visit, visit_point.point, womac_knee_form.side
                    FROM womac_knee_form, visit_point
                    WHERE visit_point.womac_id = '".$wmkid."'
                    AND visit_point.womac_id = womac_knee_form.womac_id ORDER BY visit_point.visit;";
                
		//echo $sql;
                $ans = mysql_query($sql);
                $i=0;
		while($r = mysql_fetch_array($ans)){
			for($j=0;$j<=3;$j++){
				$point[$i][$j] = $r[$j];
                        }
			$i++;
		}
		return $point;
	}
	function AddWomac($txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7,$txt8,$txt9,$txt10,$txt11,$txt12,$txt13,$txt14,$txt15,$txt16,$txt17,$txt18,$txt19,$txt20,
						$txt21,$txt22,$txt23,$txt24,$txt25,$txt26,$txt27,$txt28,$txt29,$txt30,$txt31,$txt32,$txt33,$txt34,$txt35,$txt36,$txt37,$txt38,$txt39,$txt40,
						$txt41,$txt42,$txt43,$txt44,$txt45){
		$kkk = "INSERT INTO `womac_knee_form` (`womac_id`, `date`, `name`, `hn`, `age`, `sex`, `weight`, `Height`, `BMI`, `side`, `visit`, `valgus_varus_dg`, `dg`, `implant`, `cfemur`, `ctibial`, `implant_design`, `posterior_design`, `com_assist`, `f1`, `f2`, `f3`, `f4`, `f5`, `f6`, `f7`, `f8`, `f9`, `f10`, `f11`, `f12`, `f13`, `f14`, `f15`, `f16`, `f17`, `f18`, `f19`, `f20`, `f21`, `f22`, `f23`, `f24`, `f25`, `signature`) 
		VALUES ('".$txt1."','".$txt2."','".$txt3."','".$txt4."','".$txt5."','".$txt6."','".$txt7."','".$txt8."','".$txt9."','".$txt10."',
		'".$txt11."','".$txt12."','".$txt13."','".$txt14."','".$txt15."','".$txt16."','".$txt17."','".$txt18."','".$txt19."','".$txt20."',
		'".$txt21."','".$txt22."','".$txt23."','".$txt24."','".$txt25."','".$txt26."','".$txt27."','".$txt28."','".$txt29."','".$txt30."',
		'".$txt31."','".$txt32."','".$txt33."','".$txt34."','".$txt35."','".$txt36."','".$txt37."','".$txt38."','".$txt39."','".$txt40."',
		'".$txt41."','".$txt42."','".$txt43."','".$txt44."','".$txt45."');";
                //echo "<br><br><br>".$sql;
		mysql_query($kkk);
	}
        function updatewomac($txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7,$txt8,$txt9,$txt10,
                        $txt11,$txt12,$txt13,$txt14,$txt15,$txt16,$txt17,$txt18,$txt19,$txt20,
			$txt21,$txt22,$txt23,$txt24,$txt25,$txt26,$txt27,$txt28,$txt29,$txt30,
                        $txt31,$txt32,$txt33,$txt34,$txt35,$txt36,$txt37,$txt38,$txt39,$txt40,
			$txt41,$txt42,$txt43,$txt44,$txt45){

		$sql = "update womac_knee_form set date='".$txt2."'
                    ,name='".$txt3."'
                    ,hn='".$txt4."'
                    ,age='".$txt5."'
                    ,sex='".$txt6."'
                    ,weight='".$txt7."'
                    ,Height='".$txt8."'
                    ,BMI='".$txt9."'
                    ,side='".$txt10."'
                    ,visit='".$txt11."'
                    ,f1='".$txt20."'
                    ,f2='".$txt21."'
                    ,f3='".$txt22."'
                    ,f4='".$txt23."'
                    ,f5='".$txt24."'
                    ,f6='".$txt25."'
                    ,f7='".$txt26."'
                    ,f8='".$txt27."'
                    ,f9='".$txt28."'
                    ,f10='".$txt29."'
                    ,f11='".$txt30."'
                    ,f12='".$txt31."'
                    ,f13='".$txt32."'
                    ,f14='".$txt33."'
                    ,f15='".$txt34."'
                    ,f16='".$txt35."'
                    ,f17='".$txt36."'
                    ,f18='".$txt37."'
                    ,f19='".$txt38."'
                    ,f20='".$txt39."'
                    ,f21='".$txt40."'
                    ,f22='".$txt41."'
                    ,f23='".$txt42."'
                    ,f24='".$txt43."'
                    ,f25='".$txt44."'
                    ,signature='".$txt45."'
		where womac_id = '".$txt1."';";
		mysql_query($sql);
		//echo $sql;
		//return $sqlinsert;
	}
	function getPosition(){
            $sql = "Select * from Position;";
            $ans = mysql_query($sql);
            $numpo = mysql_num_rows($ans);
            $this->numrow = $numpo;
            $i=0;
            while($pos = mysql_fetch_array($ans)){
                $arr[$i][0] = $pos[0];
                $arr[$i][1] = $pos[1];
                $i++;
            }
            return $arr;
        }
        function AddOperator($name,$lname,$position){
            $mysql = "SELECT id FROM operator ORDER BY id DESC;";
            $answer = mysql_query($mysql);
            $kkk = mysql_fetch_array($answer);
            $id = $kkk[0];
            $idd = intval($id) + 1;
            $idd = sprintf("%03d", $idd);
            //echo $idd;
            $sql = "insert into operator value('".$idd."','".$name."','".$lname."','".$position."','2013-06-14');";
            mysql_query($sql);
            //echo "ok";
        }
		function AddNurse($name,$lname,$position){
            $mysql = "SELECT id FROM nurse ORDER BY id DESC;";
            $answer = mysql_query($mysql);
            $kkk = mysql_fetch_array($answer);
            $id = $kkk[0];
            $idd = intval($id) + 1;
            $idd = sprintf("%03d", $idd);
            //echo $idd;
            $sql = "insert into nurse value('".$idd."','".$name."','".$lname."','".$position."');";
            mysql_query($sql);
            //echo "ok";
        }
		function getAllOperator(){
			$sql = "Select * FROM operator ORDER BY id ASC;";
			$ans = mysql_query($sql);
			$i=0;
			while($kkk = mysql_fetch_array($ans)){
				for($j=0;$j<=4;$j++){
					$total[$i][$j] = $kkk[$j];
				}
				$i++;
			}
			return $total;
		}
                function getAllOperatorAutoComplete(){
			$sql = "Select * FROM operator ORDER BY id ASC;";
			$ans = mysql_query($sql);
			$i=0;
			while($kkk = mysql_fetch_array($ans)){
				//for($j=0;$j<=4;$j++){
					$total[$i] = $kkk[1]." ".$kkk[2];
				//}
				$i++;
			}
			return $total;
		}
		function updateOperator($id_,$name_,$lname_,$position_,$date_){
			$sql = "UPDATE  operator SET  name =  '".$name_."',
					sname =  '".$lname_."',
					position =  '".$position_."',
					date =  '".$date_."' 
					WHERE id = '".$id_."';";
					//echo $sql;
			$ans = mysql_query($sql);
		}
		function getAllNurse(){
			$sql = "Select * FROM nurse ORDER BY id ASC;";
			$ans = mysql_query($sql);
			$i=0;
			while($kkk = mysql_fetch_array($ans)){
				for($j=0;$j<=3;$j++){
					$total[$i][$j] = $kkk[$j];
				}
				$i++;
			}
			return $total;
		}
                
                function getAllNurseAutoComplete(){
			$sql = "Select * FROM nurse ORDER BY id ASC;";
			$ans = mysql_query($sql);
			$i=0;
			while($kkk = mysql_fetch_array($ans)){
				//for($j=0;$j<=3;$j++){
					$total[$i] = $kkk[1]." ".$kkk[2];
				//}
				$i++;
			}
                        $sql = "Select * FROM anesthetist ORDER BY id ASC;";
			$ans = mysql_query($sql);
			while($kkk = mysql_fetch_array($ans)){
				//for($j=0;$j<=3;$j++){
					$total[$i] = $kkk[1]." ".$kkk[2];
				//}
				$i++;
			}
                        
                        
			return $total;
		}
                
		function updateNurse($id_,$name_,$lname_,$position_){
			$sql = "UPDATE  nurse SET  name =  '".$name_."',
					sname =  '".$lname_."',
					position =  '".$position_."'
					WHERE id = '".$id_."';";
					//echo $sql;
			$ans = mysql_query($sql);
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
                function getDiagnosis() {
                    $sql = "select * from diagnosis;";
                    $ans = mysql_query($sql);
                    $i=0;
                    while($rs = mysql_fetch_array($ans)){
                            
                            $array[$i] = $rs[1];
                            $i++;
                    }
                    return $array;
                }
                function getDiagnosisname($id) {
                    $sql = "select * from diagnosis where Diagnosis_id = '".$id."';";
                    $ans = mysql_query($sql);
                    $rs = mysql_fetch_array($ans);
                    return $rs;
                }
                function getBrand() {
                    $sql = "select * from brand;";
                    $ans = mysql_query($sql);
                    $i=0;
                    while($rs = mysql_fetch_array($ans)){
                            
                            $array[$i] = $rs[1];
                            $i++;
                    }
                    return $array;
                }
                function getBrandname($id) {
                    $sql = "select * from brand where brand_id = '".$id."';";
                    $ans = mysql_query($sql);
                    $rs = mysql_fetch_array($ans);
                    return $rs;
                }
	function searchPatienth($hn,$name,$sname,$hospital){
		if($hn=="")$hn=" ";
		if($name=="")$name=" ";
		if($sname=="")$sname=" ";
		if($hospital=="")$hospital=" ";

		$sql = "SELECT * FROM `patients` WHERE 
		`HN` LIKE '%".$hn."%' or 
		`name` LIKE '%".$name."%' or 
		`sname` LIKE '%".$sname."%' or 
		`hospital` LIKE '%".$hospital."%' ;";
		//echo $sql."<br>";
		$ans = mysql_query($sql);
		$i=0;
		while($result = mysql_fetch_array($ans)){
                        for($j=0;$j<=11;$j++){
				$arr[$i][$j] = $result[$j];
			}
			$i++;
                }
		//var_dump($arr);
		return $arr;
	}
	
	
	function insertk2($txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7,$txt8,$txt9,$txt10,$txt11,$txt12,$txt13,$txt14,$txt15,$txt16,$txt17,$txt18,$txt19,$txt20,
                $txt21,$txt22,$txt23,$txt24,$txt25,$txt26,$txt27,$txt28,$txt29,$txt30,$txt31,$txt32,$txt33,$txt34,$txt35,$txt36,$txt37,$txt38,$txt39,$txt40,
                $txt41,$txt42,$txt43,$txt44,$txt45,$txt46,$txt47,$txt48,$txt49,$txt50,$txt51,$txt52,$txt53,$txt54,$txt55,$txt56,$txt57,$txt58,$txt59,$txt60,
                $txt61,$txt62,$txt63,$txt64,$txt65,$txt66,$txt67,$txt68,$txt69,$txt70,$txt71,$txt72,$txt73,$txt74,$txt75,$txt76,$txt77,$txt78,$txt79,$txt80,
				$txt81,$txt82,$txt83,$txt84,$txt85){

		$hospital = "select hid from hospital where hnamet LIKE '%".$txt2."%';";
		$ans = mysql_query($hospital);
		$total = mysql_fetch_array($ans);
		$txt2 = $total[0];		
				
				
				
		$sqlinsert = "insert into k2_form values ('".$txt1."','".$txt2."','".$txt3."','".$txt4."','".$txt5."
		','".$txt6."','".$txt7."','".$txt8."','".$txt9."','".$txt10.
		"','".$txt11."','".$txt12."','".$txt13."','".$txt14."','".$txt15."
		','".$txt16."','".$txt17."','".$txt18."','".$txt19."','".$txt20."','".$txt21."
		','".$txt22."','".$txt23."','".$txt24."','".$txt25."','".$txt26."','".$txt27."
		','".$txt28."','".$txt29."','".$txt30."','".$txt31."','".$txt32."','".$txt33."
		','".$txt34."','".$txt35."','".$txt36."','".$txt37."','".$txt38."','".$txt39."
		','".$txt40."','".$txt41."','".$txt42."','".$txt43."','".$txt44."','".$txt45."
		','".$txt46."','".$txt47."','".$txt48."','".$txt49."','".$txt50."','".$txt51."
		','".$txt52."','".$txt53."','".$txt54."','".$txt55."','".$txt56."','".$txt57."
		','".$txt58."','".$txt59."','".$txt60."','".$txt61."','".$txt62."','".$txt63."
		','".$txt64."','".$txt65."','".$txt66."','".$txt67."','".$txt68."','".$txt69."
		','".$txt70."','".$txt71."','".$txt72."','".$txt73."','".$txt74."','".$txt75."
		','".$txt76."','".$txt77."','".$txt78."','".$txt79."','".$txt80."','".$txt81."
		','".$txt82."','".$txt83."','".$txt84."','".$txt85."');";

		//echo $sqlinsert;
		mysql_query($sqlinsert);
	}
	
	function editk2(
                $txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7,$txt8,$txt9,$txt10,
                $txt11,$txt12,$txt13,$txt14,$txt15,$txt16,$txt17,$txt18,$txt19,$txt20,
                $txt21,$txt22,$txt23,$txt24,$txt25,$txt26,$txt27,$txt28,$txt29,$txt30,
                $txt31,$txt32,$txt33,$txt34,$txt35,$txt36,$txt37,$txt38,$txt39,$txt40,
                $txt41,$txt42,$txt43,$txt44,$txt45,$txt46,$txt47,$txt48,$txt49,$txt50,
                $txt51,$txt52,$txt53,$txt54,$txt55,$txt56,$txt57,$txt58,$txt59,$txt60,
                $txt61,$txt62,$txt63,$txt64,$txt65,$txt66,$txt67,$txt68,$txt69,$txt70,
                $txt71,$txt72,$txt73,$txt74,$txt75,$txt76,$txt77,$txt78,$txt79,$txt80,
				$txt81,$txt82,$txt83,$txt84,$txt85){
            
                $sql = "UPDATE k2_form SET 
					patient = '".$txt4."'
                    ,body_h ='".$txt5."'
					,body_w ='".$txt6."'
                    ,body_bmi ='".$txt7."'
                    ,ppt_1 ='".$txt8."'
                    ,ppt_2 ='".$txt9."'
                    ,ppt_3 ='".$txt10."'
                    ,operation_date ='".$txt11."'
                    ,anes_g ='".$txt12."'
                    ,anes_nb ='".$txt13."'
                    ,anes_re ='".$txt14."'
                    ,anes_rs ='".$txt15."'
                    ,pag ='".$txt16."'
                    ,sildes ='".$txt17."'
                    ,indication_loo ='".$txt18."'  
                    ,indication_ly ='".$txt19."'
                    ,indication_in ='".$txt20."'        
                    ,indication_imp ='".$txt21."'
                    ,indication_fe ='".$txt22."'
                    ,indication_ti ='".$txt23."'
                    ,indication_pa ='".$txt24."'
                    ,indication_fr ='".$txt25."'
                    ,indication_ot ='".$txt26."'
                    ,fix_flex_def ='".$txt27."'
                    ,flex ='".$txt28."'
                    ,femorotiblai ='".$txt29."'
                    ,company ='".$txt30."'
                    ,prosthesis ='".$txt31."'
                    ,product_refno ='".$txt32."'
                    ,product_lotno ='".$txt33."'
                    ,cement ='".$txt34."'
                    ,stem ='".$txt35."'
                    ,augemtation_ce ='".$txt36."'
                    ,augemtation_au ='".$txt37."'         
                    ,augemtation_me ='".$txt38."'
                    ,augemtation_all ='".$txt39."'
                    ,augemtation_ot ='".$txt40."'
                    ,company1 ='".$txt41."'
                    ,prosthesis1 ='".$txt42."'
                    ,product_refno1 ='".$txt43."'
                    ,product_lotno1 ='".$txt44."'
                    ,cement1 ='".$txt45."'
                    ,surgeon_in_charge ='".$txt46."'
                    ,date ='".$txt47."'
                    ,chemical_as ='".$txt48."'
                    ,chemical_lm ='".$txt49."'
                    ,chemical_pe ='".$txt50."'   
                    ,chemical_wa ='".$txt51."'
                    ,chemical_di ='".$txt52."'
                    ,chemical_ot ='".$txt53."'
                    ,chemical_no ='".$txt54."'
                    ,mechanical_fo ='".$txt55."'                        
                    ,mechanical_st ='".$txt56."'
                    ,mechanical_in ='".$txt57."'
                    ,mechanical_ot ='".$txt58."'
                    ,mechanical_no = '-'
                    ,peri-operative ='".$txt60."'
                    ,procedure_ptpru ='".$txt61."'
                    ,procedure_ptprn ='".$txt62."'
                    ,procedure_ukr ='".$txt63."'
                    ,procedure_pfr ='".$txt64."'
                    ,procedure_hy ='".$txt65."'
                    ,approach_mp ='".$txt66."'
                    ,approach_mv ='".$txt67."'
                    ,approach_qs ='".$txt68."'
                    ,approach_lp ='".$txt69."'
                    ,approach_sv ='".$txt70."'
                    ,approach_qsp ='".$txt71."'
                    ,approach_ot ='".$txt72."'
                    ,computer_ass ='".$txt73."'
                    ,computer_ass_system ='".$txt74."'
                    ,company2 ='".$txt75."'  
                    ,prosthesis_name2 ='".$txt76."' 
                    ,product_refno2 ='".$txt77."' 
                    ,product_lotno2 ='".$txt78."' 
                    ,cement2 ='".$txt79."' 
                    ,stem2 ='".$txt80."' 
                    ,augemtation2_c ='".$txt81."' 
                    ,augemtation2_aa ='".$txt82."' 
                    ,augemtation2_m ='".$txt83."' 					
                    ,augemtation2_all ='".$txt84."'
                    ,augemtation2_ot ='".$txt85."'
                    where k2number = '".$txt1."';";
		//echo "**".$sql."**";
		mysql_query($sql);
	}
	
                
                
}
?>