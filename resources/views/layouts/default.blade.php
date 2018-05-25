<!doctype html>
					
<html class="fixed sidebar-left-collapsed dark">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Westbound Terminal Public Market Information System</title>
		<link rel="shortcut icon" href="/theme/img/cdo.ico" />
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Westbound Terminal Public Market Information System">
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

		<link rel="stylesheet" type="text/css" href="/theme/assets/vendor/bootstrap/fonts/glyphicons-halflings-regular.ttf"/>
		<link rel="stylesheet" type="text/css" href="/theme/assets/vendor/bootstrap/fonts/glyphicons-halflings-regular.ttf"/>
		<link rel="stylesheet" type="text/css" href="/theme/assets/vendor/bootstrap/fonts/glyphicons-halflings-regular.woff"/>
		<link rel="stylesheet" type="text/css" href="/theme/assets/vendor/bootstrap/fonts/glyphicons-halflings-regular.ttf"/>
		
		<link rel="stylesheet" href="/theme/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="/theme/assets/stylesheets/theme.css" />
		<!-- Skin CSS -->
		<link rel="stylesheet" href="/theme/assets/stylesheets/skins/default.css" />
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/theme/assets/stylesheets/theme-custom.css">
		<!-- Head Libs -->
		
		<script src="/theme/assets/vendor/modernizr/modernizr.js"></script>
		
		<script src="/theme/assets/vendor/jquery/jquery.js"></script>
		
		<!-- CHARTS -->
		<link rel="stylesheet" href="/theme/assets/vendor/morris/morris.css" />
		
		<!-- Modal -->
		<link rel="stylesheet" href="/theme/assets/vendor/pnotify/pnotify.custom.css" />
		
		<!-- Message -->
		<link rel="stylesheet" href="/theme/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="/theme/assets/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="/theme/assets/vendor/summernote/summernote-bs3.css" />
		<!-- Style Wincode 
		<link rel="stylesheet" href="/css/wincode.css" /> -->
		<style>
			.btable {
				white-space: nowrap;
				text-align: center;
			}
			.btable th{
				white-space: nowrap;
				text-align: center;
			}
			.action-button{
				width: 150px;
			}
			.btable .btname{
				text-align: left;
			}
			.btable .btcash{
				text-align: right;
			}
			
			.smstable th{
				white-space: nowrap;
				text-align: center;
			}
			.smstable .SMSname{
				text-align: left;
			}
			
			#send-prompt {
				-webkit-animation: seconds 1.0s forwards;
				-webkit-animation-iteration-count: 1;
				-webkit-animation-delay: 5s;
				animation: seconds 1.0s forwards;
				animation-iteration-count: 1;
				animation-delay: 3s;
				position: relative;
			}
			#failed-prompt-prompt {
				-webkit-animation: seconds 1.0s forwards;
				-webkit-animation-iteration-count: 1;
				-webkit-animation-delay: 5s;
				animation: seconds 1.0s forwards;
				animation-iteration-count: 1;
				animation-delay: 3s;
				position: relative;
			}
			@-webkit-keyframes seconds {
				0% {
					opacity: 1;
				}
				100% {
					opacity: 0;
					left: -9999px; 
				}
			}
			@keyframes seconds {
				0% {
					opacity: 1;
				}
				100% {
					opacity: 0;
					left: -9999px; 
				}
			}
			.inactive-label {
				display: inline-block; 
				width: 80px; 
				vertical-align: top; 
				text-align: center;
			}
			.inactive-button {
				display: inline-block; 
			}
		</style>
		@yield('head')
	</head>
	<body>
		<section class="body">
		
		@if (!Session::has('user_id'))
	
		<div class="col-md-4">&nbsp;</div>
		<div class="col-md-6 body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="/theme/img/test.png" height="54" alt="Porto Admin" />
				</a>
				<!--
				<a href="/" class="logo pull-right" style="margin: 0 20px 0 20px;">
					<img src="/theme/img/cdo.png" height="54" alt="Porto Admin" />
				</a>
				-->

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-weight-bold m-none" style="background-color: #2f2d2e"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body" style="border-top-color: #2f2d2e">
						<form id="login-form" action="/login/submit" class="form-login">
								<div id="login-prompt"></div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input id="username-text" name="account" type="text" class="form-control input-lg" value="{{ Cookie::get('account') }}">
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input id="password-text" name="password" type="password" class="form-control input-lg" value="{{ Cookie::get('password') }}">
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="remember_me" type="checkbox">
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button data-target-form="#login-form"  style="background-color: #2f2d2e; border-color: #2f2d2e;"  type="button" class="btn btn-primary ajax-post" id="login-button" href="/logout">Sign In</button>
								</div>
							</div>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">© Copyright 2018. All Rights Reserved.</p>
			</div>
		</div>
		@else

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="/" class="logo">
						<img src="/theme/img/test.png" height="35" alt="Porto Admin" />
					</a>
					<!--
					<a href="/" class="logo pull-right" style="margin-right: 30px;">
						<img src="/theme/img/cdo.png" height="35" alt="Porto Admin" />
					</a>
					-->
					
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start:  user box -->
				<div class="header-right">
			
					<span class="separator"></span>
					
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							@if(Session::get('is_admin') == true )
							<figure class="profile-picture">
								<img src="/theme/img/Admin.png" class="img-circle" />
							</figure>
							@else
							<figure class="profile-picture">
								<img src="/theme/img/User.ico" class="img-circle" />
							</figure>
							@endif
							<?php 
								$username	= ucfirst(Session::get('username'));
							?>
							<div class="profile-info" >
								<span class="name"><b>{{ $username }}</b></span>
								@if(Session::get('is_admin') == true )
								<span class="role">Administrator</span>
								@else
								<span class="role">User</span>
								@endif
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="/my-profile"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
					
					@if( Session::get('default_pass') == 'password' )
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="/">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Home</span>
										</a>
									</li>
									<li>
										<a href="/vendors">
											<i class="fa fa-male" aria-hidden="true"></i>
											<span>Vendors</span>
										</a>
									</li>
									<li>
										<a href="/print">
											<i class="fa fa-print" aria-hidden="true"></i>
											<span>Print</span>
										</a>
									</li>
									<li class="nav-parent nav-expanded">
										<a>
											<i class="fa fa-barcode"></i>
											<span>Code</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="/code/retrieve-code">
													 Retrieve Code
												</a>
											</li>
											<li>
												<a href="/code/activate-code">
													 Activate Code
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</nav>
				
							<hr class="separator" />
				
							<div class="sidebar-widget widget-tasks">
								<div class="widget-header">
									<h6>Settings</h6>
									<div class="widget-toggle">+</div>
								</div>
								<div class="widget-content">
									<ul class="list-unstyled m-none">
									@if(Session::get('is_admin') == true )
										<li><a href="/admin/view-users">Users</a></li>
									@endif
										<li><a href="/view-highschool">Highschool</a></li>
										<li><a href="/view-college">College and Courses</a></li>
										<li><a href="/view-certificate-officials">Certificate Officials</a></li>
										<li><a href="/view-contract-officials">Contract Officials</a></li>
									</ul>
								</div>
							</div>
							
							<hr class="separator" />
						</div>
				
					</div>
					@endif
					
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<!-- start: page -->
					@yield('content')
					<!-- end: page -->
				</section>
			</div>
		@endif
			
		</section>

		<!-- Vendor -->
		<script src="/theme/assets/vendor/jquery/jquery.js"></script>
		<script src="/theme/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/theme/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/theme/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/theme/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/theme/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="/theme/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- ASSETS -->
		<script src="/theme/assets/vendor/jquery/jquery.js"></script>
		<script src="/theme/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/theme/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/theme/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/theme/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/theme/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="/theme/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="/theme/assets/vendor/jquery-validation/jquery.validate.js"></script>
		<script src="/theme/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
		<script src="/theme/assets/vendor/pnotify/pnotify.custom.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/theme/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/theme/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/theme/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="/theme/assets/javascripts/forms/examples.wizard.js"></script>
		
		<!-- CHARTS -->
		<script src="/theme/assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="/theme/assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="/theme/assets/vendor/flot/jquery.flot.js"></script>
		<script src="/theme/assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="/theme/assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="/theme/assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="/theme/assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="/theme/assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="/theme/assets/vendor/raphael/raphael.js"></script>
		<script src="/theme/assets/vendor/morris/morris.js"></script>
		<script src="/theme/assets/vendor/gauge/gauge.js"></script>
		<script src="/theme/assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="/theme/assets/vendor/liquid-meter/liquid.meter.js"></script>
		
		
		<!-- Theme Base, Components and Settings -->
		<script src="/theme/assets/javascripts/theme.js"></script>
		<!-- Theme Custom -->
		<script src="/theme/assets/javascripts/theme.custom.js"></script>
		<!-- Theme Initialization Files -->
		<script src="/theme/assets/javascripts/theme.init.js"></script>
		
		
		<script src="/js/app/actions.js"></script>
		
		<!-- Modals -->
		<script src="/theme/assets/vendor/pnotify/pnotify.custom.js"></script>
		<script src="/theme/assets/javascripts/ui-elements/examples.modals.js"></script>
		<script src="/theme/assets/javascripts/ui-elements/examples.notifications.js"></script>
		<script src="/theme/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		
		<!-- Message -->
		<script src="/theme/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="/theme/assets/vendor/summernote/summernote.js"></script>
		
		@yield('foot')

		<script>
		$(function(){
			
			
			var activateNav = function(){
				$('#menu a').each(function(){
					$(this).closest('li').removeClass('nav-active');
					var href = $(this).attr('href');
					//alert(href+'=='+location.href);
					if(location.href.indexOf(href) != -1){
						$(this).closest('li').addClass('nav-active');
					}
				});
			};
			
			activateNav();
			
			$('#menu a').click(function(){
				$('#menu li').removeClass('nav-active');
				$(this).closest('li').addClass('nav-active');
			});
			
			// Enter Key
			$("#username-text").keyup(function(event){
				if(event.keyCode == 13){
					$("#login-button").click();
				}
			});
			$("#password-text").keyup(function(event){
				if(event.keyCode == 13){
					$("#login-button").click();
				}
			});
	
		});
		</script>

	</body>
</html>