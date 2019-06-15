<?php
include_once 'Models/user.php';
class Register extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->message =" ";
        $this->view->datos = [];
        session_start();
       
    }

    function render()
    {
        $this->view->render('register/index');
    }


    function registerUser()
    {
        
        $nom = trim($_POST["nom"])?? " ";
        $ape = trim($_POST["ape"])?? " ";
        $usr = trim($_POST["usr"])?? " ";
        $ema = trim($_POST["ema"])?? " ";
        $sex = trim($_POST["sex"])?? " ";	  	
        $alt = trim($_POST["alt"])?? " ";
        $peso = trim($_POST["peso"])?? " ";

        // Guardamos la contraseña
        $pwd =md5($_POST['pwd']);
         

        $message = "";

            // compruebo que los campos no esten vacios
            if(empty($nom) || empty( $ape) ||empty( $usr) ||empty($ema) ||empty($pwd)){
                
                $message = "<p style='color:red'>El usuario no ha podido registrarse.</p>";
            } else{

                // compruebo que no exista ya el usuario y el email
                if($this->model->checkUserExist(['usr' => $usr, 'ema' => $ema])){
                    $message = "<p style='color:red'>Ese usuario o email ya ha sido registrado.</p>";

                } else {
                    // registro al usuario
                    if ($this->model->insertUser(['usr' => $usr, 'pwd' => $pwd, 'ema' => $ema, 'nom' => $nom, 'ape' => $ape, 'sex' => $sex, 'alt' => $alt, 'peso'=> $peso])) {
                        $message = 'Te damos la bienvenidad: ' . $usr. '<br> Inicia sesión para terminar correctamente el registro. ';
                        //session_start();
                        $_SESSION['user'] = $_POST['usr'];
                    } else {
                        $message = "<p style='color:red'>El usuario no ha podido registrarse.</p>";
                    }
                }

            }

        $data = array();
        //$data ["success"] = true;
        $data ["message"] = $message;

        $messageJson = json_encode($data, JSON_FORCE_OBJECT);

        // mando el mensaje a done de validator
        header('Content-type: application/json; charset=utf-8');
        echo $messageJson;
    }


}
