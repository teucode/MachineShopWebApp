<?php 
include 'class.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapse" data-toggle="collapse" data-target="#naff">MENU</button>
			</div>
			<div class="collapse navbar-collapse"> 
				<ul class="nav navbar-nav">
					<li><a href="">Home</a></li>
					<li><a href="">Produk</a></li>
					<li><a href="">Keranjang</a></li>
					<li><a href="">CheckOut</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="">Login</a></li>
					<li><a href="">Daftar</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="hero">
		<div class="container">
			<div class="jumbotron">
				<H1>Selamat datang di AtmaAuto</H1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>

	<div class="login">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Login</h3>
						</div>
						<div class="panel-body">
							<form method="post">
								<div class="form-group">
									<label>Uername</label>
									<input type="" name="username" class="form-control">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="pass" class="form-control">
								</div>
								<button name="login" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i>Login</button>
							</form>
							<?php 
							if (isset($_POST['login'])) {
								$cek = $owner->login_owner($_POST['username'],$_POST['pass']);
								if ($cek=="sukses") {
									echo "<script>location='index.php';</script>";		
								}
								else
								{
									echo "Gagal"; 
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>