<?php
include_once 'Models/user.php';

class UserpageModel extends Model{

    public function __contruct(){
        parent::__contruct();
    }

    public function getDataUser($id = ""){

        $newUser = new User();

        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE usuario = :id");

        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
                $newUser->idUser = $row['idUsusario'];
                $newUser->nom = $row['nombre'];
                $newUser->ape = $row['apellido'];
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

    public function insertUser($data)
    {
        try {

            $query = $this->db->connect()->prepare('INSERT INTO usuario (usuario,password,email,nombre,apellidos, sexo, altura, peso, tipoUser) VALUES (:usr,:pwd,:ema,:nom,:ape,:sex, :alt, :peso, :tipoUser)');

            $query->execute([
                'usr' => $data['usr'], 'pwd' => $data['pwd'], 'ema' => $data['ema'], 'nom' => $data['nom'],
                'ape' => $data['ape'], 'sex' => $data['sex'], 'alt' => $data['alt'], 'peso'=> $data['peso'], 'tipoUser' => $data['tipoUser']
            ]);

            return true;
        } catch (PDOException $error) {

            return false;
        }
    }

    public function updateUser($userRegister)
    {
        $query = $this->db->connect()->prepare("UPDATE usuario SET usuario = :usr, nombre = :nom, apellidos = :ape, email = :ema, sexo = :sex, altura = :alt, peso = :peso, tipoUser = :tipoUser WHERE idUsuario = :idUser");
        try {
            $query->execute([
                'usr' => $userRegister['usr'], 'ema' => $userRegister['ema'], 'nom' => $userRegister['nombre'],
                'ape' => $userRegister['ape'], 'sex' => $userRegister['sex'], 'alt' => $userRegister['alt'], 'peso'=> $userRegister['peso'], 'tipoUser' => $userRegister['tipoUser'], 'idUser' => $userRegister['idUser']
            ]);
            return true;
        } catch (PDOException $error) {
            return false;
        }
    }


    public function deleteUser($id)
    {
        // el id del usuario es una clave foranea en la lista de recetas y en objetivos personales
        // elimino todos los elementos de la lista de recetas del usuario que quiero eliminar
        $queryRecipeList = $this->db->connect()->prepare("DELETE FROM `lista_recetas` WHERE `idUsuario` = :id");
        try {
            $queryRecipeList->execute(['id' => $id]);
            // elimino todos los elementos de la lista de recetas del usuario que quiero eliminar
            $queryObjective = $this->db->connect()->prepare("DELETE FROM `objetivo_personal` WHERE `idUsuario` = :id");
            $queryObjective->execute(['id' => $id]);
            // una vez eliminada la lista, borramos al usuario
            $delete =  $this->db->connect()->prepare("DELETE FROM `usuario` WHERE `idUsuario` = :id");
            $delete->execute(['id' => $id]);
            return true;
        } catch (PDOException $error) {
            return false;
        }
    }







}


?>