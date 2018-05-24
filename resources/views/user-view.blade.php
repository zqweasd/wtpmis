@extends('layouts.default')

@section('head')

@stop

@section('content')


	<header class="page-header">
		<h2>Users</h2>	
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="/">
							<i class="fa fa-home" ></i>
					</a>
				</li>
				<li><span>Home</span></li>
			</ol>
			<a class="sidebar-right-toggle"><i class="fa fa-chevron-right"></i></a>
		</div>
	</header>	
	<?php 
		$username	= ucfirst(Session::get('username'));
	?>
		<div id="add-trainee-div" class="col-lg-12">
			<div class="toggle" data-plugin-toggle>
				<section class="toggle active">
					<label id="add-trainee"><b>Click HERE to ADD new User</b></label>
					<div class="toggle-content">
						<div class="panel-body" style="overflow-x:auto;width:100%;">
							<form id="add-user-form" class="form-horizontal" action="/save-user" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div id="save-user-prompt"></div>					
								<div class="form-group">
									<label class="col-md-2 control-label"><b>Username</b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="username" id="username" class="form-control" placeholder="Username">
										</div>
									</div>	
									<div class="col-md-3">
										<button data-target-form="#add-user-form" href="#" id="add-user-btn" class="btn btn-primary ajax-post" style="width:100px;" type="button">Add</button>
									</div>
							</form>
							<table class="table table-bordered table-striped mb-none" id="datatable-default" name="table">				
								<thead>
									<tr class="btable">
										<th>No</th>
										<th>Username</th>
										<th>First Name</th>
										<th>Middle Name</th>
										<th>Last Name</th>
										<th>Admin</th>
										<th>Inactive</th>
										<th></th>
									</tr>
								</thead>
								<?php $n=1;?>
								<tbody>
								@foreach($data as $user)
									@if(Session::get('is_superadmin') == true && Session::get('is_admin') == true)
										<tr class="btable gradeA">
											<td width="2%"> <?php echo $n++?> </td>
											<td class="btname"> {{$user->username}} </td>
											<td class="btname"> {{$user->fname}} </td>
											<td class="btname"> {{$user->mname}} </td>
											<td class="btname"> {{$user->lname}} </td>
											@if(!$user->is_admin)
												<td>
													<b>No</b>
												</td>
											@else
												<td style="color:red;">
													<b>Yes</b>
												</td>
											@endif
											@if(!$user->is_active)
												<td width="200" style="color:red;">
													<div class="inactive-label">
														<b>Yes</b>
													</div>
													<div class="inactive-button">
														<button type="button" class=" btn btn-dark user-no-button pull-right" data-data_id="{{ $user->id }}" data-data_name="{{ $user->username }}">Change</button>
													</div>
												</td>
											@else
												<td width="200">
													<div class="inactive-label">
														<b>No</b>
													</div>
													<div class="inactive-button">
														<button type="button" class=" btn btn-danger user-yes-button pull-right" data-data_id="{{ $user->id }}" data-data_name="{{ $user->username }}">Change</button>
													</div>
												</td>
											@endif
												<td width="200">
													<button style="width: 200px;" type="button" class=" btn btn-warning btn-block reset-password-button" data-data_id="{{ $user->id }}" data-data_name="{{ $user->username }}">Reset Password</button>
												</td>		
											</tr>
									@elseif(Session::get('is_superadmin') == false && Session::get('is_admin') == true)
										@if($user->is_superadmin)
											@continue;
										@else
											<tr class="btable gradeA">
												<td width="2%"> <?php echo $n++?> </td>
												<td class="btname"> {{$user->username}} </td>
												<td class="btname"> {{$user->fname}} </td>
												<td class="btname"> {{$user->mname}} </td>
												<td class="btname"> {{$user->lname}} </td>
												@if(!$user->is_admin)
													<td>
														<b>No</b>
													</td>
												@else
													<td style="color:red;">
														<b>Yes</b>
													</td>
												@endif
												@if(!$user->is_active)
													<td width="200" style="color:red;">
														<div class="inactive-label">
															<b>Yes</b>
														</div>
														<div class="inactive-button">
															<button type="button" class=" btn btn-dark user-no-button pull-right" data-data_id="{{ $user->id }}" data-data_name="{{ $user->username }}">Change</button>
														</div>
													</td>
												@else
													<td width="200">
														<div class="inactive-label">
															<b>No</b>
														</div>
														<div class="inactive-button">
															<button type="button" class=" btn btn-danger user-yes-button pull-right" data-data_id="{{ $user->id }}" data-data_name="{{ $user->username }}">Change</button>
														</div>
													</td>
												@endif
													<td width="200">
														<button style="width: 200px;" type="button" class=" btn btn-warning btn-block reset-password-button" data-data_id="{{ $user->id }}" data-data_name="{{ $user->username }}">Reset Password</button>
													</td>
												@endif
												</tr>
									@endif	
								@endforeach
								</tbody>
							</table>
				
	<script type="text/javascript">
		$(function () {
		
		//Activate/Inactivate user
		$(document).on('click','.user-yes-button',function(){
			
			var BUTTON 			= $(this);
			var _token			= '<?php echo(csrf_token())?>';
			var data_id			= BUTTON.data('data_id');
			var data_name		= BUTTON.data('data_name');
			var data			= 0;
			
			if (confirm('Are you sure you want to INACTIVATE '+data_name+'?')) {
				
				$.post('/inactive-user',{ _token : _token , data_id : data_id , data : data },function(response){
						location.reload();
				});
			} 
			else {
				
			}
					
		});
		
		$(document).on('click','.user-no-button',function(){
			
			var BUTTON 			= $(this);
			var _token			= '<?php echo(csrf_token())?>';
			var data_id			= BUTTON.data('data_id');
			var data_name		= BUTTON.data('data_name');
			var data			= 1;
			
			if (confirm('Are you sure you want to ACTIVATE '+data_name+'?')) {
				
				$.post('/inactive-user',{ _token : _token , data_id : data_id , data : data },function(response){
						location.reload();
				});
			} 
			else {
				
			}
					
		});
		
		$(document).on('click','.reset-password-button',function(){

			var BUTTON 			= $(this);
			var data_id			= BUTTON.data('data_id');
			var data_name		= BUTTON.data('data_name');
			var _token			= '<?php echo(csrf_token())?>';
			
			if (confirm('Are you sure you want to ACTIVATE '+data_name+'?')) {
				
				$.post('/admin/reset-password-user',{ _token : _token , data_id : data_id },function(response){
						alert('Reset Successfully!');
						location.reload();
				});
			} 
			else {
				
			}
					
		});
		
	});
		
	</script>

					
@stop


@section('foot')

@stop