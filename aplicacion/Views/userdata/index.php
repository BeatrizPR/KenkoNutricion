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
        header('Location:' . constant('URL') . 'main');
        require_once "Views/navbar.php";
    endif;

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

            <br><br>
            <br>
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h2 class="titulo">Area personal de <?= $_SESSION['usr'];  ?></h2><br />
                    <h6 id="foodShow" class="mx-auto d-block"></h6>
                    <br />
                </div>
                <div class=" mx-auto">
                    <?php if ($_SESSION['tipoUser'] == 'admin') :  echo '<h4 class="titulo">Hola ' . $_SESSION['tipoUser'] . '</h4><br>';
                        ?>
                        <!-- empieza el modal -->
                        <div class="modal fade" id="registerModalAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Registro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="message">
                                        <h5><?php echo $this->message; ?></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- termina el modal -->
                        <div class="collapse" id="new">

                            <!-- insertar usuario nuevo-->
                            <div class="center">
                                <h5><?php echo $this->message; ?></h5>
                            </div>
                            <form id="registroAdmin" method="post" class="form justify-content-center" action="javascript:void(0)">
                                <!--
                                        NOMBRE Y APELLIDOS *****************************************************
                                        La longitud de ambos no deberá exceder los 100 caracteres.
                                        -->
                                <div class="form-group">
                                    <label>Nombre*: </label>
                                    <input type="text" class="form-control" name="nom" maxlength="50" />
                                </div>
                                <div class="form-group">
                                    <label>Apellidos*: </label>
                                    <input type="text" class="form-control" name="ape" maxlength="50" />
                                </div>
                                <!--
                                        NOMBRE DE USUARIO ******************************************************
                                    -->

                                <div class="form-group">
                                    <label>Nombre de usuario*: </label>
                                    <input type="text" class="form-control" name="usr" />
                                </div>
                                <!--
                                        CONTRASEÑA *************************************************************
                                    -->

                                <div class="form-group">
                                    <label>Contraseña*: </label>
                                    <input type="password" class="form-control" name="pwd" />
                                    <!--pattern="[A-Za-z0-9]{8}"  -->
                                </div>

                                <!--
                                        EMAIL ******************************************************************
                                    -->

                                <div class="form-group">
                                    <label>Email*: </label>
                                    <input type="email" class="form-control" name="ema" />
                                </div>

                                <!--
                                        SEXO **************************************************************
                                    -->
                                <div class="form-group">
                                    <label>Sexo:</label>
                                    <select name="sex" class="form-control">
                                        <option>Mujer</option>
                                        <option>Hombre</option>
                                    </select>
                                </div>
                                <!--
                                        ALTURA ******************************************************************
                                    -->
                                <div class="form-group">
                                    <label>Altura: </label>
                                    <input type="text" class="form-control" name="alt" placeholder=" en centímetros" />
                                </div>
                                <!--
                                        PESO ******************************************************************
                                    -->
                                <div class="form-group">
                                    <label>Peso: </label>
                                    <input type="text" class="form-control" name="peso" placeholder=" en kilogramos" />
                                </div>
                                <button type="submit" class="btn btn-outline-success btn-registro ">Registrar</button>
                            </form>
                        </div>
                    </div><!-- acaba el insertar usuario-->
                    <table class="table table-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">idUsuario</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Altura</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Tipo de Usuario</th>
                                <th colspan="2"><button class="btn" type="button" data-toggle="collapse" data-target="#new" aria-expanded="false" aria-controls="new" value=""><i class="fa fa-user"></i></button></th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>
                        <?php foreach ($this->allUser as $row) :
                            $allUser = new Userdata();
                            $allUser = $row;
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $allUser->idUser;  ?></th>
                                    <td><?= $allUser->usr;  ?></td>
                                    <td><?= $allUser->ema;  ?></td>
                                    <td><?= $allUser->nom;  ?></td>
                                    <td><?= $allUser->ape;  ?></td>
                                    <td><?= $allUser->sex;  ?></td>
                                    <td><?= $allUser->alt;  ?></td>
                                    <td><?= $allUser->peso;  ?></td>
                                    <td><?= $allUser->tipoUser;  ?></td>
                                    <td><button class="btn" type="button" data-toggle="collapse" data-target="#change<?php echo $allUser->idUser; ?>" aria-expanded="false" aria-controls="change" value="<?php echo $allUser->idUser; ?>"><i class="fa fa-pencil-alt"></i></button>

                                    </td>


                                    <td><button class="btn" type="button" data-toggle="collapse" data-target="#trash<?php echo $allUser->idUser; ?>" aria-expanded="false" aria-controls="trash" value="<?php echo $allUser->idUser; ?>"><i class="fa fa-trash-alt"></i></button>

                                    </td>
                                </tr>
                                <tr>
                                    <!-- modificar usuario-->
                                    <td colspan="11" class="hiddenRow">
                                        <div class="collapse" id="change<?php echo $allUser->idUser; ?>">

                                            <h2 class="titulo col-md-12 text-center">Modifica el usuario</h2>
                                            <br>
                                            <form class="text-center" method="POST" action="<?php echo constant('URL') . 'userpage/modifyUser/' . $allUser->idUser; ?>">
                                                <div class="form-group row ">
                                                    <label for="usr" class="col-md-4 col-form-label">Usuario: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="usr" placeholder="Usuario" value="<?php echo $allUser->usr; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label for="ema" class="col-md-4 col-form-label">Email: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="ema" placeholder="Email" value="<?php echo $allUser->ema; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label for="nom" class="col-md-4 col-form-label">Nombre: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="nom" placeholder="Nombre" value="<?php echo $allUser->nom; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label for="ape" class="col-md-4 col-form-label">Apellidos: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="ape" placeholder="Apellidos" value="<?php echo $allUser->ape; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <label for="sex" class="col-md-4 col-form-label">Sexo: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="sex" placeholder="Mujer/Hombre" value="<?php echo $allUser->sex; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label for="alt" class="col-md-4 col-form-label">Altura: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="alt" placeholder="Altura en cm" value="<?php echo $allUser->alt; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label for="peso" class="col-md-4 col-form-label">Peso: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="peso" placeholder="Peso en Kg" value="<?php echo $allUser->peso; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label for="tipoUser" class="col-md-4 col-form-label">Tipo de usuario: </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" name="tipoUser" placeholder="Tipo de usuario" value="<?php echo $allUser->tipoUser; ?>">
                                                    </div>
                                                </div>
                                                <button class="btn ">Modificar usuario</button>
                                                <br>
                                            </form>
                                            <br>
                                        </div>
                                    </td>
                                </tr><!-- termina modificar usuario-->
                                <tr>
                                    <!-- borrar usuario-->
                                    <td colspan="11" class="hiddenRow">
                                        <div class="collapse" id="trash<?php echo $allUser->idUser; ?>">
                                            <h2 class="titulo col-md-12 text-center">¿Seguro que quieres eliminar este usuario?</h2>
                                            <br>
                                            <div class="col-12 col-md-8 col-lg-12   text-center">
                                                <a href="<?php echo constant('URL') . 'userpage/removeUser/' . $allUser->idUser; ?>"><button class="btn btn-borrar m-3">Eliminar</button></a>
                                                <a href="<?php echo constant('URL') . 'userdata' ?>"><button class="btn btn-cancelar">Cancelar</button></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr><!-- termina borrar usuario-->

                            </tbody>
                        <?php endforeach; ?>
                    </table>
                <?php else : ?>
                    <!-- Usuario  - modificar sus datos -->
                    <form method="POST" action="<?php echo constant('URL'); ?>userdata/modifyUserData">
                        <div class="center">
                            <h5><?php echo $this->message; ?></h5>
                        </div>
                        <div class="form-group row">

                            <label for="inputUser" class="col-sm-4 col-form-label">Usuario</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="usr" name="usr" value="<?php echo $_SESSION['usr']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="tex" class="form-control" id="nom" name="nom" value="<?php echo $_SESSION['nom']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Apellidos</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ape" name="ape" value="<?php echo $_SESSION['ape']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="ema" name="ema" placeholder="Email" value="<?php echo $_SESSION['ema']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="disabledInput" placeholder="*****" disabled>
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-4 pt-0">Sexo</legend>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="<?php echo $_SESSION['sex']; ?>" <?php echo $_SESSION['sex'] == "Mujer" ? "checked" : " "; ?>>
                                        <label class="form-check-label" for="gridRadios1">
                                            Mujer
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="<?php echo $_SESSION['sex']; ?>" <?php echo $_SESSION['sex'] == "Hombre" ? "checked" : ""; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            Hombre
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Altura</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alt" name="alt" placeholder="Altura en metros" value="<?php echo $_SESSION['alt']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Peso</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso en kg" value="<?php echo $_SESSION['peso']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn">Guardar datos</button>
                            </div>
                        </div>
                    </form>

                <?php endif; ?>
                <!-- termina el if que comprueba si el tipo de user es admin o no -->





            </div>
            <!--cierro div class mx-auto-->
    </div>
    <!--cierro div class row-->

    <br><br>


    <br>
    </main>

    </div>
    <?php require_once 'Views/footer.php'  ?>

</body>

</html>