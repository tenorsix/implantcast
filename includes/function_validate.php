<?php

// function สำหรับ ติดต่อ กับ ดาต้าเบส
function connectDB() {
global $host,$username,$password,$connect,$dberr,$db,$useerr;
// Connect mysql 
			if (@$connect = mysql_connect($host, $username, $password)){
				mysql_query("SET character_set_results=utf8");
				mysql_query("SET character_set_client=utf8");
				mysql_query("SET character_set_connection=utf8");
				if (@!mysql_select_db($db, $connect)){
					exit($useerr);
				}
			}else{			
					exit($dberr);		
			}
		return false;
}

// function สำหรับ ตัดการเชื่อมต่อกับ
function closeDB() {
	global $connect;
		return mysql_close($connect);
		return false;
}

// ฟังชั่นที่ใช้ในการแสดง list ข้อมูลใน combo box
	function officerlist($sql,$var=""){
		connectDB();	// ติดต่อดาต้าเบส
		if (!@$result=mysql_query($sql)) {
			$showlist= "<option>ไม่สามารถแสดงรายการได้ </option>";	// return error หากไม่สามารถแสดงข้อมูลได้
		}else{
		//========== หากแสดงข้อมูลเรียบร้อย =============
			while ($dbarr=mysql_fetch_array($result)) {
				$showlist .="<option value=".$dbarr[0]." " .chkselected($dbarr[0],$var).">".$dbarr[1]."</option>\n";
			}
		// ========================================
		}	//  จบคำสั่ง if 
		closeDB();	//ปิดการเชื่อมต่อกับดาต้าเบส
			return $showlist;	// return ค่า showlist
	}
		function status($sql,$var="1"){
		connectDB();	// ติดต่อดาต้าเบส
		if (!@$result=mysql_query($sql)) {
			$showlist= "<option>ไม่สามารถแสดงรายการได้ </option>";	// return error หากไม่สามารถแสดงข้อมูลได้
		}else{
		//========== หากแสดงข้อมูลเรียบร้อย =============
			while ($dbarr=mysql_fetch_array($result)) {
				$showlist .="<option value=".$dbarr[0]." " .chkselected($dbarr[0],$var).">".$dbarr[1]."</option>\n";
			}
		// ========================================
		}	//  จบคำสั่ง if 
		closeDB();	//ปิดการเชื่อมต่อกับดาต้าเบส
			return $showlist;	// return ค่า showlist
	}
// ========================================

		// function chkselected ทำหน้าที่ตรวจเช็คข้อมูลประเภท Control Select  2 ข้อมูลว่า ได้ถูก เลือกอยู่หรือเปล่าโดยเปรียบเทียบค่าที่อยู่ในฐานข้อมูลกับค่าที่จะแสดงโดยอัตโนมัติ
		// วิธีการใช้งานคือchkselected(ค่าที่อยู่ในฐานข้อมูล,ค่าของตัวมันเอง);
	function chkselected($var1,$var2){
		if ($var1 == $var2){
			$chkselected = "Selected";
		}
		else {
			$chkselected = "";
		}
		return $chkselected;
	}
?>