<?php

class Controller{

    function __construct(){
        
        //echo '<p>controlador base</p>';

        $this->view = new View();
        
    }

    function loadModel($model){
        $url = 'Models/' .$model. 'model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'Model';
            
            // $this->model es una variable privada que se crea aqui para crear un nuevo modelo

            $this->model = new $modelName();
        }
    }
}

?>