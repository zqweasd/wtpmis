@extends('layouts.default')

@section('head')

@stop

@section('content')

	<header class="page-header">
		<h2>Home</h2>
		
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
	@if( Session::get('default_pass') == 'password' || Session::get('default_pass') == '' )
	@elseif( Session::get('default_pass') == 'default_pass' )
	
	<div class="row">
		<div class="col-md-12">
			<section class="panel panel-featured-left panel-featured-primary">
				<div class="panel-body">
				
				<h1><b>Welcome, {{ $username }}!</b></h1>
				<p class="lead">But before you proceed with your task may we request that you first change your <span class="highlight">PASSWORD.</span>
				</p>
				<p>To change your password first you need to go to your <b>PROFILE PAGE</b> by <span class="highlight"><b>Clicking</b> on the Upper Right Icon</span> then <span class="highlight"><b>Click</b> My Profile.</span></p>
				<p>
				Thank you and Sorry for the Inconvienient.
				</p>
				
				</div>
			</section>	
		</div>
	</div>
	@else
	
	<div class="row">
		<div class="col-md-12">
			<section class="panel panel-featured-left panel-featured-primary">
				<div class="panel-body">
				
				<h1><b>Welcome, {{ $username }}!</b></h1>
				<p class="lead">But before you proceed with your task may we request that you first change your <span class="highlight">PASSWORD.</span>
				</p>
				<p>To change your password first you need to go to your <b>PROFILE PAGE</b> by <span class="highlight"><b>Clicking</b> on the Upper Right Icon</span> then <span class="highlight"><b>Click</b> My Profile.</span></p>
				<p>
				Thank you and Sorry for the Inconvienient.
				</p>
				
				</div>
			</section>	
		</div>
	</div>
	@endif
					
@stop


@section('foot')

@stop