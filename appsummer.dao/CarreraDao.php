<?php 
 
	require_once 'conexion.php';
    require_once '../appsummer.clases/Carrera.php';
	class CarreraDao 
	{
		
		private $con = null;
		private $pps = null;
		private $rs = null;
 
 		function __construct()
 		{
 		 
 		}
 		 public function createfaculties($Carrera){
            $carrera = new Carrera();
            $carrera = $Carrera;
 		 	  $sql = "INSERT INTO faculties (faculty_id,faculty_name,faculty_building) VALUES(?,?,?)";
 		 	try{
 		 	   self::openConection($sql);
			   $this->pps->bindparam(1,$carrera->getFacultyId(),PDO::PARAM_STR);
			   $this->pps->bindparam(2,$carrera->getFacultyName(),PDO::PARAM_STR);
			   $this->pps->bindparam(3,$carrera->getFacultyBuilding(),PDO::PARAM_STR);
			   $this->pps->execute();
			  	return $this->pps->rowCount()>0;
			   
		  	}
 		 catch(PDOException $e){
		   echo $e->getMessage(); 
		   return false;
		 }finally{
		 	self::closeConection();
		 }
  
 	}
    public function showfaculties(){
              $sql = "SELECT * FROM faculties";
            try{
                self::openConection($sql);
               $this->pps->execute();
                return $this->pps->fetchAll();
               
            }
         catch(PDOException $e){
           echo $e->getMessage(); 
           return false;
         }finally{
            self::closeConection();
         }
  
    }
     public function showfacultiesId($id){
              $sql = "SELECT * FROM faculties WHERE faculty_id = ? ";
            try{
                self::openConection($sql);
                $this->pps->bindParam(1,$id,PDO::PARAM_STR);
               $this->pps->execute();
                return $this->pps->fetch();
               
            }
         catch(PDOException $e){
           echo $e->getMessage(); 
           return false;
         }finally{
            self::closeConection();
         }
  
    }
      public function deletefacultiesId($id){
              $sql = "DELETE FROM faculties WHERE faculty_id = ? ";
            try{
                self::openConection($sql);
                $this->pps->bindParam(1,$id,PDO::PARAM_STR);
               $this->pps->execute();
                return $this->pps->fetchAll();
               
            }
         catch(PDOException $e){
           echo $e->getMessage(); 
           return false;
         }finally{
            self::closeConection();
         }
  
    }
     public function updatefacultiesId($Carrera,$id){
              $sql = "UPDATE faculties SET faculty_id = ? , faculty_name = ? , faculty_building = ? WHERE faculty_id = ? ";
            $carrera = new Carrera();
            $carrera = $Carrera;
            try{
                self::openConection($sql);
                $this->pps->bindParam(1,$carrera->getFacultyId(),PDO::PARAM_STR);
                $this->pps->bindParam(2,$carrera->getFacultyName(),PDO::PARAM_STR);
                $this->pps->bindParam(3,$carrera->getFacultyBuilding(),PDO::PARAM_STR);
                 $this->pps->bindParam(4,$id,PDO::PARAM_STR);
               $this->pps->execute();
                return $this->pps->fetchAll();
               
            }
         catch(PDOException $e){
           echo $e->getMessage(); 
           return false;
         }finally{
            self::closeConection();
         }
  
    }
    

     private function openConection($sql) {
        try {
            $this->con = new Conexion();
            $this->pps =  $this->con->conectar();
            $this->pps =  $this->pps->prepare($sql);
        } catch (PDOException $ex) {
          echo $ex->getMessage();
        }
    }

     private function closeConection() {

        try {
            if ($this->rs != null) {
                $this->rs=null;

            }
            if ($this->pps != null) {
                $this->pps=null;
            }  
            if ($this->con != null) {
                $this->con=null;
                
            }

        } catch (PDOException $ex) {
          echo $ex->getMessage();
        }

    }

}










 ?>