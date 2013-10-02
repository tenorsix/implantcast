<html>
<head>
<title>ThaiCreate.Com PHP & CSV To MySQL</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<body>
<?
move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database"); // Conect to MySQL
$objDB = mysql_select_db("mydatabase");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");

//mysql_query("SET NAMES UTF8");

$objCSV = fopen($_FILES["fileCSV"]["name"], "r");
$i=0;
//while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
//	$strSQL = "INSERT INTO patients ";
//	$strSQL .="(patients_id,HN,AN,name,sname,hospital,b_day,age,sex,weight,height,BMI,operator,textsearch)";
//	$strSQL .="VALUES ";
//	$strSQL .="('','".$objArr[0]."','' ";
//	$strSQL .=",'".iconv( 'TIS-620', 'UTF-8', $objArr[2])."','".iconv( 'TIS-620', 'UTF-8', $objArr[3])."','".$objArr[4]."','".iconv( 'TIS-620', 'UTF-8', $objArr[5])."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."','".$objArr[9]."','".$objArr[10]."','".$objArr[11]."','".iconv( 'TIS-620', 'UTF-8', $objArr[12])."') ";
//
//	echo $strSQL."<BR>";
//	$objQuery = mysql_query($strSQL);
//	echo $i." | hn : ".$objArr[0]." | an : ".$objArr[1]." | name : ".iconv( 'TIS-620', 'UTF-8', $objArr[2])." | sname : ".iconv( 'TIS-620', 'UTF-8', $objArr[3])." | hospital : ".$objArr[4]." | b_day : ".iconv( 'TIS-620', 'UTF-8', $objArr[5])." | age : ".$objArr[6]." | sex :".$objArr[7]." | weight :".$objArr[8]." | height : ".$objArr[9]." | BMI : ".$objArr[10]." | operator : ".$objArr[11]." | txtsearch : | ".iconv( 'TIS-620', 'UTF-8', $objArr[12])."<br> ";
//	$i++;
//}
while (($objArr = fgetcsv($objCSV, 15000, ",")) !== FALSE) {
	$strSQL = "INSERT INTO product_list ";
	$strSQL .="(pid,barcode,pimge,pref,pname,penable)";
	$strSQL .="VALUES ";
	$strSQL .="('".$i."','".$objArr[1]."','.' ";
	$strSQL .=",'".iconv( 'TIS-620', 'UTF-8', $objArr[3])."','".iconv( 'TIS-620', 'UTF-8', $objArr[4])."','".$objArr[5]."')";

	echo $strSQL."<BR>";
	$objQuery = mysql_query($strSQL);
        
	echo $objArr[0]."  |  ".$objArr[1]."  |  ".$objArr[2]."  |  ".$objArr[3]."  |  ".iconv( 'TIS-620', 'UTF-8', $objArr[4])."  |  ".$objArr[5]."  |  "."<BR>";
        $i++;
}
fclose($objCSV);
//$sql_insert = " INSERT INTO patients 
//(patients_id,HN,AN,name,sname,hospital,b_day,age,sex,weight,height,BMI,operator) 
//VALUES ('', '".$t1."','".$t2."','".$t3."','".$t4."','".$hid[0]."','".$t6."','".$t7."','".$t8."','".$t9."','".$t10."','".$t11."','".$opid[0]."');";close($objCSV);

echo "Upload & Import Done.";
?>
</table>
</body>
</html>