<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/'); ?>css/styles.css" />
	<link rel="shortcut icon" href="<?= base_url('assets/login/'); ?>images/favicon.ico">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<section class="container">
			<section class="login-form">
				<form method="post" action="<?= site_url('login/cekLogin') ?>" role="login">
					<img src="<?= base_url('assets/login/'); ?>images/logo.png" class="img-responsive" alt="" />
					<input type="text" name="username" placeholder="username" required class="form-control input-lg" />
					<input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
					<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
				</form>
				<div class="form-links">
					<a href="#" style="color:black">copyright © 2020 PT. PLN (Persero) Unit Induk Wilayah Sulselrabar</a>
				</div>
			</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="<?= base_url('assets/login/'); ?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>