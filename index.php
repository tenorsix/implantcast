<?
session_start();
include "header.php";
include "ConnectDB.php";
$_SESSION["page"] = '0';
?>      
<html>
    <body data-spy="scroll" data-target=".bs-docs-sidebar" >
        <br>
        <div class="container">
            <ul class="nav nav-pills">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="FAQs.php">FAQs</a></li>
                <li><a href="Article/Article_index.php">Article</a></li>
                <li><a href="#">News & Event</a></li>
                <li><a href="webboard/Webboard_Category.php">Webboard</a></li>
                <li><a href="#">Contract Us</a></li>
            </ul>   
        </div>
        <div class="container alert alert-info2">
            <form class="form" method="post" name="form1" id="form1" action="Check_Login.php">
                <?
                if ($_SESSION["name"] == "" || $_SESSION["lastname"] == "") {
                    if ($_SESSION["loginerror"] == "1") {
                        ?>
                        <div class="container span3">
                            <div class="inline text-left">
                                <h2><strong>Login </strong>&nbsp;
                                    <a href="#" data-toggle="popover" title="Hint" data-content="สำหรับผู้ใช้งานระบบ ทันทึกข้อมูล หากต้องการใช้งานติดต่อ Administrator ครับ                  ขอบคุณครับ       "data-placement="top"><small> hint</small></a></h2>
                            </div>
                            <div class="inline text-left">
                                <input type="text" class="input-large" name="user" placeholder="youremail@parjac.org">
                                <input type="password" class="input-large" name="pass" placeholder="Password">
                                <button type="submit" class="btn btn-primary">Login</button><br>
                                <span class="badge badge-important">Log In Fail ( ID or Password incorrect )</span>
                            </div>
                        </div> 
                        <?
                        $_SESSION["name"] = "";
                        $_SESSION["lastname"] = "";
                        $_SESSION["loginerror"] = "";
                    } else {
                        ?>
                        <div class="container span3">
                            <div class="inline text-left">
                                <strong>Login </strong>&nbsp;
                                <a href="#" data-toggle="popover" title="Hint" data-content="สำหรับผู้ใช้งานระบบ ทันทึกข้อมูล หากต้องการใช้งานติดต่อ Administrator ครับ                  ขอบคุณครับ       "data-placement="top"><small> hint</small></a>
                            </div>
                            <div class="inline text-left">
                                <input type="text" class="input-large" name="user" placeholder="youremail@parjac.org">
                                <input type="password" class="input-large" name="pass" placeholder="Password">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div> 
                        <?
                    }
                } else {
                    ?>
                    <div class="container span3">
                        <h5><strong>Welcome <? echo $_SESSION["name"] . "  " . $_SESSION["lastname"] ?></strong></h5>
                        <?
                        if ($_SESSION["userlv"] < 6 && $_SESSION["userlv"] != "") {
                            ?>
                            <div class="inline"><a href="OR/main_or.php" class="btn btn-warning btn-block">OR Management</a></div>
                            <div class="inline"><a href="OPD/main_opd.php" class="btn btn-info btn-block">OPD Management</a></div>
                            <?
                        }
                        ?>
                        <div class="inline"><a href="#"><h6>Profile</h6></a></div>
                        <div class="inline"><a href="#"><h6>Change Password</h6></a></div>

                        <div class="inline"><a href="Check_Logout.php" class="btn btn-inverse btn-block">Logout</a></div>
                    </div>

                    <?
                }
                ?> 

            </form>

            <div class="container span9">
                <div class="inline">
                    <div class="thumbnail">
                        <img src="images/5-3.png" width="100%">
                    </div>
                    <div class="text-left visible-desktop">
                        <h4>Website นี้ เผยแพร่ความรู้ความเข้าใจที่ถูกต้อง เกี่ยวกับการผ่าตัดข้อเข่า และข้อสะโพก ซึ่ง้ป็นการผ่าตัดในคนหนุ่มสาว รวมถึงข้อจำกัด เปิดโอกาสให้คนไทย เข้าถึงข้อมูลที่เป็นประโยชน์ในการเปลี่ยนข้อสะโพกแบบใหม่นี้ เช่นเดียวกับ website ต่างประเทศที่มีการเผยแพร่กันอย่างกว้างขวาง</h4> 
                    </div>
                    <div class="text-left hidden-desktop">
                        <h6>Website นี้ เผยแพร่ความรู้ความเข้าใจที่ถูกต้อง เกี่ยวกับการผ่าตัดข้อเข่า และข้อสะโพก ซึ่ง้ป็นการผ่าตัดในคนหนุ่มสาว รวมถึงข้อจำกัด เปิดโอกาสให้คนไทย เข้าถึงข้อมูลที่เป็นประโยชน์ในการเปลี่ยนข้อสะโพกแบบใหม่นี้ เช่นเดียวกับ website ต่างประเทศที่มีการเผยแพร่กันอย่างกว้างขวาง</h6> 
                    </div>
                    <br>
                </div>
            </div>

        </div>
        <!-- ===================================================================================================================== -->
        <?
        $DB = new ConnectDB();
        $DB->connect();
        $text = "aticle_picture	!= '' ORDER BY  aticle_id DESC  LIMIT 0 , 5";
        $Allarticle = $DB->getAllArticle($text);
        $numberarticle = $DB->getnumrow();

        include './Article/Article_Class.php';
        $Article_Class = new Article();
        ?>
        <div class="container alert alert-info2">
            <div class="container span6 visible-desktop">
                <div class="inline">
                    <h3>Article review  <? // echo " >>".$numberarticle;     ?></h3>
                    <h6>New Article .....</h6>

                    <div class="container span8 offset1">
                        <?
                        for ($i = 0; $i < 5; $i++) {

                            $articletxt = $Article_Class->manage_string($Allarticle[$i][4]);
                            ?>

                            <div class="container span8">

                                <li>
                                    <div class="caption">
                                        <strong><a href="#myModal<? echo $i; ?>" role="button" data-toggle="modal"><? echo $Allarticle[$i][1] . " ...."; ?></a></strong>&nbsp;&nbsp;&nbsp;   
        <!--                                <a href="#myModal<? echo $i; ?>" role="button" class="btn btn-primary btn-mini" data-toggle="modal">Read More...</a>-->


                                    </div>
                                </li>      

                                <div id="myModal<? echo $i; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel<? echo $i; ?>"><? echo $Allarticle[$i][3]; ?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <?
                                        if ($Allarticle[$i][2] != "") {
                                            ?>
                                            <div class="container">
                                                <div class="container span4"></div>
                                                <div class="container span4">
                                                    <a href="Article/images/<? echo $Allarticle[$i][2]; ?>" class="thumbnail">
                                                        <img src="Article/images/<? echo $Allarticle[$i][2]; ?>" alt="Article/images/<? echo $Allarticle[$i][2]; ?>" class="img-rounded">
                                                    </a>
                                                </div>
                                                <div class="container span4"></div>
                                            </div>

                                            <br>
                                            <?
                                        }
                                        ?>
                                        <p><? echo $articletxt; ?></p>
                                        <?
                                        $lastcomment = $Article_Class->getAllPost($Allarticle[$i][0]);
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="inline text-left">
                                            <form method="post" action="index.php">
                                                <div class="inline text-left">
                                                    <strong>Comment #<? echo $lastcomment; ?></strong><br>
                                                </div>
                                                <div class="inline text-left">
                                                    <strong>Name : </strong><input type="text" class="input-medium" name="txt1" placeholder="Your Name"><br>
                                                </div>
                                                <textarea rows="4" cols="50" name="txt2" id="mybox">
                                                </textarea>
                                                <!--Article id-->
                                                <input type="hidden" name="txt3" value="<? echo $Allarticle[$i][0] ?>"> 
                                                <!--post number-->
                                                <input type="hidden" name="txt4" value="<? echo $lastcomment ?>"> 

                                                <button type="submit" class="btn btn-primary btn-large">Send</button>
                                            </form>
                                        </div>
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                    </div>
                                </div> 
                            </div>
                            <?
                        }
                        ?>                                
                    </div>

                </div>
                <div class="container offset1 span8">
                    <br>
                    <a href="Article/Article_index.php" class="btn btn-mini btn-info">See More Article</a>
                </div>
            </div>


            <div class="container span6">
                <div class="thumbnail">
                    <div id="myCarouselAr" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarouselAr" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarouselAr" data-slide-to="2"></li>
                            <li data-target="#myCarouselAr" data-slide-to="3"></li>
                            <li data-target="#myCarouselAr" data-slide-to="4"></li>
                            <li data-target="#myCarouselAr" data-slide-to="5"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="active item"><img src="Article/images/<? echo $Allarticle[0][2] ?>" alt="1">
                                <div class="carousel-caption">
                                    <p><? echo $Allarticle[0][1]; ?></p>
                                    <p><a href="Article/Article_index.php" class="btn btn-mini btn-primary">read more..</a></p>
                                </div>
                            </div>
                            <div class="item"><img src="Article/images/<? echo $Allarticle[1][2] ?>" alt="2">
                                <div class="carousel-caption">
                                    <p><? echo $Allarticle[1][1]; ?></p>
                                    <p><a href="Article/Article_index.php" class="btn btn-mini btn-primary">read more..</a></p>
                                </div>
                            </div>
                            <div class="item"><img src="Article/images/<? echo $Allarticle[2][2] ?>" alt="3">
                                <div class="carousel-caption">
                                    <p><? echo $Allarticle[2][1]; ?></p>
                                    <p><a href="Article/Article_index.php" class="btn btn-mini btn-primary">read more..</a></p>
                                </div>
                            </div>
                            <div class="item"><img src="Article/images/<? echo $Allarticle[3][2] ?>" alt="4">
                                <div class="carousel-caption">
                                    <p><? echo $Allarticle[3][1]; ?></p>
                                    <p><a href="Article/Article_index.php" class="btn btn-mini btn-primary">read more..</a></p>
                                </div>
                            </div>
                            <div class="item"><img src="Article/images/<? echo $Allarticle[4][2] ?>" alt="5">
                                <div class="carousel-caption">
                                    <p><? echo $Allarticle[4][1]; ?></p>
                                    <p><a href="Article/Article_index.php" class="btn btn-mini btn-primary">read more..</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="visible-desktop">
                            <!--<img src="images/6-1.jpg" class="carousel-control left" href="#myCarousel2" data-slide="prev">-->
                            <img src="images/6-1fix.jpg" class="carousel-control right" href="#myCarouselAr" data-slide="next">
                        </div>
                        <div class="hidden-desktop">
                            <a class="carousel-control1 left" href="#myCarouselAr" data-slide="prev">&lsaquo;</a>
                            <a class="carousel-control1 right" href="#myCarouselAr" data-slide="next">&rsaquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container span6 hidden-desktop">
                <div class="inline">
                    <h5>Article Review</h5>
                    <?
                        for ($i = 0; $i < 5; $i++) {

                            $articletxt = $Article_Class->manage_string($Allarticle[$i][4]);
                            ?>

                            <div class="container span8">

                                <li>
                                    <div class="caption">
                                        <strong><a href="#myModalmo<? echo $i; ?>" role="button" data-toggle="modal"><? echo $Allarticle[$i][1] . " ...."; ?></a></strong>&nbsp;&nbsp;&nbsp;   
        <!--                                <a href="#myModal<? echo $i; ?>" role="button" class="btn btn-primary btn-mini" data-toggle="modal">Read More...</a>-->


                                    </div>
                                </li>      

                                <div id="myModalmo<? echo $i; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelmo" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabelmo<? echo $i; ?>"><? echo $Allarticle[$i][3]; ?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <?
                                        if ($Allarticle[$i][2] != "") {
                                            ?>
                                            <div class="container">
                                                <div class="container span4"></div>
                                                <div class="container span4">
                                                    <a href="Article/images/<? echo $Allarticle[$i][2]; ?>" class="thumbnail">
                                                        <img src="Article/images/<? echo $Allarticle[$i][2]; ?>" alt="Article/images/<? echo $Allarticle[$i][2]; ?>" class="img-rounded">
                                                    </a>
                                                </div>
                                                <div class="container span4"></div>
                                            </div>

                                            <br>
                                            <?
                                        }
                                        ?>
                                        <p><? echo $articletxt; ?></p>
                                        <?
                                        $lastcomment = $Article_Class->getAllPost($Allarticle[$i][0]);
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="inline text-left">
                                            <form method="post" action="index.php">
                                                <div class="inline text-left">
                                                    <strong>Comment #<? echo $lastcomment; ?></strong><br>
                                                </div>
                                                <div class="inline text-left">
                                                    <strong>Name : </strong><input type="text" class="input-medium" name="txt1" placeholder="Your Name"><br>
                                                </div>
                                                <textarea rows="4" cols="50" name="txt2" id="mybox">
                                                </textarea>
                                                <!--Article id-->
                                                <input type="hidden" name="txt3" value="<? echo $Allarticle[$i][0] ?>"> 
                                                <!--post number-->
                                                <input type="hidden" name="txt4" value="<? echo $lastcomment ?>"> 

                                                <button type="submit" class="btn btn-primary btn-large">Send</button>
                                            </form>
                                        </div>
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                    </div>
                                </div> 
                            </div>
                            <?
                        }
                        ?>                                
                    </div>
                </div>  
            </div>
            <!-- ===================================================================================================================== -->
            <div class="container alert alert-info2">
                <div class="container span6">
                    <div class="thumbnail">
                        <div id="myCarouselNE" class="carousel slide">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarouselNE" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarouselNE" data-slide-to="1"></li>
                                <li data-target="#myCarouselNE" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="active item"><img data-src="holder.js/800x400/auto/#aaa:#888888/text:Coming Soon.." alt="1"></div>
                                <div class="item"><img data-src="holder.js/800x400/auto/#aaa:#888888/text:Coming Soon.." alt="2"></div>
                                <div class="item"><img data-src="holder.js/800x400/auto/#aaa:#888888/text:Coming Soon.." alt="3"></div>
                            </div>

                            <div class="visible-desktop">
                                <img src="images/6-1.jpg" class="carousel-control left" href="#myCarouselNE" data-slide="next">
                                <!--<img src="images/6-1.jpg" class="carousel-control right" href="#myCarousel" data-slide="next">-->
                            </div>
                            <div class="hidden-desktop">
                                <a class="carousel-control1 left" href="#myCarouselNE" data-slide="prev">&lsaquo;</a>
                                <a class="carousel-control1 right" href="#myCarouselNE" data-slide="next">&rsaquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container span1">

                </div>
                <div class="container span5">
                    <div class="inline visible-desktop">
                        <h3>News & Event Update </h3>
                        Coming Soon...
                    </div>
                    <div class="inline hidden-desktop">
                        <h5>News & Event Update </h5>
                        Coming Soon...
                    </div>
                </div>    
            </div>
            <?
            include "footer.php";
            ?>
    </body>


    <!-- Le javascript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>
</html>