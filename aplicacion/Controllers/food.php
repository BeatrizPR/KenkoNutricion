<?php
class Food extends Controller
{

    function __construct()
    {
        parent::__construct();

        $this->view->datos = [];
        session_start();
    }

    function render()
    {
        $this->view->render('food/index');
    }

    function searchFoodPagination()
    {
        $inicio = 0;
        $limite = 20;
        if (isset($_POST['pagina'])) {
            $pagina = $_POST['pagina'];
            $inicio = ($pagina - 1) * $limite;
        }
        $valor = $_POST['valor'];
        
        $food = $this->model->FoodList($valor);
        $elements = count($food);
        $foodArray = $this->model->FoodList($valor, $inicio, $limite);

        $elementsDBJson = json_encode($foodArray) . "*" . $elements;

        echo $elementsDBJson;
        
    }
}
