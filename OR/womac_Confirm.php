<?php
session_start();
    include "../ConnectDB.php";
    $DB = new ConnectDB();
    $DB->connect();
    for($i=0;$i<count($_SESSION["womac"]);$i++)
    {
		$txt[$i] = $_SESSION["womac"][$i];
                echo "<br>".$i." = ".$txt[$i];
    } 
    unset($_SESSION["womac"]);
    $DB->AddWomac($txt[0], $txt[1], $txt[2], $txt[3], $txt[4],
                $txt[5], $txt[6], $txt[7], $txt[8], $txt[9], 
                $txt[10], $txt[11], $txt[12], $txt[13], $txt[14], 
                $txt[15], $txt[16], $txt[17], $txt[18], $txt[19],
                $txt[20], $txt[21], $txt[22], $txt[23], $txt[24],
                $txt[25], $txt[26], $txt[27], $txt[28], $txt[29],
                $txt[30], $txt[31], $txt[32], $txt[33], $txt[34],
                $txt[35], $txt[36], $txt[37], $txt[38], $txt[39],
                $txt[40], $txt[41], $txt[42], $txt[43], $txt[44], $txt[45]);
    $DB->AddVisitPoint($txt[0], $txt[10], $txt[43]);


?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=main_or.php">
