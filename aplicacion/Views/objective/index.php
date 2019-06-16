<?php
//session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once 'Views/header.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js" integrity="sha256-JG6hsuMjFnQ2spWq0UiaDRJBaarzhFbUxiUTxQDA9Lk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js" integrity="sha256-J2sc79NPV/osLcIpzL3K8uJyAD7T5gaEFKlLDM18oxY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js" integrity="sha256-CfcERD4Ov4+lKbWbYqXD6aFM9M51gN4GUEtDhkWABMo=" crossorigin="anonymous"></script>
    <script src="public/js/chart-script.js"></script>
</head>

<body>

    <!-- --------MENU SUPERIOR--------- -->
    <?php

    //session_start();
    if (isset($_SESSION['usr'])) :
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
                <div class="center"><?php echo $this->message; ?></div>

                <br>
                <h2 class="titulo col-12 text-center">¿Has cumplido los objetivos hoy?</h2>
                <form class="text-center" method="POST" action="<?php echo constant('URL'); ?>objective/insertNewObjectivePerson">
                    <div class="form-check col-10 text-justify">
                        <br>
                        <table class="table table-borderless">
                        <thead>
                        <tr>
                        <th scope="col">
                        <?php foreach ($this->objective as $row) :
                            $objective = new Objectivetotal();
                            $objective = $row;
                            ?>
                            <br>
                            
                            <input class="form-check-input" type="checkbox" name="checkboxGoal[]" id="checkboxGoal" value="<?php echo $objective->idObj; ?> ">
                            <label class="form-check-label" for="checkboxGoal">
                                <?php
                                echo $objective->nombreObj;
                                ?>
                            </label>
                            
                            <!-- <br> -->
                        <?php endforeach; ?>
                        </th>
                            </tr>
                        </thead>
                        </table>
                        <br>
                        <br>
                        <button class="btn btn" type="submit">Guardar objetivos</button>

                    </div>
                    <!--termina el div del form-check-->
                </form>
                <br>

                <hr>
                <br>
                <h3 class="titulo col-12 text-center">Objetivos cumplidos</h3>
                <br>
                <h4>Generar un gráfico por objetivo cumplido todos los meses</h4><br>
                <form id="chartGoalMonthly" class="text-center" method="POST" action="javascript:void(0)">
                    <div class="row text-center">
                        <div class="col-5">
                            <select class="form-control" placeholder="Selecciona el objetivo" name="goalId">
                                <option>Selecciona un objetivo</option>
                                <?php
                                foreach ($this->goalAchieve as $newRowData) :
                                    $goalAchieve = new Goal();
                                    $goalAchieve = $newRowData;
                                    ?>
                                    <option value="<?php echo $goalAchieve->idObj ?>"><?php echo $goalAchieve->nombreObj ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-control" placeholder="Selecciona el mes" name="year">
                                <option>Selecciona el año</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn">Generar gráfico</button>


                    </div>
                    <!--cierro div row-->
                </form>
                    
                <br>
                <h4>Generar un gráfico de todos los objetivos cumplidos en un mes</h4><br>
                <form id="chartTotalGoal" class="text-center" method="POST" action="javascript:void(0)">
                    <div class="row text-center">

                        <div class="col-3">
                            <select class="form-control" placeholder="Selecciona el mes" name="month">
                                <option>Selecciona un mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-control" placeholder="Selecciona el mes" name="year">
                                <option>Selecciona el año</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn">Generar gráfico</button>


                    </div>
                    <!--cierro div row-->
                </form>
                <br>
                <div>                
                <div id="chart-container" class="chartContainer">
                        <canvas id="mycanvas"></canvas>
                    </div>
                    <br>
                    <div id="chart-container2" class="chartContainer1">
                    <canvas id="myChart"></canvas>
                    </div>
                </div>
                <hr>
                <br>

                <div class="col-10">
                    <br>
                    <br>
                    <h3 class="titulo col-12 text-center">Objetivos cumplidos</h3>
                    <br>
                    <br>
                    <table class="table table-bordered center col-10">
                        <thead>
                            <tr>
                                <th scope="col" style="display:none;"></th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Objetivo</th>
                                <th scope="col">Cumplido</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($this->goal as $newRow) :
                                $goal = new Goal();
                                $goal = $newRow;
                                ?>
                                <tr class="borderTable">
                                    <td style="display:none;"><?php echo $goal->idObjPersonal ?></td>
                                    <th scope="row"><?php echo $goal->fecha ?></th>
                                    <td><?php echo $goal->nombreObj ?></td>
                                    <td><?php echo $goal->cumplido ?></td>
                                   
                                    <td class="noBorder"><button class="btn" type="button" data-toggle="collapse" data-target="#example<?php echo $goal->idObjPersonal; ?>" aria-expanded="false" aria-controls="change" value="<?php echo $recipelist->idReceta; ?>"><i class="fa fa-trash"></i></button></td>

                                </tr>
                                <tr>
                                    <td colspan="4" class="hiddenRow">
                                        <div class="collapse" id="example<?php echo $goal->idObjPersonal; ?>">
                                            <div class="card card-body">
                                                <!--confirmación para borrar la receta-->
                                                <h2 class="titulo col-md-12 text-center">¿Quieres borrar la receta?</h2>
                                                <br>
                                                <div class="col-12 col-md-8 col-lg-12   text-center">
                                                    <a href="<?php echo constant('URL') . 'objective/removeObjective/' . $goal->idObjPersonal; ?>"><button class="btn btn-borrar m-3">Eliminar</button></a>
                                                    <button class="btn" type="button" data-toggle="collapse" data-target="#example<?php echo $goal->idObjPersonal; ?>" aria-expanded="false" aria-controls="change" value="<?php echo $recipelist->idReceta; ?>">Cancelar</button>
                                                </div>

                                                <!--termina confirmacion de borrado-->
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                
            </main>

            <?php require_once 'Views/footer.php'  ?>
        </div>
    </body>
   

    </html>
    
<?php
// else id user not loged, can't acces to that page
else :
    header('Location:' . constant('URL') . 'errores');

endif;

?>