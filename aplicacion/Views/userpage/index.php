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

    ?>
    <!--  -------TERMINA EL NAV--------  -->

    <!-- ----------HEADER  -PORTADA PRESENTACIÓN------------- -->

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
                    <h2 class="titulo">Area personal de <?= $_SESSION['usr'];  ?></h2><br />
                    <h6 id="foodShow" class="mx-auto d-block"></h6>
                    <br />
                </div>

                
                    <div class="col-lg-12 text-center">
                        <h4>Bienvenido a tu área de gestión personal, aquí podrás guardar tus recetas favoritas, planificar tus metas y realizar un seguimiento diario de tus objetivos.</h4>
                        <br>
                    </div>
                    <div class=" d-flex  flex-md-row flex-sm-column ">
                    <div class="flex-row justify-content-around ">
                        <div class="col-sm-4 align-self-center p-2 bd-highlight">
                            <div class="card-text text-center cardUserpage cardIma1">
                                <a href="<?php echo constant('URL'); ?>objective" class=" ">
                                    <img src="https://image.flaticon.com/icons/svg/1705/1705509.svg" class="card-img-top " alt="objetivos">
                                    <div class="card-body">
                                        <h5 class="card-title">Mis objetivos</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php  if($_SESSION['tipoUser'] == 'admin'): ?>
                        <div class="col-sm-4 align-self-center mb-auto p-2 bd-highlight">
                            <div class="card text-center cardUserpage cardIma2" >
                                <a href="<?php echo constant('URL'); ?>recipe" class=" ">
                                    <img src="https://image.flaticon.com/icons/svg/527/527675.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Recetas</h5>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="col-sm-4 align-self-center mb-auto p-2 bd-highlight">
                            <div class="card text-center cardUserpage cardIma2">
                                <a href="<?php echo constant('URL'); ?>recipelist" class=" ">
                                    <img src="https://image.flaticon.com/icons/svg/527/527675.svg" class="card-img-top " alt="recetas">
                                    <div class="card-body">
                                        <h5 class="card-title">Mis recetas</h5>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php  endif; ?>
                    </div>
                   <!--  <div class=" d-xl-inline-flex justify-content-around d-sm-flex"> -->
                    <div class="flex-row justify-content-between">
                        <div class="col-sm-4 align-self-center p-2 bd-highlight">
                            <div class="card text-center cardUserpage cardIma3">
                                <a href="<?php echo constant('URL'); ?>calculator" class=" ">
                                    <img src="https://image.flaticon.com/icons/svg/1702/1702798.svg" class="card-img-top " alt="calculadoras">
                                    <div class="card-body">
                                        <h5 class="card-title">Calculadoras</h5>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4 align-self-center p-2 bd-highlight">
                            <div class="card text-center cardUserpage cardIma4">
                                <a href="<?php echo constant('URL'); ?>userdata" class=" ">
                                    <img src="https://image.flaticon.com/icons/svg/74/74472.svg" class="card-img-top " alt="mis datos">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php if($_SESSION['tipoUser'] == 'admin'):  echo "Datos Usuarios";
                                        else:
                                            echo "Mis datos";
                                        endif; ?></h5>

                                    </div>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                <!--cierro div class mx-auto-->
            </div>
            <!--cierro div class row-->

            <br><br>

            <br>
        </main>

    </div>
    <?php require_once 'Views/footer.php'  ?>
  <?php
  else :
 header('Location:'. constant('URL'). 'errores');
    endif; // cierro el if que comprueba si el usuario está logueado
?>
</body>

</html>