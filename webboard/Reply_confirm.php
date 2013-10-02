<?php
session_start();
include '../ConnectDB.php';
include './call_framework_wb_bs3.php';
include './wb_class.php';

$DB = new ConnectDB();
$wb_class = new wb_class();
$DB->connect();

    if ($_GET["Action"] == "Save") {
//                echo "<br><br>";
//                echo "txtQuestionID = " . $_POST['txtID'] . "<br>";
//                echo "txtDetails = " . $_POST['txtDetails'] . "<br>";
//                echo "file = " . $_POST['fileUpload'] . "<br>";
//                echo "txtName = " . $_POST['txtName'] . "<br>";

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
            
            $wb_class->InsertReply($_POST['txtID'], $Current_date, $_POST['txtDetails'], $_POST['txtName'], $_FILES["fileUpload"]["name"]);
            
            ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=ViewWebboard.php?QuestionID=<?echo $_POST['txtID'];?>"><?
    } else {
            ?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=ViewWebboard.php?QuestionID=<?echo $_POST['txtID'];?>"><?
    }
    ?>
