<?php
class Userpage extends Controller{

    function __construct(){
        parent::__construct();

        $this->view->datos = [];
    }
    
    function render(){
        $user = $this->model->getDataUser();
        $this->view->user = $user;
        $this->view->render('userpage/index');
    }

    function insertNewUser(){
        //validar aqui la información sea correcta y pasar al modelo cuando se tenga correcto
        $nom = trim($_POST["nom"])?? " ";
        $ape = trim($_POST["ape"])?? " ";
        $usr = trim($_POST["usr"])?? " ";
        $ema = trim($_POST["ema"])?? " ";
        $sex = trim($_POST["sex"])?? " ";	  	
        $alt = trim($_POST["alt"])?? " ";
        $peso = trim($_POST["peso"])?? " ";
        $tipoUser = $_POST['tipoUser']?? "";

        // Guardamos la contraseña
        $pwd =md5($_POST['pwd']);

        $message = "";
        
        
            if($this->model->insertUser(['usr' => $usr, 'pwd' => $pwd, 'ema' => $ema, 'nom' => $nom, 'ape' => $ape, 'sex' => $sex, 'alt' => $alt, 'peso'=> $peso, 'tipoUser' => $tipoUser])) {
                $message = 'Nuevo usuario creado';
            } else{
                $message = "<p style='color:red'>Error. No se ha podido añadir el usuario.</p>";             
            }
        
        $data = array();
        $data ["message"] = $message;

        $messageJson = json_encode($data, JSON_FORCE_OBJECT);
        header('Content-type: application/json; charset=utf-8');
        echo $messageJson;
         
    }

    function modifyUser($param = null){

        //$idUser = $_POST['tipoUser'];
        $idUser = $param[0];
        $nom = $_POST['nom']?? "";
        $ape = $_POST['ape']?? "";
        $usr = $_POST['usr']?? "";
        $ema = $_POST['ema']?? "";
        $sex = $_POST['sex']?? "";
        $alt = $_POST['alt']?? "";
        $peso = $_POST['peso']?? "";
        $tipoUser = $_POST['tipoUser']?? "";
        // Guardamos la contraseña
        //$pwd =md5($_POST['pwd']);

        if($this->model->updateUser(['idUser' => $idUser, 'nombre' => $nom, 'ape' => $ape, 'usr' => $usr, 'ema' => $ema, 'sex' => $sex, 'alt' => $alt, 'peso' => $peso,'tipoUser' => $tipoUser])){
                //actualizar datos user
                $userRegister = new User();
                $userRegister->usr = $usr;
                $userRegister->nom = $nom;
                $userRegister->ape = $ape;
                $userRegister->ema = $ema;
                $userRegister->sex = $sex;
                $userRegister->alt = $alt;
                $userRegister->peso = $peso;
                $userRegister->tipoUser = $tipoUser;
                $userRegister->pwd = $pwd;

                $this->view->userRegister = $userRegister;
                $message = "Datos actualizados correctamente";
                //return $userRegister;
        } else{
            // mensaje de error
            $message = "No se pudieron actualizar tus datos";
            
        }

        header('Location:'. constant('URL'). 'userdata');

    }

    function removeUser($param= null){
        $id = $param[0];


        if($this->model->deleteUser($id)){
            // actualizar receta
           $this->view->mensaje = "Usuario eliminado";
           //$mensaje = "Receta eliminada";
        } else{
            // mensaje de error
            $this->view->mensaje = "No se pudo eliminar el usuario";
            //$mensaje = "No se pudo eliminar la receta";
        }

        header('Location:'. constant('URL'). 'userdata');


    }

}
?>