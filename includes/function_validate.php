<?php

// function ����Ѻ �Դ��� �Ѻ �ҵ����
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

// function ����Ѻ �Ѵ����������͡Ѻ
function closeDB() {
	global $connect;
		return mysql_close($connect);
		return false;
}

// �ѧ��蹷����㹡���ʴ� list ������� combo box
	function officerlist($sql,$var=""){
		connectDB();	// �Դ��ʹҵ����
		if (!@$result=mysql_query($sql)) {
			$showlist= "<option>�������ö�ʴ���¡���� </option>";	// return error �ҡ�������ö�ʴ���������
		}else{
		//========== �ҡ�ʴ����������º���� =============
			while ($dbarr=mysql_fetch_array($result)) {
				$showlist .="<option value=".$dbarr[0]." " .chkselected($dbarr[0],$var).">".$dbarr[1]."</option>\n";
			}
		// ========================================
		}	//  ������� if 
		closeDB();	//�Դ����������͡Ѻ�ҵ����
			return $showlist;	// return ��� showlist
	}
		function status($sql,$var="1"){
		connectDB();	// �Դ��ʹҵ����
		if (!@$result=mysql_query($sql)) {
			$showlist= "<option>�������ö�ʴ���¡���� </option>";	// return error �ҡ�������ö�ʴ���������
		}else{
		//========== �ҡ�ʴ����������º���� =============
			while ($dbarr=mysql_fetch_array($result)) {
				$showlist .="<option value=".$dbarr[0]." " .chkselected($dbarr[0],$var).">".$dbarr[1]."</option>\n";
			}
		// ========================================
		}	//  ������� if 
		closeDB();	//�Դ����������͡Ѻ�ҵ����
			return $showlist;	// return ��� showlist
	}
// ========================================

		// function chkselected ��˹�ҷ���Ǩ�礢����Ż����� Control Select  2 ��������� ��١ ���͡�����������������º��º��ҷ������㹰ҹ�����šѺ��ҷ����ʴ����ѵ��ѵ�
		// �Ըա����ҹ���chkselected(��ҷ������㹰ҹ������,��Ңͧ����ѹ�ͧ);
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