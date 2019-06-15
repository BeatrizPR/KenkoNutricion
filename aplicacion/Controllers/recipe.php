<?php
class Recipe extends Controller{

    function __construct(){
        parent::__construct();

        $this->view->datos = [];
        $this->view->message =" ";
    }
    
    function render(){
        $recipe = $this->model->getAll();
        $this->view->recipe = $recipe;
        $this->view->render('recipe/index');
        
    }

    function showRecipeSearch()
    {
        $inicio = 0;
        $limite = 20;
        if (isset($_POST['pagina'])) {
            $pagina = $_POST['pagina'];
            $inicio = ($pagina - 1) * $limite;
        }
        $valor = $_POST['valor'];
        
        $food = $this->model->recipeList($valor);
        $elements = count($food);
        $foodArray = $this->model->recipeList($valor, $inicio, $limite);

        $elementsDBJson = json_encode($foodArray) . "*" . $elements;
        echo $elementsDBJson;

    }

    function insertNewRecipe(){
        //validar aqui la información sea correcta y pasar al modelo cuando se tenga correcto
        
        $nombreReceta = $_POST['nombre']?? " ";
        $descripcion = $_POST['descripcion']?? " ";
        $tiempo = $_POST['tiempo']?? " ";

        $message = "";
        
        // con el operador de fusion asigno las variables que llegan por post y las hago vacias si no traen nada
        // compruebo que las variables no esten vacias antes de hacer la sentencia sql
        if( empty($nombreReceta) || empty($descripcion) || empty($tiempo) ){
            $message = "<p style='color:red'>Error. No se ha podido añadir la receta</p>";
        } else{
            if($this->model->insertRecipe(['nombre' => $nombreReceta, 'descripcion' => $descripcion, 'tiempo' => $tiempo])) {
                $message = 'Nuevo receta creada';
            } else{
                $message = "<p style='color:red'>Error. No se ha podido añadir la receta</p>";             
            }
        }
        
        
         $this->view->message = $message;
        header('Location:'. constant('URL'). 'recipe');
         
         
    }

    function modifyRecipe($param = null){

        $nombreReceta = $_POST['nombre']?? " ";
        $descripcion = $_POST['descripcion']?? " ";
        $tiempo = $_POST['tiempo']?? " ";
        $idReceta = $param[0];

        // con el operador de fusion asigno las variables que llegan por post y las hago vacias si no traen nada
        // compruebo que las variables no esten vacias antes de hacer la sentencia sql
        if(empty($nombreReceta) || empty($descripcion) || empty($tiempo)){
            // mensaje de error
            $this->view->menssage = "No se pudo actualizar la receta";
        } else{
            if($this->model->updateRecipe(['idReceta' => $idReceta, 'nombre' => $nombreReceta, 'descripcion' => $descripcion, 'tiempo' => $tiempo])){
                // actualizar receta
                $recipe = new Foodrecipe();
                $recipe->idReceta = $idReceta;
                $recipe->nombreReceta = $nombreReceta;
                $recipe->descripcion = $descripcion;
                $recipe->tiempo = $tiempo;
    
                $this->view->recipe = $recipe;
                $this->view->message = "Receta actualizada correctamente";
            } else{
                // mensaje de error
                $this->view->menssage = "No se pudo actualizar la receta";
            }
        }


        header('Location:'. constant('URL'). 'recipe');
        //$this->view->render('recipe/index');

    }

    function removeRecipe($param= null){
        $id = $param[0];


        if($this->model->deleteRecipe($id)){
            // actualizar receta
           $this->view->mensaje = "Receta eliminada";
        } else{
            // mensaje de error
            $this->view->mensaje = "No se pudo eliminar la receta";
        }

        header('Location:'. constant('URL'). 'recipe');

    }


}
?>