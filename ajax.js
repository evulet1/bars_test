$( document ).ready(function() {
	$('tr.header').click(function(){
    /* get all the subsequent 'tr' elements until the next 'tr.header',
       set the 'display' property to 'none' (if they're visible), to 'table-row'
       if they're not: */
		$(this).nextUntil('tr.header').css('display', function(i,v){
			return this.style.display === 'table-row' ? 'none' : 'table-row';
		});
	});
    $("#btn").click(
		function(){
			sendAjaxForm('result_table_tbody', 'ajax_form', 'file.php');
			return false; 
		}
	);
	
	
	
	getDataTable();
	
	
	
});


function sendAjaxForm(error_mess, ajax_form, url) {
    jQuery.ajax({
        url:     url, 
        type:     "POST",
        dataType: "html", 
        data: jQuery("#"+ajax_form).serialize(), 
        success: function(response) { 
        	alert('Well done!');
			location.reload('index.php');
			// getDataTable();
    	},
    	error: function(response) { 
    		$( "#result_table_tbody" ).append( 'Ошибка' );
    	}
 	});
}
 


