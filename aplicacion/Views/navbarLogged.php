<?php
// require 'conexion.php';
?>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" role="navigation">
	<a class="navbar-brand" href="<?php echo constant('URL'); ?>main"><img src="./assets/logo.png" alt="logo Kenko nutrición" width="55" height="55"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="exCollapsingNavbar">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo constant('URL'); ?>main">Inicio <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo constant('URL'); ?>category">Categorias</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo constant('URL'); ?>food">Alimentos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo constant('URL'); ?>calculator">Calculadora</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más recursos</a>
				<div class="dropdown-menu" aria-labelledby="dropdown04">
					<a class="dropdown-item" href="<?php echo constant('URL'); ?>randomFood">Menú</a>
					<a class="dropdown-item" href="<?php echo constant('URL'); ?>recipe">Recetas</a>
					<a class="dropdown-item" href="<?php echo constant('URL'); ?>objective">Objetivos</a>
					<?php if (isset($_SESSION['idUser']) && $_SESSION['tipoUser'] != "admin") : ?>
						<a class="dropdown-item" href="<?php echo constant('URL'); ?>recipelist">Mis recetas</a>
					<?php endif; ?>
					<a class="dropdown-item" href="<?php echo constant('URL'); ?>contact">Contacta con nosotros</a>

				</div>
			</li>
		</ul>
		<ul class="nav navbar-nav flex-row justify-content-between ml-auto">
			<li class="nav-item order-2 order-md-1 mr-3"><i class="fa fa-user"></i> Hola <?= $_SESSION['usr']; ?> </li>
			<li class="dropdown order-1 ml-1">
				<button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle"> Configuración<span class="caret"></span></button>
				<ul class="dropdown-menu dropdown-menu-right mt-2">
					<li class="px-3 py-2">

						<div class="form-group">
							<?php if (isset($_SESSION['idUser']) && $_SESSION['tipoUser'] != "admin") : ?>
								<a href="<?php echo constant('URL'); ?>userpage"><button class="btn  btn-block" value="<?= $_SESSION['idUser']; ?>">Mi área personal</button></a>
							<?php else : ?>
								<a href="<?php echo constant('URL'); ?>userpage"><button class="btn  btn-block" value="<?= $_SESSION['idUser']; ?>">Administrar perfil</button></a>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<a href="<?php echo constant('URL'); ?>login/sessionClose"><button type="submit" class="btn  btn-block">Cerrar sesión</button></a>
						</div>

						</form>
					</li>
				</ul>
		</ul>
	</div>

</nav>

<!--  -------TERMINA EL NAV DEL USUARIO LOGEADO--------  -->