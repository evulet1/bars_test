<?php 

$file = file_get_contents ('lpu.json');
$file_json = json_decode($file);

$result = array();
$str = ''; $i = 0;

foreach ($file_json as $key1) {

	foreach ($key1 as $key=>$val) {

		if ($val->hid == null) {
			$i = 0;
			$id = $val->id;
		//	$str .= '<tr id="'.$id.'"><td><a href="#" onclick="show1('.$id.')">+</a></td><td>'. $val->full_name.'</td><td>'. $val->address.'</td><td>'. $val->phone.'</td><td></td><td></td></tr>';
		} else {
	
			$id = $val->hid;
			//$str .= '<tr id=w"'.$id.'" class="'.$id.'"><td colspan="6"><table><td>'. $val->id.'</td><td>'. $val->full_name.'</td><td>'. $val->address.'</td><td>'. $val->phone.'</td><td></td><td></td></table></td></tr>';
		}
		$result[$id][$i]['id'] = $val->id;
		$result[$id][$i]['hid'] = $val->hid;
		$result[$id][$i]['name'] = $val->full_name;
		$result[$id][$i]['address'] = $val->address;
		$result[$id][$i]['phone'] = $val->phone;
		//$str .= '<tr id=w"'.$id.'" class="'.$id.'"><td>'. $val->id.'</td><td>'. $val->full_name.'</td><td>'. $val->address.'</td><td>'. $val->phone.'</td><td></td><td></td></tr>';
		$i++;
	}
}
//echo "<pre>";
//print_r($result);
/*
<table border="0">
  <tr  class="header">
      <th colspan="2">Header <span>-</span></th>
  </tr>
  <tr>
    <td>data</td>
    <td>data</td>
  </tr>
  <tr>
    <td>data</td>
    <td>data</td>
  </tr>
  <tr  class="header">
    <th colspan="2">Header <span>-</span></th>
  </tr>
  <tr>
    <td>date</td>
    <td>data</td>
  </tr>
  <tr>
    <td>data</td>
    <td>data</td>
  </tr>
  <tr>
    <td>data</td>
    <td>data</td>
  </tr>
</table>*/
foreach ($result as $key => $val) {
	
	
	foreach ($val as $key2 => $val2) {
		
		if ($key == $val2['id']) {
			$str .= '<ul id='.$key.' class="header" >';
			$str .= '<li a href="#'.$key.'"  class="toggle" onclick="show(\''.$key.'\')"><span class="sign'.$key.'">-</span></a></li><li class="name">'. $val2['name'].'</li><li class="address" >'. $val2['address'].'</li><li class="phone">'. $val2['phone'].'</li><li class="redact"><a onclick="redact(\''.$key.'\')" href="#">Редактировать</a></li><li class="delete"><a onclick="delete_row(\''.$key.'\')" href="#">Удалить</a></li>';
			$str .= '</ul>';
			/* $str .= '<td><a href="#'.$key.'"  ><span>-</span></a></td><td>'. $val2['name'].'</td><td>'. $val2['address'].'</td><td>'. $val2['phone'].'</td><td><a onclick="redact(\''.$key.'\')" href="#">Редактировать</a></td><td><a onclick="delete_row(\''.$key.'\')" href="#">Удалить</a></td>';
			$str .= '</tr><tr>'; */
		} else {
			
			//$str .= '<td colspan="6"></td></tr>';
			$str .= '<ul class="'.$key.' second"><li class="toggle"></li><li class="name">'. $val2['name'].'</li><li class="address" >'. $val2['address'].'</li><li class="phone">'. $val2['phone'].'</li><li class="redact"><a onclick="redact(\''.$val2['id'].'\',\''.$val2['hid'].'\')" href="#">Редактировать</a></li><li class="delete"><a onclick="delete_row(\''.$val2['id'].'\')" href="">Удалить</a></li></ul>';
			
		}
		
	
	/* 	if ($key == $val2['id']) {

			if (count($val) > 1) {
				$str .= '<td><a href="#'.$key.'"  class="toggle" onclick="show(\'table'.$key.'\')">+</a></td><td>'. $val2['name'].'</td><td>'. $val2['address'].'</td><td>'. $val2['phone'].'</td><td><a onclick="redact(\''.$key.'\')" href="#">Редактировать</a></td><td><a onclick="delete_row(\''.$key.'\')" href="#">Удалить</a></td>';
				$str .= '</tr><tr ><td colspan="6"><table width = "100%" id="table'.$key.'"><tbody  >';
			} else {
				$str .= '<td><a href="#'.$key.'"  class="toggle" onclick="show(\'table'.$key.'\')">-</a></td><td>'. $val2['name'].'</td><td>'. $val2['address'].'</td><td>'. $val2['phone'].'</td><td><a onclick="redact(\''.$key.'\')" href="#">Редактировать</a></td><td><a onclick="delete_row(\''.$key.'\')" href="#">Удалить</a></td>';
				$str .= '</tr>';
			}
		
		} else {
			$str .= '<tr id="'.$val2['id'].'"><td></td><td>'. $val2['name'].'</td><td>'. $val2['address'].'</td><td>'. $val2['phone'].'</td><td><a onclick="redact(\''.$val2['id'].'\',\''.$val2['hid'].'\')" href="#">Редактировать</a></td><td><a onclick="delete_row(\''.$val2['id'].'\')" href="">Удалить</a></td></tr>';
			if (($key2+1) == count($val)) {
				$str .= '</tbody></table></td>';
			}
		}  */
	}
	

	//$str .= '</ul>';
}
//include ('view_table.php');
echo $str;
?>
