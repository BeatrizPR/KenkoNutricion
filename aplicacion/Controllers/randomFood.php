<?php
class RandomFood extends Controller{
    function __construct(){
        parent::__construct();

        $this->view->datos = [];
        $this->view->message =" ";
    }
    
    function render(){
        
        $this->view->render('randomFood/index');
        
    }



}

?>