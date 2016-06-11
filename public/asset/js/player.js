	
		function myPause(){
			var player = $('#player')[0];

				player.pause();

				$('#pause').addClass('disabled');

				$('#play').removeClass('disabled');
		}
		function myPlay() {
			var player = $('#player')[0];	
				if( player == null){
					$('#btnPlay').click();
					$('#play').addClass('disabled');

					$('#pause').removeClass('disabled');
					$('#stop').removeClass('disabled');

				} else {

					player.play();
					$('#play').addClass('disabled');

					$('#pause').removeClass('disabled');
					$('#stop').removeClass('disabled');
				
				}


		}
		function myStop(){

			$('#player')[0].pause();
			$('#player')[0].currentTime = 0;

			$('#stop').addClass('disabled');


			$('#pause').removeClass('disabled');
			$('#play').removeClass('disabled');

		}

		function myBackward() {
			$('#player')[0].currentTime -= 10;
		}

		function myForward() {
			$('#player')[0].currentTime += 10;
		}