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
            <br>
            <div class="row justify-content-center">
                
                <div class="col-lg-12 text-center">
                    <h2 class="titulo">Mis recetas</h2>
                    <br />
                </div>
                <!-- OBTENGO 4 RECETAS POR CADA PAGINA  -->
                <?php foreach ($this->recipelist as $row) :
                    $recipelist = new Foodrecipe();
                    $recipelist = $row;
                    ?>
                    <div class=" alert alert-warning col-lg-10 col-md-8 col-xs-8">
                        <div class="text-center text-uppercase">
                            <?php echo $recipelist->nombreReceta . "<br>" ?>

                        </div>
                        <div text-justify>
                            <?php echo $recipelist->tiempo . "<br>" ?>
                            <?php echo $recipelist->descripcion . "<br>"; ?>

                        </div>
                        <br>
                        
                            <div class="row">
                            
                            <button class="btn" type="button" data-toggle="collapse" data-target="#example<?php echo $recipelist->idReceta;?>" aria-expanded="false" aria-controls="change" value="<?php echo $recipelist->idReceta; ?>"><i class="fa fa-trash-alt"></i></button>
                            <div class="col-12">
                                <div class="collapse" id="example<?php echo $recipelist->idReceta;?>">
                                    <div class="card card-body">
                                    <!--confirmación para borrar la receta-->
                                    <h2 class="titulo col-md-12 text-center">¿Quieres borrar la receta?</h2>
                                    <br>
                                    <div class="col-12 col-md-8 col-lg-12   text-center">
                                        <a href="<?php echo constant('URL').'recipelist/removeRecipeList/' . $recipelist->idReceta; ?>"><button class="btn btn-borrar m-3">Eliminar</button></a>
                                        <a href="<?php echo constant('URL').'recipelist' ?>"><button class="btn btn-cancelar">Cancelar</button></a>
                                    </div>
                                    
                                    <!--termina confirmacion de borrado-->
                                    </div>
                                </div>
                            </div>
                            </div>
                           
                        
                    </div>
                    <!--cierro div class alert-->

                <?php endforeach ?>
            </div>
            <!--cierro div class row-->
            <br><br>     
        </main>

        <footer class="page-footer font-small blue">
            <!-- Copyright -->
            <div class="footer text-center py-3">© 2018 Copyright:
                <a href="https://github.com/BeatrizPR"> Beatriz</a>
            </div>
        </footer>
    </div>
    <?php
        else: 
        header('Location:'. constant('URL'). 'errores');
        endif; // cierro el if que comprueba que el usuario está logueado

    ?>
    </body>
</html>