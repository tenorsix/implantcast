<?php
include "../ConnectDB.php";
    $DB = new ConnectDB();
    $DB->connect();
    
	$strHN = trim($_POST["tHN"]);

	if(trim($strHN) == "")
	{
		echo "<span class='badge badge-important'> Please fill HN</span>";
		exit();
	}

	//*** Check Username (already exists) ***//

	$strSQL = "SELECT * FROM patients WHERE HN = '".$strHN."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "<span class='badge badge-important'> This number repeatedly.</span>";
	}
	else
	{
		echo "<span class='badge badge-success'> OK </span>";
	}

	
?>