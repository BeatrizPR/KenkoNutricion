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

        $idUser = $_SESSION['idUser']?? "";
        $nom = $_POST['nom']?? "";
        $ape = $_POST['ape']?? "";
        $usr = $_POST['usr']?? "";
        $ema = $_POST['ema']?? "";
        $sex = $_POST['sex']?? "";
        $alt = $_POST['alt']?? "";
        $peso = $_POST['peso']?? "";
      
        $message="";


        if($this->model->updateDataUser(['idUser' => $idUser, 'nom' => $nom, 'ape' => $ape, 'usr' => $usr, 'ema' => $ema, 'sex' => $sex, 'alt' => $alt, 'peso' => $peso])){
            //actualizar datos user
            $userModify = new User();
            $userModify->usr = $usr;
            $userModify->nom = $nom;
            $userModify->ape = $ape;
            $userModify->ema = $ema;
            $userModify->sex = $sex;
            $userModify->alt = $alt;
            $userModify->peso = $peso;

            $this->view->userModify = $userModify;
            $message = "Datos actualizados correctamente";
            //return $userModify;
        } else{
            // mensaje de error
            $message = "No se pudieron actualizar tus datos";
        }
     
        header('Location:'. constant('URL'). 'userdata');

    }

}
?>