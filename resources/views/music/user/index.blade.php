
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
	<script type="text/javascript" src="{{ asset('asset/js/index.js') }}"></script>
    @yield('head')
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/music">Music</a></li>
					<li class="dropdown">
						<a href="/singer" class="dropdown-toggle" data-toggle="dropdown">Singers</a>
					</li>
					<li class="dropdown">
						<a href="/production" class="dropdown-toggle" data-toggle="dropdown">Productions <span class="caret"></span></a>
						<ul class="dropdown-menu no_radius" id="dropdown_production">
						</ul>
					</li>
					@if(Auth::guest())
						<li></li>
					@else
						<li><a href="{{ url('/admin/music') }}">Admin</a></li>
					@endif
				</ul>
				<ul class="nav navbar-nav navbar-right">
					 <!-- Authentication Links -->
                    @if (Auth::guest())
								<li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
								<li><a href="/register"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a></li>
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-sign-out"></i>Change Password</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<!-- Body container -->
	<div class="container con">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel no_radius">
					<div class="panel-body">
						<form action="" method="POST" role="form">
							<div class="form-group">
								<div class="input-group">
									<input type="text" name="txtSearch" id="txtSearch" class="form-control no_effect no_radius">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default no_effect no_radius"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
									</span>
								</div>								
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group form-inline" style="margin-top: 6px;">
											<label class="control-label">Search by: </label>
										    <div class="radio padding-left">
										      <label><input type="radio" name="optradio" checked="checked">Music</label>
										    </div>
										    <div class="radio padding-left">
										      <label><input type="radio" name="optradio">Singer</label>
										    </div>
										    <div class="radio padding-left">
										      <label><input type="radio" name="optradio">Production</label>
										    </div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group form-inline">
										<label class="control-label">Sort by: </label>
										<select name="" id="input" class="form-control no_radius" required="required">
											<option>Name</option>
											<option>Date</option>
										</select>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group form-inline">
										<label class="control-label">Show: </label>
										<select name="" id="input" class="form-control no_radius" required="required">
											<option>10</option>
											<option>20</option>
											<option>30</option>
											<option>40</option>
											<option>50</option>
										</select>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="navbar-inverse">
					<audio controls class="text-center" src="" id="player" controls>						
					</audio>
				</div>
				<!-- list content -->
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Singer</th>
								<th>Prodcution</th>
								<th>Vol</th>
								<th>Upload</th>
								<th>Update</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="bg-info">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</body>
</html>