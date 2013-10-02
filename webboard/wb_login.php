<?
session_start();
?>

<div class="col-lg-4">
    <form class="form" method="post" name="form1" id="form1" action="../Check_Login.php">
        <?
        if ($_SESSION["name"] == "" || $_SESSION["lastname"] == "") {
            if ($_SESSION["loginerror"] == "1") {
                ?>
                <div class="col-lg-12 alert alert-info">
                    <div class="inline text-center">
                        <h2>Login</h2>
                    </div>
                    <div class="inline text-center">
                        <input type="text" class="form-control input-lg" name="user" placeholder="Username">
                        <input type="password" class="form-control input-lg" name="pass" placeholder="Password"><br>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="./register_webboard.php" class="btn btn-success">Register</a>
                        <a href="#" class="btn btn-warning">forget password</a><br><br>
                        <div class="alert alert-danger">
                            <a href="#" class="alert-link">
                                Log In Fail ( ID or Password incorrect )    
                            </a>
                        </div>
                    </div>
                </div> 
                <?
                $_SESSION["name"] = "";
                $_SESSION["lastname"] = "";
                $_SESSION["loginerror"] = "";
            } else {
                ?>
                <div class="col-lg-12 alert alert-info">
                    <div class="inline text-center">
                        <h2>Login</h2>
                    </div>
                    <div class="inline text-center">
                        <input type="text" class="form-control input-lg" name="user" placeholder="Username">
                        <input type="password" class="form-control input-lg" name="pass" placeholder="Password"><br>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="./register_webboard.php" class="btn btn-success">Register</a>
                        <a href="#" class="btn btn-warning">forget password</a>
                    </div>
                </div> 
                <?
            }
        } else {
            ?>
            <div class="col-lg-12 alert alert-info">                
                <h4><strong>Welcome <? echo $_SESSION["name"] . "  " . $_SESSION["lastname"] . "  "; ?></strong></h4>
                <div class="inline"><a href="#"><h6>Profile</h6></a></div>
                <div class="inline"><a href="#"><h6>Change Password</h6></a></div>
                <h4>.....</h4>
                <div class="inline"><a href="../Check_Logout.php?wb=1" class="btn btn-default btn-block btn-lg">Logout</a></div>
            </div>

            <?
        }
        ?> 

    </form>    



</div>
