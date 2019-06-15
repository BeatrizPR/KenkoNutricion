<!DOCTYPE html>
<html>
<head>

	<?php require_once 'Views/header.php' ?>
    <title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once "Views/navbar.php";  ?>
</head>
<body class="loginBody">
	<div class="d-flex justify-content-center h-100">
		<div class="card card-login">
			<div class="card-header login">
				<h3>Login</h3>		
			</div>
			<div class="card-body">
				<form class="form" action="<?php echo constant('URL'); ?>login/sessionUserStart" role="form" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="far fa-user"></i></span>
						</div>
						<input id="UsuarioInput" placeholder="Usuario" class="form-control" type="text" name="user" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
						</div>
						<input  id="passwordInput" placeholder="Contraseña" class="form-control" type="password" name="pass" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn float-right login_btn">Login</button>

					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					¿No tienes cuenta?<a href="<?php echo constant('URL'); ?>register" class="linkSign">Registrate</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>