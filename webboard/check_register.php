<?php
session_start();
include '../ConnectDB.php';
include './wb_class.php';
include './call_framework_wb_bs3.php';


//echo "Name ".$_POST["Name"]."<br>";
//echo "LastName ".$_POST["LastName"]."<br>";
//echo "ID ".$_POST["ID"]."<br>";
//echo "Password ".md5($_POST["Password"])."<br>";
//echo "PasswordC ".md5($_POST["PasswordC"])."<br>";
//echo "Email ".$_POST["Email"]."<br>";

//echo "test1<br>";
$DB = new ConnectDB();
$DB->connect();
$wb = new wb_class();
//echo "test2<br>";
$Uid = date("Ym");
$UserRow = $wb->GetRowUser();
//echo "test3<br>";
$No = sprintf("%04d", $UserRow);
$Uid = $Uid . $No;
$wb->InsertNewUser($_POST["Name"], $_POST["LastName"], $_POST["ID"], md5($_POST["Password"]), $_POST["Email"], $Uid);
//echo "test4<br>";
?>
<HTML>
    <boby>
        <div class="container">
            <div class="row">
                <div class="alert alert-success text-center">
                    <a href="#" class="alert-link">
                        <h1><strong>Register Success. You can use your ID now</strong></h1>
                        <h5><STRONG>Just a moment please. This page will be redirect to webborad</STRONG></h5>
                    </a>
                </div>
            </div>
        </div>
        <META HTTP-EQUIV="Refresh" CONTENT="2;URL=./Webboard_Category.php">
    </boby>
</HTML>


