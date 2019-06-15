<!DOCTYPE html>
<html>

<head>
	<?php require_once 'Views/header.php' ?>
</head>

<body >
	<!-- --------MENU SUPERIOR--------- -->
	<?php
	//session_start();

	if (isset($_SESSION['usr'])) :
		header('Location:' . constant('URL') . 'main');
		require_once "Views/navbarLogged.php";
	else :
		require_once "Views/navbar.php";
	endif;

	?>
	<!--  -------TERMINA EL NAV--------  -->

	<!---  ---------FORM REGISTRO---------  -->
	
	<div id="container" class="container-fluid h-100 text-dark registro-formulario">
	<br><br><br><br>
		<div class="d-flex justify-content-center h-100">
		<div class="card card-register">
			<div class="card-header register">
			<h3 class="titulo"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="walking" class="person svg-inline--fa fa-walking fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
					<path d="M208 96c26.5 0 48-21.5 48-48S234.5 0 208 0s-48 21.5-48 48 21.5 48 48 48zm94.5 149.1l-23.3-11.8-9.7-29.4c-14.7-44.6-55.7-75.8-102.2-75.9-36-.1-55.9 10.1-93.3 25.2-21.6 8.7-39.3 25.2-49.7 46.2L17.6 213c-7.8 15.8-1.5 35 14.2 42.9 15.6 7.9 34.6 1.5 42.5-14.3L81 228c3.5-7 9.3-12.5 16.5-15.4l26.8-10.8-15.2 60.7c-5.2 20.8.4 42.9 14.9 58.8l59.9 65.4c7.2 7.9 12.3 17.4 14.9 27.7l18.3 73.3c4.3 17.1 21.7 27.6 38.8 23.3 17.1-4.3 27.6-21.7 23.3-38.8l-22.2-89c-2.6-10.3-7.7-19.9-14.9-27.7l-45.5-49.7 17.2-68.7 5.5 16.5c5.3 16.1 16.7 29.4 31.7 37l23.3 11.8c15.6 7.9 34.6 1.5 42.5-14.3 7.7-15.7 1.4-35.1-14.3-43zM73.6 385.8c-3.2 8.1-8 15.4-14.2 21.5l-50 50.1c-12.5 12.5-12.5 32.8 0 45.3s32.7 12.5 45.2 0l59.4-59.4c6.1-6.1 10.9-13.4 14.2-21.5l13.5-33.8c-55.3-60.3-38.7-41.8-47.4-53.7l-20.7 51.5z"></path>
				</svg>
				<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="running" class="personRuning svg-inline--fa fa-running fa-w-13" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 416 512">
					<path d="M272 96c26.51 0 48-21.49 48-48S298.51 0 272 0s-48 21.49-48 48 21.49 48 48 48zM113.69 317.47l-14.8 34.52H32c-17.67 0-32 14.33-32 32s14.33 32 32 32h77.45c19.25 0 36.58-11.44 44.11-29.09l8.79-20.52-10.67-6.3c-17.32-10.23-30.06-25.37-37.99-42.61zM384 223.99h-44.03l-26.06-53.25c-12.5-25.55-35.45-44.23-61.78-50.94l-71.08-21.14c-28.3-6.8-57.77-.55-80.84 17.14l-39.67 30.41c-14.03 10.75-16.69 30.83-5.92 44.86s30.84 16.66 44.86 5.92l39.69-30.41c7.67-5.89 17.44-8 25.27-6.14l14.7 4.37-37.46 87.39c-12.62 29.48-1.31 64.01 26.3 80.31l84.98 50.17-27.47 87.73c-5.28 16.86 4.11 34.81 20.97 40.09 3.19 1 6.41 1.48 9.58 1.48 13.61 0 26.23-8.77 30.52-22.45l31.64-101.06c5.91-20.77-2.89-43.08-21.64-54.39l-61.24-36.14 31.31-78.28 20.27 41.43c8 16.34 24.92 26.89 43.11 26.89H384c17.67 0 32-14.33 32-32s-14.33-31.99-32-31.99z"></path>
				</svg>
				Registro</h3>
				</div>
		

		
				<div class="card-body">
				<form id="registro" method="post" class="form justify-content-center" action="javascript:void(0)">
					<!--
				NOMBRE Y APELLIDOS *****************************************************
				La longitud de ambos no deberá exceder los 100 caracteres.
			-->
					<div class="input-group form-group">
						<div class="input-group-prepend">
						<label>Nombre*: </label>
						</div>
						
						<input type="text" class="form-control" name="nom" maxlength="50" />
					</div>
					<div class="input-group form-group">
					<div class="input-group-prepend">
						<label>Apellidos*: </label>
					</div>
						<input type="text" class="form-control" name="ape" maxlength="50" />
					</div>
					<!--
				NOMBRE DE USUARIO ******************************************************
			-->

					<div class="input-group form-group">
					<div class="input-group-prepend">
						<label>Nombre de usuario*: </label>
					</div>
						<input type="text" class="form-control" name="usr" />
					</div>
					<!--
				CONTRASEÑA *************************************************************
			-->

					<div class="input-group form-group">
					<div class="input-group-prepend">
						<label>Contraseña*: </label>
					</div>
						<input type="password" class="form-control" name="pwd" />
						<!--pattern="[A-Za-z0-9]{8}"  -->
					</div>


					<!--
				EMAIL ******************************************************************
			-->

					<div class="input-group form-group">
					<div class="input-group-prepend">
						<label>Email*: </label>
					</div>
						<input type="email" class="form-control" name="ema" />
					</div>

					<!--
				SEXO **************************************************************
			-->
					<div class="input-group form-group">
					<div class="input-group-prepend">
						<label>Sexo:</label>
					</div>
						<select name="sex" class="form-control">
							<option>Mujer</option>
							<option>Hombre</option>
						</select>
					</div>
					<!--
				ALTURA ******************************************************************
			-->
					<div class=" input-group form-group">
					<div class="input-group-prepend">
						<label>Altura: </label>
					</div>
						<input type="text" class="form-control" name="alt" placeholder=" en centímetros" />
					</div>
					<!--
				PESO ******************************************************************
			-->
					<div class="input-group  form-group">
					<div class="input-group-prepend">
						<label>Peso: </label>
					</div>
						<input type="text" class="form-control" name="peso" placeholder=" en kilogramos" />
					</div>

					<button type="submit" class="btn btn-warning btn-registro ">Registrar</button>

				</form>
				</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Si ya tienes cuenta, <a href="<?php echo constant('URL'); ?>login" class="linkSign">logueate</a>
				</div>
			</div>
		</div>
		<div class="row justify-content-center align-items-center h-100">
			<div class="col col-sm-6 col-md-8 col-lg-4 col-xl-4">
				<br>
				<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Registro</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="message">
								<!-- ajax success content here. -->
								<!-- <div id="message" class="center"> -->
								<h5><?php echo $this->message; ?></h5>
								<!-- </div> -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
								<button type="button" class="btn "><a href="<?php echo constant('URL'); ?>login">Iniciar sesión</a></button>
							</div>
						</div>
					</div>
					</div>
				</div>
</div>
			</div>
		

		<!-- Copyright -->
		<footer class="page-footer font-small blue">

			<div class="footer text-center py-3">© 2018 Copyright:
				<a href="https://github.com/BeatrizPR"> Beatriz</a>
			</div>

		</footer>
		</div>
	</div> <!-- termina el div del container -->
</body>

</html>