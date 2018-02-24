<?php 
/**
* CREDITOS: Los metodos set y get fueron gnerados por francodacosta/sublime-php-getters-setters
*/
class Carrera 
{
	 
	private $faculty_id;
	private $faculty_name;
	private $faculty_building;
	function __construct()
	{
		
	}
	/**
     * @return mixed
     */
    public function getFacultyId()
    {
        return $this->faculty_id;
    }

    /**
     * @param mixed $faculty_id
     *
     * @return self
     */
    public function setFacultyId($faculty_id)
    {
        $this->faculty_id = $faculty_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacultyName()
    {
        return $this->faculty_name;
    }

    /**
     * @param mixed $faculty_name
     *
     * @return self
     */
    public function setFacultyName($faculty_name)
    {
        $this->faculty_name = $faculty_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacultyBuilding()
    {
        return $this->faculty_building;
    }

    /**
     * @param mixed $faculty_building
     *
     * @return self
     */
    public function setFacultyBuilding($faculty_building)
    {
        $this->faculty_building = $faculty_building;

        return $this;
    }
}



 ?>