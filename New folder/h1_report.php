<?php
include "ConnectDB.php";
session_start();
$DBh1 = new ConnectDB();
$DBh1->connect();

if ($_SESSION["id"]=="" || $_SESSION["pass"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.html"><?
}
require('pdf/fpdf.php');
$doc_id = $_GET["doc"]; //1
$name = $_GET["name"];  //9
//echo $_GET["doc"];
$arr = $DBh1->pdfform1($_GET["doc"],$_GET["name"]);
//echo $doc_id."__".$name;
//print_r($arr);



//ทำการสืบทอดคลาส FPDF ให้เป็นคลาสใหม่
class PDF extends FPDF
{
	//Override คำสั่ง (เมธอด) Footer
	function Footer()	{
		//นับจากขอบกระดาษด้านล่างขึ้นมา 10 มม.
		$this->SetY( -10 );
		//กำหนดใช้ตัวอักษร Arial ตัวเอียง ขนาด 5
		$this->SetFont('Arial','I',8);
		//พิมพ์ หมายเลขหน้า ตรงมุมขวาล่าง
		$this->Cell(0,10,'Page '.$this->PageNo().' / tp' ,0,0,'C');
	}
}

 

//เรียกใช้งาน เราจะเรียกใช้คลาสใหม่ของเราแทน
$pdf=new PDF();
$pdf->AliasNbPages( 'tp' );


// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวธรรมดา กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','','angsa.php');
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','B','angsab.php');
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','I','angsai.php');
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('angsana','BI','angsaz.php');

//$pdf->SetTopMargin(50)
//สร้างหน้าเอกสาร
$pdf->AddPage();


$pdf->Image('img_logo/PH_logo.jpg',11,14,38,0,'','');
$pdf->SetFont('angsana','B',16);

$pdf->SetXY(10,16);
$pdf->MultiCell(0,6,'POLICE  GENERAL  HOSPITAL','','C');
$pdf->SetXY(10,22);
$pdf->MultiCell(0,6,'ORTHOPAEDIC  DEPARTMENT','','C');
$pdf->SetXY(150,16);
$pdf->MultiCell(50,32,'','1','C');
$pdf->SetXY(150,16);
$pdf->MultiCell(22,8,'H1  Form : ','','L');

$pdf->SetFont('angsana','',14);
$pdf->SetXY(172,16);
$pdf->MultiCell(28,8,$arr[0],'','L');
$pdf->SetXY(150,24);
$pdf->MultiCell(12,8,'HN :','','L');
$pdf->SetXY(162,24);
$pdf->MultiCell(38,8,$arr[1],'','L');

$pdf->SetXY(150,32);
$pdf->MultiCell(15,8,'Hospital :','','L');
$pdf->SetXY(165,32);
$pdf->MultiCell(35,8,$arr[2],'','L');

$pdf->SetFont('angsana','B',22);
$pdf->SetXY(75,32);
$pdf->MultiCell(60,14,'OPERATIVE  NOTE','1','C');

// line 1 ==================================================
$pdf->SetXY(10,50);
$pdf->MultiCell(190,8,'','TRL','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,50);
$pdf->MultiCell(20,8,'Diagnosis','','');
$pdf->SetFont('angsana','',16);
$pdf->SetXY(30,50);
$pdf->MultiCell(60,8,': .................................................... side','','');
$pdf->SetXY(30,49);
$pdf->MultiCell(60,8,$arr[3],'','C');	 //Diagnosis

$pdf->SetFont('angsana','',16);
$pdf->SetXY(90,50);
$pdf->MultiCell(30,8,'Right','','R');
$pdf->SetXY(120,50);
$pdf->MultiCell(30,8,'Left','','R');
$pdf->SetXY(150,50);
$pdf->MultiCell(30,8,'Bilateral','','R');


// Checkbox location Varable 
//switch ($arr[4]){
switch ($arr[4]='1'){
	case '1' :
		$pdf->Image('img_ico/cb_ch.jpg',95,52,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',130,52,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',155,52,4,4,'','');
	break;
	case '2' :
		$pdf->Image('img_ico/cb_un.jpg',95,52,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',130,52,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',155,52,4,4,'','');
	break;
	case '3' :
		$pdf->Image('img_ico/cb_un.jpg',95,52,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',130,52,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',155,52,4,4,'','');
	break;
}
//------------------------------------------------

// line 2 ==================================================
$pdf->SetXY(10,58);
$pdf->MultiCell(190,8,'','TRL','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,58);
$pdf->MultiCell(60,8,'Operation Total hip arthroplasty','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(70,58);
$pdf->MultiCell(25,8,'BHR','','R');
$pdf->SetXY(95,58);
$pdf->MultiCell(25,8,'BMHR','','R');

// Checkbox Operation Total knee arthroplasty Varable
if($arr[5] == '1'){
	$pdf->Image('img_ico/cb_ch.jpg',75,60,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',75,60,4,4,'','');
}
if($arr[6] == '1'){
	$pdf->Image('img_ico/cb_ch.jpg',100,60,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',100,60,4,4,'','');
}



//------------------------------------------------



// line 3 ==================================================
$pdf->SetXY(10,66);
$pdf->MultiCell(190,40,'','TRL','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,66);
$pdf->MultiCell(20,8,'Oprator','','');
$pdf->SetXY(10,74);
$pdf->MultiCell(20,8,'Assistant 2','','');
$pdf->SetXY(10,82);
$pdf->MultiCell(20,8,'Anesthetist','','');
$pdf->SetXY(10,90);
$pdf->MultiCell(20,8,'Anesthesia','','');
$pdf->SetXY(10,98);
$pdf->MultiCell(35,8,'Operation Started','','');


$pdf->SetXY(105,66);
$pdf->MultiCell(30,8,'Assistant 1','','');
$pdf->SetXY(105,74);
$pdf->MultiCell(30,8,'Assistant 3','','');
$pdf->SetXY(105,82);
$pdf->MultiCell(30,8,'Instrument nurse','','');
$pdf->SetXY(105,90);
$pdf->MultiCell(30,8,'Circulate nurse','','');
$pdf->SetXY(105,98);
$pdf->MultiCell(30,8,'Finished','','');


$pdf->SetFont('angsana','',16);
$pdf->SetXY(30,66);
$pdf->MultiCell(75,8,': ......................................................................','','');
$pdf->SetXY(30,65);
$pdf->MultiCell(75,8,$arr[9],'','C');	 //Oprator

$pdf->SetXY(30,74);
$pdf->MultiCell(75,8,': ......................................................................','','');
$pdf->SetXY(30,73);
$pdf->MultiCell(75,8,$arr[11],'','C');	 //Assistant 2

$pdf->SetXY(30,82);
$pdf->MultiCell(75,8,': ......................................................................','','');
$pdf->SetXY(30,81);
$pdf->MultiCell(75,8,$arr[13],'','C');	 //Anesthetist

$pdf->SetXY(30,90);
$pdf->MultiCell(75,8,': ......................................................................','','');
$pdf->SetXY(30,89);
$pdf->MultiCell(75,8,$arr[16],'','C');	 //Anesthesia

$pdf->SetXY(45,98);
$pdf->MultiCell(60,8,': ..........................................................','','');
$pdf->SetXY(45,97);
$pdf->MultiCell(60,8,$arr[17],'','C');	 //OP Started


$pdf->SetXY(135,66);
$pdf->MultiCell(65,8,': ...............................................................','','');
$pdf->SetXY(135,65);
$pdf->MultiCell(65,8,$arr[11],'','C');	 //Assistant 1

$pdf->SetXY(135,74);
$pdf->MultiCell(65,8,': ...............................................................','','');
$pdf->SetXY(135,73);
$pdf->MultiCell(65,8,$arr[12],'','C');	 //Assistant 3

$pdf->SetXY(135,82);
$pdf->MultiCell(65,8,': ...............................................................','','');
$pdf->SetXY(135,81);
$pdf->MultiCell(65,8,$arr[14],'','C');	 //Instrument nurse

$pdf->SetXY(135,90);
$pdf->MultiCell(65,8,': ...............................................................','','');
$pdf->SetXY(135,89);
$pdf->MultiCell(65,8,$arr[15],'','C');	 //Circulate nurse

$pdf->SetXY(135,98);
$pdf->MultiCell(65,8,': ...............................................................','','');
$pdf->SetXY(135,97);
$pdf->MultiCell(65,8,$arr[18],'','C');	 //Finished



// line 4 ==================================================
$pdf->SetXY(10,106);
$pdf->MultiCell(190,24,'','TRL','');

$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,106);
$pdf->MultiCell(25,8,'Finding','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(35,106);
$pdf->MultiCell(25,8,'1\' OA','','R');
$pdf->SetXY(60,106);
$pdf->MultiCell(25,8,'ON at','','R');
$pdf->SetXY(85,106);
$pdf->MultiCell(40,8,'........................................','','C');
$pdf->SetXY(85,105);
$pdf->MultiCell(40,8,$arr[2],'','C');                             //ON at ........................
$pdf->SetXY(125,106);
$pdf->MultiCell(40,8,'Post Traumatic OA','','R');
$pdf->SetXY(35,114);
$pdf->MultiCell(40,8,'FX neck Femur','','R');
$pdf->SetXY(75,114);
$pdf->MultiCell(25,8,'DDH','','R');
$pdf->SetXY(100,114);
$pdf->MultiCell(25,8,'SCFE','','R');
$pdf->SetXY(125,114);
$pdf->MultiCell(20,8,'AS','','R');

// Checkbox Finding Varable

if($arr[22]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',40,108,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_un.jpg',40,108,4,4,'','');
}
if($arr[23]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',65,108,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_un.jpg',65,108,4,4,'','');
}
if($arr[25]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',130,108,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_ch.jpg',130,108,4,4,'','');
}
if($arr[26]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',40,116,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_ch.jpg',40,116,4,4,'','');
}
if($arr[26]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',80,116,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_ch.jpg',80,116,4,4,'','');
}
if($arr[26]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',105,116,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_ch.jpg',105,116,4,4,'','');
}
if($arr[26]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',130,116,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_ch.jpg',130,116,4,4,'','');
}





// line 5 ==================================================
$pdf->SetXY(10,130);
$pdf->MultiCell(190,16,'','TRL','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,130);
$pdf->MultiCell(25,8,'Approach','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(35,130);
$pdf->MultiCell(30,8,'Anterior','','R');
$pdf->SetXY(65,130);
$pdf->MultiCell(35,8,'Anterolateral','','R');
$pdf->SetXY(100,130);
$pdf->MultiCell(35,8,'Direct Lateral','','R');
$pdf->SetXY(135,130);
$pdf->MultiCell(50,8,'Lateral Transtrochanteric','','R');
$pdf->SetXY(35,138);
$pdf->MultiCell(38,8,'Posterolateral','','R');

if($arr[22]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',40,132,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_un.jpg',40,132,4,4,'','');
}
if($arr[22]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',70,132,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_un.jpg',70,132,4,4,'','');
}
if($arr[22]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',105,132,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_un.jpg',105,132,4,4,'','');
}
if($arr[22]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',140,132,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_un.jpg',140,132,4,4,'','');
}
if($arr[22]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',40,140,4,4,'','');
}else{ 
	$pdf->Image('img_ico/cb_un.jpg',40,140,4,4,'','');
}


// line 6 ==================================================
$pdf->SetXY(10,146);
$pdf->MultiCell(190,32,'','TRL','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,146);
$pdf->MultiCell(20,8,'Prosthesis','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(35,146);
$pdf->MultiCell(35,8,'- Acetabulm Cup','','L');
$pdf->SetXY(70,146);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(75,146);
$pdf->MultiCell(20,8,'Cementless','','L');
$pdf->SetXY(95,146);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(100,146);
$pdf->MultiCell(20,8,'Cemented','','L');

$pdf->SetXY(35,154);
$pdf->MultiCell(35,8,'- Liner','','L');
$pdf->SetXY(70,154);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(75,154);
$pdf->MultiCell(20,8,'None','','L');
$pdf->SetXY(95,154);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(100,154);
$pdf->MultiCell(22,8,'Poyethylene','','L');
$pdf->SetXY(122,154);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(127,154);
$pdf->MultiCell(13,8,'Metal','','L');
$pdf->SetXY(140,154);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(145,154);
$pdf->MultiCell(15,8,'Ceramic','','L');
$pdf->SetXY(160,154);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(165,154);
$pdf->MultiCell(20,8,'Oxinium','','L');

$pdf->SetXY(35,162);
$pdf->MultiCell(35,8,'- Femoral Head','','L');
$pdf->SetXY(70,162);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(75,162);
$pdf->MultiCell(20,8,'Metal','','L');
$pdf->SetXY(95,162);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(100,162);
$pdf->MultiCell(22,8,'Ceramic','','L');
$pdf->SetXY(122,162);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(127,162);
$pdf->MultiCell(20,8,'Oxinium','','L');

$pdf->SetXY(35,170);
$pdf->MultiCell(35,8,'- Femoral Stem','','L');
$pdf->SetXY(70,170);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(75,170);
$pdf->MultiCell(20,8,'Cementless','','L');
$pdf->SetXY(95,170);
$pdf->MultiCell(5,8,'','','L');
$pdf->SetXY(100,170);
$pdf->MultiCell(20,8,'Cemented','','L');

// Checkbox Prosthesis Varable

switch($arr[35] = 1){
	case '1' :
		$pdf->Image('img_ico/cb_ch.jpg',70,148,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',95,148,4,4,'','');
	break ;
	case '2' :
		$pdf->Image('img_ico/cb_un.jpg',70,148,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',95,148,4,4,'','');
	break ;
}
switch($arr[35] = 1){
	case '1' :
		$pdf->Image('img_ico/cb_ch.jpg',70,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',95,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',122,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',140,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',160,156,4,4,'','');
	break ;
	case '2' :
		$pdf->Image('img_ico/cb_um.jpg',70,156,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',95,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',122,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',140,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',160,156,4,4,'','');
	break ;
	case '3' :
		$pdf->Image('img_ico/cb_un.jpg',70,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',95,156,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',122,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',140,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',160,156,4,4,'','');
	break ;
	case '4' :
		$pdf->Image('img_ico/cb_un.jpg',70,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',95,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',122,156,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',140,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',160,156,4,4,'','');
	break ;
	case '5' :
		$pdf->Image('img_ico/cb_un.jpg',70,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',95,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',122,156,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',140,156,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',160,156,4,4,'','');
	break ;
}
switch($arr[35] = 1){
	case '1' :
		$pdf->Image('img_ico/cb_ch.jpg',70,164,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',95,164,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',122,164,4,4,'','');
	break ;
	case '2' :
		$pdf->Image('img_ico/cb_un.jpg',70,164,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',95,164,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',122,164,4,4,'','');
	break ;
	case '3' :
		$pdf->Image('img_ico/cb_un.jpg',70,164,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',95,164,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',122,164,4,4,'','');
	break ;
}
switch($arr[35] = 1){
	case '1' :
		$pdf->Image('img_ico/cb_ch.jpg',70,172,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',95,172,4,4,'','');
	break ;
	case '2' :
		$pdf->Image('img_ico/cb_un.jpg',70,172,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',95,172,4,4,'','');
	break ;
}
// line 7 ==================================================
$pdf->SetXY(10,178);
$pdf->MultiCell(190,96,'','1','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,178);
$pdf->MultiCell(20,8,'Procedure','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(30,178);
$pdf->MultiCell(20,8,'- Patient in','','');
$pdf->SetXY(50,178);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(60,178);
$pdf->MultiCell(10,8,'Left','','');
$pdf->SetXY(70,178);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(80,178);
$pdf->MultiCell(15,8,'Right','','');
$pdf->SetXY(95,178);
$pdf->MultiCell(50,8,'lateral decubetus position','','');

$pdf->SetXY(30,186);
$pdf->MultiCell(50,8,'- Acetabular cup was fixed by','','');
$pdf->SetXY(80,186);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(90,186);
$pdf->MultiCell(15,8,'Press fit','','');
$pdf->SetXY(105,186);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(115,186);
$pdf->MultiCell(20,8,'Screw(s)','','');
$pdf->SetXY(135,186);
$pdf->MultiCell(10,8,'.....','','');
$pdf->SetXY(135,185);
$pdf->MultiCell(10,8,'','','');          // screw(s) pcs.
$pdf->SetXY(145,186);
$pdf->MultiCell(15,8,'Pcs.','','');
$pdf->SetXY(160,186);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(170,186);
$pdf->MultiCell(25,8,'Bone cement','','');

$pdf->SetXY(30,194);
$pdf->MultiCell(100,8,'- Femoral stem was prepared by Rasps / Broaches step by step','','');

$pdf->SetXY(30,202);
$pdf->MultiCell(35,8,'- Fix femoral stem by','','');
$pdf->SetXY(65,202);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(75,202);
$pdf->MultiCell(20,8,'Press fit','','');
$pdf->SetXY(95,202);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(105,202);
$pdf->MultiCell(30,8,'Bone cement','','');

$pdf->SetXY(30,210);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(40,210);
$pdf->MultiCell(100,8,'Trial femoral neck lengt then reduction and check for stability','','');

$pdf->SetXY(30,218);
$pdf->MultiCell(150,8,'- Fix the real component and check for leg length, stability and softissue tension then redivac drain was insert. Suture was done layer by layer','','');

$pdf->SetXY(30,234);
$pdf->MultiCell(40,8,'- Repair joint capslue','','');
$pdf->SetXY(70,234);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(80,234);
$pdf->MultiCell(15,8,'Done','','');
$pdf->SetXY(95,234);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(105,234);
$pdf->MultiCell(15,8,'None','','');

$pdf->SetXY(30,242);
$pdf->MultiCell(40,8,'- Placed redivac drain at','','');
$pdf->SetXY(70,242);
$pdf->MultiCell(35,8,'...................................','','');
$pdf->SetXY(70,241);
$pdf->MultiCell(35,8,'','','');
$pdf->SetXY(105,242);
$pdf->MultiCell(10,8,'layer','','');

$pdf->SetXY(10,250);
$pdf->MultiCell(190,24,'','TRL','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,250);
$pdf->MultiCell(30,8,'Augmentaion','','');
$pdf->SetFont('angsana','',16);
$pdf->SetXY(40,250);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(50,250);
$pdf->MultiCell(20,8,'YES','','C');
$pdf->SetXY(70,250);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(80,250);
$pdf->MultiCell(20,8,'NO','','C');
$pdf->SetXY(30,258);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(40,258);
$pdf->MultiCell(25,8,'Acetabulum','','');
$pdf->SetXY(65,258);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(75,258);
$pdf->MultiCell(15,8,'None','','');
$pdf->SetXY(90,258);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(100,258);
$pdf->MultiCell(25,8,'Bone graft','','');
$pdf->SetXY(125,258);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(135,258);
$pdf->MultiCell(15,8,'Metal','','');
$pdf->SetXY(150,258);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(160,258);
$pdf->MultiCell(40,8,'Reinforcement Rings','','');

$pdf->SetXY(30,266);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(40,266);
$pdf->MultiCell(25,8,'Femur','','');
$pdf->SetXY(65,266);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(75,266);
$pdf->MultiCell(15,8,'None','','');
$pdf->SetXY(90,266);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(100,266);
$pdf->MultiCell(25,8,'Bone graft','','');
$pdf->SetXY(125,266);
$pdf->MultiCell(10,8,'','','');
$pdf->SetXY(135,266);
$pdf->MultiCell(15,8,'Metal','','');


//-----------------------Checkbox Procedure Varable
switch($arr[49]=1){
	case  '1' :
		$pdf->Image('img_ico/cb_ch.jpg',53,180,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',73,180,4,4,'','');
	break ;
	case  '2' :
		$pdf->Image('img_ico/cb_un.jpg',53,180,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',73,180,4,4,'','');
	break ;
}

if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',83,188,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',83,188,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',108,188,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',108,188,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',160,188,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',160,188,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',68,204,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',68,204,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',93,204,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',93,204,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',33,212,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',33,212,4,4,'','');
}

switch($arr[49]=1){
	case  '1' :
		$pdf->Image('img_ico/cb_ch.jpg',68,236,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',93,236,4,4,'','');
	break ;
	case  '2' :
		$pdf->Image('img_ico/cb_un.jpg',68,236,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',93,236,4,4,'','');
	break ;
}
switch($arr[49]=1){
	case  '1' :
		$pdf->Image('img_ico/cb_ch.jpg',45,252,4,4,'','');
		$pdf->Image('img_ico/cb_un.jpg',70,252,4,4,'','');
	break ;
	case  '2' :
		$pdf->Image('img_ico/cb_un.jpg',45,252,4,4,'','');
		$pdf->Image('img_ico/cb_ch.jpg',70,252,4,4,'','');
	break ;
}

if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',30,260,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',30,260,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',65,260,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',65,260,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',90,260,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',90,260,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',125,260,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',125,260,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',150,260,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',150,260,4,4,'','');
}

if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',30,268,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',30,268,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',65,268,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',65,268,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',90,268,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',90,268,4,4,'','');
}
if($arr[42]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',125,268,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',125,268,4,4,'','');
}

//=========================================== Page 2 ==============================
$pdf->AddPage();

// line 1 ==================================================
$pdf->SetXY(10,20);
$pdf->MultiCell(190,54,'','TRL','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,20);
$pdf->MultiCell(50,8,'Intraop. Compalication','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(10,28);
$pdf->MultiCell(30,8,'','','');
$pdf->SetXY(40,28);
$pdf->MultiCell(60,8,'Fracture acetabulum','','');
$pdf->SetXY(10,36);
$pdf->MultiCell(30,8,'','','');
$pdf->SetXY(40,36);
$pdf->MultiCell(50,8,'Acetabular wall protusion at','','');
$pdf->SetXY(90,36);
$pdf->MultiCell(50,8,'.............................................','','');
$pdf->SetXY(90,35);
$pdf->MultiCell(50,8,'','','');                            //-------------
$pdf->SetXY(10,44);
$pdf->MultiCell(30,8,'','','');
$pdf->SetXY(40,44);
$pdf->MultiCell(60,8,'Fracture Greater Trochanter','','');
$pdf->SetXY(10,52);
$pdf->MultiCell(30,8,'','','');
$pdf->SetXY(40,52);
$pdf->MultiCell(50,8,'Fracture femoral shaft at','','');
$pdf->SetXY(90,52);
$pdf->MultiCell(50,8,'.............................................','','');
$pdf->SetXY(90,51);
$pdf->MultiCell(50,8,'','','');                            //-------------
$pdf->SetXY(10,60);
$pdf->MultiCell(30,8,'','','');
$pdf->SetXY(40,60);
$pdf->MultiCell(60,8,'None','','');


// Checkbox Intraop. Compalication Varable
if($arr[67]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',30,30,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',30,30,4,4,'','');
}
if($arr[68]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',30,38,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',30,38,4,4,'','');
}
if($arr[69]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',30,46,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',30,46,4,4,'','');
}
if($arr[70]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',30,54,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',30,54,4,4,'','');
}
if($arr[70]=='1'){
	$pdf->Image('img_ico/cb_ch.jpg',30,62,4,4,'','');
}else{
	$pdf->Image('img_ico/cb_un.jpg',30,62,4,4,'','');
}





// line 5 ==================================================
$pdf->SetXY(10,74);
$pdf->MultiCell(190,40,'','1','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(10,74);
$pdf->MultiCell(50,8,'Complication Management','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(30,82);
$pdf->MultiCell(160,8,$arr[75],'','');						//Complication Management

// line 7 ==================================================
$pdf->SetXY(10,114);
$pdf->MultiCell(190,24,'','T','');
$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(20,114);
$pdf->MultiCell(40,8,'Extimated blood loss','','');
$pdf->SetFont('angsana','',16);
$pdf->SetXY(60,114);
$pdf->MultiCell(20,8,'...................','','C');
$pdf->SetXY(60,113);
$pdf->MultiCell(20,8,$arr[77],'','C');						//Extimated blood loss
$pdf->SetXY(80,114);
$pdf->MultiCell(10,8,'ml.','','');

// line 8 ==================================================

$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(20,130);
$pdf->MultiCell(20,8,'Singature','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(40,130);
$pdf->MultiCell(60,8,'.............................................................','','');
$pdf->SetXY(40,138);
$pdf->MultiCell(60,8,"( ".$arr[78]." )",'','C');						//Singature

$pdf->SetFont('angsana','BU',16);
$pdf->SetXY(130,130);
$pdf->MultiCell(20,8,'Date','','');

$pdf->SetFont('angsana','',16);
$pdf->SetXY(150,130);
$pdf->MultiCell(60,8,$arr[79],'','');					//Date



$pdf->Output();

?>
