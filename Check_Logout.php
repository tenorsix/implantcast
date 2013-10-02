<?php
session_start();
session_unset();
session_destroy();

//echo "check_logout";
if($_GET['wb']==1){
?>
<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=webboard/Webboard_Category.php">
</head>
</html>
<?   
}else{
?>
<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">
</head>
</html>
<?
}
?>
