<?php

class Article {

    function insertcomment($aticle_id, $name, $comment, $lastpostnumber) {
        $sql = "INSERT INTO `aticle_comment`(`aticle_id`, `postnumber`, `ip`, `name`, `comment`) 
        VALUES (" . $aticle_id . "," . $lastpostnumber . ",'" . $_SERVER['REMOTE_ADDR'] . "','" . $name . "','" . $comment . "');";
        //echo "<br>".$sql;
        mysql_query($sql);
    }

    function manage_string($detail) {
        $temp = "";
        for ($i = 0; $i < strlen($detail); $i++) {
            if (substr($detail, $i, 1) != ' ') {
                $temp = $temp . substr("$detail", $i, 1);
            } else {
                $temp = $temp . "&nbsp;";
            }
        }
        $temp = nl2br($temp);
        return($temp);
    }

    function getPostNumber($aticle_id) {
        $sql = "select * from `aticle_comment` where aticle_id = " . $aticle_id . ";";
        $data = mysql_query($sql);
        $num = (int) mysql_num_rows($data) + 1;
        return $num;
    }

    function getAllPost($aticle_id) {
        $sql = "select * from `aticle_comment` where aticle_id = " . $aticle_id . ";";
        $data = mysql_query($sql);
        $i = 1;
        echo "<table class='table table-bordered'>";
        echo "<tr><td><h3>Comment</h3></td></tr>";
        while ($comment = mysql_fetch_array($data)) {
            //echo $comment[0]."<br>";
            //echo $comment[1]."<br>";
            echo "<tr><td>";
            echo "<strong>Name : </strong>" . $comment[3] . "<br>"; // name
//                echo "</td></tr>";
//                echo "<tr><td>";
            echo "<strong>Comment #" . $i . "</strong> <br>" . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $comment[4] . "<br>"; // comment
//                echo "</td></tr>";
//                echo "<tr><td>";
            echo "<strong>IP : </strong> " . $comment[2] . "<br>"; // ip
//                echo "</td></tr>";
//                echo "<tr><td>";
            echo "<strong>Last Post : </strong>" . $comment[5] . "<br>"; // last comment
            echo "</td></tr>";
            echo "<tr><td></td></tr>";
            ++$i;
        }
        echo "</table>";
        return $i;
    }

}

?>
