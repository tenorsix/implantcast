<?
session_start();
$_SESSION["page"] = '4';
include '../ConnectDB.php';
include './call_framework_wb_bs3.php';
include './wb_class.php';
?>
<html>
    <head>
        <script language="javascript">
            function ChkName(){
                if (document.form1.Name.value == "")
                {
                    //alert('Please insert your name');
                    document.getElementById("mySpan1").innerHTML = "<span class='label label-danger'>Please fill</span>"
                    //document.form1.Name.focus();
                    return false;
                }else{
                    document.getElementById("mySpan1").innerHTML = "<span class='label label-success'> OK </span>";
                    return true;
                }
            }
            function ChkLastName(){
                if (document.form1.LastName.value == "")
                {
                    //alert('Please insert your name');
                    document.getElementById("mySpan2").innerHTML = "<span class='label label-danger'>Please fill</span>"
                    //document.form1.Name.focus();
                    return false;
                }else{
                    document.getElementById("mySpan2").innerHTML = "<span class='label label-success'> OK </span>";
                    return true;
                }
            }
            function ChkPassword(){
                if (document.form1.Password.value == "")
                {
                    //alert('Please insert your name');
                    document.getElementById("mySpan4").innerHTML = "<span class='label label-danger'>Please fill</span>"
                    //document.form1.Name.focus();
                    return false;
                }else if(document.form1.Password.value.length <= 3){
                    document.getElementById("mySpan4").innerHTML = "<span class='label label-danger'>More than 4</span>"
                    return false;
                }else{
                    document.getElementById("mySpan4").innerHTML = "<span class='label label-success'> OK </span>";
                    return true;
                }
            }
            function ChkPasswordConfirm(){
                if (document.form1.PasswordC.value == "")
                {
                    //alert('Please insert your name');
                    document.getElementById("mySpan5").innerHTML = "<span class='label label-danger'>Please fill</span>"
                    //document.form1.Name.focus();
                    return false;
                }else if(document.form1.Password.value != document.form1.PasswordC.value){
                    document.getElementById("mySpan4").innerHTML = "<span class='label label-danger'>Pass Not Match</span>"
                    document.getElementById("mySpan5").innerHTML = "<span class='label label-danger'>Pass Not Match</span>"
                    return false;
                }else{
                    document.getElementById("mySpan5").innerHTML = "<span class='label label-success'> OK </span>";
                    return true;
                }
            }
            
            function ChkEmail(){
//                if (document.form1.Email.value == "")
//                {
//                    //alert('Please insert your name');
//                    document.getElementById("mySpan6").innerHTML = "<span class='label label-danger'>Please fill</span>"
//                    //document.form1.Name.focus();
//                    return false;
//                }else{
//                    document.getElementById("mySpan6").innerHTML = "<span class='label label-success'> OK </span>";
//                    return true;
//                }
            }
            function fncSubmit()
            {
                if (document.form1.LastName.value == "")
                {
//                    alert('Please insert your last name');
//                    document.form1.LastName.focus();
                    return false;
                }

                if (document.form1.ID.value == "")
                {
//                    alert('Please insert your Login ID');
//                    document.form1.ID.focus();
                    return false;
                }
                    
                if (document.form1.Password.value == "")
                {
//                    alert('Please insert Password');
//                    document.form1.Password.focus();
                    return false;
                }
                if (document.form1.Password.value.length <= 3)
                {
//                    alert('Please enter the password more than 4 letters');
//                    document.form1.Password.focus();
                    return false;
                }
                if (document.form1.PasswordC.value == "")
                {
//                    alert('Please insert Password Confirm');
//                    document.form1.PasswordC.focus();
                    return false;
                }

                if (document.form1.Password.value != document.form1.PasswordC.value)
                {
//                    alert('Password Not Match');
//                    document.form1.Password.focus();
                    return false;
                }

//                if (document.form1.Email.value == "")
//                {
//                    alert('Please insert Email');
//                    document.form1.Email.focus();
//                    return false;
//                }
                if (document.form1.register_error.value == "1")
                {
                    alert('Unique ID');
                    document.form1.ID.focus();
                    return false;
                }
                
            }
            function chkrule()
            {
                if (document.form1.Accept1.checked)
                {
                    //alert('Enable');
                    document.getElementById('submit_btn').disabled = false;
                } else {
                    //alert('Disable');
                    document.getElementById('submit_btn').disabled = true;
                }
            }
            function doCallAjax() {
                HttPRequest = false;
                if (window.XMLHttpRequest) { // Mozilla, Safari,...
                    HttPRequest = new XMLHttpRequest();
                    if (HttPRequest.overrideMimeType) {
                        HttPRequest.overrideMimeType('text/html');
                    }
                } else if (window.ActiveXObject) { // IE
                    try {
                        HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                        }
                    }
                }

                if (!HttPRequest) {
                    alert('Cannot create XMLHTTP instance');
                    return false;
                }

                var url = 'user_chk.php';
                var pmeters = "tID=" + encodeURI(document.getElementById("ID").value);


                HttPRequest.open('POST', url, true);

                HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //HttPRequest.setRequestHeader("Content-length",pmeters.length);
                //HttPRequest.setRequestHeader("Connection","close");
                HttPRequest.send(pmeters);


                HttPRequest.onreadystatechange = function()
                {

                    if (HttPRequest.readyState == 3)  // Loading Request
                    {
                        document.getElementById("mySpan3").innerHTML = "..";
                    }

                    if (HttPRequest.readyState == 4) // Return Request
                    {
                        if (HttPRequest.responseText == 'Y')
                        {
                            window.location = 'user_chk.php';
                        }
                        else
                        {
                            document.getElementById("mySpan3").innerHTML = HttPRequest.responseText;
                        }
                    }

                }

            }
        </script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="Webboard_Category.php">PAJAC Webboard Community</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../index.php">Back to home</a></li>
                        <li class="active"><a href="Webboard_Category.php">Main</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 alert alert-info">
                <form action="./check_register.php" method="post" class="form-horizontal" role="form" name="form1" OnSubmit="return fncSubmit();">
                    <div class="form-group inline text-center">
                        <h3><strong>Member Information</strong></h3>
                    </div>
                    <div class="form-group">
                        <label for="Name" class="col-lg-offset-1 col-lg-3 control-label"><span id="mySpan1"></span>&nbsp;&nbsp;&nbsp;Name</label>
                        <div class="col-lg-offset-1 col-lg-4">
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Your Name" autocomplete="off" onblur="return ChkName();">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-lg-offset-1 col-lg-3 control-label"><span id="mySpan2"></span>&nbsp;&nbsp;&nbsp;Last name</label>
                        <div class="col-lg-offset-1 col-lg-4">
                            <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Your Last name" autocomplete="off" onblur="return ChkLastName();">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ID" class="col-lg-offset-1 col-lg-3 control-label"><span id="mySpan3"></span>&nbsp;&nbsp;&nbsp;Login ID</label>
                        <div class="col-lg-offset-1 col-lg-4">
                            <input type="text" class="form-control" id="ID" name="ID" placeholder="Login ID" autocomplete="off" onblur="return doCallAjax();" OnChange="JavaScript:doCallAjax();" onkeyup="JavaScript:doCallAjax();">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-lg-offset-1 col-lg-3 control-label"><span id="mySpan4"></span>&nbsp;&nbsp;&nbsp;Password</label>
                        <div class="col-lg-offset-1 col-lg-4">
                            <input type="password" class="form-control" id="Password" name="Password" placeholder="Password" autocomplete="off" onblur="return ChkPassword();">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passwordC" class="col-lg-offset-1 col-lg-3 control-label"><span id="mySpan5"></span>&nbsp;&nbsp;&nbsp;Password Confirm</label>
                        <div class="col-lg-offset-1 col-lg-4">
                            <input type="password" class="form-control" id="PasswordC" name="PasswordC" placeholder="Password Confirm" autocomplete="off" onblur="return ChkPasswordConfirm();">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-lg-offset-1 col-lg-3 control-label"><span id="mySpan6"></span>&nbsp;&nbsp;&nbsp;E-mail</label>
                        <div class="col-lg-offset-1 col-lg-4">
                            <input type="text" class="form-control" id="Email" placeholder="Email" name="Email" autocomplete="off" onblur="return ChkEmail();">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-3">
                            <br>
                            <button type="submit" id="submit_btn" class="btn btn-block btn-success" disabled="disabled">Register</button>
                        </div>
                        <div class="col-lg-3">
                            <br>
                            <button type="reset" class="btn btn-block btn-danger" onClick="document.getElementById('submit_btn').disabled = true;">Cancel</button>
                        </div>
                    </div>
                    <div class="col-lg-offset-3 col-lg-6 btn btn-warning">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" name="Accept1" id="Accept1" onClick="chkrule();">
                                Accept the terms and conditions of use webboard.
                            </label>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-offset-3 col-lg-9">
                <?
                include './rule.php';
                ?>
            </div>
        </div>

    </body>
</html>