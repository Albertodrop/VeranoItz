<?php 
	/**
	* 
	*/
	class RegistroVerano
	{
		private $sr_studentid_students;
		private $sr_summer_id_summers;
		private $rs_status;
		function __construct()
		{
			# code...
		}


	
    /**
     * @return mixed
     */
    public function getSrStudentidStudents()
    {
        return $this->sr_studentid_students;
    }

    /**
     * @param mixed $sr_studentid_students
     *
     * @return self
     */
    public function setSrStudentidStudents($sr_studentid_students)
    {
        $this->sr_studentid_students = $sr_studentid_students;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSrSummerIdSummers()
    {
        return $this->sr_summer_id_summers;
    }

    /**
     * @param mixed $sr_summer_id_summers
     *
     * @return self
     */
    public function setSrSummerIdSummers($sr_summer_id_summers)
    {
        $this->sr_summer_id_summers = $sr_summer_id_summers;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRsStatus()
    {
        return $this->rs_status;
    }

    /**
     * @param mixed $rs_status
     *
     * @return self
     */
    public function setRsStatus($rs_status)
    {
        $this->rs_status = $rs_status;

        return $this;
    }
}


 ?>