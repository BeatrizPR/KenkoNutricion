<?php
class Errores extends Controller {

    function __construct(){
        parent::__construct();

        $this->view->message = 'Error 404.<br> Error al cargar el recurso';

        $this->view->render('errores/index');
        
        //echo '<p>Error al cargar la página</p>';
        
    }
}


?>