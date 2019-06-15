<?php
class Calculator extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->calculatorIMC= 0.0;
        $this->view->message = " ";
        $this->view->weight= null;
        $this->view->height= null;
        $this->view->age= null;
        $this->view->calculatorSC = 0.0;
        $this->view->calculatorGEB = 0.0;
        $this->view->messageGEB = "";

    }

    function render(){
        
        $this->view->render('calculator/index');

    }

    // calcular el indice de masa corporal
    public function getIMC(){
        $weight = $_POST["inputPeso"];
        $height = $_POST["inputTalla"];
        $calculatorIMC=0.0;
        $messageIMC = "";
        try {
            if(isset($weight) and isset($height)){
            	if( $weight > 0 && $height > 0){
                    $calculatorIMC = round($weight / ($height* $height), 2);
                    
                    if($calculatorIMC >= 40.00) {
                        $calculatorIMC;
                        $messageIMC = "Tu índice de masa corporal indica que tienes obesidad de grado 2.";
                    } elseif ($calculatorIMC >= 35.0 && $calculatorIMC <= 39.9) {
                        $calculatorIMC;
                        $messageIMC = "Tu índice de masa corporal indica que tienes obesidad de grado 2.";
                    } elseif ($calculatorIMC <= 34.9 && $calculatorIMC >= 30.0) {
                        $calculatorIMC;
                        $messageIMC = "Tu índice de masa corporal indica que tienes obesidad de grado 1.";
                    } elseif ($calculatorIMC <= 29.9 && $calculatorIMC >= 25.0) {
                        $calculatorIMC;
                        $messageIMC = "Tu índice de masa corporal indica que tienes sobrepeso.";
                    } elseif ($calculatorIMC <= 24.9 && $calculatorIMC >= 18.5) {
                        $calculatorIMC;
                        $messageIMC = "Tu índice de masa corporal indica que estás aceptable que y tienes un peso adecuado.";
                    } elseif ($calculatorIMC < 18.5){
                        $calculatorIMC;
                        $messageIMC = "Tu índice de masa corporal indica que estás delgado y tienes un bajo peso.";
                    } else{
                        $calculatorIMC;
                        $messageIMC = "Error. Ha habido algún problema y los datos son erroneos.";
                    }


            	}else{
            		$messageIMC="No se puede calcular el IMC, alguno de los campos es incorrecto.";
            	}
                
            } else{
                $messageIMC="No se puede calcular el IMC, alguno de los campos están vacíos.";
            }
        } catch (PDOException $error) {
            throw $error;
        }
       
        $data = array();
        $data ["calculator"] = $calculatorIMC;
        $data ["message"] = $messageIMC;

        $messageJson = json_encode($data, JSON_FORCE_OBJECT);
        header('Content-type: application/json; charset=utf-8');
        echo $messageJson;
    }

    // calcular la superficie corporal
    public function getSC(){
        $weight = $_POST["inputWeight"];
        $height = $_POST["inputHeight"];
        $calculatorSC=0;
        $messageSC = "";

        try {
            if(isset($weight) and isset($height)){
                $calculatorSC = round(pow($weight, 0.425) * pow($height, 0.725) * 0.007184, 2);
                $messageSC = "Tu superfice corporal es de ".$calculatorSC."m²";
            } else{
                $messageSC="No se puede calcular la superficie corporal, alguno de los campos están vacíos.";
            }
        } catch (PDOException $error) {
            throw $error;
        }

        $data = array();
        $data ["calculator"] = $calculatorSC;
        $data ["message"] = $messageSC;

        $messageJson = json_encode($data, JSON_FORCE_OBJECT);
        header('Content-type: application/json; charset=utf-8');
        echo $messageJson;
       
    }

 // calcular el gasto energético basal
    public function getGEB(){
        $weight = $_POST["inputPeso"];
        $height = $_POST["inputTalla"];
        $calculatorGEB=0.0;
        $messageGEB = "";
        $sex = $_POST["sexo"];
        $age = $_POST["edad"];

        //formulas
        //    GEB mujeres = 655.1 + (9.563 * Peso) + (1.85 * Estatura) - (4.676 * Edad)
        //    GEB hombres = 66.5 + (13.75 * Peso) + (5.003 * Estatura) - (6.775 * Edad)


        if($sex == "mujer"){
            $calculatorGEB = round(655.1 + (9.563 * $weight) + (1.85 * $height) - (4.676*$age));

        }else if ($sex == "hombre"){
            $calculatorGEB = round(66.5 + (13.75*$weight) + (5.003*$height) - (6.775*$age));
        }

        $messageGEB = "Tu gasto de energía basal es de ". $calculatorGEB;

        $data = array();
        $data ["calculator"] = $calculatorGEB;
        $data ["message"] = $messageGEB;

        $messageJson = json_encode($data, JSON_FORCE_OBJECT);
        header('Content-type: application/json; charset=utf-8');
        echo $messageJson;
       
    }


}
?>