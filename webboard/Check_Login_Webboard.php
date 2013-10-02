<?php

session_start();
include "../ConnectDB.php";



$useDB = new ConnectDB();
$useDB->connect();

$user = $_POST["user"];
$pass = $_POST["pass"];
try {
    $name = $useDB->getname($user, $pass);
    $_SESSION["Uid"] = $name['Uid'];
    $_SESSION["name"] = $name['name'];
    $_SESSION["lastname"] = $name['surname'];
    $_SESSION["userlv"] = $name['Lv'];
    $_SESSION["hid"] = $name['hid'];
    $_SESSION["loginerror"] = "";
    $_SESSION["getname"] = $name['name'] . "  " . $name['surname'];
    $_SESSION["name_Webboard"] = $name['name'];
    $_SESSION["lastname_Webboard"] = $name['surname'];
    if ($name['name'] != "") {
        echo "Login user doctor " . $_SESSION["name"] . " - " . $_SESSION["lastname"];
        ?><META HTTP-EQUIV="Refresh" CONTENT="2;URL=Webboard_Category.php"><?
    } else {
        $result = $useDB->login_Webboard($user, $pass);
        $_SESSION["name_Webboard"] = $result[0];
        $_SESSION["lastname_Webboard"] = $result[1];
        if($result[0] == ""){
            echo "Login ผิดพลาดกรุณาลองใหม่อีกครั้ง";
            ?><META HTTP-EQUIV="Refresh" CONTENT="3;URL=Webboard_Category.php"><?
        }else{
            echo "Login user Webboard " . $_SESSION["name_Webboard"] . " - " . $_SESSION["lastname_Webborad"];
            ?><META HTTP-EQUIV="Refresh" CONTENT="2;URL=Webboard_Category.php"><?
        }
    }
} catch (Exception $exc) {
    echo "เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง";
    ?><META HTTP-EQUIV="Refresh" CONTENT="3;URL=Webboard_Category.php"><?
}
?>
