<?php
session_start();
include '../ConnectDB.php';

$DB = new ConnectDB();
$DB->connect();

//echo "<br><br>";
//echo "Hearder = " . $_POST['txt1'] . "<br>";
//echo "Sub Header = " . $_POST['txt2'] . "<br>";
//echo "Picture = " . $_POST['fileUpload'] . "<br>";
//echo "Detail = " . $_POST['txt3'] . "<br>";
//echo "tmp_name = " . $_FILES["fileUpload"]["tmp_name"] . "<br>";
//echo "name = " . $_FILES["fileUpload"]["name"] . "<br>";

if (trim($_FILES["fileUpload"]["tmp_name"]) != "") {
    $images = $_FILES["fileUpload"]["tmp_name"];
    $new_images = "Thumbnails_" . $_FILES["fileUpload"]["name"];
    copy($_FILES["fileUpload"]["tmp_name"], "images/" . $_FILES["fileUpload"]["name"]);
    $width = 100; //*** Fix Width & Heigh (Autu caculate) ***//
    $size = GetimageSize($images);
    $height = round($width * $size[1] / $size[0]);
    $images_orig = ImageCreateFromJPEG($images);
    $photoX = ImagesX($images_orig);
    $photoY = ImagesY($images_orig);
    $images_fin = ImageCreateTrueColor($width, $height);
    ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
    ImageJPEG($images_fin, "images/" . $new_images);
    ImageDestroy($images_orig);
    ImageDestroy($images_fin);


//    echo "upload Successful.<br> " . $_FILES["fileUpload"]["name"] . "<br>" . $new_images."<br>";
} else {
//    echo "<br> upload picture fail <br>";
}
$DB->EditArticle($_POST['txt0'],$_POST['txt1'], $_FILES["fileUpload"]["name"], $_POST['txt2'], $_POST['txt3'])
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=Article_index.php">
