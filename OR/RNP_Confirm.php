<?php
    session_start();
    include "../ConnectDB.php";
    include "fnc.php";
    $DB = new ConnectDB();
    $DB->connect();
    
    $ChkDB = new fncPNP();
    $ChkDB->insertpatients(
            $_GET['HN'],
            $_GET['AN'],
            $_GET['name'],
            $_GET['lastname'],
            $_GET['Hospital'],
            $_GET['BDate'],
            $_GET['age'],
            $_GET['sex'],
            $_GET['wg'],
            $_GET['hi'],
            $_GET['bmi'],
            $_GET['operator'],
            $_GET['HN'].$_GET['name'].$_GET['lastname']);
    
    /*
    echo "<hr>".$_GET['name']."<BR>";
    echo $_GET['lastname']."<BR>";
    echo $_GET['HN']."<BR>";
    echo $_GET['AN']."<BR>";
    echo $_GET['Hospital']."<BR>";
    echo $_GET['BDate']."<BR>";
    echo $_GET['age']."<BR>"; 
    */
$_SESSION["RNP_txt1"] = "";
$_SESSION["RNP_txt2"] = "";
$_SESSION["RNP_txt3"] = "";
$_SESSION["RNP_txt4"] = "";
$_SESSION["RNP_txt5"] = "";
$_SESSION["RNP_txt6"] = "";
$_SESSION["RNP_txt8"] = "";
$_SESSION["RNP_txt9"] = "";
$_SESSION["RNP_txt10"] = "";
$_SESSION["RNP_txt11"] = "";
$_SESSION["RNP_txt12"] = "";

$_SESSION["RNP_txt1_1"] = "";
$_SESSION["RNP_txt2_1"] = "";
$_SESSION["RNP_txt3_1"] = "";
$_SESSION["RNP_txt4_1"] = "";
$_SESSION["RNP_txt5_1"] = "";
$_SESSION["RNP_txt6_1"] = "";
$_SESSION["RNP_txt8_1"] = "";
$_SESSION["RNP_txt9_1"] = "";
$_SESSION["RNP_txt10_1"] = "";
$_SESSION["RNP_txt11_1"] = "";
$_SESSION["RNP_txt12_1"] = "";
    ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=main_or.php"><?
?>

