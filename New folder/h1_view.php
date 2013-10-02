<?php
include "ConnectDB.php";
session_start();
if ($_SESSION["id"]=="" || $_SESSION["pass"]=="")
{
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">
<?
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PAJAC: Police Advance Joint Acedemic Center</title>
		<!-- <link href="css/style.css" rel="stylesheet" type="text/css" />
		<style.css type="text/css"> -->
		<img src="images/banner1.jpg" width="100%" />
		<img src="images/banner2.jpg" width="100%" />
	</head>
	<body>

<?php
echo "<br>welcome ".$_SESSION["name"]." ".$_SESSION["lastname"];
echo "<form action='Check_Logout.php'>";
echo "<div align='right'>";
echo "<input type='submit' value='Logout'></div></form>";
echo "</div></body></html>";

$DBh1 = new ConnectDB();
$DBh1->connect();
$arrayh1 = $DBh1->searchh1($_SESSION["name"]);

?>

	<center>
		<table border = 1 width ="80%">
			<tr>
				<td colspan='5' align = "center"> 
					H1 Report by <?echo "name"?>
				</td>
			</tr>

			<tr>
				<td align = "center">
					No.
				</td>
				<td align = "center">
					Case info
				</td>
				<td align = "center">
					Operator
				</td>
				<td align = "center">
					Hospital
				</td>
				<td align = "center">
					Management
				</td>
			</tr>
<?
		$i=0;
		$j=0;
		$row = $DBh1->getnumrow();
		//echo $row;
		//print_r($arrayk1);
		//email = array('admin@stepcoding.com', 'genetic@stepcoding.com');

		for($i=0;$i<$row;$i++){
			
			echo "<tr>";
			echo "<td align = 'center'>".$arrayh1[$i][0]."</td>";
				
			if($arrayh1[$i][35] == 1) $Fermur = "CR"; 
			else $Fermur = "PS";

			switch($arrayh1[$i][36]){

				case '1' : $Tibial = "Fix Bearing";
				Break;
				case '2' : $Tibial = "Mobile Bearing";
				Break;
				case '3' : $Tibial = "Medial pivot";
				Break;
			}

			echo "<td align = 'center'>".$Fermur." ".$Tibial."</td>";
			echo "<td align = 'center'>".$arrayh1[$i][7]."</td>";
			echo "<td align = 'center'>".$arrayh1[$i][2]."</td>";
			echo "<td align = 'center'><a href='h1_report.php?doc=".$arrayh1[$i][0]."&name=".$_SESSION["name"]."'>View PDF</a></t>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='h1_edit.php?doc=".$arrayh1[$i][0]."&name=".$_SESSION["name"]."'>Edit</a></td>";
			echo "</tr>";

		}

?>
	
	







		</table>
	</center>



<div align='center'>
<img src="images/footerline.jpg" width="100%" height="4" />
<div class="footer"><div class="center"><div class="t12">Operative Note for Total Knee Arthroplasty Report System Beta Test<br />
Contact Administrator : virojlarb@pajac.org, admin@pajac.org
</div></div></div></div>