<?
include "ConnectDB.php";
session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
}

$g1 = $_GET["id"];
$g2 = $_GET["name"];
$g3 = $_GET["lname"];
$g4 = $_GET["position"];

$DB = new ConnectDB();
$DB->connect();
include 'header.php';
?>

<html><body>
<script LANGUAGE="JavaScript">
function goMenu(){
    window.location = "index.php";
}
function check(){
    if(document.add.name.value==""){
        alert("โปรดใส่ชื่อ");
        document.add.name.focus();
        return false ;
    }else if(document.add.lname.value==""){
        alert("โปรดใส่นามสกุล");
        document.add.lname.focus();
        return false ;
    }else if(document.add.position.value==""){
        alert("โปรดเลือกตำแหน่ง");
        return false ;
    }
}
</script>

<center>
<TABLE >
    <form name="add" method='post' action='editNurse2.php' onSubmit="JavaScript:return check();"><br><br>
		<?echo "<td></td><td><input type='hidden' name='id' value='".$g1."'></td><br>";?>
        <tr>
            <?echo "<td>NAME</td><td><input type='text' name='name' value='".$g2."'></td><br>";?>
        </tr>
        <tr>
            <?echo "<td>LAST NAME</td><td><input type='text' name='lname' value='".$g3."'></td><br>";?>
        </tr>
<?
$position = $DB->getPosition();
$num = $DB->getnumrow();
?>
        <tr>
            <td>POSITION</td><td>
			<?echo "<select name='position' value='".$g4."'>";?>
<?
echo "<option value=''></option>";
for($i=0;$i<$num;$i++){
    echo "<option value='".$position[$i][0]."'>".$position[$i][1];
}
echo "</select></td><br>";
echo "</tr>";
echo "</table>";
?>
<input type='submit' value='Submit'>
<input type='submit' value='Back' onClick="goMenu()"
</form></center><br><br>
</body></html>


<?
include "footer.php";
?>