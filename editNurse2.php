<?
include "ConnectDB.php";
session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
}

$DB = new ConnectDB();
$DB->connect();

$DB->updateNurse($_POST["id"],$_POST["name"],$_POST["lname"],$_POST["position"]);
echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
?>