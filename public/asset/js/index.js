
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
				console.log('can not get music')
			}
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
					var pro='';
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

								+'<button type="button" class="btn btn-success" id="pause">'
									+'<span class="glyphicon glyphicon-pause" aria-hidden="true"></span>'
								+'</button> '

								+'<button type="button" class="btn btn-success" id="stop">'
									+'<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>'
								+'</button> '
							+'</td>'
							+'</tr>';
						
					}
					for(i = 0; i < data.PRODUCTION.length; i ++){
						pro += '<li><a href="">'+data.PRODUCTION[i].production_name+'</a></li>';
					}
						$('tbody').html(str);
						$('#dropdown_production').html(pro);
						$('#player').prop('src', data.MUSIC[0].music_location);
				}
			},
			error: (function() {
				alert('error');
			})
		});
		
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
					$('.player').html('<audio src="/'+data.MUSIC.music_location+'" controls autoplay id="player"></audio>')
				}
			},
			error:function() {
				console.log('can not request music');
			}
		});	
	}
	$('#pause').click(function() {
		$("#player").pause();
	});

	/*list production*/
	list_prodution();
	function list_prodution(){

	}