<?php
class Objective extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->data = [];
        $this->view->message =" ";
        session_start();
    }
    
    function render(){
        $objective = $this->model->getAll();
        $this->view->objective = $objective;
        $goal = $this->model->getAllObjecPersonel([$_SESSION['idUser']]);
        $this->view->goal = $goal;
        $goalAchieve = $this->model->getObjectAchieve([$_SESSION['idUser']]);
        $this->view->goalAchieve = $goalAchieve;
        $this->view->render('objective/index');  
    }
    
    function createChartObj(){
        $goal = $_POST['goalId'];
        $year = $_POST['year'];
        $data = $this->model->getObjectChart(['idUs' => $_SESSION['idUser'],'year' => $year, 'goal' => $goal]);

        echo json_encode($data);
    }

    // todos los objetivos
    function createTotalChartObj(){
        $month = $_POST['month'];
        $year = $_POST['year'];
        $data = $this->model->getTotalObjectChart(['idUs' => $_SESSION['idUser'],'year' => $year, 'month' => $month]);

        echo json_encode($data);
    }

    function insertNewObjectivePerson(){
        //validar aqui la información sea correcta y pasar al modelo cuando se tenga correcto
        
        $fechaObj = date('Y-m-d');
        $cumplido  = isset($_POST['checkboxGoal'])? 'si' :  " ";
        $idObjectives = $_POST['checkboxGoal'];
        //print_r($idObjectives);

        $idUsuario = $_SESSION['idUser'];

        $message = "";

        for($i=0; $i<count($idObjectives); $i++ ){
            $idObj = $idObjectives[$i];
 
            if($this->model->insertPersonGoal(['fecha' => $fechaObj, 'cumplido' => $cumplido, 'idObj' => $idObj, 'idUsuario' => $idUsuario])) {
                $message = 'Objetivo cumplido añadido';
            } else{
                $message = "<h3 style='color:red'>Error. No se ha podido añadir el objetivo cumplido.</h3>";             
            }
           
        }
         
         $this->view->message = $message;
         header('Location:'. constant('URL'). 'objective');
         
    }


    //removeObjective

    function removeObjective($param= null){
        $idObjPersonal = $param[0];

        if($this->model->deleteObjetiveGoal(['idObjPersonal' => $idObjPersonal])){
            // actualizar receta
           $this->view->mensaje = "Objetivo eliminado";
        } else{
            // mensaje de error
            $this->view->mensaje = "No se pudo eliminar el objetivo";
        }

        header('Location:'. constant('URL'). 'objective');

    }





}
    