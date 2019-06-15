<?php
include_once 'Models/foodrecipe.php';

class recipelistModel extends Model
{
    public function __contruct()
    {
        parent::__contruct();
    }

    public function getAll($idUsr)
    {

        $recipelist = [];
        $idUser = $idUsr;

        try {
            $query = $this->db->connect()->prepare('SELECT nombreReceta, descripcion, tiempo, l.idReceta, idUsuario FROM receta r INNER JOIN lista_recetas l ON r.idReceta = l.idReceta AND idUsuario = :idUsuario order by nombreReceta Limit 0 , 100');
            $query->execute(['idUsuario' => $idUser]);

            while ($row = $query->fetch()) {
                $item = new Foodrecipe();

                $item->idReceta = $row['idReceta'];
                $item->nombreReceta = $row['nombreReceta'];
                $item->descripcion = $row['descripcion'];
                $item->tiempo = $row['tiempo'];
                $item->idUsuario = $row['idUsuario'];

                
                array_push($recipelist, $item);
            }

            return $recipelist;
        } catch (PDOException $error) {
            return [];
        }
    }

    public function appendRecipe($data)
    {
        try {

            $query = $this->db->connect()->prepare('INSERT INTO lista_recetas (idUsuario, idReceta) VALUES (:idUser, :idRecipe)');

            $query->execute(['idUser' => $data['idUser'], 'idRecipe' => $data['idReceta']]);

            return true;
        } catch (PDOException $error) {
            //echo $error->getMessage();
            //echo 'ERROR. Dato incorrecto';
            return false;
        }
    }

    public function deleteRecipeList($data)
    {
        $query = $this->db->connect()->prepare("DELETE FROM `lista_recetas` WHERE `idReceta` = :idReceta AND `idUsuario` = :idUser");
        try {
            $query->execute(['idUser' => $data['idUser'], 'idReceta' => $data['idReceta']]);
            return true;
        } catch (PDOException $error) {
            return false;
        }
    }

    public function checkRecipeList($userLogin){

        try {
            $query = $this->db->connect()->prepare("SELECT idReceta FROM lista_recetas");
            $query->execute(['usuario' => $userLogin['usr'], 'email' => $userLogin['ema']]);
            $result = $query->fetch();
            if($result){
                return true;
            } else{
                return false;
            }
        } catch (PDOException $error) {
            return false;
        }

    }
    
}
