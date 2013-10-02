<?
session_start();
include './header.php';
$_SESSION["page"]='2';
?>
<html>
    <body data-spy="scroll" data-target=".bs-docs-sidebar" >
        <br>
        <div class="container">
            <ul class="nav nav-pills">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="#">FAQs</a></li>
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
                        <h5><strong>Welcome <? echo $_SESSION["name"] . "  " . $_SESSION["lastname"]; ?></strong></h5>
                        <?
                        if($_SESSION["userlv"]<6 && $_SESSION["userlv"] != ""){
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
            <div class="container span1">
                
            </div>
            <div class="container span8">
                <h2>FAQs</h2>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs1">
                                1. ข้อบ่งชี้ในการทำผ่าตัดผิวสะโพกเทียมได้แก่อะไรบ้าง
                            </a>
                        </div>
                        <div id="FAQs1" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ข้อบ่งชี้ได้แก่ ข้อสะโพกเสื่อม ข้อสะโพกขาดเลือด ซึ่งอาจจะเกิดจากโรคเอสแอลอี (SLE) รูมาตอยด์ (Rheumatoid)<br />
                                ซึ่งมักจะผลมาจากการกินยาสเตีรอยด์เป็นเวลานาน รวมถึงภาวะการดื่มสุราเรื้อรัง หรืออาจจะเกิดจากอุบัติเหตุบริเวณรอบข้อสะโพกมาก่อน โรคเข้าสะโพกผิดปกติในบางราย และอื่นๆ
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs2">
                                2. ปัจจุบันอุปกรณ์ผิวข้อสะโพกเทียม มีกี่แบบ แตกต่างกันหรือไม่?
                            </a>
                        </div>
                        <div id="FAQs2" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ต้นแบบ คือ McMinn Hip Resurfacing ซึ่งต่อมาได้ปรับปรุงเป็น Birmingham Hip Resurfacing ในปี 1996 หลังจากที่ได้รับความนิยมอย่างมากนั้น จึงได้มีบริษัทผลิตอุปกรณ์ทางการแพทย์ ไม่ต่ำกว่า 10 บริษัท ได้ผลิตเลียนแบบ ในลักษณะที่ต่างกันออกไปในรายละเอียดเล็กน้อย เพื่อหลีกเลี่ยงปัญหาสิทธิบัตร จากรายงานผลการผ่าตัดทั้งประเทศออสเตรเลีย ปี 2008 ชี้ให้เห็นว่า Birmingham Hip Resurfacing มีผลการผ่าตัดดีที่สุด
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs3">
                                3. ข้อสะโพกเทียมแบบเบอร์มิงแฮม ต่างจาก ข้อสะโพกเทียมทั่วไปอย่างไร
                            </a>
                        </div>
                        <div id="FAQs3" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ข้อสะโพกเทียมแบบเบอร์มิงแฮม ถูกออกแบบมาให้ใช้กับผู้ป่วยในวัยทำงาน เป็นการผ่าตัดผิวข้อสะโพก โดยการครอบหัวสะโพกเดิม ไม่มีการตัดหัวสะโพกออก ข้อต่อเป็นแบบโลหะชนกับโลหะ ซึ่งมีความทนทานมาก หัวสะโพกมีขนาดใหญ่ มีปัญหาข้อสะโพกหลุดได้ยากกว่า
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs4">
                                4. ผลการผ่าตัดแตกต่างในเพศหญิงหรือเพศชาย จริงหรือ
                            </a>
                        </div>
                        <div id="FAQs4" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> จริง จากรายงานทั่วโลกพบว่า ผู้หญิงมีโอกาสพบภาวะแทรกซ้อน โดยเฉพาะกระดูกคอสะโพกหักหลังผ่าตัดผิวสะโพกเทียมได้มากกว่าผู้ชายอย่างมีนัยสำคัญ สาเหตุเนื่องจากคุณภาพกระดูกของผู้หญิงด้อยกว่าผู้ชาย ในผู้หญิงที่หมดประจำเดือนแล้ว(หมดฮอร์โมนเอสโตรเจน) จะมีอัตราการสลายตัวของแคลเซียมในกระดูกมากกว่าผู้ชาย นอกจากนี้พบว่าผู้หญิงมีการใช้สเตียรอยด์ เพื่อรักษาโรคบางอย่างเช่น ข้ออักเสบรูมาตอยด์เรื้อรัง ข้ออักเสบเอสแอลอี ซึ่งการใช้สเตียรอยด์เป็นเวลานานมีผลทำให้กระดูกบาง
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs5">
                                5. หลังผ่าตัดสามารถออกกำลังกายหนักได้เมื่อไร
                            </a>
                        </div>
                        <div id="FAQs5" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> เพื่อหลีกเลี่ยงการเกิดคอกระดูกสะโพกหัก การออกกำลังกายหนักทำได้หลังผ่าตัดหนึ่งปี
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs6">
                                6. สาเหตุของกระดูกคอสะโพกหักหลังการผ่าตัดผิวข้อสะโพกคืออะไร
                            </a>
                        </div>
                        <div id="FAQs6" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> โอกาสพบกระดูกคอสะโพกหักหลังการผ่าตัดผิวข้อสะโพกได้ 1.52 เปอร์เซนต์ 80% ของกระดูกคอสะโพกหักพบในช่วงปีแรก สาเหตุของการหักมีหลายประการ เช่น ประสบการณ์ของแพทย์ผู้ผ่าตัด เทคนิคการผ่าตัดไม่ดี สภาพของหัวสะโพกก่อนผ่าตัดไม่ดี การเลือกผู้ป่วยไม่เหมาะสม กระดูกพรุน เพศหญิงพบได้มากกว่าเพศชาย การติดเชื้อหลังผ่าตัด การเกิดหัวสะโพกขาดเลือดหลังผ่าตัด(เกิดขึ้นเองไม่เกี่ยวกับการผ่าตัดนี้) การเกิดอุบัติเหตุรุนแรงหลังผ่าตัด การเลือกอุปกรณ์ในการผ่าตัด เป็นต้น
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs7">
                                7. โอกาสที่หัวสะโพกจะขาดเลือดมากขึ้นหลังการผ่าตัดนี้
                            </a>
                        </div>
                        <div id="FAQs7" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> มีการศึกษาหลายรายงาน ชี้ให้เห็นว่า การผ่าตัดผิวข้อสะโพกไม่ทำให้หัวสะโพกตายมากขึ้น
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs8">
                                8. หากหัวสะโพกเดิม มีซิส หรือเนื้อกระดูกตายเป็นบริเวณกว้าง จะทำผ่าตัดนี้ได้หรือไม่
                            </a>
                        </div>
                        <div id="FAQs8" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ถ้าบริเวณกระดูกที่ตาย หรือขนาดของซิสในกระดูก ไม่เกิน 1 ซม สามารถครอบหัวสะโพกได้เลยโดยซีเมนต์จะช่วยปิดช่องว่างเหล่านี้ หากมีขนาดกลาง 1-2 ซม ถ้าไม่อยู่ส่วนรับน้ำหนัก สามารถครอบหัวสะโพกได้ ถ้าผู้ป่วยยอมรับความเสี่ยงที่จะเกิดคอสะโพกหัก ประมาณ 2-5% ได้ หากมีขนาดกลาง แต่อยู่ในส่วนที่รับน้ำหนัก หรือมีขนาดใหญ่กว่า 2 ซม โอกาสที่คอสะโพกหักจะสูงขึ้น 2-3 เท่าตัว กรณีที่ผู้ป่วยอายุน้อยมาก เช่น 20 ปีเศษ เป็นต้น หากยินดีรับความเสี่ยงนี้ ก็สามารถลองครอบหัวสะโพกได้ ซึ่งอาจจะชะลอการผ่าตัดเปลี่ยนข้อสะโพกได้นานหลายปี หรือถ้าโชคดีอาจจมากกว่า 10 ปีขึ้น เมื่อมีการผ่าตัดเปลี่ยนข้อสะโพกภายหลังการผ่าตัดแก้ไขนั้นทำได้ไม่ยาก ผลสำเร็จสูงเท่ากับการผ่าตัดเปลี่ยนข้อสะโพกครั้งแรก
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs9">
                                9. ผลข้างเคียงของระดับอิออนโลหะที่สูงขึ้นในร่างกายหลังการผ่าตัดผิวสะโพกเทียม
                            </a>
                        </div>
                        <div id="FAQs9" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ปัจจุบันมีความกังวลเกี่ยวกับผลกระทบของระดับอิออนโลหะในร่างกาย ซึ่งสูงขึ้น 2-5 เท่าของคนปกติในช่วงปีแรก หลังจากผ่าตัดหนึ่งปี ระดับอิออนโลหะในร่างกายจะลดลงเหลืออยู่ที่ประมาณ 1.5-3 เท่า ถึงแม้ว่าระดับอิออนโลหะในร่างกายที่สูงขึ้น กว่า 40 ปีที่มีการใช้ข้อสะโพกโลหะชนโลหะในสมัยก่อน ยังไม่เคยมีรายงานใดๆ ที่เกี่ยวข้องกับผลข้างเคียงจากระดับอิออนโลหะในร่างกายที่สูงขึ้น รวมถึงข้อสะโพกเทียมเบอร์มิงแฮมด้วย
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs10">
                                10. โอกาสการเกิดมะเร็งจากอิออนโลหะ
                            </a>
                        </div>
                        <div id="FAQs10" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> มีรายงานที่แน่นอนแล้วว่า ระดับอิออนโลหะหลังการผ่าตัดข้อสะโพกเทียมแบบโลหะชนกับโลหะกว่า 40 ปี ในรุ่นเก่า และรุ่นใหม่ ไม่ทำให้อุบัติการณ์ของการเกิดมะเร็งเพิ่มขึ้น เมื่อเทียบกับกลุ่มประชากรทั่วไป
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs11">
                                11. จะทราบได้อย่างไรว่า ผู้ป่วยมีอาการแพ้โลหะก่อนการผ่าตัดหรือไม่
                            </a>
                        </div>
                        <div id="FAQs11" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> การแพ้โลหะ โดยเฉพาะ โครบอลต์ โครเมียม วานาเดียม นิเกล ซึ่งเป็นประกอบของโลหะอัลลอยด์ ไม่สามารถสังเกตได้โดยง่าย เนื่องจากในชีวิตประจำวัน ไม่มีการใช้โลหะดังกล่าว โดยทั่วไปโลหะที่เป็นส่วนผสมเหล่านี้ มีความเสถียรมาก ร่างกายจะไม่มีปฏิกิริยาตอบสนองว่าเป็นสิ่งแปลกปลอมใดๆ อย่างไรก็ตามพบว่า มีรายงานผู้ป่วยบางราย มีการแพ้โลหะหลังการผ่าตัดผิวสะโพกเทียมที่เป็นข้อต่อโลหะชนกับโลหะ ปัจจุบันยังไม่มีวิธีใดที่สามารถทำนายได้แน่นอนว่า ผู้ป่วยจะมีอาการแพ้โลหะหลังผ่าตัดหรือไม่
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs12">
                                12. อาการแพ้โลหะของผู้ป่วยหลังผ่าตัดผิวสะโพกเทียมเบอร์มิงแฮม เป็นอย่างไร พบได้บ่อยแค่ไหน
                            </a>
                        </div>
                        <div id="FAQs12" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> โดยทั่วไปโลหะที่เป็นส่วนผสมเหล่านี้ ร่างกายจะไม่มีปฏิกิริยาตอบสนองว่าเป็นสิ่งแปลกปลอมใดๆ อย่างไรก็ตามพบว่า มีรายงานผู้ป่วยบางราย มีการแพ้โลหะหลังการผ่าตัดผิวสะโพกเทียมที่เป็นข้อต่อโลหะชนกับโลหะอุบััติการณ์ที่แน่นอนยังไม่ชัดเจน จากรายงานพอจะประมาณได้ว่า มีโอการพบได้ น้อยกว่า 1 ต่อ 4000 ข้อ ทั้งนี้ ยังอาจจะเกี่ยวเนื่องกับกรรมพันธุ์ เชื้อชาติ ประวัติการแพ้สารอื่นๆด้วย ผู้ป่วยที่แพ้โลหะเหล่านี้ อาจจะมาด้วยอาการผื่นคันที่ผิวหนัง หรือมีอาการรอบสะโพกบวมเป็นถุงน้ำ ซึ่งเป็นผลมาจากการกระตุ้นของเม็ดเลือดขาวที่ต้องการกำจัดสิ่งแปลกปลอมในร่างกาย (Aseptic Lymphocytic Vasculitis and Associated Lesion, ALVAL) การรักษาขึ้นอยู่กับความรุนแรง และอาการ โดยการรักษาที่แน่นอนที่สุดคือการผ่าตัดเปลี่ยนข้อสะโพกเทียมใหม่เป็นข้อต่อแบบอื่นๆ เช่น โลหะชนกับพลาสติก หรือ เซรามิคชนกับพลาสติก หรือ เซรามิคชนกับเซรามิค เป็นต้น
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs13">
                                13. การผ่าตัดในผู้ป่วยหญิงที่ต้องการมีบุตรในอนาคต
                            </a>
                        </div>
                        <div id="FAQs13" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> มีผู้ป่วยหญิงในวัยทำงานที่ได้รับการผ่าตัดผิวสะโพกเทียม แล้วตั้งครรภ์มีบุตรเป็นจำนวนมาก ไม่พบความผิดปกติใด ทั้งแม่และเด็ก อย่างไรก็ตาม มีรายงานชี้ให้เห็นว่าระดับของอิออนโลหะของกระแสเลือดในรกฝั่งทารกสูงขึ้นกว่าปกติ แต่ถูกจำกัดและควบคุมโดยชั้นขวางกั้นของผนังมดและรกเด็ก (Placenta barrier) องค์การอาหารและยาของสหรัฐอเมริกา (US FDA) แนะนำให้เฝ้าระวัง ติดตาม และหลีกเลี่ยงการผ่าตัดข้อสะโพกเทียมแบบโลหะชนกับโลหะในผู้หญิงที่คาดว่าจะมีบุตร (Child bearing women) อย่างไรก็ตาม ประเทศอื่นๆในโลกซึ่งยกเว้นประเทศสหรัฐอเมริกา ไม่มีข้อห้ามดังกล่าว เนื่องจากตลอดหลายสิบปี ยังไม่เคยมีรายงานผลข้างเคียงในแม่และเด็กเลย และคาดว่าในอนาคตไม่น่าจะมีด้วย จึงได้แนะนำกรณีผู้หญิงที่รับการผ่าตัดข้อสะโพกเทียมแบบโลหะชนโลหะรับการผ่าตัดได้ และหากต้องการตั้งครรภ์ สามารถตั้งครรภ์ได้หลังผ่าตัดไปประมาณ 2 ปี (หลังผ่าตัดในปีแรก มีการปรับผิวข้อต่อ เหมือนกับ Run-in ของกระบอกสูบในรถยนต์ที่ออกใหม่ ทำให้ระดับอิออนโลหะในร่างกายขึ้นสูง หลังจากนั้น ระดับจะลดลงเหลือ 1.5-3 เท่าของระดับปกติ และคงอยู่ระดับนี้ตลอดไป)
                            </div>
                        </div>
                    </div>  
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs14">
                                14. ทำไมถึงไม่ควรทำการผ่าตัดนี้ในผู้ป่วยที่เป็นโรคไต
                            </a>
                        </div>
                        <div id="FAQs14" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> เนื่องจากว่า ไตเป็นอวัยวะสำคัญในการกำจัดอิออนโลหะออกจากร่างกายทางปัสสาวะ หลังการผ่าตัดผิวสะโพกเทียมเบอร์มิงแฮม ซึ่งเป็นข้อต่อโลหะชนกับโลหะ จะมีระดับอิออนของโลหะได้แก่ โครเมียม โครบอล์ต ซึ่งเป็นส่วนประกอบหลักในโลหะอัลลอยด์ มีระดับสูงขึ้นอย่างมีนัยสำคัญ หากไตไม่สามารถกำจัดของเสียได้ กระแสเลือดในร่างกายจะมีการสะสมระดับของอิออนโลหะมากขึ้นจนเป็นอันตรายต่อเนื้อเยื่อได้
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs15">
                                15. หลังผ่าตัดผิวสะโพกเบอร์มิงแฮม หากผู้ป่วยเป็นโรคไตวาย ซึ่งเกิดขึ้นจากสาเหตุอื่นๆ จะต้องทำอย่างไร
                            </a>
                        </div>
                        <div id="FAQs15" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> การล้างไตด้วยเครื่องไตเทียม ไม่สามารถกำจัดอิออนโลหะออกจากร่างกายได้อย่างเพียงพอ จำเป็นต้องใช้เครื่องกรองชนิดพิเศษ ซึ่งยังไม่มีใช้ในประเทศไทย ผู้ป่วยมีสองทางเลือกคือ รับการเปลี่ยนถ่ายไต หรือทำการผ่าตัดเปลี่ยนข้อสะโพกเทียมอีกครั้ง โดยเปลี่ยนเป็นแบบอื่นที่ไม่ใช่โลหะชนกับโลหะ เช่น โลหะชนกับพลาสติก หรือ เซรามิคชนกับพลาสติก หรือ เซรามิคชนกับเซรามิค เป็น
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs16">
                                16. สามารถทำผ่าตัดผิวสะโพกนี้ เพื่อถ่วงเวลาในการผ่าตัดเปลี่ยนข้อสะโพกทั่วไปได้หรือไม่
                            </a>
                        </div>
                        <div id="FAQs16" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> แนวความคิดที่จะใช้การผ่าตัดผิวข้อสะโพก เพื่อชะลอการผ่าตัดเปลี่ยนข้อสะโพกทั่วไป เป็นแนวความคิดใหม่ที่มีการพูดถึงกันมากขึ้นในช่วง 2-3 ปีที่ผ่านมา ยังไม่เป็นที่ยอมรับกันอย่างกว้างขวาง ที่มาของความคิดนี้ เป็นผลมาจากหลักฐานของผลการผ่าตัดผิวข้อสะโพกสำหรับวัยทำงานได้ผลดีมาก ในขณะที่ข้อจำกัดของอายุการใช้งานข้อสะโพกเทียมทั่วไปในวัยทำงานอยู่ได้เพียงไม่เกิน 10 ปี การผ่าตัดแก้ไขครั้งที่สองหรือสาม จะให้ผลสำเร็จของการผ่าตัดลดน้อยลงไปเรื่อยๆ เพราะคุณภาพกระดูกที่เหลือน้อยลง มีพังผืดในเนื้อเยื่อมากขึ้นเรื่อยๆ ประกอบกับรายงานของ Amstrutz ได้กล่าวว่า กรณีจำเป็นต้องผ่าตัดใหม่เพื่อเปลี่ยนจากผิวข้อสะโพกเทียม ไปเป็นข้อสะโพกเทียมทั่วไป ไม่ทำให้ผลสำเร็จของการผ่าตัดข้อสะโพกเทียมทั่วไปลดลงไปกว่า การผ่าตัดเปลี่ยนข้อสะโพกเทียมครั้งแรกเลย จึงยิ่งทำให้ศัลยแพทย์บางคนมีแนวความคิดที่ใช้การผ่าตัดผิวสะโพกเทียมแทน เพื่อชะลอการผ่าตัดเปลี่ยนข้อสะโพกเทียม ข้อดีคือ ดีกว่าการผ่าตัดเปลี่ยนข้อสะโพกในผู้ป่วยอายุน้อยทันที เพราะยังเก็บหัวสะโพกเดิมส่วนใหญ่ไว้ได้ และการผ่าตัดผิวสะโพกเทียมให้คุณภาพชีวิตหลังการผ่าตัดของผู้ป่วยวัยทำงานดีกว่ามาก นอกจากนี้ ผลการรักษาโดยใช้การผ่าตัดผิวข้อสะโพก เพื่อซื้อเวลาก่อนการผ่าตัดเปลี่ยนข้อสะโพก ใน UCLA USA ชี้ไปในทางบวก คือ มีผู้ป่วยที่ต้องรับผ่าตัดเปลี่ยนจากผิวสะโพกเทียมไปเป็นข้อสะโพกเทียมทั่วไป เฉลี่ยประมาณ 5-7% ในเวลา 5 ปี ผู้ป่วยส่วนใหญ่ยังคงใช้งานได้ผิวสะโพกเทียมได้นานมากกว่า 8 ปีและยังคงติดตามผลไปเรื่อยๆ ดังนั้น เราควรติดตามผลการรักษาในแนวความคิดนี้ต่อไป คาดกันว่า อนาคตของการผ่าตัดผิวข้อสะโพกนี้ น่าจะเป็นความหวังที่ดีที่สุดอย่างหนึ่งในผู้ป่วยกลุ่มนี้
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs17">
                                17. ผลของการผ่าตัดผิวข้อสะโพกในคนไทยเป็นอย่างไร
                            </a>
                        </div>
                        <div id="FAQs17" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ในประเทศไทยมีการรักษาข้อสะโพกเสื่อมในตำรวจหญิง อายุ 53 ปี ด้วยการผ่าตัดผิวข้อสะโพกเบอร์มิงแฮมครั้งแรก เมื่อเมษายน 2549 เป็นรายแรกของภูมิภาคเอเชียอาร์คเนย์ และได้มีการผ่าตัดผิวข้อสะโพกผู้ป่วยอื่นๆ อีกมากกว่า 40 ราย ปัญหาส่วนใหญ่ในคนไทยพบว่าเป็นเรื่องของหัวข้อสะโพกขาดเลือด ผลการรักษาทุกรายได้ผลดี และมีความพึงพอใจมาก สอดคล้องกับผลการรักษาที่ได้รายงานจากต่างประเทศ
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs18">
                                18. หากในการผ่าตัดผิวสะโพกเทียมพบว่า กระดูกเหลือไม่มากพอที่จะครอบหัวสะโพกได้ จะมีทางเลือกอื่นหรือไม่
                            </a>
                        </div>
                        <div id="FAQs18" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ในตอนนี้มีอยู่ทางเลือกเดียว คือเปลี่ยนเป็นข้อสะโพกเทียมแบบโลหะชนกับโลหะ ซึ่งต่างจากการผ่าตัดผิวสะโพกเทียมโดยการเปลี่ยนข้อสะโพกเทียมจะตัดหัวสะโพกออกไป และเสียบก้านโลหะเข้าไปในโพรงกระดูก ข้อต่อยังคงเป็นโลหะชนกับโลหะเหมือนเดิม และหัวสะโพกมีขนาดใหญ่ทำให้มีความเสถียรไม่หลุดง่าย จุดที่เสียไปคือการตัดหัวสะโพกออกแล้วเสียบก้านโลหะในโพรงกระดูกนั้น ถือว่าเป็นการผ่าตัดเปลี่ยนข้อสะโพกเทียมครั้งแรก ดังนั้นเมื่อมีการผ่าตัดแก้ไขครั้งต่อไป ถือว่าเป็นการผ่าตัดครั้งที่สอง อย่างไรก็ตามเนื่องจากข้อต่อเป็นแบบโลหะชนกับโลหะ ทำให้สะโพกเทียมนี้มีความการใช้งานได้นานในวัยทำงานมากกว่า ข้อต่อโลหะชนพลาสติก
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs19">
                                19. ในอนาคตจะมีอุปกรณ์ รุ่นใหม่ที่เหมาะสำหรับคนไทยมากขึ้นหรือไม่
                            </a>
                        </div>
                        <div id="FAQs19" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ใช่ครับ ข้อสะโพกเทียมรุ่นใหม่ เป็นแบบพิเศษ ออกแบบมาให้สำหรับคนเอเชียโดยเฉพาะ เรียกว่า Birmingham Mid Head Resurfacing (BMHR) ข้อดีคือ สามารถครอบหัวสะโพกได้ แม้ว่า จะมีกระดูกหัวสะโพกเหลือเพียง 50% ซึ่งเหมาะสำหรับคนไทย เพราะโรคข้อสะโพกในวัยทำงานของคนไทยพบว่ามากกว่า 90% เป็นปัญหาของหัวข้อสะโพกขาดเลือด (ตรงกันข้ามในฝรั่งผิวขาวเป็นโรคข้อสะโพกเสื่อมมากกว่า 90%) จะช่วยให้โอกาสการครอบหัวสะโพกทำได้มากขึ้นกว่าเดิมมาก ผลการรักษาในต่างประเทศนานกว่า 3 ปี รายงานว่าได้ผลดีมาก อุปกรณ์ข้อเทียมชนิดนี้จะมีการนำเข้าประเทศไทย ประมาณไตรมาสสองของปี 2552
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs20">
                                20. หลังผ่าตัดผิวสะโพกเทียม ผู้ป่วยวัยทำงานต้องลางานนานเท่าใด
                            </a>
                        </div>
                        <div id="FAQs20" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> ประมาณ 1-2 เดือน
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs21">
                                21. การดูแลตนเองหลังผ่าตัดทำได้อย่างไร
                            </a>
                        </div>
                        <div id="FAQs21" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> โดยฉลี่ยผู้ป่วยนอนโรงพยาบาลนานประมาณ 7 วัน หลังผ่าตัดประมาณสองวัน แพทย์จะอนุญาตให้เดินลงน้ำหนักเต็มที่โดยใช้ไม้ค้ำยันใต้รักแร้ ผิวหนังแผลผ่าตัดใช้เวลา 7-14 วันจึงจะหาย หลังจากกลับบ้าน อนุญาตให้ขึ้นลงบันไดได้ โดยการจับราวบันได หรือมีคนพยุงป้องการล้ม หากผู้ป่วยต้องการขับรถเอง สามารถทำได้ที่ประมาณ 2-3 สัปดาห์หลังผ่าตัด โดยส่วนใหญ่ผู้ป่วยจะฟื้นตัว และเดินได้ดีหลังจากผ่าตัดประมาณหนึ่งเดือน ซึ่งเป็นเวลาที่กลับไปทำงานได้ ทั้งนี้ยังต้องพิจารณาลักษณะการทำงานด้วยว่าเป็นการทำงานนั่งโต๊ะหรือภาคสนาม ในช่วงเดือนแรก ผู้ป่วยจะได้รับการแนะนำให้ใช้ไม้คำยันตลอดเวลาโดยลงน้ำหนักได้เต็มที่ ช่วงเดือนแรกถึงสองเดือนผู้ป่วยอาจจะมีอาการตึงในสะโพกอยู่บ้าง เนื่องจากแผลผ่าตัดด้านในสะโพกยังไม่หายดี ช่วงหกสัปดาห์หลังผ่าตัดจะต้องระมัดระวังการใช้ข้อสะโพกผิดท่า ซึ่งอาจจะทำให้เส้นเอ็นภายในที่เย็บไว้ขาด และเกิดข้อสะโพกหลุดได้ ผู้ป่วยต้องเหลีกเลี่ยงการใช้งานสะโพกหนักๆ หรือออกกำลังกายหนักเป็นเวลาอย่างน้อย 1 ปี ยกเว้นการเดินปกติ ขึ้นลงบันไดตามปกติ ทั้งนี้ เพื่อป้องกันการหักของกระดูกคอสะโพก หลังจากหนึ่งปีไปแล้วสามารถใช้งานหนักได้ตามปกติ และเล่นกีฬาได้ทุกประเภท
                            </div>
                        </div>
                    </div>  
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#FAQs22">
                                22. การผ่าตัดนี้มีค่าใช้จ่ายเท่าใด
                            </a>
                        </div>
                        <div id="FAQs22" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <h6>ตอบ</h6> กรณี 30 บาท เบิกได้ 37,000 บาท, ประกันสังคม,กรมบัชชีกลาง เบิกได้ 65,000 บาท, จ่ายส่วนต่างค่าอุปกรณ์เพิ่ม 65,000-99,000 บาท
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>   
        <?
        include "footer.php";
        ?>
    </body>
</html>
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