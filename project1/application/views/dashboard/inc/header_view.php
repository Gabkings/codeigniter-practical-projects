<!DOCTYPE html>
<html>
<head>
	<title>Test sample</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/css/style.css">
	<script type="text/javascript" src="<?=base_url()?>public/js/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>public/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?=base_url()?>public/js/script.js"></script>
</head>
<body>
	<nav class="navbar">
		<div class="navbar-inner">
			<span class="brand">Gabkings</span>
			<ul class="nav">
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Users</a></li>
				<li><a href="<?=site_url('dashboard/logout')?>">Logout</a></li>
			</ul>
		</div>
	</nav>
	<div class="wrapper">
