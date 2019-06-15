<!DOCTYPE html>
<html>

<head>
	<?php require_once 'Views/header.php' ?>
</head>

<body>

	<!-- --------MENU SUPERIOR--------- -->
	<?php
	session_start();

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

			<span class="clearfix"></span>
			<br>
			<div class="row justify-content-center">

				<div class="col-lg-12 text-center">
					<h2 class="titulo">Categorías de los alimentos</h2>
					<br />
				</div>


				<?php foreach ($this->category as $row) :
					$category = new Category();
					$category = $row; 
					?>

						<div class="col-lg-4 col-md-4 col-xs-6 text-center text-uppercase">
						<button class="btnNonStyle" type="button" data-toggle="collapse" data-target="#change<?php echo $category->idCategoria; ?>" aria-expanded="false" aria-controls="change" value="<?php echo $category->idCategoria; ?>">
							<div class="alert alert-info col-lg-12  text-center text-uppercase">
								
									<input type="hidden" class="d-none" name="id" value="<?php echo $category->idCategoria; ?>">
									<?php echo $category->nombreCategoria . "<br>";  ?></div></button>
              </div>
				<?php endforeach ?>


				<?php foreach ($this->category as $row) :
					$category = new Category();
					$category = $row; 
					?>
					<div class="collapse" id="change<?php echo $category->idCategoria; ?>">

						<h2 class="titulo col-md-12 text-center"><?php echo $category->nombreCategoria; ?></h2>
						<br>
						<p><?php echo $category->descripcionCat; ?></p>
						<br>
					</div>

				<?php endforeach ?> 

				<div class="col-lg-12 text-center">
					<br><br>
					<hr>
					<h2 class="titulo">Galería de imágenes</h2>
					<br />
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active" data-interval="10000">
								<img src="./assets/slider/img1.jpg" class="d-block w-100" alt="Platos de verduras con brocoli, tomate, pollo, aceitunas, pimientos, champiñones, zanahoria, queso, jamon cocido, maíz, lechugas, espinacas y cebolla morada.">
							</div>
							<div class="carousel-item" data-interval="2000">
								<img src="./assets/slider/img2.jpg" class="d-block w-100" alt="Huevos fritos, sobre aguacate en tostadas de pan cateto, gofres con nata, fresas y moras y zumos">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img3.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img4.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img5.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img6.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img7.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img8.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img9.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img10.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img11.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img12.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img13.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img14.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img15.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img16.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img17.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img18.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img19.jpg" class="d-block w-100" alt="">
							</div>
							<div class="carousel-item">
								<img src="./assets/slider/img20.jpg" class="d-block w-100" alt="">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<!--termina col-8 -->


			</div> <!-- /.row -->
			<br>

		</main>

		<?php require_once 'Views/footer.php'  ?>
	</div>
</body>

</html>