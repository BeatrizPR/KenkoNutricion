<!DOCTYPE html>
<html>

<head>
    <?php require_once 'Views/header.php' ?>
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

            <?php 
                if (isset($_SESSION['idUser']) && $_SESSION['tipoUser'] == 'admin') :
            ?>
            <!--Añadir nuevas recetas-->
            <div class="center"><?php echo $this->message; ?></div>
            <h2 class="titulo col-md-12 text-center">Incluye nuevas recetas</h2>
            <br>
            <form class="text-center" method="POST" action="<?php echo constant('URL'); ?>recipe/insertNewRecipe">
                <div class="form-group row ">
                    <label for="nombre" class="col-md-4 col-form-label">Nombre: </label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la receta" required>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Tiempo: </label>
                    <div class="col-md-8">
                        <input type="time" class="form-control" name="tiempo" placeholder="Tiempo de elaboración" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Elaboración: </label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="descripcion" placeholder="Elaboración" required></textarea>

                    </div>
                </div>
                <button type="submit" class="btn ">Anadir nueva receta</button>
            </form>
            <?php  
            endif;
            ?>
            <!--termina incluir la receta-->
            <hr>
            
            <br>
            <div class="row justify-content-center">

                <div class="col-lg-12 text-center">
                    <h2 class="titulo">Recetas</h2>
                    <br />
                </div>
                <?php foreach ($this->recipe as $row) :
                    $recipe = new Recipe();
                    $recipe = $row;
                    ?>
                    <div class=" alert alert-warning col-lg-10 col-md-8 col-xs-8 ">
                        <div class="text-center text-uppercase recipe">
                            <?php echo $recipe->nombreReceta . "<br>" ?>
                        </div>
                        <div text-justify>
                            <div class='recipe'>
                                <?php echo $recipe->tiempo ."<br>" ?>
                            </div>
                            <p>
                            <?php echo "<PRE class='recipe'>".$recipe->descripcion . "</PRE><br>" ?></p>
                        </div>
                     
                       
                        <br>
                        <?php 
                            if (isset($_SESSION['idUser'])) :
                                if($_SESSION['tipoUser'] == 'admin'):
                        ?>
                        <button class="btn" type="button" data-toggle="collapse" data-target="#example<?php echo $recipe->idReceta;?>" aria-expanded="false" aria-controls="example" value="<?php echo $recipe->idReceta; ?>"><i class="fa fa-trash-alt"></i></button>
                        <button class="btn" type="button" data-toggle="collapse" data-target="#change<?php echo $recipe->idReceta;?>" aria-expanded="false" aria-controls="change" value="<?php echo $recipe->idReceta; ?>"><i class="fa fa-pencil-alt"></i></button>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="collapse" id="change<?php echo $recipe->idReceta;?>">
                                    <div class="card card-body">
                                    <!--modificamos la receta-->
                                    
                                    <h2 class="titulo col-md-12 text-center">Modifica la receta</h2>
                                    <br>
                                    <form class="text-center" method="POST" action="<?php echo constant('URL'). 'recipe/modifyRecipe/' . $recipe->idReceta; ?>">
                                        <div class="form-group row ">
                                            <label for="nombre" class="col-md-4 col-form-label">Nombre: </label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nombre" placeholder="Nombre de la receta" value="<?php echo $recipe->nombreReceta; ?>">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Tiempo: </label>
                                            <div class="col-md-8">
                                                <input type="time" class="form-control" name="tiempo" placeholder="Tiempo de elaboración" value="<?php echo $recipe->tiempo; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Elaboración: </label>
                                            <div class="col-md-8">
                                            <textarea class="form-control" name="descripcion" placeholder="Elaboración"><?php echo $recipe->descripcion;?></textarea>
                                            </div>
                                            <input type="hidden" class="d-none" name="id" value="<?php echo $recipe->idReceta; ?>">
                                        </div>
                                        <button class="btn ">Modificar receta</button>
                                    </form>
                                    <!--termina modificar la receta-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="collapse" id="example<?php echo $recipe->idReceta;?>">
                                    <div class="card card-body">
                                    <!--confirmación para borrar la receta-->
                                    <h2 class="titulo col-md-12 text-center">¿Quieres borrar la receta?</h2>
                                    <br>
                                    <div class="col-12 col-md-8 col-lg-12   text-center">
                                        <a href="<?php echo constant('URL').'recipe/removeRecipe/' . $recipe->idReceta; ?>"><button class="btn btn-borrar m-3">Eliminar</button></a>
                                        <a href="<?php echo constant('URL').'recipe' ?>"><button class="btn btn-cancelar">Cancelar</button></a>
                                    </div>
                                    
                                    <!--termina confirmacion de borrado-->
                                    </div>
                                </div>
                            </div>
                        </div>  
                            <?php else: ?><!-- El else muestra el boton de añadir recetas a una lista del usuario-->
                            <div class="row">
                            <form method="POST" action="<?php echo constant('URL'); ?>recipelist/appendNewRecipe/<?=$recipe->idReceta;?>">
                            <button class="btn" type="submit" name="<?php echo $recipe->idReceta; ?>" value="<?php echo $recipe->idReceta; ?>"><i class="fas fa-utensils"></i></button>
                            </form>
                            </div>
                            <?php endif; ?>
                        <?php  endif ; 
                            // endif de la comprobacion del usuario logueado
                        ?>
                    </div>
                    <!--cierro div class alert-->

                <?php endforeach ?>
            </div>
            <!--cierro div class row-->


            <br>

            <br>

            <div class="form-group">
					<!-- <div id="lista"></div> -->
					<div id="paginador" class="text-center"></div>
				</div>
        </main>

        <footer class="page-footer font-small blue">
            <!-- Copyright -->
            <div class="footer text-center py-3">© 2018 Copyright:
                <a href="https://github.com/BeatrizPR"> Beatriz</a>
            </div>
        </footer>
    </div>
</body>
</html>