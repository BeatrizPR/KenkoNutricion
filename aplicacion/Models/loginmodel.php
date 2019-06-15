<?php
include_once 'Models/user.php';
class LoginModel extends Model{

    public function __contruct(){
        parent::__contruct();
    }

    public function checkUserExist($userLogin){

        $newUser = [];

        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE usuario = :user AND password = :pass");

        try {
            $query->execute(['user' => $userLogin['user'], 'pass' => $userLogin['pass']]);

            while ($row = $query->fetch()) {
                $item = new User();
                
                $item->idUser = $row['idUsuario'];
                $item->nom = $row['nombre'];
                $item->ape = $row['apellidos'];
                $item->usr = $row['usuario'];
                $item->ema = $row['email'];
                $item->sex = $row['sexo'];
                $item->alt = $row['altura'];
                $item->peso = $row['peso'];
                $item->tipoUser = $row['tipoUser'];
                array_push($newUser,$item);

            }
            return $newUser;


        } catch (PDOException $error) {
            return false;
        }

    }


    public function getDataUser($userData = ""){
        $newUser = [];
        if($userData != ""){
            $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE idUsuario = :idUser");
            $query->execute(['idUser' => $userData['idUser']]);
        } else{
            $query = $this->db->connect()->prepare("SELECT * FROM usuario");
            $query->execute();

        }
        
        while ($row = $query->fetch()) {
            $item = new User();
            
            $item->idUser = $row['idUsusario'];
            $item->nom = $row['nombre'];
            $item->ape = $row['apellido'];
            $item->usr = $row['usuario'];
            $item->ema = $row['email'];
            $item->sex = $row['sexo'];
            $item->alt = $row['altura'];
            $item->peso = $row['peso'];
            $item->tipoUser = $row['tipoUser'];
            array_push($newUser,$item);
        }
        return $newUser;
    }





}


?>