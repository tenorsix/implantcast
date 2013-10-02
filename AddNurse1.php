<?php
include "ConnectDB.php";
session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
}
$DB = new ConnectDB();
$DB->connect();
echo $_POST["name"].$_POST["lname"].$_POST["position"]."<br>";
$DB->AddNurse($_POST["name"],$_POST["lname"],$_POST["position"]);
?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
?>