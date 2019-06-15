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


    public function updateDataUser($userModify)
    {
        $query = $this->db->connect()->prepare("UPDATE usuario SET usuario = :usuario, nombre = :nombre, apellidos = :apellido, email = :email, sexo = :sexo, altura = :altura, peso = :peso WHERE idUsuario = :idUsuario");
        try {
            $query->execute([
                'usuario' => $userModify['usr'], 'nombre' => $userModify['nom'], 'apellido' => $userModify['ape'], 'email' => $userModify['ema'], 
                'sexo' => $userModify['sex'], 'altura' => $userModify['alt'], 'peso' => $userModify['peso'],'idUsuario' => $userModify['idUser']
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