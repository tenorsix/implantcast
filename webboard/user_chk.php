<?php
session_start();
include "../ConnectDB.php";
    $DB = new ConnectDB();
    $DB->connect();
    
	$strID = trim($_POST["tID"]);

	if(trim($strID) == "")
	{
                echo "<span class='label label-danger'>Please fill</span>";
                echo "<input type='hidden' name='register_error' value='1'>";
		exit();
	}

	//*** Check Username (already exists) ***//

	$strSQL = "SELECT * FROM user WHERE id = '".$strID."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "<span class='label label-danger'> Unique ID </span>";
                echo "<input type='hidden' name='register_error' value='1'>";
	}
	else
	{
		echo "<span class='label label-success'> OK </span>";
                echo "<input type='hidden' name='register_error' value='0'>";
	}

	
?>