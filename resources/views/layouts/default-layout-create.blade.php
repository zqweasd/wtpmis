<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/theme/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/theme/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="/theme/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/theme/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/theme/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/theme/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/theme/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="/theme/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="/theme/img/superadminlogo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none" style="background-color: #2f2d2e"><i class="fa fa-user mr-xs"></i> Create New Admin</h2>
					</div>
					<div class="panel-body" style="border-top-color: #2f2d2e">
						<form id="super-admin-create-form" action="/super-admin/save" method="POST" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
							<div class="form-group mb-lg">
								<label>Name</label>
								<input name="name" type="text" class="form-control input-lg" />
							</div>

							<div class="form-group mb-lg">
								<label>Password</label>
								<input name="pwd" type="password" class="form-control input-lg" />
							</div>

							<div class="form-group mb-lg">
								<label>Admin Code</label>
								<input name="code" type="password" class="form-control input-lg" placeholder="Hint: 8 Numbers"/>
							</div>
							
							<div class="form-group mb-lg">
								<div id="super-admin-create-prompt" style="text-align: center;"></div>
							</div>
							
							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox" value="1"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button data-target-form="#super-admin-create-form" style="background-color: #2f2d2e; border-color: #2f2d2e;" type="button" class="btn btn-primary ajax-post">Create</button>
								</div>
							</div>
							
						</form>
					</div>
				</div>

			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="/theme/assets/vendor/jquery/jquery.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/theme/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/theme/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/theme/assets/javascripts/theme.init.js"></script>
		
		<script src="/theme/assets/js/theme.js"></script>
		<script src="/js/app/actions.js"></script>
	</body>
</html>