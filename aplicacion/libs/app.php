<?php
require_once 'Controllers/errores.php';

class App {
    function __construct() {

        // este parametro url existe siempre porque lo hemos puesto en .htcaccess
        $url = isset($_GET['url']) ? $_GET['url']: null ;
        // echo $url;

        $url = rtrim($url, '/');
        //dividir los parametros que se pasan por url entre /
        $url = explode('/', $url);

        // comprobamos si hay controlador definido
        if(empty($url[0])){
            $archivoController = 'Controllers/main.php';
            require_once $archivoController;
            $controller = new Main();
            //especificamos el modelo 
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

        //var_dump($url);

        $archivoController = 'Controllers/' . $url[0] . '.php';


        // VALIDAMOS SI EXISTE EL CONTROLADOR
        if(file_exists($archivoController)){
            require_once $archivoController;

            //inicializo el controlador
            $controller = new $url[0];
            // cargo el modelo
            $controller->loadModel($url[0]);

            // validamos si hay un parametro o mas de un
            // para saber si llamamos a un metodo o un metodo y parametros
            // para saber el numero de elementos del array
            $nparam = sizeof($url);

            if($nparam > 1){
                if($nparam > 2){
                    $param = [];
                    // 0 es el controlador
                    // 1 es el método
                    // lo que viene después son parametros
                    for($i = 2; $i < $nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else{
                    $controller->{$url[1]}();
                }
            } else{
               $controller->render();
            }

    //    // ESTO YA NO HACE FALTA CON EL IF / ELSE DE ARRIABA
    //         // VALIDAMOS SI EXISTE EL MÉTODO, si se quiere cargar un metodo
    //         if(isset($url[1])){
    //             // la posicion 1 son metodos
    //             $controller->{$url[1]}();
    //         } //else{
    //         //     $controller->render();
    //         // }


        } else{
            $controller = new Errores();
        }
        
    }
}







?>