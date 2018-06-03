<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>BARS_TEST</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet"  href="style.css" type="text/css" media="all">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="ajax.js"></script>

</head>

<body>
    <form method="post" enctype="multipart/form-data"  id="ajax_form" action="" >
		ID: <input type="text" name="id"  /><br>
		HID: <input type="text" name="hid"  /><br>
        NAME: <input type="text" name="name"  /><br>
        ADDRESS: <input type="text" name="address"  /><br>
        PHONE: <input type="text" name="phonenumber"  /><br>
		<input type="submit" id="btn" value="Создать" />
    </form>

    <br>

	<div id="error_mess"></div>
    <div id="result_form">
			<ul class="upper_header">
				<li class="toggle"><a href="#" onclick="show_all()">Развернуть \ свернуть все</a></li>
				<li class="name">Наименование</li>
				<li class="address">Адресс</li>
				<li class="phone">Телефон</li>
				<li class="redact">Редактировать</li>
				<li class="delete">Удалить</li>
			</ul>
			<div id="result_table_tbody">
			 <?php
				//echo $str;
			 ?>
		
			</div>
		
	<div>
	
	
</body>
</html>

<script>

function show(divid){
	$('span.sign'+divid).text(function(_, value){return value=='-'?'+':'-'});
//	$('span.sign'+divid).text("=");
	$("."+divid).toggle();
}

function show_all(){
	$('span').text(function(_, value){return value=='-'?'+':'-'});
	$('.second').toggle();
}

function redact(id_str, hid_str) {
	var elems = document.getElementById(id_str).childNodes;
	elems = Array.prototype.slice.call(elems); 

	elems.forEach(function(elem) {
		
		$("input[name=\"id\"]").val(id_str);
		$("input[name=\"hid\"]").val(hid_str);
		$("#btn").val('Редактировать');
		if(elem.cellIndex == 1) {
			$("input[name=\"name\"]").val(elem.innerHTML);
		}
		if(elem.cellIndex == 2) {
			$("input[name=\"address\"]").val(elem.innerHTML);
		}
		if(elem.cellIndex == 3) {
			$("input[name=\"phonenumber\"]").val(elem.innerHTML);
		}
	});
	
}
function getDataTable() {
		$.ajax({
			url:     'get_table.php', 
			type:     "GET",
			dataType: "html", 
			success: function(response) { 
				//$("#result_table_tbody").response;
				 $( "#result_table_tbody" ).append( response );
			},
			error: function(response) { 
				 $( "#result_table_tbody" ).append( 'Ошибка загрузки файла' );
			}
		});
}
function delete_row_from_file(id_str) {
	$.ajax({
			url:     'file.php', 
			type:     "POST",
			dataType: "html", 
	        data: "id_str="+id_str, 
			success: function(response) { 
				 $( "#result_table_tbody" ).append( response );
				// location.reload(this);
				getDataTable();
			},
			error: function(response) { 
				 $( "#result_table_tbody" ).append( 'Ошибка загрузки файла' );
			}
	});
}
function delete_row(id_str) {
	var desidion = confirm ("Удалить запись?");
	if (desidion) {
		delete_row_from_file(id_str);
	}
}

</script>
