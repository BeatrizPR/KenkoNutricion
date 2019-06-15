<?php
include_once 'Models/foodstuff.php';

class FoodModel extends Model
{

    public function __contruct()
    {
        parent::__contruct();
    }

    public function getAll()
    {

        $food = [];

        try {
                $search = "SELECT * FROM alimento a INNER JOIN categoria c ON a.idCategoria=c.idCategoria order by nombreAli Limit 0, 20";

                $query = $this->db->connect()->query($search);

                while ($row = $query->fetch()) {
                    $item = new Foodstuff();

                    $item->idAlimento = $row['idAlimento'];
                    $item->nombreAli = $row['nombreAli'];
                    $item->calorias = $row['calorias'];
                    $item->nombreCat = $row['nombreCat'];
                    $item->proteinas = $row['proteinas'];
                    $item->hidratosCarbono = $row['hidratosCarbono'];
                    $item->lipidos = $row['lipidos'];
                    $item->fibra = $row['fibra'];

                    array_push($food, $item);
                }
            
            return $food;
        } catch (PDOException $error) {
            return [];
        }
    }

    public function foodList($valor,$inicio=FALSE, $limite=FALSE){
        if ($inicio!==FALSE && $limite!==FALSE) {
            $search = "SELECT * FROM alimento a INNER JOIN categoria c ON a.idCategoria=c.idCategoria WHERE c.nombreCat like '%".$valor."%' or a.nombreAli like '%".$valor."%' ORDER BY nombreAli ASC LIMIT $inicio,$limite";
            
        }
        else{
            $search="SELECT * FROM alimento a INNER JOIN categoria c ON a.idCategoria=c.idCategoria WHERE c.nombreCat like '%".$valor."%' or a.nombreAli like '%".$valor."%' ORDER BY nombreAli ASC";
        }

        $query = $this->db->connect()->query($search);
        $arreglo=[];
        while ($re=$query->fetch()) {
            $arreglo[]=$re;
        }

        return $arreglo;

    }




}
