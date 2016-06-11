
	/*Button slow*/
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

	/*TxtVOl Add item*/
	load_form()
	function load_form(){
		var str;
		for(count = 1; count <= 600; count++ ) {
			str += "<option>"+count+"</option>";
		}
		$('#txtVol').append(str);

		$.ajax({
			url: '/admin/music/all',
			type: 'get',
			success: function(data){
				if( data.STATUS == true ) {
					var singer;
					var production;
					for( i = 0;  i < data.SINGER.length; i++){
						singer += '<option>'+data.SINGER[i].singer_name+'</option>';
					}
					for( i = 0;  i < data.PRODUCTION.length; i++){
						production += '<option>'+data.PRODUCTION[i].production_name+'</option>';
					}
					$('#txtSinger').append( singer );
					$('#txtProduction').append( production );
				}
			},
			error: function() {
				/* Act on the event */
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	$('th').prop('class','text-center')
	/*list all music*/
	all();
	function all(){
		$.ajax({
			url: '/admin/music/all',
			type: 'get',
			success: function(data) {
				if(data.STATUS == true){
					var str='';
					for(i=0; i<data.MUSIC.length; i++){
						str += '<tr>'
							+'<td>'+data.MUSIC[i].mid+'</td>'
							+'<td>'+data.MUSIC[i].music_title+'</td>'
							+'<td>'+data.MUSIC[i].singer_name+'</td>'
							+'<td>'+data.MUSIC[i].production_name+'</td>'
							+'<td>'+data.MUSIC[i].vol+'</td>'
							+'<td>'+data.MUSIC[i].created_at+'</td>'
							+'<td>'+data.MUSIC[i].updated_at+'</td>'
							+'<td>'
								+'<button type="button" class="btn btn-success" id="btnPlay" onclick="btnPlay_click('+data.MUSIC[i].mid+')">'
									+'<span class="glyphicon glyphicon-play" aria-hidden="true"></span>'
								+'</button> '

								+'<button type="button" class="btn btn-success" id="btnPause">'
									+'<span class="glyphicon glyphicon-pause" aria-hidden="true"></span>'
								+'</button> '

								+'<button type="button" class="btn btn-success" id="btnStop">'
									+'<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>'
								+'</button> '

								+'<button type="button" class="btn btn-success" title="Edit">'
									+'<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>'
								+'</button> '

								+'<button type="button" class="btn btn-success">'
									+'<img src="/asset/images/trash-icon.png">'									
								+'</button> '
							+'</td>'
							+'</tr>';
					}
						$('tbody').html(str);
				}
			},
			error: (function() {
				alert('error');
			})
		})
		
	}
// Javascript function
/*btnPlay_click function*/

	function btnPlay_click(id){
		console.log(id)
		$.ajax({
			url: '/admin/music/show/'+id,
			type: 'get',
			success: function(data) {
				if( data.STATUS == true ){
					$('.player').html('<audio src="/'+data.MUSIC.music_location+'" controls autoplay id="player" class="hidden"></audio>')
				}
			},
			error:function() {
				console.log('can not request music');
			}
		});	
	}