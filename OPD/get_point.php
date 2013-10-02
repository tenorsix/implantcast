<?php
session_start();
include "../ConnectDB.php";
include './opd_class.php';

    $DB = new ConnectDB();
    $DB->connect();
    $opd = new OPD(); 
    
	$strHN = trim($_POST["tPoint"]);
        $side = substr($strHN, 0,1);
        $visit_time = substr($strHN, 1,2);
        $form_id = $opd->get_womac_id($_SESSION["HN"],$side);
        $point = $opd->get_visit_ponit($form_id[0], $visit_time);
        
	if($strHN == "")
	{
            echo "Blank";
            exit();
	}else{
        //*** get point in database ***//
            if($point[2] == ""){
                echo "#N/A";
            }else{
                echo $point[2];
           }
         }

	
?>
