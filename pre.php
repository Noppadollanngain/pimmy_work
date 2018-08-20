<?php
	require'class.php';

	$obj = new pimmy_work();
	$obj->test_ex_q();
	while ($data_test_q = mysqli_fetch_assoc($obj->data_test_q)) {
		echo '<div class="form-group" style="margin-top: 25px">
                  <label style="color:#FFF;background-color: #AE4DF5;padding:10px;border-radius: 15px;" for="exampleSelect1">ข้อที่ '.$data_test_q['id_examination'].' '.$data_test_q['examination_q'].'</label><div style="margin-left: 50px;">';
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