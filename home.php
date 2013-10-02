<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
            <?
                if($_SESSION["name"]=="" || $_SESSION["lastname"]==""){
                            if($_SESSION["loginerror"] == "1"){
            ?> 
                            <form class="form-inline" method="post" name="form1" id="form1" action="Check_Login.php">
                                <div class="text-center">
                                    <H3>Login</H3>
                                </div>    
                                <div class="text-center">
                                        <input type="text" class="input-medium" name="user" placeholder="youremail@parjac.org"><a href="#" class="btn btn-info" data-toggle="popover" title="Hint" data-content="สำหรับผู้ใช้งานระบบ ทันทึกข้อมูล หากต้องการใช้งานติดต่อ Administrator ครับ                  ขอบคุณครับ       "data-placement="top">Hint..</a><br>
                                        <input type="password" class="input-medium" name="pass" placeholder="Password"><button type="submit" class="btn btn-primary">Login</button><br>
                                        <span class="badge badge-important">Log In Fail ( ID or Password incorrect )</span>
                                </div> 
                            </form>   
            <?
                            session_unset();

                            }else{
            ?> 
                            <form class="form-inline" method="post" name="form1" id="form1" action="Check_Login.php">
                                <div class="text-center">
                                    <H3>Login</H3>
                                </div>    
                                <div class="text-center">
                                        <input type="text" class="input-medium" name="user" placeholder="youremail@parjac.org"><a href="#" class="btn btn-info" data-toggle="popover" title="Hint" data-content="สำหรับผู้ใช้งานระบบ ทันทึกข้อมูล หากต้องการใช้งานติดต่อ Administrator ครับ                  ขอบคุณครับ       "data-placement="top">Hint..</a><br>
                                        <input type="password" class="input-medium" name="pass" placeholder="Password"><button type="submit" class="btn btn-primary">Login</button><br>

                                </div> 
                            </form> 

            <?   
                            }
                }
            ?>
                    <a name="focus"></a> 
        </div>
        <div class="span7" >
              <div class="thumbnail">
                  <img src="images/5-3.png" width="100%">
              </div>
              <div class="text-left">
                  <h6>Website นี้ เผยแพร่ความรู้ความเข้าใจที่ถูกต้อง เกี่ยวกับการผ่าตัดข้อเข่า และข้อสะโพก ซึ่ง้ป็นการผ่าตัดในคนหนุ่มสาว รวมถึงข้อจำกัด เปิดโอกาสให้คนไทย เข้าถึงข้อมูลที่เป็นประโยชน์ในการเปลี่ยนข้อสะโพกแบบใหม่นี้ เช่นเดียวกับ website ต่างประเทศที่มีการเผยแพร่กันอย่างกว้างขวาง</h6> 
              </div>
        </div> 
      </div>
 </div>
