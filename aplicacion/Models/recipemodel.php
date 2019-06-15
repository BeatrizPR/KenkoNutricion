<?php
include_once 'Models/foodrecipe.php';

class recipeModel extends Model
{
    public function __contruct()
    {
        parent::__contruct();
    }

    public function getAll()
    {

        $recipe = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM receta order by nombreReceta Limit 0 , 50");

            while ($row = $query->fetch()) {
                $item = new Foodrecipe();

                $item->idReceta = $row['idReceta'];
                $item->nombreReceta = $row['nombreReceta'];
                $item->descripcion = $row['descripcion'];
                $item->tiempo = $row['tiempo'];


                array_push($recipe, $item);
            }

            return $recipe;
        } catch (PDOException $error) {
            return [];
        }
    }


    public function insertRecipe($data)
    {
        try {

            $query = $this->db->connect()->prepare('INSERT INTO receta (nombreReceta, descripcion, tiempo) VALUES (:nombre, :descripcion, :tiempo)');

            $query->execute(['nombre' => $data['nombre'], 'descripcion' => $data['descripcion'], 'tiempo' => $data['tiempo']]);

            return true;
        } catch (PDOException $error) {
            //echo $error->getMessage();
            //echo 'ERROR. Dato incorrecto';
            return false;
        }
    }

    public function getById($id)
    {
        $recipe = new Foodrecipe();

        $query = $this->db->connect()->prepare("SELECT * FROM receta WHERE idReceta = :idReceta");

        try {
            $query->execute(['idReceta' => $id]);

            while ($row = $query->fetch()) {
                $recipe->idReceta = $row['idReceta'];
                $recipe->nombreReceta = $row['nombre'];
                $recipe->detalle = $row['detalle'];
                $recipe->tiempo = $row['tiempo'];
            }

            return $recipe;
        } catch (PDOException $error) {
            return null;
        }
    }

    public function updateRecipe($recipe)
    {
        $query = $this->db->connect()->prepare("UPDATE `receta` SET `nombreReceta` = :nombre, `descripcion` = :descripcion, `tiempo` = :tiempo WHERE `idReceta` = :idReceta");
        try {
            $query->execute([
                'nombre' => $recipe['nombre'], 'descripcion' => $recipe['descripcion'],
                'tiempo' => $recipe['tiempo'], 'idReceta' => $recipe['idReceta']
            ]);
            return true;
        } catch (PDOException $error) {
            return false;
        }
    }


    public function deleteRecipe($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM `receta` WHERE `idReceta` = :id");
        try {
            $query->execute(['id' => $id]);
            return true;
        } catch (PDOException $error) {
            return false;
        }
    }

}
