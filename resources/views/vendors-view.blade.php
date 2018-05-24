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
				<li><span>Trainee</span></li>
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
							<h3>(Talamdan sa Usa ka Mamamligya)</h3>
						</div>
						<div style="float:left;">
							<label class="col-md-12 control-label"><b>I.PERSONAL INFORMATION(KASAYURAN SA PAGKATAO)</b></label>
						</div>
						<div class="col-md-12">
							<b>&nbsp;</b>
						</div>
							<form id="add-trainee-form" class="form-horizontal" action="/save-trainee" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label class="col-md-1 control-label"><b>Market</b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="purpose" id="purpose" class="form-control">
										</div>
									</div>
									<label class="col-md-1 control-label"><b>Section</b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="purpose" id="purpose" class="form-control">
										</div>
									</div>
									<label class="col-md-1 control-label"><b>Stall No.</b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="purpose" id="purpose" class="form-control">
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
												<input type="text" data-plugin-datepicker class="form-control" id="birthday" name="birthday" placeholder="MM/DD/YY">
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
								
								
								<hr />
								
								<div style="float:left;">
									<label class="col-md-12 control-label"><b>II.FAMILY BACKGROUND (IMPORMASYON SA PAMILYA)</b></label>
								</div>
								<div class="col-md-12">
									<b>&nbsp;</b>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>Spouse Surname: <br><sub>(Apelyedo sa Asawa/Bana)</sub></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="spouse surname" id="spouse surname" class="form-control" placeholder="Spouse Surname">
										</div>
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>First Name: <br><sub>(Ngalan)</sub></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="spouse firstname" id="spouse first name" class="form-control" placeholder="Spouse First Name">
										</div>
									</div>
								</div>

								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>Middle Name: <br></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="spouse middlename" id="spouse middlename" class="form-control" placeholder="Spouse Middle Name">
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>Father's Surname: <br><sub>(Apelyedo sa Papa)</sub></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="fathers surname" id="fathers surname" class="form-control" placeholder="Father's Surname">
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>First Name: <br><sub>(Ngalan)</sub></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="fathers firstname" id="fathers firstname" class="form-control" placeholder="Father's First Name">
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>Middle Name: <br></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="fathers middlename" id="fathers middlename" class="form-control" placeholder="Father's Middle Name">
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>Mother's Maiden Name: <br><sub>(Apelyedo sa Pagka-dalaga)</sub></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="mothers maiden name" id="mothers maiden name" class="form-control" placeholder="Mother's Maiden Name">
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>Surname: <br><sub>(Apelyedo)</sub></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="mothers surname" id="mothers surname" class="form-control" placeholder="Mother's Surname">
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>First Name: <br><sub>(Ngalan)</sub></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="mothers firstname" id="mothers firstname" class="form-control" placeholder="Mother's First Name">
										</div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>Middle Name: <br></b></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="mothers middlename" id="mothers middlename" class="form-control" placeholder="Mother's Middle Name">
										</div>
									</div>
								</div>
								<hr>
								<div class="form-group col-md-12">
									<label class="col-md-2 control-label"><b>Name of Child(Write Full name and list all)<br><sub>(Completo nga Pangalan sa mga anak)</b></sub></label>
									<div class="col-md-3">
										<div class="input-group mb-md input-group-icon">
											<input type="text" name="mothers surname" id="mothers surname" class="form-control" placeholder="Mother's Surname">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</section>
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
		$("#elementary_from").datepicker({
			format: "yyyy",
			startView: 2, 
			minViewMode: 2
			 
		 });
		$("#elementary_to").datepicker({
			format: "yyyy",
			startView: 2, 
			minViewMode: 2
			 
		 });
		$("#highschool_from").datepicker({
			format: "yyyy",
			startView: 2, 
			minViewMode: 2
			 
		 });
		$("#highschool_to").datepicker({
			format: "yyyy",
			startView: 2, 
			minViewMode: 2
			 
		 });
		$("#college_from").datepicker({
			format: "yyyy",
			startView: 2, 
			minViewMode: 2
			 
		 });
		$("#college_to").datepicker({
			format: "yyyy",
			startView: 2, 
			minViewMode: 2
			 
		 });
		$("#course_from_year").datepicker({
			format: "yyyy",
			startView: 2, 
			minViewMode: 2
			 
		 });
		$("#course_to_year").datepicker({
			format: "yyyy",
			startView: 2, 
			minViewMode: 2
			 
		 });
		$("#duration_start").datepicker({
			format: "M yyyy",
			startView: 1, 
			minViewMode: 1
			 
		 });
		$("#duration_finish").datepicker({
			format: "M yyyy",
			startView: 1, 
			minViewMode: 1
			 
		 });
		$("#birthday").datepicker({
			startView: 2, 
			 
		 });
		 
		//barangay district
		$( "#barangay" )
		  .change(function () {
				var barangay_id=$(this).val();
				$.ajax({
					url: '/barangay/get_district?barangay_id='+barangay_id,
					dataType: 'json',
					success: function(response){
						$("#district").val(response);
					}
				});
		  })
		  .change();
		 	
$(function () {

    $('#birthday').on('change', function () {
		var dateString = $(this).val();
		var today = new Date();
		var birthDate = new Date(dateString);
		
		var birthday_m = birthDate.getMonth();
		var birthday_d = birthDate.getDate();
		var birthday_y = birthDate.getFullYear();
		
		var today_m = today.getMonth();
		var today_d = today.getDate();
		var today_y = today.getFullYear();
		
		if(birthday_m>=today_m){
			if(birthday_d>=today_d){
				age 					= today_y - birthday_y;
			}
			else{
				age 					= today_y - birthday_y;
				age 					= age - 1;
			}
		}else{
				age 					= today_y - birthday_y;
		}
		
      	$("#age").val(age);
    });
	
	//	View Employment Type
	$('#emp1').change(function(){
		if($(this).is(":checked")) {
			$('#employment1').removeClass("hidden");
			$('#empstat').removeClass("hidden");
			$('#empstatojt').addClass("hidden");
		} else {
			$('#employment1').addClass("hidden");
			$('#empstat').addClass("hidden");
			$('#empstatojt').removeClass("hidden");
		}
	});
	$('#emp2').change(function(){
		if($(this).is(":checked")) {
			$('#employment2').removeClass("hidden");
		} else {
			$('#employment2').addClass("hidden");
		}
	});
	$(document).on('click','#emp3', function(){
		if($(this).is(":checked")) {
			document.getElementById("radnone").checked = true;
			$('#employment1').addClass("hidden");
			$('#empstat').addClass("hidden");
			$('#empstatojt').removeClass("hidden");
		}
	});
	$('#emp4').change(function(){
		if($(this).is(":checked")) {
			$('#employment4').removeClass("hidden");
		} else {
			$('#employment4').addClass("hidden");
		}
	});
	
	$('#high_grade_com').change(function(){
		if( $(this).val()=='Elementary Undergraduate' || $(this).val()=='Elementary Graduate' ) {
			$('#div_elementary').removeClass("hidden");
			$('#div_highschool').addClass("hidden");
			$('#div_vocational').addClass("hidden");
			$('#div_college').addClass("hidden");
			if($(this).val()=='Elementary Graduate'){
				$('#elementary_level').val('Grade 6');
			}else{
				$('#elementary_level').val('Grade 1');
			}
		}
		else if( $(this).val()=='High School Undergraduate' || $(this).val()=='High School Graduate' ) {
			$('#div_elementary').removeClass("hidden");
			$('#div_highschool').removeClass("hidden");
			$('#div_vocational').addClass("hidden");
			$('#div_college').addClass("hidden");
			if($(this).val()=='Highschool Graduate'){
				$('#elementary_level').val('Grade 6');
				$('#highschool_level').val('Grade 12');
			}else{
				$('#elementary_level').val('Grade 6');
				$('#highschool_level').val('Grade 7');
			}
		}
		else if( $(this).val()=='Post Secondary Non-Tertiary/Technical Vocational Course Undergraduate' || $(this).val()=='Post Secondary Non-Tertiary/Technical Vocational Course Graduate' ) {
			$('#div_elementary').removeClass("hidden");
			$('#div_highschool').removeClass("hidden");
			$('#div_vocational').removeClass("hidden");
			$('#div_college').addClass("hidden");
			if($(this).val()=='Post Secondary Non-Tertiary/Technical Vocational Course Graduate'){
				$('#elementary_level').val('Grade 6');
				$('#highschool_level').val('Grade 12');
				$('#vocational_level').val('2nd Year');
			}else{
				$('#elementary_level').val('Grade 6');
				$('#highschool_level').val('Grade 12');
				$('#vocational_level').val('1st Year');
			}
		} 
		else if( $(this).val()=='College Undergraduate' || $(this).val()=='College Graduate' ) {
			$('#div_elementary').removeClass("hidden");
			$('#div_highschool').removeClass("hidden");
			$('#div_college').removeClass("hidden");
			$('#div_vocational').addClass("hidden");
			if($(this).val()=='College Graduate'){
				$('#elementary_level').val('Grade 6');
				$('#highschool_level').val('Grade 12');
				$('#college_level').val('4th Year');
			}else{
				$('#elementary_level').val('Grade 6');
				$('#highschool_level').val('Grade 12');
				$('#college_level').val('1st Year');
			}
		} 
		else {
			$('#div_elementary').addClass("hidden");
			$('#div_highschool').addClass("hidden");
			$('#div_vocational').addClass("hidden");
			$('#div_college').addClass("hidden");
		}
	});
	
	//---Search
	$(document).on('click','#trainee-search', function(){
		
		var trainee	= $('#trainee-search-option').val();
		var keyword	= $('#trainee-text').val();

		if(keyword == ''){
			window.location.replace('/search-trainee&'+trainee+'&null');
			//window.location.replace('/client-list');
		}
		else{
			window.location.replace('/search-trainee&'+trainee+'&'+keyword);
		}
		
	});
	
	// Enter Key
	$("#trainee-text").keyup(function(event){
		if(event.keyCode == 13){
			$("#trainee-search").click();
		}
	});
		
	// Delete
	$(document).on('click','.delete-trainee-btn',function(){
		
		var BUTTON 			= $(this);
		var _token			= '<?php echo csrf_token()?>';
		var data_id			= BUTTON.data('trainee_id');
		var data_name		= BUTTON.data('trainee_name');
		var data			= 0;
		
		if (confirm('Are you sure you want to Delete '+ data_name +'?')) {
			
			$.post('/inactive-trainee',{ _token : _token , data_id : data_id , data : data },function(response){
					location.reload();
			});
		} 
		else {
			
		}
				
	});
	//END
});
</script>

@stop
