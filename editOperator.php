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
$totalOperator = $DB->getAllOperator();
?>
<center>
<table border='5' WIDTH="50%" HEIGHT="50%">

<?
echo "<tr>";
echo "<td ALIGN = 'center'> ID </td>";
echo "<td ALIGN = 'center'> NAME </td>";
echo "<td ALIGN = 'center'> LAST NAME </td>";
echo "<td ALIGN = 'center'> POSITION </td>";
echo "<td ALIGN = 'center'> DATE </td>";
echo "<td ALIGN = 'center'> ACTION </td>";
echo "</tr>";
$i=0;
do
{
	echo "<tr>";
	echo "<td ALIGN = 'center'> ".$totalOperator[$i][0]." </td>";
	echo "<td ALIGN = 'center'> ".$totalOperator[$i][1]." </td>";
	echo "<td ALIGN = 'center'> ".$totalOperator[$i][2]." </td>";
	if($totalOperator[$i][3]=="1")
		echo "<td ALIGN = 'center'> Follow </td>";
	else if($totalOperator[$i][3]=="2")
		echo "<td ALIGN = 'center'> Resident 4 </td>";
	else if($totalOperator[$i][3]=="3")
		echo "<td ALIGN = 'center'> Resident 3 </td>";
	else if($totalOperator[$i][3]=="4")
		echo "<td ALIGN = 'center'> Resident 2 </td>";
	else if($totalOperator[$i][3]=="5")
		echo "<td ALIGN = 'center'> Resident 1 </td>";
	echo "<td ALIGN = 'center'> ".$totalOperator[$i][4]." </td>";
	echo "<td ALIGN = 'center'> <a href='editOperator1.php?id=".$totalOperator[$i][0]."&name=".$totalOperator[$i][1]."&lname=".$totalOperator[$i][2]
		."&position=".$totalOperator[$i][3]."&date=".$totalOperator[$i][4]."'>Edit<a> </td>";
	echo "</tr>";
	$i++;
}while($totalOperator[$i][0] != "");
?>

</table>
<center>

<?
include "footer.php";
?>