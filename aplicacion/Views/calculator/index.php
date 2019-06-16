<!DOCTYPE html>
<html>

<head>
    <?php require_once 'Views/header.php' ?>
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/style.css">
</head>

<body>
    <!-- --------MENU SUPERIOR--------- -->
	<?php
	session_start();

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

            <br>
            <!-------  EMPIEZAN LAS CALCULADORAS     ------>
            <br>
            <div class="modal fade" id="calculatorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Cálculo</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="message">
                                <?php echo $this->message; ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
							</div>
						</div>
					</div>
				</div>
            <h3 class="d-flex justify-content-center mt-8 pt-2">Calculadoras:</h3>
            <p class="mx-auto center">
                <button class="btn mx-auto" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample2">Calcular IMC</button>
                <button class="btn mx-auto" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Calcular Superficie Corporal</button>
            </p>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapseExample1">
                        <br>
                        <h5 class="d-flex justify-content-center col-md-12">Calculadora del Índice de Masa Corporal</h5>
                        <br>
                        <div class="d-flex justify-content-center col-md-12">
                            <form id="calculatorIMC" method="POST" action="javascript:void(0)" class="center">

                                <div class="form-group col-md-12">
                                    <label for="inputPeso">Peso</label>
                                    <input type="text" class="form-control" id="inputPeso" name="inputPeso" value="<?php echo $this->weight; ?>" placeholder="Peso en kg" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputTalla">Altura</label>
                                    <input type="text" class="form-control" id="inputTalla" name="inputTalla" value="<?php echo $this->height; ?>" placeholder="Altura en metros" required>
                                </div>
                                <button type="submit" class="btn disable">Calcular IMC</button>
                            </form>
                            <div class="mostrarDatos">
                                <div class="form-group col-md-12">
                                    <br>
                                    <label for="inputResult">IMC:</label>
                                    <br>
                                    <button id="calcuIMC" type="button" class="btn disable" style="pointer-events: none;">
                                        <?php echo $this->calculatorIMC; ?></button>
                                    <label for="error"><?php echo $this->message; ?></label>
                                </div>
                                <br>

                            </div> <!-- termina el div mostrar datos-->
                        </div> <!-- cierra div collapse-->
                    </div> 
                </div><!-- cierra col-md-6 del formulario-->
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapseExample2">
                        <br>
                        <h5 class="d-flex justify-content-center col-md">Calculadora de la Superficie Corporal</h5>
                        <br>
                        <div class="d-flex justify-content-center col-md">
                            <form id="calculatorSC" method="POST" action="javascript:void(0)" class="center">

                                <div class="form-group col-md-12">
                                    <label for="inputWeight">Peso</label>
                                    <input type="text" class="form-control" id="inputWeight" name="inputWeight" value="<?php echo $this->weight; ?>" placeholder="Peso en kg" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputHeight">Altura</label>
                                    <input type="text" class="form-control" id="inputHeight" name="inputHeight" value="<?php echo $this->height; ?>" placeholder="Altura en centímetros" required>
                                </div>
                                <button type="submit" class="btn disable">Calcular Superficie Corporal</button>
                            </form>
                            <br>
                            <div class="mostrarDatos">
                                <br>
                                <div class="form-group col-md-12">
                                    <label for="inputResult">Superficie corporal:</label>
                                    <br>
                                    <button id="calcuSC" type="button" class="btn disable" style="pointer-events: none;">
                                        <?php echo $this->calculatorSC; ?></button>
                                    <label for="error"><?php //echo $this->message; ?></label>
                                </div>
                            </div> <!-- termina el div mostrar datos-->
                        </div> <!-- cierra div collapse-->
                    </div> 

                </div>
                
            </div><!--cierro div class row-->
            <br><br>
            <hr>
            <p class="mx-auto center">
                <button class="btn mx-auto" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample2">Calcular GEB</button>
            </p>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapseExample3">
                        <br>
                        <h5 class="d-flex justify-content-center col-md-12">Calculadora del Gasto de Energía Basal</h5>
                        <br>
                        <div class="d-flex justify-content-center col-md-12">
                            <form id="calculatorGEB" method="POST" action="javascript:void(0)" class="center">

                                <div class="form-group col-md-12">
                                    <label for="inputPeso">Peso</label>
                                    <input type="text" class="form-control" id="inputPeso" name="inputPeso" value="<?php echo $this->weight; ?>" placeholder="Peso en kg" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputTalla">Altura</label>
                                    <input type="text" class="form-control" id="inputTalla" name="inputTalla" value="<?php echo $this->height; ?>" placeholder="Altura en metros" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="edad">Edad</label>
                                    <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $this->age; ?>" placeholder="Edad" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Sexo</label><br>
                                    <input type="radio" id="sexo" name="sexo" value="mujer" >
                                    <label for="mujer">Mujer</label>
                                    <input type="radio" id="sexo" name="sexo" value="hombre" >
                                    <label for="hombre">Hombre</label>
                                </div>
                                <button type="submit" class="btn disable">Calcular GEB</button>
                            </form>
                            <div class="mostrarDatos">
                                <div class="form-group col-md-12">
                                    <br>
                                    <label for="inputResult">GEB:</label>
                                    <br>
                                    <button id="calcuGEB" type="button" class="btn disable" style="pointer-events: none;">
                                        <?php echo $this->calculatorGEB; ?></button>
                                    <label for="error"><?php echo $this->messageGEB; ?></label>
                                </div>
                                <br>

                            </div> <!-- termina el div mostrar datos-->
                        </div> <!-- cierra div collapse-->
                    </div> 
                </div><!-- cierra col-md-6 del formulario-->

            <br>
        </main>

    </div><!-- div class container-->
    <?php require_once 'Views/footer.php'  ?>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
</body>

</html>