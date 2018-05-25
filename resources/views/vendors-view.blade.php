@extends('layouts.default')

@section('head')

@stop

@section('content')

	<header class="page-header">
		<h2>Vendors</h2> 	
		
		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="/">
							<i class="fa fa-male" ></i>
					</a>
				</li>
				<li><span>Vendors</span></li>
			</ol>

			<a class="sidebar-right-toggle"><i class="fa fa-chevron-right"></i></a>
		</div>
	</header>
	
	<div class="row">
		<div id="update-trainee-div" class="col-lg-12 hidden">
			<div class="toggle" data-plugin-toggle>
				<section id="update-client-toggle" class="toggle active">
					<label id="update-trainee"><b>Update Client</b></label>
					<div class="toggle-content">
						<div class="panel-body" style="overflow-x:auto;width:100%;">
								<div id="load-update-client"></div>
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<div id="add-trainee-div" class="col-lg-12">
			<div class="toggle" data-plugin-toggle>
				<section class="toggle active">
					<label id="add-trainee"><b>Click HERE to ADD new Vendors</b></label>
					<div class="toggle-content">
						<div class="panel-body" style="overflow-x:none;width:100%;">
						<div class="text-center col-md-12 control-label" >

							<h1>Vendors Profile</h1>
							<h3>(Talamdan sa Usa ka Mamaligya)</h3>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<section class="panel form-wizard" id="w4">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
											<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
										</div>
									</header>
									<div class="panel-body">
										<div class="wizard-progress wizard-progress-lg">
											<div class="steps-progress">
												<div class="progress-indicator"></div>
											</div>
											<ul class="wizard-steps">
												<li class="active">
													<a href="#w4-profile" id="tab-profile" data-toggle_id ="toggle-profile" data-toggle="tab"><span>1</span>Personal Info</a>
												</li>
												<li>
													<a href="#w4-family" id="tab-family" data-toggle_id ="toggle-family" data-toggle="tab"><span>2</span>Family Background</a>
												</li>
												<li>
													<a href="#w4-helper" id="tab-helper" data-toggle_id ="toggle-helper" data-toggle="tab"><span>3</span>Vendors Helper Info</a>
												</li>
												<li>
													<a href="#w4-confirm" id="tab-confirm" data-toggle_id ="toggle-confirm" data-toggle="tab"><span>4</span>Confirmation</a>
												</li>
											</ul>
										</div>
						
										<form class="form-horizontal" id="add-vendor-profile-form" method="POST">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<div class="tab-content">
												<div id="w4-profile" class="tab-pane active">
													<div class="form-group">
														<label class="col-md-1 control-label"><b>Market</b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="market" id="purpose" class="form-control">
															</div>
														</div>
														<label class="col-md-1 control-label"><b>Section</b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="section" id="purpose" class="form-control">
															</div>
														</div>
														<label class="col-md-1 control-label"><b>Stall No.</b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<input type="number" name="stallno" id="purpose" class="form-control">
															</div>
														</div>
													</div>
													
													<hr/>
													
													<div class="form-group">

														<label class="col-md-2 control-label"><b>Name:</b></label>
														<div class="col-md-2">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="middlename" id="middlename" class="form-control" placeholder="Middle Name">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
															</div>
														</div>
														<div class="col-md-2">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="nameextension" id="namextension" class="form-control" placeholder="Name Extension">
															</div>
														</div>
													</div>
													<hr>
													<div class="form-group">
														<label class="col-md-2 control-label"><b>Birthday:</b></label>
															<div class="col-md-3">
																	<div id="bday-datepicker" class="input-group">
																		<span class="input-group-addon">
																			<i class="fa fa-calendar"></i>
																		</span>
																	<input type="text" data-plugin-datepicker class="form-control datepicker"  id="birthday" name="vendorbirthday" placeholder="MM/DD/YY">
																	</div>
															</div>
															<label class="col-md-2 control-label"><b>Place of Birth:</b></label>	
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" class="form-control" id="placeofbirth" name="placeofbirth" placeholder="Place of Birth">
																</div>

															</div>

													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"><b>Permanent Address:<br><sub>(Permanente nga Gipuy-an)<sub></b></label>
														<div class="col-md-8">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="permanentaddress" id="street" class="form-control" placeholder="Permanent Address">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"><b>City Address:<br><sub>(Lugar asa Gapuyo sa Syudad)</sub></b></label>
														<div class="col-md-8">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="cityaddress" id="street" class="form-control" placeholder="City Address">
															</div>
														</div>
													</div>
													
													<hr/>
													
													<div class="form-group zbot" >
														<label class="col-md-2 control-label"><b>Sex: </b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<select name="sex" id="sex" class="form-control">
																	<option value="male">Male</option>
																	<option value="female">Female</option>
																</select>
															</div>
														</div>
														<label class="col-md-2 control-label"><b>Contact Number(s): </b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="telephone" id="telephone" class="form-control" placeholder="Telephone">
															</div>
														</div>
													</div>
													<div class="form-group zbot" >
														<label class="col-md-2 control-label"><b>Civil Status: </b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<select name="status" id="status" class="form-control">
																	<option value="single">Single</option>
																	<option value="married">Married(Minyo)</option>
																	<option value="widow">Widowed(Balo)</option>
																	<option value="separated">Separated</option>
																	<option value="separated">Annulled</option>
																	<option value="separated">Separated</option>
																</select>
															</div>
														</div>
														<label class="col-md-2 control-label"><b>&nbsp;</b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="cellular" id="cellular" class="form-control" placeholder="Cellular">
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label"><b>Citizenship: </b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<input type="text" name="citizenship" id="citizenship" class="form-control" placeholder="Citizenship">
															</div>
														</div>
														<label class="col-md-2 control-label"><b>&nbsp;</b></label>
														<div class="col-md-3">
															<div class="input-group mb-md input-group-icon">
																<input type="email" name="others" id="others" class="form-control" placeholder="Others">
															</div>
														</div>
													</div>
												</div>
											
											
												<div id="w4-family" class="tab-pane">
													<div class="form-group">
														<div id="view-id">
														</div>
														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>Spouse Surname: <br><sub>(Apelyedo sa Asawa/Bana)</sub></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="spousesurname" id="spouse surname" class="form-control" placeholder="Spouse Surname">
																</div>
															</div>
														</div>

														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>First Name: <br><sub>(Ngalan)</sub></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="spousefirstname" id="spouse first name" class="form-control" placeholder="Spouse First Name">
																</div>
															</div>
														</div>

														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>Middle Name: <br></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="spousemiddlename" id="spouse middlename" class="form-control" placeholder="Spouse Middle Name">
																</div>
															</div>
														</div>
														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>Father's Surname: <br><sub>(Apelyedo sa Papa)</sub></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="fathersurname" id="fathers surname" class="form-control" placeholder="Father's Surname">
																</div>
															</div>
														</div>
														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>First Name: <br><sub>(Ngalan)</sub></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="fatherfirstname" id="fathers firstname" class="form-control" placeholder="Father's First Name">
																</div>
															</div>
														</div>
														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>Middle Name: <br></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="fathermiddlename" id="fathers middlename" class="form-control" placeholder="Father's Middle Name">
																</div>
															</div>
														</div>
														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>Mother's Maiden Name: <br><sub>(Apelyedo sa Pagka-dalaga)</sub></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="mothermaidenname" id="mothers maiden name" class="form-control" placeholder="Mother's Maiden Name">
																</div>
															</div>
														</div>
														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>Surname: <br><sub>(Apelyedo)</sub></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="mothersurname" id="mothers surname" class="form-control" placeholder="Mother's Surname">
																</div>
															</div>
														</div>
														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>First Name: <br><sub>(Ngalan)</sub></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="motherfirstname" id="mothers firstname" class="form-control" placeholder="Mother's First Name">
																</div>
															</div>
														</div>
														<div class="form-group col-md-12">
															<label class="col-md-2 control-label"><b>Middle Name: <br></b></label>
															<div class="col-md-3">
																<div class="input-group mb-md input-group-icon">
																	<input type="text" name="mothermiddlename" id="mothers middlename" class="form-control" placeholder="Mother's Middle Name">
																</div>
															</div>
														</div>
														<div class="form-group">
															<div id="error-prompt" class="col-md-12 text-center alert alert-warning hidden">Error!</div>
																<div class="box-body">
																	<table class="table table-bordered table-striped mb-none" id="datatable-default">				
																		<thead>
																			<tr class="btable">
																				<th>Name of Children</th>
																				<th>Birthday</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		
																		<tbody>
																			<tr class="btable gradeA">
																				<td class="btname" style="width: 200px;"><input id="nameofchild" type="text" class="form-control text-center" name="nameofchild" ></td>
																				<td class="btname" style="width:120px;"><input type="text" data-plugin-datepicker class="form-control text-center datepicker"  id="childbirthday" name="childbirthday" placeholder="MM/DD/YY"></td>
																				<td class="" style="width:20px"><button id="add-btn" class="btn btn-primary" style="width:100px;" type="button">Add</button></td>
																			</tr>
																		</tbody>
																	</table>
															
																	<div id="view-family">
																		
																	</div>
																
																</div>
															</div>
														</div>
												</div>
											
											
												<div id="w4-helper" class="tab-pane">
													<div class="form-group">
														<div class="box-body">
																	<table class="table table-bordered table-striped mb-none" id="datatable-default">				
																		<thead>
																			<tr class="btable">
																				<th>Surname(Apelyedo sa Katabang)</th>
																				<th>Firstname</th>
																				<th>Middlename</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		
																		<tbody>
																			<tr class="btable gradeA">
																				<td class="btname" style="width: 200px;"><input type="text" name="helper_surname" id="helper_surname" class="form-control text-center" placeholder="Helper Surname"></td>
																				<td class="btname" style="width:120px;"><input type="text" name="helper_firstname" id="helper_firstname" class="form-control text-center" placeholder="Helper First Name"></td>
																				<td class="btname" style="width:120px;"><input type="text" name="helper_middlename" id="helper_middlename" class="form-control text-center" placeholder="Helper Middle Name"></td>
																				<td class="" style="width:20px"><button id="add-btn-helper" class="btn btn-primary" style="width:100px;" type="button">Add</button></td>
																			</tr>
																		</tbody>
																	</table>
															
																	<div id="view-helper">
																		
																	</div>
																
														</div>
													</div>

												</div>	
												<div id="w4-confirm" class="tab-pane">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="w4-email">Email</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="email" id="w4-email" required>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-3"></div>
														<div class="col-sm-9">
															<div class="checkbox-custom">
																<input type="checkbox" name="terms" id="w4-terms" required>
																<label for="w4-terms">I agree to the terms of service</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											
									</div>
									<div class="panel-footer">
										<ul class="pager">
											<li class="previous disabled">
												<a><i class="fa fa-angle-left"></i> Previous</a>
											</li>
											<li class="finish hidden pull-right">
												<a href="" id="add-vendor-btn4" class="hidden" style="color: yellow">Finish</a>
											</li>
											<li class="next">
												<a  id="add-vendor-btn1" class="hide-btn-1 " data-button_id="btn-1" style="color: red">Next <i class="fa fa-angle-right"></i></a>
												<a id="add-vendor-btn2" class="hide-btn-2 hidden" data-button_id="btn-2" style="color: green">Next <i class="fa fa-angle-right"></i></a>
												<a id="add-vendor-btn3" class="hide-btn-3 hidden" data-button_id="btn-3" style="color: blue">Next <i class="fa fa-angle-right"></i></a>
											</li>
										</ul>
									</div>
								
								</section>
							</div>
						</div>
									<div class="" name="code">
										
									</div>
								</div>	
								<div id="save-user-prompt" style="text-align: center;"></div>
						</div>
					</div>
				</section>
				</form>
			</div>
		</div>
	</div>
	
	<section class="panel">
		<div class="panel-body">
							
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-2">
					<select class="form-control mb-md" id="trainee-search-option">
						<option value="all" >All Name</option>	
						<option value="lastname" >Last Name</option>
						<option value="firstname" >First Name</option>
						<option value="middlename" >Middle Name</option>
					</select>
				</div>
				<div class="col-sm-4">
					<div class="search">
						<div class="input-group input-search">
							<input type="text" class="form-control" id="trainee-text" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" id="trainee-search" ><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
			</div>
			
			<div class="panel-body" style="overflow-x:auto;width:100%;">
				<table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr class="btable">
							<th>#</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
					
							<tr class="btable gradeA">
								<td width="2%"> </td>
								<td class="btname"></td>
								<td class="btname"></td>
								<td class="btname"></td>
								<td width="100px"><a style="width: 100px;" href="" class="btn btn-block btn-info" ><i class="fa fa-eye"></i> View</a></td>
								<td width="150px"><a class="delete-trainee-btn btn btn-block btn-danger " data-trainee_name="" data-trainee_id=""> Delete</a> </td>
							</tr>
							
					</tbody>
				</table>				
				<div class="pull-right">
				</div>
			</div>
			
		</div>
	</section>

@stop

@section('foot')
<script>


	$(document).on('click','#add-vendor-btn1, #add-vendor-btn2, #add-vendor-btn3, #add-vendor-btn4, #tab-profile, #tab-family, #tab-helper, #tab-confirm',function(){
		
		var BUTTON 			= $(this);
		var _token			= '<?php echo csrf_token()?>';
		var button_id		= BUTTON.data('button_id');
		var toggle_id       = BUTTON.data('toggle_id');
		var data			= 0;

		if(toggle_id == 'toggle-profile'){		
			$('#add-vendor-btn1').removeClass('hidden');
			$('#add-vendor-btn2').addClass('hidden');
			$('#add-vendor-btn3').addClass('hidden');	
			$('#add-vendor-btn4').addClass('hidden');		
		}
		if(toggle_id == 'toggle-family'){			
			$('#add-vendor-btn1').addClass('hidden');
			$('#add-vendor-btn2').removeClass('hidden');
			$('#add-vendor-btn3').addClass('hidden');
			$('#add-vendor-btn4').addClass('hidden');
		}
		if(toggle_id == 'toggle-helper'){			
			$('#add-vendor-btn1').addClass('hidden');
			$('#add-vendor-btn2').addClass('hidden');
			$('#add-vendor-btn3').removeClass('hidden');
			$('#add-vendor-btn4').addClass('hidden');
		}
		
		if(toggle_id == 'toggle-confirm'){			
			$('#add-vendor-btn1').addClass('hidden');
			$('#add-vendor-btn2').addClass('hidden');
			$('#add-vendor-btn3').addClass('hidden');
			$('#add-vendor-btn4').removeClass('hidden');
		}

		if(button_id == 'btn-1'){
			alert('Personal Info');
			$('#add-vendor-btn1').addClass('hidden');
			$('#add-vendor-btn2').removeClass('hidden');
			$('#add-vendor-btn3').addClass('hidden');	
			$('#add-vendor-btn4').addClass('hidden');
			var vendor_inputs = $('#add-vendor-profile-form').serializeArray();

			$.ajax({

				url: '/save-vendor',
				data: vendor_inputs,
				type: 'post',
				success: function(html){
					$('#view-id').html(html);
				}
			});
		}
		if(button_id == 'btn-2'){	
			alert('Family Info');
			$('#add-vendor-btn1').addClass('hidden');
			$('#add-vendor-btn2').addClass('hidden');
			$('#add-vendor-btn3').removeClass('hidden');
			$('#add-vendor-btn4').addClass('hidden');
			var vendor_inputs = $('#add-vendor-profile-form').serializeArray();

			$.ajax({

				url: '/save-vendor-family',
				data: vendor_inputs,
				type: 'post',
				success: function(response){
					if(response.status =='failed'){
						alert(response.message);
						return;
					}
					else{
						$('#save-prompt').removeClass('hidden');
					}
				}
			});
		}
		if(button_id == 'btn-3'){			
			alert('Helper Info');
			$('#add-vendor-btn1').addClass('hidden');
			$('#add-vendor-btn2').addClass('hidden');
			$('#add-vendor-btn3').addClass('hidden');
			$('#add-vendor-btn4').removeClass('hidden');
			var vendor_inputs = $('#add-vendor-profile-form').serializeArray();

			$.ajax({

				url: '/save-vendor-helper',
				data: vendor_inputs,
				type: 'post',
				success: function(response){
					if(response.status =='failed'){
						alert(response.message);
						return;
					}
					else{
						$('#save-prompt').removeClass('hidden');
					}
				}
			});
		}
		if(button_id == 'btn-4'){

			$('#add-vendor-btn1').addClass('hidden');
			$('#add-vendor-btn2').addClass('hidden');
			$('#add-vendor-btn3').addClass('hidden');
			$('#add-vendor-btn4').removeClass('hidden'); 	
        }
		
	});

	$(document).on('click','#add-btn',function(){
		
		var BUTTON 			= $(this);
		var nameofchild 	= $('#nameofchild').val();
		var childbirthday   = $('#childbirthday').val();
		var vendor_id       = $('#vendor_id').val();
		var _token			= '<?php echo csrf_token()?>';
		alert(vendor_id);
		BUTTON.addClass('disabled');
		
		if (confirm('Confirm?')) {
			
			$.post('/add-child-birthday',{ _token : _token, vendor_id : vendor_id, nameofchild : nameofchild, childbirthday : childbirthday },function(html){

					
					$('#view-family').html(html);		
					$('#nameofchild').val('');
					$('#childbirthday').val('');

					
			});
				
		}else{
			
		}
		
		setTimeout(function(){
			BUTTON.removeClass('disabled')
		},500);
		
	});
	//END
	$(document).on('click','#add-btn-helper',function(){
		
		var BUTTON 			  = $(this);
		var helper_surname 	  = $('#helper_surname').val();
		var helper_firstname  = $('#helper_firstname').val();
		var helper_middlename = $('#helper_middlename').val();
		var vendor_id         = $('#vendor_id').val();
		var _token			  = '<?php echo csrf_token()?>';
		alert(vendor_id);
		BUTTON.addClass('disabled');
		
		if (confirm('Confirm?')) {
			
			$.post('/add-vendor-helper',{ _token : _token, vendor_id : vendor_id, helper_surname : helper_surname, helper_firstname : helper_firstname, helper_middlename : helper_middlename },function(html){

					
					$('#view-helper').html(html);		
					$('#helper_surname').val('');
					$('#helper_firstname').val('');
					$('#helper_middlename').val('');
					
			});
				
		}else{
			
		}
		
		setTimeout(function(){
			BUTTON.removeClass('disabled')
		},500);
		
	});

		
</script>

@stop
