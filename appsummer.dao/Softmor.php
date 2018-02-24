<?php 
		
	

	class Softmor
	{
		private $con = null;
		private $pps = null;
		private $rs = null;	
		function __construct()
		{
			
		}
		public function issetSoft($tableName,$attribName,$valor){
			 $sql = "SELECT * FROM $tableName WHERE $attribName = ? ";
 		 	try{
 		 	    self::openConection($sql);
			   $this->pps->bindparam(1,$valor,PDO::PARAM_STR);
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