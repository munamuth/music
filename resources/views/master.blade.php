
<!DOCTYPE html>
<html>
<head>
	<title>Music | Home</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/style.css') }}">
	<script type="text/javascript" src="{{ asset('asset/bootstrap/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('asset/bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('head')
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="glyphicon glyphicon-tasks"></span>
				</button>
				<a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li  id="music"><a href="/admin/music"><span class="glyphicon glyphicon-music" aria-hidden="true"></span> Music</a></li>
					<li id="singer">
						<a href="/admin/singer"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Singers </a>
					</li>
					<li id="production">
						<a href="/admin/production"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> Productions</a>
					</li>
					<form class="navbar-form pull-right">

						<button type="button" class="btn btn-success" onclick="" id="previous"><span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span></button>

						<button type="button" class="btn btn-success" onclick="myBackward()" id="backward"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button>

						<button type="button" class="btn btn-primary" onclick="myPlay()" id="play"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></button>

						<button type="button" class="btn btn-warning" onclick="myPause()" id="pause"><span class="glyphicon glyphicon-pause" aria-hidden="true"></span></button>

						<button type="button" class="btn btn-danger" onclick="myStop()" id="stop"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span></button>

						<button type="button" class="btn btn-success" onclick="myForward()" id="forward"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></button>

						<button type="button" class="btn btn-success" onclick="" id="next"><span class="glyphicon glyphicon-fast-forward" aria-hidden="true"></span></button>

					</form>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href=""><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	@yield('body')

	@yield('footer')
</body>
</html>

