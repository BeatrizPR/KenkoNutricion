<!DOCTYPE html>
<html>

<head>
	<?php require_once 'Views/header.php' ?>
</head>

<body>

	<!-- --------MENU SUPERIOR--------- -->
	<?php

	//session_start();
	if (isset($_SESSION['usr'])) :
		require_once "Views/navbarLogged.php";
	else :
		require_once "Views/navbar.php";
	endif;

	?>
	<!--  -------TERMINA EL NAV--------  -->

	<!-- ----------HEADER  -PORTADA PRESENTACIÓN------------- -->

	<div class="jumbotron">
		<div class="container">
			<h1>Nutrición</h1>
			<p>Proyecto web sobre nutrición para mejorar la alimentación y vida saludable.</p>
		</div>
	</div>
	<header>

	</header>
	<!-- -------------MAIN--------------- -->
	<!--<div class="container"> -->
	<div class="container mx-auto">
		<main id="centerMain">

			<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Correo electrónico</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" id="message">

							<h5><?php echo $this->message; ?></h5>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
							<button type="button" class="btn "><a href="<?php echo constant('URL'); ?>main">Ir a inicio</a></button>
						</div>
					</div>
				</div>
			</div>

			<div class="center">
				<h2 class="titulo"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="apple-alt" class="clock svg-inline--fa fa-apple-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
						<path d="M350.85 129c25.97 4.67 47.27 18.67 63.92 42 14.65 20.67 24.64 46.67 29.96 78 4.67 28.67 4.32 57.33-1 86-7.99 47.33-23.97 87-47.94 119-28.64 38.67-64.59 58-107.87 58-10.66 0-22.3-3.33-34.96-10-8.66-5.33-18.31-8-28.97-8s-20.3 2.67-28.97 8c-12.66 6.67-24.3 10-34.96 10-43.28 0-79.23-19.33-107.87-58-23.97-32-39.95-71.67-47.94-119-5.32-28.67-5.67-57.33-1-86 5.32-31.33 15.31-57.33 29.96-78 16.65-23.33 37.95-37.33 63.92-42 15.98-2.67 37.95-.33 65.92 7 23.97 6.67 44.28 14.67 60.93 24 16.65-9.33 36.96-17.33 60.93-24 27.98-7.33 49.96-9.67 65.94-7zm-54.94-41c-9.32 8.67-21.65 15-36.96 19-10.66 3.33-22.3 5-34.96 5l-14.98-1c-1.33-9.33-1.33-20 0-32 2.67-24 10.32-42.33 22.97-55 9.32-8.67 21.65-15 36.96-19 10.66-3.33 22.3-5 34.96-5l14.98 1 1 15c0 12.67-1.67 24.33-4.99 35-3.99 15.33-10.31 27.67-18.98 37z"></path>
					</svg> Contacto</h2><br>
			</div>
			<div class="row justify-content-center align-items-center">
			<form id="mailMessage" method="POST" action="javascript:void(0)" class="form col-lg-6">
				<div class="form-group">
					<p>Nombre:</p>
						<input type="text" class="form-control" name="name" required>
				</div>
				<div class="form-group">
					<p>Correo electrónico:</p>
						<input type="email" class="form-control" name="email" required>
				</div>
				<div class="form-group">
					<p>Comentario: </p>
						<textarea name="comment" class="form-control" cols="50" rows="10" required></textarea>
				</div>
				<div class="form-group">
					<p class="center"><button class="btn" type="submit">Enviar correo</button></p>
				</div>
			</form>
			</div>

			<br>

		</main>

		<?php require_once 'Views/footer.php'  ?>
	</div>
</body>

</html>