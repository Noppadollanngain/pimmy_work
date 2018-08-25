<?php
  
  session_start();

  //$_SESSION['login']=FALSE;
  require'class.php';

  $obj = new pimmy_work();
  $obj->test_ex_q();
  $obj->showallmajor();

  if (!isset($_SESSION['login'])||$_SESSION!=TRUE||$_SESSION==FALSE) {
     ?>
<div class="row" style="margin-top: 25px;margin-bottom: 25px">
  <div class="col-lg-6" style="font-family: 'Mitr', sans-serif;">
            <h3 class="cont-title" style="font-family: 'Mitr', sans-serif;">เข้าสู่ระบบเพื่อทำข้อสอบ</h3>
            <!--/<div id="sendmessage">Your message has been sent. Thank you!</div>-->
              <form action="" method="post" role="form" class="contactForm" id="data_login" onsubmit="login()">
                <div class="form-group">
                  <input type="text" name="id_login" class="form-control" id="id_login" placeholder="ไอดีผู้ใช้งาน" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                  />
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="pw_login" id="pw_login" placeholder="รหัสผ่าน" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                  />
                </div>
                 <div class="modal-footer">
                  <button type="submit" class="btn btn-send " style="font-family: 'Mitr', sans-serif;background-color: #F1C40F">เข้าสู่ระบบ</button>
                </div>
              </form>
  </div>
 <div class="col-lg-6" style="font-family: 'Mitr', sans-serif;">
            <h3 class="cont-title" style="font-family: 'Mitr', sans-serif;">สมัครใช้งานในระบบ</h3>
            <!--/<div id="sendmessage">Your message has been sent. Thank you!</div>-->
            <div class="contact-info">
              <form method="post" role="form" class="contactForm" id="data_regis" onsubmit="login_regis()">
                <div class="form-group">
                  <input type="text" name="id_login" class="form-control" id="id_login" placeholder="ไอดีผู้ใช้งาน" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                  />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="pw_login" id="pw_login" placeholder="รหัสผ่าน" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                  />
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="fname_login" placeholder="ชื่อ" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                  />
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="lname_login" placeholder="นามสกุล" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                  />
                </div>
                <label for="exampleSelect1">เลือกสขา</label>
                <select class="form-control"  name="major">
                  <?php
                    while ($option = mysqli_fetch_assoc($obj->data_major)) {
                      echo '<option value="'.$option['major_id'].'">'.$option['name'].'</option>';
                    }
                  ?>
                </select><br>
                <label for="exampleSelect1">ชั้นปี</label>
                <select class="form-control" name="year">
                  <option value="1" >ชั้นปี 1</option>
                  <option value="2">ชั้นปี 2</option>
                  <option value="3">ชั้นปี 3</option>
                  <option value="5">ชั้นปี 4</option>
                </select>
                <br>
      <input type="number" name="number" class="form-control" type="text" placeholder="เลขที่...">

                 <div class="modal-footer">
                  <button type="submit" class="btn btn-send " style="font-family: 'Mitr', sans-serif;background-color: #F1C40F">สมัครเข้าสู่ระบบ</button>
                  <button type="reset" class="btn btn-send " style="font-family: 'Mitr', sans-serif;background-color: #E74C3C">ยกเลิก</button>
                </div>
              </form>
            </div>
  </div>
</div>
     <?php
  }
  elseif($_SESSION['login']==TRUE){

?>
   <h3 style="font-family: 'Mitr', sans-serif;margin-top: 40px;">บททดสอบหลังเรียน</h3>
            <form id="show_q2" style="font-family: 'Mitr', sans-serif;">
<?php
  $num=1;
  while ($data_test_q = mysqli_fetch_assoc($obj->data_test_q)) {
    echo '<div class="form-group" style="margin-top: 25px">
                  <label style="color:#FFF;background-color: #AE4DF5;padding:10px;border-radius: 15px;" for="exampleSelect1">ข้อที่ '.($num++).' '.$data_test_q['examination_q'].'</label><div style="margin-left: 50px;">';
        $obj->test_ex_c($data_test_q['id_examination']);
        while ($data_test_c = mysqli_fetch_assoc($obj->data_test_c)) {
          echo '<label for="exampleSelect1">'.$data_test_c['choice_id'].'.) => '.$data_test_c['choice_list'].'</label><br>';
        }
        echo '</div>
                  <label for="exampleSelect1">เลือกคำตอบ</label>
                  <select name="aws_'.$data_test_q['id_examination'].'" class="form-control" id="idaws_'.$data_test_q['id_examination'].'">
                    <option value="'.$data_test_q['id_examination'].' 1">1</option>
                    <option value="'.$data_test_q['id_examination'].' 2">2</option>
                    <option value="'.$data_test_q['id_examination'].' 3">3</option>
                    <option value="'.$data_test_q['id_examination'].' 4">4</option>
                    <option value="'.$data_test_q['id_examination'].' 5">5</option>
                  </select>
                </div>';
        
  }
?>
   </form>
            <button style="margin-top: 20px;margin-bottom: 40px;" type="submit" class="btn btn-primary pull-right" onclick="check_aws()">ส่งคำตอบ</button>
<?php
  }

  

?>