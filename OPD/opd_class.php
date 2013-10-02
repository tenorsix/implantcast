<?php
session_start();

class OPD {

    function get_followup_id() {
        $sql = "SELECT * FROM follow_up_form where 1";
        $query = mysql_query($sql);
        $row = mysql_num_rows($query);
        return $row;
    }
    function get_womac_id($hn,$side) {
        $sql = "SELECT * FROM womac_knee_form where hn='".$hn."' and side='".$side."'";
        $query = mysql_query($sql);
        $id = mysql_fetch_array($query);
        return $id;
    }
    function get_visit_ponit($womac_id,$visit) {
        $sql = "SELECT * FROM visit_point where womac_id='".$womac_id."' and visit='".$visit."'";
        $query = mysql_query($sql);
        $point = mysql_fetch_array($query);
        return $point;
    }
    function insert_opd_followup($txt1,$txt2,$txt3,$txt4,$txt5,$txt6,$txt7,$txt8,$txt9,$txt10,$txt11,$txt12,$txt13,$txt14,$txt15,$txt16,$txt17,$txt18,$txt19,$txt20,$txt21,$txt22,$txt23,$txt24,$txt25,$txt26,$txt27,$txt28,$txt29,$txt30,$txt31){
        $sql = "INSERT INTO follow_up_form (`no` ,`hn` ,`full_name` ,`last_date` ,`dw` ,`mild_p` ,`moderate_p` ,`sp` ,`amb` ,`ww` ,`wa` ,`spnp` ,`sw` ,`ery` ,
            `warm` ,`gs` ,`sd` ,`pd` ,`wd` ,`rom` ,`point_womac` ,`kss` ,`sk_tak` ,`qs` ,`st` ,`visit` ,`xray` ,`cbc` ,`esr` ,`crp` ,`side`)
            VALUES ('".$txt1."','".$txt2."','".$txt3."','".$txt4."','".$txt5."',
                '".$txt6."','".$txt7."','".$txt8."','".$txt9."','".$txt10."',
                '".$txt11."','".$txt12."','".$txt13."','".$txt14."','".$txt15."',
                '".$txt16."','".$txt17."','".$txt18."','".$txt19."','".$txt20."',
                '".$txt21."','".$txt22."','".$txt23."','".$txt24."','".$txt25."',
                '".$txt26."','".$txt27."','".$txt28."','".$txt29."','".$txt30."','".$txt31."');";
         mysql_query($sql);
         //echo $sql;
    }
} 




?>
