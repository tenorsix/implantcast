<?php
include "ConnectDB.php";
//session_destroy();
session_start();


$useDB = new ConnectDB();
//$_SESSION["id"] = $_POST["user"];
//$_SESSION["pass"] = $_POST["pass"];

$user = $_POST["user"];
$password = $_POST["pass"];
$useDB->connect();
$check = $useDB->login($_POST["user"],$_POST["pass"]);

//if ($_SESSION["id"]=="" || $_SESSION["pass"]=="")
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	echo $check." <<< ".$_SESSION["name"]." --- ".$_SESSION["lastname"]."---- NO";
	break;
?>

	<html>
	<head>
	<!-- <META HTTP-EQUIV="Refresh" CONTENT="5;URL=index.php"> -->

<?PHP
}else
{
	echo $check." <<< ".$_SESSION["name"]." --- ".$_SESSION["lastname"]."---- YES";
	break;
	$name = $useDB->getname($user,$password);
	$n = $name['name'];
	$ln = $name['surname'];
	$_SESSION["name"] = $n;
	$_SESSION["lastname"] = $ln;
?>
<!-- <META HTTP-EQUIV="Refresh" CONTENT="5;URL=menu.php"> -->
</head>
</html>
<?php
}
?>
