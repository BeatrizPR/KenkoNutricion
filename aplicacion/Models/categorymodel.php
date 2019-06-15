<?php
require_once 'Models/foodcategory.php';

class CategoryModel extends Model {
    
    public function __contruct(){
        parent::__contruct();
    }

    public function getCategories(){
		$category=[];

        try {
            $query = $this->db->connect()->query("SELECT * FROM `categoria` order by nombreCat");
            
            while( $row = $query->fetch()){
              
                $item = new Foodcategory();

              
                $item->idCategoria = $row['idCategoria'];
                $item->nombreCategoria = $row['nombreCat'];
                $item->descripcionCat = $row['descripcion'];
                 
                array_push($category, $item);
               
            }
          
            return $category;

          	
        } catch (PDOException $error) {
            return [];
        }

    }
    


    
}
?>