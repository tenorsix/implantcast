<?
    session_start();
if ($_SESSION["name"]=="" || $_SESSION["lastname"]=="")
{
	?><META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php"><?
}
?>

<script language="JavaScript"> 
function enableDD() {     
            //alert("bobo");
            document.getElementById("area").style.display="block";
        
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("area").innerHTML=xmlhttp.responseText;
                }
            }
  
            xmlhttp.open("GET","ajax.php?search="+document.form1.search.value,true);
   
            xmlhttp.send();
	
} 
</script>
<?
    include '../OPD/call_framework_bs3.php';
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
      
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      
    </button>
      
      <a class="navbar-brand" href="main_opd.php">PAJAC OPD Management System</a>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="../index.php">Back to home</a></li>
      <li class="active"><a href="#">Main</a></li>
      <li><a href="../Check_Logout.php">Logout</a></li>
<!--      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>-->
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
      <br>
      <br>
<div class="container">
    <div class="inline text-left">
        <br>
        <h1>OPD Management System</h1>
        <h2>Welcome <?echo $_SESSION["name"]."  ".$_SESSION["lastname"];?></h2>
    </div>
</div>  
    
<div class="container">
    <div class="row">
        <div class="col-lg-3 text-center">
            
        </div>
        <div class="col-lg-6 text-center">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" > 
                <input type="text" name="search" class="col-lg-6 form-control" id="pre2" onkeyup="enableDD()" onchange="enableDD()" placeholder="ค้นหาโดย ชื่อ, นามสกุล, หมายเลข HN" autocomplete="off">
            <!--<input type="submit" class="" >-->
            </form>
        </div>
        <div class="col-lg-3 text-center">
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <?php
                echo "<div name='area' id='area' style='display:none'></div>";
            ?> 
        </div>
    </div>
</div>
  </body>
</html>


