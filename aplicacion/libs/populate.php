<?php


include_once 'conexion.php';


// realizo la peticion a la api y guardo los resultado
// 1º en un array y después en la BD
$food_url = "https://taco-food-api.herokuapp.com/api/v1/food/";

// decodifico el json y obtengo un array 

//$info = file_get_contents("datos.txt") ;
$food = json_decode(file_get_contents($food_url));

//echo $info;
//echo "<pre>".print_r($food, true)."</pre>" ;

// con esta funcion le paso el dta valor y con key el nombre de protein, etc. 
function obtengoDato($dta, $key) {
	//print_r($dta) ;
	//para que no interprete los lipidos como una cadena de texto, escribo la key entre {}
	// sino como el nombre de una propiedad
	if ((!isset($dta->{$key})) || (!is_double($dta->{$key}->qty))) return 0.0 ;
	else return $dta->{$key}->qty ;
}

//DATOS que quiero obtener para la TABLA ALIMENTO

foreach ($food as $valor) :
	$alimento = $valor->description;
	$gramos = $valor->base_qty;
	$idCategoria = $valor->category_id;
	$calorias = $valor->attributes->energy->kcal;	
	$proteinas = obtengoDato($valor->attributes, "protein");
	$hidratos = obtengoDato($valor->attributes, "carbohydrate");
	$lipidos = obtengoDato($valor->attributes,"lipid") ;
	$fibra = obtengoDato($valor->attributes, "fiber");
	$calcio = obtengoDato($valor->attributes , "calcium");
	$magnesio = obtengoDato($valor->attributes, "magnesium");
	$fosforo = obtengoDato($valor->attributes, "phosphorus");
	$hierro = obtengoDato($valor->attributes, "iron");
	$sodio = obtengoDato($valor->attributes, "sodium");
	$potasio = obtengoDato($valor->attributes, "potassium");
	$cobre = obtengoDato($valor->attributes, "copper");
	$zinc = obtengoDato($valor->attributes, "zinc");
	$manganeso = obtengoDato($valor->attributes, "manganese");

	// if ((!isset($valor->attributes->protein)) || (!is_double($valor->attributes->protein->qty))) {
	// 	$proteinas = 0.0;
	//  } else{
	// 	$proteinas = $valor->attributes->protein->qty;
	//  }
	
	//echo "$lipidos<br/>" ;
	//echo "[$i]::".gettype($lipidos)."<br/>";

	//$i++;
	//compruebo tipo de las variables
	//echo gettype($zinc)." ".$zinc."<br>";


	// por cada bucle inserto un alimento con sus datos
		
	$sqlInsertarAPI ="INSERT INTO alimento (nombreAli, calorias, gramos, proteinas, hidratosCarbono, lipidos, idCategoria, fibra, calcio, magnesio, fosforo, hierro, sodio, potasio, cobre, zinc, manganeso) VALUES ('$alimento', '$calorias', '$gramos', '$proteinas', '$hidratos', '$lipidos', '$idCategoria', '$fibra', '$calcio', '$magnesio', '$fosforo', '$hierro', '$sodio', '$potasio', '$cobre', '$zinc', '$manganeso')";

	
	$sentenciaInsertarAPI = $pdo->prepare($sqlInsertarAPI);
	$sentenciaInsertarAPI->execute();
	
	echo $sqlInsertarAPI;
	//echo($alimento);

	endforeach; // end foreach

?>