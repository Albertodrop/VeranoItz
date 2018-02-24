<?php 
	/**
	* 
	*/
	class Estudiante
	{
		private $student_id;
		private $student_name;
		private $student_firstname;
		private $student_secondname;
		private $student_sex;
		private $student_telephone;
		private $student_image;
		private $student_email;
		private $student_password;
		private $student_rol;
		private $student_facultyid_faculties;
		private $student_photo;
		private $student_privacity;
		function __construct()
		{
			# code...
		}
		
	
    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     *
     * @return self
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentName()
    {
        return $this->student_name;
    }

    /**
     * @param mixed $student_name
     *
     * @return self
     */
    public function setStudentName($student_name)
    {
        $this->student_name = $student_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentFirstname()
    {
        return $this->student_firstname;
    }

    /**
     * @param mixed $student_firstname
     *
     * @return self
     */
    public function setStudentFirstname($student_firstname)
    {
        $this->student_firstname = $student_firstname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentSecondname()
    {
        return $this->student_secondname;
    }

    /**
     * @param mixed $student_secondname
     *
     * @return self
     */
    public function setStudentSecondname($student_secondname)
    {
        $this->student_secondname = $student_secondname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentSex()
    {
        return $this->student_sex;
    }

    /**
     * @param mixed $student_sex
     *
     * @return self
     */
    public function setStudentSex($student_sex)
    {
        $this->student_sex = $student_sex;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentTelephone()
    {
        return $this->student_telephone;
    }

    /**
     * @param mixed $student_telephone
     *
     * @return self
     */
    public function setStudentTelephone($student_telephone)
    {
        $this->student_telephone = $student_telephone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentImage()
    {
        return $this->student_image;
    }

    /**
     * @param mixed $student_image
     *
     * @return self
     */
    public function setStudentImage($student_image)
    {
        $this->student_image = $student_image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentEmail()
    {
        return $this->student_email;
    }

    /**
     * @param mixed $student_email
     *
     * @return self
     */
    public function setStudentEmail($student_email)
    {
        $this->student_email = $student_email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentPassword()
    {
        return $this->student_password;
    }

    /**
     * @param mixed $student_password
     *
     * @return self
     */
    public function setStudentPassword($student_password)
    {
        $this->student_password = $student_password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentRol()
    {
        return $this->student_rol;
    }

    /**
     * @param mixed $student_rol
     *
     * @return self
     */
    public function setStudentRol($student_rol)
    {
        $this->student_rol = $student_rol;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudentFacultyidFaculties()
    {
        return $this->student_facultyid_faculties;
    }

    /**
     * @param mixed $student_facultyid_faculties
     *
     * @return self
     */
    public function setStudentFacultyidFaculties($student_facultyid_faculties)
    {
        $this->student_facultyid_faculties = $student_facultyid_faculties;

        return $this;
    }

        /**
         * @return mixed
         */
        public function getStudentPhoto()
        {
            return $this->student_photo;
        }

        /**
         * @param mixed $student_photo
         */
        public function setStudentPhoto($student_photo)
        {
            $this->student_photo = $student_photo;
        }

        /**
         * @return mixed
         */
        public function getStudentPrivacity()
        {
            return $this->student_privacity;
        }

        /**
         * @param mixed $student_privacity
         */
        public function setStudentPrivacity($student_privacity)
        {
            $this->student_privacity = $student_privacity;
        }

}

 ?>