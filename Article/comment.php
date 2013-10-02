<?
include "../ConnectDB.php";
$DB = new ConnectDB();
$DB->connect();

$aticle_id = (int)$_POST["number_aticle"];
$postnumber = getPostNumber($aticle_id);
//echo $_SERVER['REMOTE_ADDR']."<br>";
//echo $_POST["txt1"]."<br>";
//echo $_POST["txt2"];

$sql = "INSERT INTO `aticle_comment`(`aticle_id`, `postnumber`, `name`, `ip`, `comment`) VALUES (".$aticle_id.",".$postnumber.",'".$_SERVER['REMOTE_ADDR']."','".$_POST["txt1"]."','".$_POST["txt2"]."');";
//echo "<br>".$sql;
mysql_query($sql);

getAllPost($aticle_id);
?>
<a href="Article_index.php"><input type="submit" value="Back"></a><br>
<?


function getPostNumber($aticle_id){
	$sql = "select * from `aticle_comment` where aticle_id = ".$aticle_id.";";
	$data = mysql_query($sql);
	$num = (int)mysql_num_rows($data)+1;
	return $num;
}
function getAllPost($aticle_id){
	$sql = "select * from `aticle_comment` where aticle_id = ".$aticle_id.";";
	$data = mysql_query($sql);
	while($comment = mysql_fetch_array($data)){
		//echo $comment[0]."<br>";
		//echo $comment[1]."<br>";
		echo $comment[2]."<br>";
		echo $comment[3]."<br>";
		echo $comment[4]."<br>";
		echo $comment[5]."<br>";
		echo "<hr><br>";
	}
}
?>