<?php
include_once 'Models/User.php';
class Login extends Controller
{

    function __construct()
    {
        parent::__construct();

        $this->view->datos = [];
    }

    function render()
    {

        $this->view->render('login/index');
    }

    function sessionUserStart()
    {

        // para evitar inyecciones de código sql uso htmlentities y addslashes
        $user = htmlentities(addslashes($_POST['user']));
        $pass = md5($_POST['pass']);
 

        $message = "";
        $newUser = $this->model->checkUserExist(['user' => $user, 'pass' => $pass]);

        if ($newUser) {

                $message = 'Bienvenido ' . $user;
                session_start();
                $_SESSION['usr'] = $_POST['user'];
                $_SESSION['idUser']= $newUser[0]->idUser;
                $_SESSION['nom']= $newUser[0]->nom;
                $_SESSION['ape']= $newUser[0]->ape;
                $_SESSION['ema']= $newUser[0]->ema;
                $_SESSION['sex']= $newUser[0]->sex;
                $_SESSION['alt']= $newUser[0]->alt;
                $_SESSION['peso']= $newUser[0]->peso;
                $_SESSION['tipoUser']= $newUser[0]->tipoUser;

                //echo $_SESSION['idUser'];
                
                

        } else {
            $message = "<p style='color:red'>Usuario o contraseñas incorrectos.<br> Si no tienes cuenta, registrate.</p>";
        }

        header('Location:'. constant('URL'). 'userpage');

    }


    function sessionClose()
    {
        session_start();
        session_unset();
        // Destruir la sesión.
        session_destroy();

        header('Location:'. constant('URL'). 'main');
    }
}
