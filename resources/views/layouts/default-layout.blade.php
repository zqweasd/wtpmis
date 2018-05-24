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
		<section class="body-sign body-locked">
			<div class="center-sign">
				<div class="panel panel-sign">
					<div class="panel-body">
						<form id="super-admin-form" action="/super-admin/create-admin" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="current-user text-center">
								<img src="/theme/img/genius.png" alt="John Doe" class="img-circle user-image" />
								<h2 class="user-name text-dark m-none">Super Admin</h2>
							</div>
							<div class="form-group mb-lg">
								<div class="input-group input-group-icon">
									<input id="pwd" name="pwd" type="password" class="form-control input-lg" placeholder="Password" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>
							<div class="form-group mb-lg">
								<div id="super-admin-prompt"></div>
							</div>

							<div class="row">
								<div class="col-xs-6">
								</div>
								<div class="col-xs-6 text-right">
									<button data-target-form="#super-admin-form" type="button" class="btn btn-primary ajax-post">Unlock</button>
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
		<script src="/theme//theme/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/theme/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/theme/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/theme/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/theme/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="/theme/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
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