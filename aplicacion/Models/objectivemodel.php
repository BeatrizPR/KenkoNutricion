<?php
include_once 'Models/objectivetotal.php';
include_once 'Models/goal.php';
class objectiveModel extends Model
{
    public function __contruct()
    {
        parent::__contruct();
    }

    // GET TOTAL OF OBJECTIVES
    public function getAll()
    {
        $objective = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM objetivo order by nombreObj");
            while ($row = $query->fetch()) {
                $item = new ObjectiveTotal();
                $item->idObj = $row['idObj'];
                $item->nombreObj = $row['nombreObj'];
                array_push($objective, $item);
            }
            return $objective;
        } catch (PDOException $error) {
            return [];
        }
    }


    // GET PERSONEL GOAL ACHIEVE

    public function getAllObjecPersonel($idUser)
    {
        $idUser = $_SESSION['idUser'];
        $goal = [];
        try {
            $query = $this->db->connect()->prepare("SELECT DISTINCT * FROM objetivo_personal op INNER JOIN objetivo o ON op.idObj = o.idObj WHERE idUsuario = :idUser AND cumplido='si' order by fecha Limit 0 , 100 ");
            $query->execute(['idUser' => $idUser]);
            while ($row = $query->fetch()) {
                $item = new Goal();
                $item->idObjPersonal = $row['idObjPersonal'];
                $item->fecha = $row['fecha'];
                $item->cumplido = $row['cumplido'];
                $item->nombreObj = $row['nombreObj'];
                $item->idUsuario = $row['idUsuario'];
                $item->idObj = $row['idObj'];
                array_push($goal, $item);
            }

            return $goal;
        } catch (PDOException $error) {
            return [];
        }
    }

    public function getObjectAchieve($idUser)
    {
        $idUser = $_SESSION['idUser'];
        $goalAchieve = [];
        try {
            $query = $this->db->connect()->prepare("SELECT DISTINCT nombreObj, o.idObj FROM objetivo_personal op INNER JOIN objetivo o ON op.idObj = o.idObj WHERE idUsuario = :idUser AND cumplido='si' GROUP BY nombreObj");
            $query->execute(['idUser' => $idUser]);
            while ($row = $query->fetch()) {
                $item = new Goal();
                $item->nombreObj = $row['nombreObj'];
                $item->idObj = $row['idObj'];
                array_push($goalAchieve, $item);
            }

            return $goalAchieve;
        } catch (PDOException $error) {
            return [];
        }
    }

    // consulta para sacar objetivos en un año y generar el chart de barras
    public function getObjectChart($dataChart)
    {
        $data=[];
        
        try {
            
            $query = $this->db->connect()->prepare("SELECT DATE_FORMAT(fecha, '%M') as 'mes', COUNT(idObj) as 'total' FROM `objetivo_personal` WHERE YEAR(fecha) = :yearChart  AND idUsuario = :idUser AND idObj = :idObjChart AND cumplido='si' GROUP BY MONTH(fecha)");
            $query->execute([ 'yearChart'=>$dataChart['year'], 'idObjChart'=>$dataChart['goal'], 'idUser' => $dataChart['idUs']]);


            while($row = $query->fetchObject()){

                $array[] = $row;
                $data = (array) $array;
            }

           
            return $data;
        } catch (PDOException $error) {
            return [];
        }
    }

    // consulta para sacar objetivos en un año y generar el chart de quesitos
    public function getTotalObjectChart($dataChart)
    {
        $data=[];
        
        try {
           
            $query = $this->db->connect()->prepare("SELECT nombreObj as totalObj, COUNT(objper.idObj) as total FROM objetivo_personal objper INNER JOIN objetivo ob ON objper.idObj = ob.idObj WHERE YEAR(fecha) = :yearChart  AND idUsuario = :idUser AND MONTH(fecha) = :monthT  AND cumplido='si' GROUP BY nombreObj");
            $query->execute([ 'yearChart'=>$dataChart['year'], 'idUser' => $dataChart['idUs'], 'monthT' => $dataChart['month']]);
            
            while($row = $query->fetchObject()){
                //var_dump($row);
                $array[] = $row;
                $data = (array) $array;
            }
            return $data;
        } catch (PDOException $error) {
            return [];
        }
    }

    public function insertPersonGoal($data)
    {

        try {
            $query = $this->db->connect()->prepare("INSERT INTO objetivo_personal (fecha, cumplido, idObj, idUsuario) VALUES (:fecha, :cumplido, :idObj, :idUsuario)");
            $query->execute(['fecha' => $data['fecha'], 'cumplido' => $data['cumplido'], 'idObj' => $data['idObj'], 'idUsuario' => $data['idUsuario']]);

            return true;
        } catch (PDOException $error) {

            return false;
        }
    }
    
    public function deleteObjetiveGoal($data)
    {
        $query = $this->db->connect()->prepare("DELETE FROM objetivo_personal WHERE idObjPersonal = :idObjPersonal");
        try {
            $query->execute(['idObjPersonal' => $data['idObjPersonal']]);
            return true;
        } catch (PDOException $error) {
            return false;
        }
    }
}
