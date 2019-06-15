<!DOCTYPE html>
<html>

<head>
	<?php require_once 'Views/header.php' ?>
	<script src="./public/js/pagination.js"></script>
</head>

<body onload="foodList('','1');">
	<!-- --------MENU SUPERIOR--------- -->
	<?php
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
	<div class="container mx-auto">
		<main id="centerMain">

			<span class="clearfix"></span>

			<br>
			<div class="row">

				<div class="col-lg-12 text-center">
					<h2 class="titulo">Alimentos</h2><br />
					<h6>La información nutricional de esta tabla está basada en unos 100 gramos del alimento seleccionado.</h6>
					<br /><br>
					<hr><br>
				</div>
				<div class="container justify-content-center">
					<div class="form-group col-lg-12 text-center">
						<div class="col-xs-6">
							<label for="buscar" class="control-label">
								<h4 class="titulo">Buscar:</h4>
							</label>
						</div>
						<div class="col-xs-6 justify-content-center">
							<input type="text" name="buscar" id="buscar" class="form-control" onkeyup="foodList(this.value,'1');" placeholder="Ingrese nombre o categoria" />
						</div>
					</div>
					<div class="form-group">
						<div id="lista"></div>
						<div id="paginador" class="text-center"></div>
					</div>
				</div>


			</div>

			<br>

	</div>
	<br>
	</main>

	</div>
	<?php require_once 'Views/footer.php'  ?>
</body>

</html>