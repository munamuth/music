	var btnAdd = $("#btnAdd").val('Show');
	$('#addmusic').hide();
	var count=1;
	$("#btnAdd").click(function () {
		if( count % 2 > 0 ){
			btnAdd.html('<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>');
		} else {
			btnAdd.html('<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>');
		}	   
		$('#addmusic').slideToggle();
	 	count++;
	});