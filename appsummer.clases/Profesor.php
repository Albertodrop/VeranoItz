<?php 
	/**
	* 
	*/
	class Profesor
	{
		private $teacher_id;
		private $teacher_name;
		private $teacher_firstname;
		private $teacher_secondname;
		private $teacher_sex;
		private $teacher_telephone;
		private $teacher_image;
		private $teacher_email;
		private $teacher_password;
		private $teacher_departamentid_departaments;
		
		function __construct()
		{
			# code...
		}
		
	
    /**
     * @return mixed
     */
    public function getTeacherId()
    {
        return $this->teacher_id;
    }

    /**
     * @param mixed $teacher_id
     *
     * @return self
     */
    public function setTeacherId($teacher_id)
    {
        $this->teacher_id = $teacher_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherName()
    {
        return $this->teacher_name;
    }

    /**
     * @param mixed $teacher_name
     *
     * @return self
     */
    public function setTeacherName($teacher_name)
    {
        $this->teacher_name = $teacher_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherFirstname()
    {
        return $this->teacher_firstname;
    }

    /**
     * @param mixed $teacher_firstname
     *
     * @return self
     */
    public function setTeacherFirstname($teacher_firstname)
    {
        $this->teacher_firstname = $teacher_firstname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherSecondname()
    {
        return $this->teacher_secondname;
    }

    /**
     * @param mixed $teacher_secondname
     *
     * @return self
     */
    public function setTeacherSecondname($teacher_secondname)
    {
        $this->teacher_secondname = $teacher_secondname;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherSex()
    {
        return $this->teacher_sex;
    }

    /**
     * @param mixed $teacher_sex
     *
     * @return self
     */
    public function setTeacherSex($teacher_sex)
    {
        $this->teacher_sex = $teacher_sex;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherTelephone()
    {
        return $this->teacher_telephone;
    }

    /**
     * @param mixed $teacher_telephone
     *
     * @return self
     */
    public function setTeacherTelephone($teacher_telephone)
    {
        $this->teacher_telephone = $teacher_telephone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherImage()
    {
        return $this->teacher_image;
    }

    /**
     * @param mixed $teacher_image
     *
     * @return self
     */
    public function setTeacherImage($teacher_image)
    {
        $this->teacher_image = $teacher_image;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherEmail()
    {
        return $this->teacher_email;
    }

    /**
     * @param mixed $teacher_email
     *
     * @return self
     */
    public function setTeacherEmail($teacher_email)
    {
        $this->teacher_email = $teacher_email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherPassword()
    {
        return $this->teacher_password;
    }

    /**
     * @param mixed $teacher_password
     *
     * @return self
     */
    public function setTeacherPassword($teacher_password)
    {
        $this->teacher_password = $teacher_password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTeacherDepartamentidDepartaments()
    {
        return $this->teacher_departamentid_departaments;
    }

    /**
     * @param mixed $teacher_departamentid_departaments
     *
     * @return self
     */
    public function setTeacherDepartamentidDepartaments($teacher_departamentid_departaments)
    {
        $this->teacher_departamentid_departaments = $teacher_departamentid_departaments;

        return $this;
    }
}

 ?>