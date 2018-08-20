<?php
    require'class.php';

    $obj = new pimmy_work();
    $obj->test_ex_q();
    $obj->showallmajor();
?>
<div class="form-group">
  <fieldset>
    <label class="control-label" for="readOnlyInput">กรอกข้อมูลชื่อ</label>
    <input name="name" class="form-control" type="text" placeholder="ชื่อ-สกุล">
  </fieldset>
</div>
<label for="exampleSelect1">เลือกสขา</label>
  <select class="form-control"  name="major">
    <?php
      while ($option = mysqli_fetch_assoc($obj->data_major)) {
        echo '<option value="'.$option['major_id'].'">'.$option['name'].'</option>';
      }
    ?>
  </select>
  <br>
  <label for="exampleSelect1">ชั้นปี</label>
  <select class="form-control" name="year">
    <option value="1" >ชั้นปี 1</option>
    <option value="2">ชั้นปี 2</option>
    <option value="3">ชั้นปี 3</option>
    <option value="5">ชั้นปี 4</option>
  </select>
  <br>
  <div class="form-group" style="">
    <fieldset>
      <label class="control-label" for="readOnlyInput">เลขที่</label>
      <input type="number" name="number" class="form-control" type="text" placeholder="เลขที่...">
    </fieldset>
  </div>

<?php

	while ($data_test_q = mysqli_fetch_assoc($obj->data_test_q)) {
		echo '<div class="form-group" style="margin-top: 50px;">
                  <label for="exampleSelect1" style="color:#FFF;background-color: #AE4DF5;padding:10px;border-radius: 15px;">ข้อที่ '.$data_test_q['id_examination'].' '.$data_test_q['examination_q'].'</label><div style="margin-left: 50px;">';
        $obj->test_ex_c($data_test_q['id_examination']);
        while ($data_test_c = mysqli_fetch_assoc($obj->data_test_c)) {
        	echo '<label for="exampleSelect1">'.$data_test_c['choice_id'].' => '.$data_test_c['choice_list'].'</label><br>';
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