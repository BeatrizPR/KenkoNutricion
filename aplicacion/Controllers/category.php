<?php
class Category extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->datos = [];
        //session_start();   
    }

    function render(){
      	$category = $this->model->getCategories();
        $this->view->category =  $category;
      	$this->view->render('category/index');
    }

  	
   


}

?>