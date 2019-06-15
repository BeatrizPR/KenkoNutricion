<?php
class Recipelist extends Controller{

    function __construct(){
        parent::__construct();
        session_start();
        $this->view->datos = [];
        $this->view->message =" ";
    }
    
    function render(){

        $recipelist = $this->model->getAll($_SESSION['idUser']);
        $this->view->recipelist = $recipelist;
        $this->view->render('recipelist/index');
        
    }

    function appendNewRecipe($param= null){
        //validar aqui la información sea correcta y pasar al modelo cuando se tenga correcto
        $idReceta = $param[0];
        $idUser = $_SESSION['idUser'];
        $message = "";
        
         if($this->model->appendRecipe(['idReceta' => $idReceta, 'idUser' => $idUser ])) {
             $message = 'Receta añadida';
         } else{
             $message = "<p style='color:red'Error. No se ha podido añadir la receta</p>";             
         }
        
         $this->view->message = $message;
         header('Location:'. constant('URL'). 'recipelist');
         
         
    }


    function removeRecipeList($param= null){
        $idReceta = $param[0];
        session_start();
        $idUser = $_SESSION['idUser'];

        if($this->model->deleteRecipeList(['idReceta' => $idReceta, 'idUser' => $idUser ])){
            // actualizar receta
           $this->view->mensaje = "Receta eliminada";
           //$mensaje = "Receta eliminada";
        } else{
            // mensaje de error
            $this->view->mensaje = "No se pudo eliminar la receta";
            //$mensaje = "No se pudo eliminar la receta";
        }

        header('Location:'. constant('URL'). 'recipelist');


    }

}
?>