<?php
include_once 'Models/user.php';
class Userdata extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->message = " ";
        $this->view->datos = [];
        //session_start();
    }
    
    function render(){
        $user = $this->model->getDataUser();
        $this->view->user = $user;
        $allUser = $this->model->getDataAllUser();
        $this->view->allUser = $allUser;
        session_start();
        $this->view->render('userdata/index');
    }
    
    function modifyUserData(){

        $idUser = $_POST['idUser'];
        $nom = $_POST['nom']?? "";
        $ape = $_POST['ape']?? "";
        $usr = $_POST['usr']?? "";
        $ema = $_POST['ema']?? "";
        $sex = $_POST['sex']?? "";
        $alt = $_POST['alt']?? "";
        $peso = $_POST['peso']?? "";
      
        $message="";


        if($this->model->updateDataUser(['idUser' => $idUser, 'nom' => $nom, 'ape' => $ape, 'usr' => $usr, 'ema' => $ema, 'sex' => $sex, 'alt' => $alt, 'peso' => $peso])){

            $message = "Datos actualizados correctamente";

        } else{
            // mensaje de error
            $message = "No se pudieron actualizar tus datos";
        }
     
        $data = array();
        $data ["message"] = $message;

        $messageJson = json_encode($data, JSON_FORCE_OBJECT);
        header('Content-type: application/json; charset=utf-8');
        echo $messageJson;

    }

}
?>