<?php
//session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<?php require_once 'Views/header.php' ?>
</head>

<body>

	<!-- --------MENU SUPERIOR--------- -->
	<?php
	
	//session_start();
	if(isset($_SESSION['usr'])):
		require_once "Views/navbarLogged.php";
	else:
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

			<h2 class="titulo col-12 text-center">La salud es un estado de completa armonía de cuerpo, mente y alma</h2>
			<br>
			<p>Los seres humanos hemos ido cambiando nuestros hábitos alimenticios a través del tiempo.</p>
			<p>Consumo vegetal en un principio, incorporación de carne después, avances en la preparación hasta el punto de consumir más calorías de las que se necesitan.
			Además la alimentación no es un acto de subsistencia sino un acto social y cultural, lo que ha derivado en una epidemia de obesidad y patologías asociadas.</p>
			<p>Conocer una nutrición conecta con todos los nutrientes necesarios y fundamental para su salud física y mental.</p>
			<br>
			<p>En esta página encontrás diversas herramientas y dietas saludables para alimentarte mejor y sentirte de forma sana.
				Encontrarás ejercicios de deporte para mejorar la salud y otros consejos </p>
			<br>
			<hr>
			<br>


			<div class="row">

				<br>
				<br>
				<div class="col-lg-12 text-center">
					<h2 class="titulo">Imágenes</h2>
					<br />
				</div>
				<div class="col-lg-3 col-md-4 col-xs-6">
					<img class="image thumbnail" src="https://source.unsplash.com/nJZbmL6pvDY/400x300" alt="">
				</div>
				<div class="col-lg-3 col-md-4 col-xs-6">
					<img class="image thumbnail" src="https://source.unsplash.com/TGYQVFiYpWw/400x300" alt="">
				</div>
				<div class="col-lg-3 col-md-4 col-xs-6">
					<img class="image thumbnail" src="https://source.unsplash.com/Gf4WV2qyW2U/400x300" alt="">
				</div>
				<div class="col-lg-3 col-md-4 col-xs-6">
					<img class="image thumbnail" src="https://source.unsplash.com/zG0_RnnxguY/400x300" alt="">
				</div>
			</div>
			<br>
			<hr>
			<div class="col-12 col-md-8 col-lg-12">
				<h3>¿Qué es la alimentación saludable?</h3>
				<p>La alimentación saludable es aquella que aporta a cada individuo todos los alimentos necesarios para cubrir sus necesidades nutricionales, en las diferentes etapas de la vida (infancia, adolescencia, edad adulta y envejecimiento), y en situación de salud. Ten en cuenta que este apartado hace referencia a la alimentación saludable en general, y lo puedes utilizar como base en tu alimentación diaria. En caso de presentar síntomas específicos relacionados con la enfermedad o el tratamiento, debes dirigirte al apartado de recomendaciones dietéticas específicas.</p>

				<p>Cada persona tiene unos requerimientos nutricionales en función de su edad, sexo, talla, actividad física que desarrolla y estado de salud o enfermedad.</p>

				<p>Para mantener la salud y prevenir la aparición de muchas enfermedades hay que seguir un estilo de vida saludable; es decir, hay que elegir una alimentación equilibrada, realizar actividad o ejercicio físico de forma regular (como mínimo caminar al menos 30 minutos al día) y evitar fumar y tomar bebidas alcohólicas de alta graduación.</p>

				<h3>Características de una alimentación saludable</h3>
				<p>
					<ul>
						<li>Tiene que ser completa: debe aportar todos los nutrientes que necesita el organismo: hidratos de carbono, grasas, proteínas, vitaminas, minerales y agua.</li>
						<li>Tiene que ser equilibrada: los nutrientes deben estar repartidos guardando una proporción entre sí. Así, los hidratos de carbono (CHO) han de suponer entre un 55 y un 60% de las kcal totales al día; las grasas, entre un 25 y un 30%; y las proteínas, entre un 12 y un 15%. Además hay que beber de 1,5 a 2 litros de agua al día. </li>
						<li>Tiene que ser suficiente: la cantidad de alimentos ha de ser la adecuada para mantener el peso dentro de los rangos de normalidad y, en los niños, lograr un crecimiento y desarrollo proporcional. </li>
						<li>Tiene que ser adaptada a la edad, al sexo, a la talla, a la actividad física que se realiza, al trabajo que desarrolla la persona y a su estado de salud. </li>
						<li>    Tiene que ser variada: debe contener diferentes alimentos de cada uno de los grupos (lácteos, frutas, verduras y hortalizas, cereales, legumbres, carnes y aves, pescados, etc.), no solo porque con ello será más agradable, sino porque, a mayor variedad, habrá también una mayor seguridad de garantizar todos los nutrientes necesarios. </li>
					</ul>

					<br>
				</p>

				<h3>¿Cómo agrupar los alimentos?</h3>
				<p>Los alimentos se agrupan en función de su composición mayoritaria en nutrientes, reflejada en las tablas de composición de los alimentos, que son muy utilizadas para planificar la dieta. Otra forma de clasificarlos se basa en la utilización o rentabilidad que el organismo obtiene de cada uno de los nutrientes contenido en un alimento determinado.</p>
				<p>Ciertos nutrientes, como el hierro y el calcio, por ejemplo, se encuentran muy repartidos en alimentos como legumbres y verduras; sin embargo el organismo no los aprovecha tan óptimamente como cuando proceden de la carne y derivados y de la leche, respectivamente.</p>

				<p>Básicamente, los alimentos se agrupan en los siguientes grupos: energéticos, que incluyen los hidratos de carbono (CHO) y las grasas; plásticos (proteínas), que intervienen como constructores; y reguladores (vitaminas y minerales).</p>

				<p>Puedes ver esta clasificación en la tabla 3; la tabla 4 muestra los nutrientes que aportan los distintos alimentos.</p>
				<div class="col-12" ><img  class="imageResize" src="./assets/image010.png"><img class="imageResize" src="./assets/image012.png"></div>
				<br>
				<h3>¿Qué cantidad de cada alimento se debe consumir?</h3>
				<p>El concepto de cantidad está unido al de ración. Por ración entendemos la cantidad o porción de alimento adecuada a la medida de un plato “normal”; también puede hacer referencia a una o diversas unidades: huevo, yogur, piezas de fruta, etc. En la tabla de frecuencia recomendada para cada grupo de alimentos, encontrarás las medidas caseras y su peso por ración equivalente para un adulto sano (tabla 5). Pero recuerda que son recomendaciones generales, si presentas poco apetito o algún síntoma específico debes seguir las recomendaciones para esta situación (ver “Si tengo poco apetito y me cuesta comer, ¿Qué puedo hacer”) o bien el apartado “Recomendaciones dietéticas específicas”.

				La tabla de frecuencia recomendada para cada grupo de alimentos te servirá de guía (tabla 5).</p>
								<div class="col-12" ><img class="imageResize" src="./assets/image014.png"></div>

				<h3> ¿Cómo planificar la dieta para que sea equilibrada y saludable?</h3>
				<p>Una alimentación saludable consiste en comer de todo sin exceso y distribuir los alimentos a lo largo del día con un esquema semejante al siguiente:

				Ejemplo de menú diario:</p>

<div class="col-12" ><img class="imageResize" src="./assets/image016.png"></div>

			</div>
			<br>

		</main>

		<?php require_once 'Views/footer.php'  ?>
	</div>
</body>

</html>
