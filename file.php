<?php
if (isset($_POST) ) {
	
	$file = file_get_contents ('lpu.json');
	$file_json = json_decode($file);
	
	if(isset($_POST['id'])) {
		$new_lpu = (object) array(
			'id' => $_POST['id'],
			'hid' => $_POST['hid'],
			'full_name' => $_POST['name'],
			'address' => $_POST['address'],
			'phone' => $_POST['phonenumber']
		);

		if(!empty($file_json)) {
			
			foreach ($file_json as $key => $val) {
				array_push($val, $new_lpu);
			}
		} else {
			
			$val = array();
			array_push($val, $new_lpu);
		}
		$save_lpu = (object) array(
			'LPU' => $val
		);
	} 
	if (isset($_POST["id_str"])) {

		foreach ($file_json as $key => $val) {
			foreach ($val as $key2 => $val2) {
				
				if ($val2->id == $_POST['id_str']) {
					array_splice($val, $key2, 1);
				}
				
			}
			//echo "<pre>";
			//print_r($val);
		}

		$save_lpu = (object) array(
			'LPU' => $val
		); 
	}

	if (!empty($file_json)) 
		file_put_contents('lpu.json', json_encode($save_lpu));
}
?>