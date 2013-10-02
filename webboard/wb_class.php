<?php

class wb_class {

    private $numrow = 0;

    function getnumrow() {
        return $this->numrow;
    }

    function GetAllTopic($sql, $Group) {
        $strSQL = "SELECT * FROM webboard where GroupID = '" . $Group . "'" . $sql;
        $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
        $num = mysql_num_rows($objQuery);
        $this->numrow = $num;
        $i = 0;
        while ($result = mysql_fetch_array($objQuery)) {
            for ($j = 0; $j <= 8; $j++) {
                $arr[$i][$j] = $result[$j];
            }
            $i++;
        }
        //echo "<br>".$strSQL."<br>";
        return $arr;
    }

    function CreateNewTopic($date, $txtQuestion, $txtDetails, $txtName, $GroupID, $UploadFile) {
        $strSQL = "INSERT INTO webboard ";
        $strSQL .="(CreateDate,Question,Details,Name,GroupID,UploadFile) ";
        $strSQL .="VALUES ";
        $strSQL .="('" . $date . "','" . $txtQuestion . "','" . $txtDetails . "','" . $txtName . "','" . $GroupID . "','" . $UploadFile . "') ";
        $objQuery = mysql_query($strSQL);
    }

    function InsertReply($QuestionID,$CreateDate,$Details,$Name,$UploadFile) {
        $strSQL = "INSERT INTO reply ";
        $strSQL .="(QuestionID,CreateDate,Details,Name,UploadFile) ";
        $strSQL .="VALUES ";
        $strSQL .="('" . $QuestionID . "','" . $CreateDate . "','" . $Details . "','" . $Name . "','".$UploadFile."') ";
        $objQuery = mysql_query($strSQL);

        //*** Update Reply ***//
        $strSQL = "UPDATE webboard ";
        $strSQL .="SET Reply = Reply + 1 WHERE QuestionID = '" . $QuestionID . "' ";
        $objQuery = mysql_query($strSQL);
    }
    function SelectQuestion($QuestionID) {
        $strSQL = "SELECT * FROM webboard  WHERE QuestionID = '" . $QuestionID . "' ";
        $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
        $objResult = mysql_fetch_array($objQuery);
        return $objResult;
    }
    function UpdateView($QuestionID) {
        //*** Update View ***//
        $strSQL = "UPDATE webboard ";
        $strSQL .="SET View = View + 1 WHERE QuestionID = '" . $QuestionID . "' ";
        $objQuery = mysql_query($strSQL);
    }
    function GetRely($QuestionID) {
        $strSQL = "SELECT * FROM reply  WHERE QuestionID = '" . $QuestionID . "' ";
        $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
        $num = mysql_num_rows($objQuery);
        $this->numrow = $num;
        $i=0;
        while ($objResult = mysql_fetch_array($objQuery)) {
            for ($j = 0; $j <= 5; $j++) {
                $arr[$i][$j] = $objResult[$j];
            }
            $i++;
        }
        return $arr;
    }
    function GetRowUser()
    {
        $strSQL = "SELECT * FROM user";
        $objQuery = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
        $num = mysql_num_rows($objQuery);
        return $num;
    }
    function InsertNewUser($Name,$LastName,$ID,$Password,$Email,$Uid) {
        $strSQL = "INSERT INTO user ";
        $strSQL .="(id,pass,name,surname,hid,Uid,Lv,email) ";
        $strSQL .="VALUES ";
        $strSQL .="('" . $ID . "','" . $Password . "','" . $Name . "','" . $LastName . "','-','".$Uid."','6','".$Email."') ";
        $objQuery = mysql_query($strSQL);
        //echo $strSQL;
    }

}

?>
