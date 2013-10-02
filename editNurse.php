<?
include "ConnectDB.php";
session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
}

$DB = new ConnectDB();
$DB->connect();
include 'header.php';
?>
<br>
<br>
<br>
<?
$totalNurse = $DB->getAllNurse();
?>
<center>
<table border='5' WIDTH="50%" HEIGHT="50%">

<?
echo "<tr>";
echo "<td ALIGN = 'center'> ID </td>";
echo "<td ALIGN = 'center'> NAME </td>";
echo "<td ALIGN = 'center'> LAST NAME </td>";
echo "<td ALIGN = 'center'> POSITION </td>";
echo "<td ALIGN = 'center'> ACTION </td>";
echo "</tr>";
$i=0;
do
{
	echo "<tr>";
	echo "<td ALIGN = 'center'> ".$totalNurse[$i][0]." </td>";
	echo "<td ALIGN = 'center'> ".$totalNurse[$i][1]." </td>";
	echo "<td ALIGN = 'center'> ".$totalNurse[$i][2]." </td>";
	if($totalNurse[$i][3]=="6")
		echo "<td ALIGN = 'center'> หัวหน้า OR </td>";
	else if($totalNurse[$i][3]=="7")
		echo "<td ALIGN = 'center'> รองหัวหน้า OR </td>";
	else if($totalNurse[$i][3]=="8")
		echo "<td ALIGN = 'center'> ห้องกลาง </td>";
	else if($totalNurse[$i][3]=="9")
		echo "<td ALIGN = 'center'> ทันตกรรม </td>";
	else if($totalNurse[$i][3]=="10")
		echo "<td ALIGN = 'center'> พยาบาล </td>";
	else if($totalNurse[$i][3]=="11")
		echo "<td ALIGN = 'center'> Anesthetist </td>";
	else if($totalNurse[$i][3]=="12")
		echo "<td ALIGN = 'center'> Anesthetist nurse </td>";
	else if($totalNurse[$i][3]=="13")
		echo "<td ALIGN = 'center'> nurse </td>";
	echo "<td ALIGN = 'center'> <a href='editNurse1.php?id=".$totalNurse[$i][0]."&name=".$totalNurse[$i][1]."&lname=".$totalNurse[$i][2]
		."&position=".$totalNurse[$i][3]."'>Edit<a> </td>";
	echo "</tr>";
	$i++;
}while($totalNurse[$i][0] != "");
?>

</table>
<center>

<?
include "footer.php";
?>