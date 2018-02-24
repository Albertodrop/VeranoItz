<?php 
	/**
	* 
	*/
	class Departamento 
	{
		private $departament_id;
		private $departament_name;
		
		function __construct()
		{
			# code...
		}
		

	
    /**
     * @return mixed
     */
    public function getDepartamentId()
    {
        return $this->departament_id;
    }

    /**
     * @param mixed $departament_id
     *
     * @return self
     */
    public function setDepartamentId($departament_id)
    {
        $this->departament_id = $departament_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDepartamentName()
    {
        return $this->departament_name;
    }

    /**
     * @param mixed $departament_name
     *
     * @return self
     */
    public function setDepartamentName($departament_name)
    {
        $this->departament_name = $departament_name;

        return $this;
    }
}


 ?>