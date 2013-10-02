<?

session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php"><?
}

include "ConnectDB.php";
$DBk1 = new ConnectDB();
$DBk1->connect();
$DBk1->insertk1($_SESSION["k1"][0],
        $_SESSION["k1"][1] ,$_SESSION["k1"][2] ,$_SESSION["k1"][3] ,$_SESSION["k1"][4] ,$_SESSION["k1"][5] ,
        $_SESSION["k1"][6] ,$_SESSION["k1"][7] ,$_SESSION["k1"][8] ,$_SESSION["k1"][9] ,$_SESSION["k1"][10],
        $_SESSION["k1"][11],$_SESSION["k1"][12],$_SESSION["k1"][13],$_SESSION["k1"][14],$_SESSION["k1"][15],
        $_SESSION["k1"][16],$_SESSION["k1"][17],$_SESSION["k1"][18],$_SESSION["k1"][19],$_SESSION["k1"][20],
        $_SESSION["k1"][21],$_SESSION["k1"][22],$_SESSION["k1"][23],$_SESSION["k1"][24],$_SESSION["k1"][25],
        $_SESSION["k1"][26],$_SESSION["k1"][27],$_SESSION["k1"][28],$_SESSION["k1"][29],$_SESSION["k1"][30],
        $_SESSION["k1"][31],$_SESSION["k1"][32],$_SESSION["k1"][33],$_SESSION["k1"][34],$_SESSION["k1"][35],
        $_SESSION["k1"][36],$_SESSION["k1"][37],$_SESSION["k1"][38],$_SESSION["k1"][39],$_SESSION["k1"][40],
        $_SESSION["k1"][41],$_SESSION["k1"][42],$_SESSION["k1"][43],$_SESSION["k1"][44],$_SESSION["k1"][45],
        $_SESSION["k1"][46],$_SESSION["k1"][47],$_SESSION["k1"][48],$_SESSION["k1"][49],$_SESSION["k1"][50],
        $_SESSION["k1"][51],$_SESSION["k1"][52],$_SESSION["k1"][53],$_SESSION["k1"][54],$_SESSION["k1"][55],
        $_SESSION["k1"][56],$_SESSION["k1"][57],$_SESSION["k1"][58],$_SESSION["k1"][59],$_SESSION["k1"][60],
        $_SESSION["k1"][61],$_SESSION["k1"][62],$_SESSION["k1"][63],$_SESSION["k1"][64],$_SESSION["k1"][65],
        $_SESSION["k1"][66],$_SESSION["k1"][67],$_SESSION["k1"][68],$_SESSION["k1"][69],$_SESSION["k1"][70],
        $_SESSION["k1"][71],$_SESSION["k1"][72],$_SESSION["k1"][73],$_SESSION["k1"][74],$_SESSION["k1"][75],
        $_SESSION["k1"][76],$_SESSION["k1"][77],$_SESSION["k1"][78]);
unset($_SESSION["k1"]);
$_SESSION["nofooter"] = 1;
include "index.php";
?>

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
    </div>
    <div class="span8">
        <table class ="table table-hover table-bordered table-condensed">
            <tr>
                <td>
                    <div class="inline text-center">
                        <h3>Save Done...</h3>
                    </div>
                </td>
            </tr>
            
        </table>
    </div>
  </div>
</div>

<?
include "footer.php";
?><META HTTP-EQUIV="Refresh" CONTENT="2;URL=RNP_view.php">
