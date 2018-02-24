<?php 

require_once 'conexion.php';
/**
* 
*/
class ProfesorDao
{
	private $con = null;
    private $pps = null;
    private $rs  = null;

	
	function __construct()
	{
		# code...
	}
	public function teacherEntry($profesor){
		$sql = "SELECT * FROM teachers WHERE teacher_id = ? AND teacher_password = ?";
		try {
			self::openConection($sql);
			$this->pps->bindParam(1,$profesor->getTeacherId(),PDO::PARAM_STR);
			$this->pps->bindParam(2,$profesor->getTeacherPassword(),PDO::PARAM_STR);
			$this->pps->execute();
			if ($this->pps->rowCount() > 0) {
                return $this->pps->fetch();
			  }

		} catch (PDOException $e) {
			$e->getMesagge();
		}finally{
            self::closeConection();
        }
	}






	/*funciones para poder establecen una conexion y cerrar la base de datos*/
	private function openConection($sql)
    {
        try {
            $this->con = new Conexion();
            $this->pps = $this->con->conectar();
            $this->pps = $this->pps->prepare($sql);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    private function closeConection()
    {

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

