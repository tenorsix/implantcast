<?php
session_start();
include "ConnectDB.php";



$useDB = new ConnectDB();
$useDB->connect();
$check = $useDB->login($_POST["user"],md5($_POST["pass"]));

if ($check == "")
{
	$_SESSION["loginerror"] = "1";
?>

	<html>
	<head>
<?
        switch ($_SESSION["page"]) {
            case '1':
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
            break;
            case '2':
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=FAQs.php"><?
            break;
            case '3':
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=Article/Article_index.php"><?
            break;
            case '4':
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=webboard/Webboard_Category.php"><?
            break;
            default:
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
            break;
        }

?>

<?PHP
}else
{
	$name = $useDB->getname($_POST["user"],md5($_POST["pass"]));
	$_SESSION["Uid"]= $name['Uid'];
        $_SESSION["userid"]= $name['id'];
	$_SESSION["name"] = $name['name'];;
	$_SESSION["lastname"] = $name['surname'];
        $_SESSION["userlv"] = $name['Lv'];
        $_SESSION["hid"] = $name['hid'];
	$_SESSION["loginerror"] = "";
	$_SESSION["getname"] = $name['name']."  ".$name['surname'];
        
        
        
        switch ($_SESSION["page"]) {
            case '1':
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
            break;
            case '2':
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=FAQs.php"><?
            break;
            case '3':
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=Article/Article_index.php"><?
            break;
            case '4':
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=webboard/Webboard_Category.php"><?
            break;
            default:
                ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
            break;
        }
        
?>


</head>
</html>
<?php
}
?>
