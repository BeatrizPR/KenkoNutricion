<?php
class Main extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->message =" ";
        $this->view->datos = [];
    }
    
    function render(){
        session_start();
        $this->view->render('main/index');
        
    }



}
?>