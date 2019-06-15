<?php

class RegisterModel extends Model{

    public function __contruct(){
        parent::__contruct();
    }

    public function checkUserExist($userLogin){

        try {
            $query = $this->db->connect()->prepare("SELECT usuario FROM usuario WHERE usuario = :usuario OR email = :email");
            $query->execute(['usuario' => $userLogin['usr'], 'email' => $userLogin['ema']]);
            $result = $query->fetch();
            if($result){
                return true;
            } else{
                return false;
            }
            //return true;
        } catch (PDOException $error) {
            return false;
        }

    }

    public function insertUser($userRegister){
        try {
            $query = $this->db->connect()->prepare("INSERT INTO usuario (usuario,password,email,nombre,apellidos, sexo, altura, peso) VALUES
             		 	    (:usr,:pwd,:ema,:nom,:ape,:sex, :alt, :peso)");
            $query->execute(['usr' => $userRegister['usr'], 'pwd' => $userRegister['pwd'], 'ema' => $userRegister['ema'], 'nom' => $userRegister['nom'],
                            'ape' => $userRegister['ape'], 'sex' => $userRegister['sex'], 'alt' => $userRegister['alt'], 'peso'=> $userRegister['peso'] ]);
            return true;
        } catch (PDOException $error) {
            return false;
        }
        
    }





}


?>