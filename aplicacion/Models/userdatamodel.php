<?php
include_once 'Models/user.php';

class UserdataModel extends Model{

    public function __contruct(){
        parent::__contruct();
    }

    public function getDataUser($id = ""){

        $newUser = new User();

        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE usuario = :id");

        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $newUser->idUser = $row['idUsuario'];
                $newUser->nom = $row['nombre'];
                $newUser->ape = $row['apellidos'];
                $newUser->usr = $row['usuario'];
                $newUser->ema = $row['email'];
                $newUser->sex = $row['sexo'];
                $newUser->alt = $row['altura'];
                $newUser->peso = $row['peso'];
                $newUser->tipoUser = $row['tipoUser'];
                
            }
            return $newUser;
        } catch (PDOException $error) {
            return [];
        }

    }



    public function updateDataUser($userDataModi)
    {
        $query = $this->db->connect()->prepare("UPDATE usuario SET usuario = :usr, nombre = :nom, apellidos = :ape, email = :ema, sexo = :sex, altura = :alt, peso = :peso WHERE idUsuario = :idUser");
        try {
            $query->execute([
                'usr' => $userDataModi['usr'], 
                'nom' => $userDataModi['nom'], 
                'ape' => $userDataModi['ape'], 
                'ema' => $userDataModi['ema'], 
                'sex' => $userDataModi['sex'], 
                'alt' => $userDataModi['alt'], 
                'peso' => $userDataModi['peso'],
                'idUser' => $userDataModi['idUser']
            ]);
            return true;
        } catch (PDOException $error) {
            return false;
        }
    }


    public function getDataAllUser(){

        $allUser = [];

        $query = $this->db->connect()->query("SELECT * FROM usuario ORDER BY idUsuario");

        try {

            while ($row = $query->fetch()) {
                $element = new User();

                $element->idUser = $row['idUsuario'];
                $element->nom = $row['nombre'];
                $element->ape = $row['apellidos'];
                $element->usr = $row['usuario'];
                $element->ema = $row['email'];
                $element->sex = $row['sexo'];
                $element->alt = $row['altura'];
                $element->peso = $row['peso'];
                $element->tipoUser = $row['tipoUser'];
                array_push($allUser, $element);
            }
            return $allUser;
        } catch (PDOException $error) {
            return [];
        }

    }


}


?>