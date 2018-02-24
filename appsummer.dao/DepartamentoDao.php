<?php

require_once 'conexion.php';
require_once '../appsummer.clases/Departamento.php';

class DepartamentoDao {

    private $con = null;
    private $pps = null;
    private $rs = null;

    function __construct() {
        
    }

    /* CHACAR ESTO */

    public function createDepartaments($Departamento) {
        $sql = "INSERT INTO departaments (departament_id,departament_name) VALUES(?,?)";
        try {
            self::openConection($sql);
            $this->pps->bindparam(1, $Departamento->getDepartamentId(), PDO::PARAM_STR);
            $this->pps->bindparam(2, $Departamento->getDepartamentName(), PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        } finally {
            self::closeConection();
        }
    }

    public function showDepartaments() {
        $sql = "SELECT * FROM departaments";
        try {
            self::openConection($sql);
            $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            self::closeConection();
        }
    }

    public function showDepartamentsId($id) {
        $sql = "SELECT * FROM departaments WHERE departament_id = ? ";
        try {
            self::openConection($sql);
            $this->pps->bindParam(1, $id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            self::closeConection();
        }
    }

    public function deleteDepartamentsId($id) {
        $sql = "DELETE FROM departaments WHERE departament_id = ? ";
        try {
            self::openConection($sql);
            $this->pps->bindParam(1, $id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            self::closeConection();
        }
    }

    public function updateDepartamentsId($Departamento, $id) {
        $sql = "UPDATE departaments SET departament_id = ? , departament_name = ? WHERE departament_id = ? ";
        try {
            self::openConection($sql);
            $this->pps->bindParam(1, $Departamento->getDepartamentId());
            $this->pps->bindParam(2, $Departamento->getDepartamentName());
            $this->pps->bindParam(3, $id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "hola";
            return false;
        } finally {
            self::closeConection();
        }
    }

    private function openConection($sql) {
        try {
            $this->con = new Conexion();
            $this->pps = $this->con->conectar();
            $this->pps = $this->pps->prepare($sql);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    private function closeConection() {

        try {
            if ($this->rs != null) {
                $this->rs = null;
            }
            if ($this->pps != null) {
                $this->pps = null;
            }
            if ($this->con != null) {
                $this->con = null;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

}

?>
