<?php
session_start();
include '../ConnectDB.php';
include './call_framework_wb_bs3.php';
include './wb_class.php';

$DB = new ConnectDB();
$wb_class = new wb_class();
$DB->connect();

    if ($_GET["Action"] == "Save" && $_POST['txtQuestion'] != "" && $_POST['txtDetails'] != "") {
        //        echo "<br><br>";
        //        echo "txtQuestion = " . $_POST['txtQuestion'] . "<br>";
        //        echo "txtDetails = " . $_POST['txtDetails'] . "<br>";
        //        echo "file = " . $_POST['file'] . "<br>";
        //        echo "txtName = " . $_POST['txtName'] . "<br>";
        //        echo "txtGroup = " . $_POST['txtGroup'] . "<br>";

        if (trim($_FILES["fileUpload"]["tmp_name"]) != "") {
            $images = $_FILES["fileUpload"]["tmp_name"];
            $new_images = "Thumbnails_" . $_FILES["fileUpload"]["name"];
            copy($_FILES["fileUpload"]["tmp_name"], "wb_image/" . $_FILES["fileUpload"]["name"]);
            $width = 250; //*** Fix Width & Heigh (Autu caculate) ***//
            $size = GetimageSize($images);
            $height = round($width * $size[1] / $size[0]);
            $images_orig = ImageCreateFromJPEG($images);
            $photoX = ImagesX($images_orig);
            $photoY = ImagesY($images_orig);
            $images_fin = ImageCreateTrueColor($width, $height);
            ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
            ImageJPEG($images_fin, "wb_image/" . $new_images);
            ImageDestroy($images_orig);
            ImageDestroy($images_fin);

            //echo "Resize Successful.<br> ".$_FILES["fileUpload"]["name"]."<br>".$new_images;
            
        }else{
            
        }
            $Current_date = date("Y-m-d H:i:s");
            //echo $Current_date;
            $wb_class->CreateNewTopic($Current_date, $_POST['txtQuestion'], $_POST['txtDetails'], $_POST['txtName'], $_POST['txtGroup'], $_FILES["fileUpload"]["name"]);
            
            ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=Webboard.php?GruopID=<?echo $_POST['txtGroup'];?>"><?
    } else {
            ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=NewQuestion.php"><?
    }
    ?>
