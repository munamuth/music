@extends('master')

@section('head')


@stop
@section('body')
	<!-- Body container -->
	<div class="container con">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Add music form -->
				<div class="row">
					<div class="panel panel-default" id="addmusic">
						<div class="panel-heading">
							<h3 class="panel-title text-center">Add Production</h3>
						</div>
						<div class="panel-body">
							<form action="{{ URL::to('/admin/production/store') }}" method="post" class="form-horizontal" role="form" id="add_music" enctype="multipart/form-data">	
								<div class="form-group">
									<label class="col-sm-2 control-label">Name</label>
									<div class="col-sm-10">
										<input type="text" name="txtName" id="txtName" class="form-control" value="" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-10">
										<input type="submit" class="btn btn-success" value="Save">
										<input type="button" class="btn btn-success" value="Clear">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Search row -->
				<div class="row">
					<form action="" method="POST" class="form-horizontal" role="form">				
				
						<div class="form-group">
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2" id="add">
								<button type="button" class="btn btn-default" id="btnAdd" value="">
									<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
								</button>
							</div>
							<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
								<div class="input-group">
									<input type="text" name="txtSearch" id="txtSearch" class="form-control" value="" required="required" placeholder="Search...">
									<span class="input-group-btn">										
										<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
									</span>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- list content -->
				<div class="row">
					<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Singer</th>
								<th>Prodcution</th>
								<th>Vol</th>
								<th>Insert Date</th>
								<th>Update Date</th>
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
	</div>

@stop
@section('footer')
	<script type="text/javascript" src="{{ asset('asset/js/production.js') }}"></script>
	<script type="text/javascript">
		$('#production').prop('class', 'active');
	</script>
@stop