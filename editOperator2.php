<?
include "ConnectDB.php";
session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
}

$DB = new ConnectDB();
$DB->connect();

$DB->updateOperator($_POST["id"],$_POST["name"],$_POST["lname"],$_POST["position"],$_POST["date"]);
echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
?>