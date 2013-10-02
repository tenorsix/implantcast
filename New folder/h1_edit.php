<?php
include "ConnectDB.php";
session_start();
if ($_SESSION["id"]=="" || $_SESSION["pass"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
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
$arrayh1 = $DBh1->searchforedit_h1($_GET["doc"]);
//echo "**".$arrayk1[2];
$ar = $DBh1->getNameHospital();

?>



<form action="Check_h1_edit.php" method="post" name="form1">
	<center>
			<table border='0' width ="60%">
				<tr>
					<td width ="20%"></td>
					<td width ="20%"></td>
					<td width ="8%"></td>
					<td width ="25%"></td>
					<td width ="10%"></td>
					<td width ="10%"></td>
				</tr>
				<tr>
					<td width ="70%" colspan='4'>
						Operative Note
					</td>
					<td width ="30%" colspan='1'>
						H1 Form
					</td>
					<td width ="30%" colspan='1'>
						<input type="text" name="txt9090" value="<?echo $_SESSION["h1_number"];?>" disabled="disabled">
						<input type="hidden" name="txt1" value="<?echo $_SESSION["h1_number"];?>">
					</td>

				</tr>
				<tr>
					<td colspan='4'>
					</td>
					<td width ="10%">
						HN :
					</td>
					<td width ="20%">
						<input type="text" name="txt2" value='<?echo $arrayh1[1];?>'>
					</td>
				</tr>
				<tr>
					<td colspan='4'>
					</td>
					<td>
						Hospital :
					</td>
					<td>
							<input type="text" name="txt3" value='<?echo $arrayh1[2];?>'>

						</select>
					</td>
				</tr>
				<tr>
					<td>
						Diagnosis :
					</td>
					<td colspan='2'>
						<input type="text" name="txt4"> Side
					</td>
					<td colspan='3'>
						<input type="radio" name="txt5" value="1" checked>Right
						<input type="radio" name="txt5" value="2">Left
						<input type="radio" name="txt5" value="3" >Bilateral
					</td>
				</tr>
				<tr>
					<td colspan='3'>
						Operation Total hip arthroplasty :
					</td>
					<td colspan='3'>
						<input type="checkbox" name="txt6" value="1">BHR
						<input type="checkbox" name="txt7" value="1">BMHR
					</td>
				</tr>
				<tr>
					<td> 
						Operator :
					</td>
					<td colspan='2'>
						<input type="text" name="txtbobooob" value="<?echo $_SESSION["name"];?>" disabled="disable">
						<input type="hidden" name="txt8" value="<?echo $_SESSION["name"];?>">
					</td>
					<td> 
						Assistant 1 :
					</td>
					<td colspan='2'>
						<input type="text" name="txt9">
					</td>
				</tr>
				<tr>
					<td> 
						Assistant 2 :
					</td>
					<td colspan='2'>
						<input type="text" name="txt10">
					</td>
					<td> 
						Assistant 3 :
					</td>
					<td colspan='2'>
						<input type="text" name="txt11">
					</td>
				</tr>
				<tr>
					<td> 
						Anesthetist :
					</td>
					<td colspan='2'>
						<input type="text" name="txt12">
					</td>
					<td> 
						Instrument Nurse :
					</td>
					<td colspan='2'>
						<input type="text" name="txt13">
					</td>
				</tr>
				<tr>
					<td> 
						Anesthesia :
					</td>
					<td colspan='2'>
						<input type="text" name="txt15">
					</td>
					<td> 
						Circulate Nurse :
					</td>
					<td colspan='2'>
						<input type="text" name="txt14">
					</td>
				</tr>
				<tr>
					<td colspan='1'> 
						Operation Started :
					</td>
					<td colspan='2'>
						<input type="text" name="txt16">
					</td>
					<td> 
						Finished :
					</td>
					<td colspan='2'>
						<input type="text" name="txt17">
					</td>
				</tr>
				<tr>
					<td> 
						Finding :
					</td>
					
					<td colspan = 5>
						<input type="checkbox" name="txt18" value="1">1'OA
						<input type="checkbox" name="txt19" value="1">ON at
						<input type="text" name="txt20">
						<input type="checkbox" name="txt21" value="1">Post Traumatic OA
							
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5>
						<input type="checkbox" name="txt22" value="1">Fx neck Femur
						<input type="checkbox" name="txt23" value="1">DDH
						<input type="checkbox" name="txt24" value="1">SCFE
						<input type="checkbox" name="txt25" value="1">AS
					</td>

				</tr>
				<tr>
					<td> 
						Approach :
					</td>
					<td colspan ='5'> 
						<input type="checkbox" name="txt26" value="1">Anterior
						<input type="checkbox" name="txt27" value="1">Anterolateral
						<input type="checkbox" name="txt28" value="1">Direet Lateral
						<input type="checkbox" name="txt29" value="1">Lateral Transtrochanteric
					</td>
				</tr>
				<tr>
					<td> 
					</td>
					<td colspan ='5'> 
						<input type="checkbox" name="txt30" value="1">Posterolateral
					</td>
				</tr>
				<tr>
					<td> 
						Prosthesis :
					</td>
					<td colspan ='2'> 
						- Acetabulum Cup
					</td>
					<td colspan ='3'> 
						<input type="radio" name="txt31" value="1" checked>Cementless
						<input type="radio" name="txt31" value="2">Cemented
					</td>
				</tr>




				<tr>
					<td> 
					</td>
					<td colspan ='2'> 
						- Liner
					</td>
					<td colspan ='3'> 
						<input type="radio" name="txt32" value="1" checked>None 
						<input type="radio" name="txt32" value="2">Polyethylene
						<input type="radio" name="txt32" value="3">Metal
						<input type="radio" name="txt32" value="4">Ceramic
					</td>
				</tr>
				<tr>
					<td> 
					</td>
					<td colspan ='2'> 
					</td>
					<td colspan ='3'> 
						 <input type="radio" name="txt32" value="5">Oxinium
						
					</td>
				</tr>				
				<tr>
					<td> 
					</td>
					<td colspan ='2'> 
						- Femoral Head
					</td>
					<td colspan ='3'> 
						<input type="radio" name="txt33" value="1" checked>Metal 
						<input type="radio" name="txt33" value="2">Ceramic
						<input type="radio" name="txt33" value="3">Oxinium
					</td>
				</tr>
				<tr>
					<td> 
					</td>
					<td colspan ='2'> 
						- Femoral Stem
					</td>
					<td colspan ='3'> 
						<input type="radio" name="txt34" value="1" checked>Cementless
						<input type="radio" name="txt34" value="2">Cemented
					</td>
				</tr>
				<tr>
					<td colspan = 6> 
					Procedure
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5> 
					- Patient in
					<input type="radio" name="txt35" value="1" checked>Left
					<input type="radio" name="txt35" value="2">Right   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lateral decubetus position
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5>
					- Acetabular cup was fixed by
					<input type="checkbox" name="txt36" value="1">Press fit
					<input type="checkbox" name="txt37" value="1">
					<input type="text" name="txt38" size="5">Screw(s)
					<input type="checkbox" name="txt39" value="1">Bone cement
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5>
					- Femoral stem was prepared by Rasps / Broaches step by step
	
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5>
					- Fix femoral stem by
					<input type="checkbox" name="txt40" value="1">Press fit
					<input type="checkbox" name="txt41" value="1"> Bone cement
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5>
					<input type="checkbox" name="txt42" value="1">Trial femoral neck length then reduction and check for stability
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5>
					- Fix the real component and check for leg length, stability and softissue tension then radivac drain was insert. Syture was done layer by layer
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = '5'>
					- Repair joint capsule
					<input type="radio" name="txt43" value="1" checked>Done
					<input type="radio" name="txt43" value="2">None
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = '5'>
					- Placed radivac drain at
					<input type="text" name="txt44" size="10">Layer
					</td>
				</tr>
				<tr>
					<td colspan ='6'>
					</td>
				</tr>
				<tr>
					<td colspan = 6 >
					Augmentation
					<input type="radio" name="txt45" value="1">Yes
					<input type="radio" name="txt45" value="2" Checked>No
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5>
					<input type="checkbox" name="txt46" value="1">Acetabulum
					<input type="checkbox" name="txt47" value="1">None
					<input type="checkbox" name="txt48" value="2">Bone graft
					<input type="checkbox" name="txt49" value="3">Metal
					<input type="checkbox" name="txt50" value="4">Reinforcement Ring
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5>
					<input type="checkbox" name="txt51" value="1">Femur
					<input type="checkbox" name="txt52" value="1">Cement
					<input type="checkbox" name="txt53" value="2">Bone graft
					<input type="checkbox" name="txt54" value="3">Metal
					</td>
				</tr>
				<tr>
					<td colspan = 6 >
					Intraop. Complication
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5 >
					<input type="checkbox" name="txt55" value="1">
					Fracture acetabulum
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5 >
					<input type="checkbox" name="txt56" value="1">
					Acetabular wall protusion at
					<input type="text" name="txt57">
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5 >
					<input type="checkbox" name="txt58" value="1">
					Fracture Greater Trochanter
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5 >
					<input type="checkbox" name="txt59" value="1">
					Fracture femoral shaft at
					<input type="text" name="txt60">
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td colspan = 5 >
					<input type="checkbox" name="txt61" value="1">
					None
					</td>
				</tr>
				<tr>
					<td colspan = 6 >
					Complication management
					</td>
				</tr>
				<tr>
					<td colspan = 6 >
					<textarea name="txt60" rows="3" cols="50"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan = 6 >
					Estimated blood loss <input type="text" name="txt78">ml.
					</td>
				</tr>
				<tr>
					<td colspan = 3 >
					Signature<input type="text" name="txt79bobo" value="<?echo $_SESSION["name"]."  ".$_SESSION["lastname"];?>" disabled="disable">
					<input type="hidden" name="txt79" value="<?echo $_SESSION["name"]."  ".$_SESSION["lastname"];?>">
					</td>
					<td colspan = 3 >
					Date<input type="text" name="txt80">
					</td>
				</tr>
				<tr>
					<td colspan = 6 align = "center">
						<button type="submit">Save changes</button>
					</td>
				</tr>
			</table>
		<center>
		</form>
	</body>
</html>














<div align='center'>
<img src="images/footerline.jpg" width="100%" height="4" />
<div class="footer"><div class="center"><div class="t12">Operative Note for Total Knee Arthroplasty Report System Beta Test<br />
Contact Administrator : virojlarb@pajac.org, admin@pajac.org
</div></div></div></div>