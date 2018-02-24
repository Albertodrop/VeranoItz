<?php

require_once 'conexion.php';
require_once '../appsummer.clases/Estudiante.php';

class EstudianteDao
{

    private $con = null;
    private $pps = null;
    private $rs  = null;

    public function __construct()
    {

    }

    public function createstudents($Estudiante)
    {
        $student_privacity = '';
        $estudiante        = new Estudiante();
        $estudiante        = $Estudiante;
        $sql               = "INSERT INTO students (student_id,student_name,student_firstname,
         student_secondname,student_sex,student_telephone,student_privacity,
                 student_email,student_password,student_rol,student_facultyid_faculties,student_photo)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        try {
            self::openConection($sql);
            $this->pps->bindparam(1, $estudiante->getStudentId(), PDO::PARAM_STR);
            $this->pps->bindParam(2, $estudiante->getStudentName(), PDO::PARAM_STR);
            $this->pps->bindParam(3, $estudiante->getStudentFirstname(), PDO::PARAM_STR);
            $this->pps->bindParam(4, $estudiante->getstudentsecondname(), PDO::PARAM_STR);
            $this->pps->bindParam(5, $estudiante->getstudentsex(), PDO::PARAM_STR);
            $this->pps->bindParam(6, $estudiante->getStudentTelephone(), PDO::PARAM_STR);
            $this->pps->bindParam(7, $student_privacity, PDO::PARAM_STR);
            $this->pps->bindParam(8, $estudiante->getStudentEmail(), PDO::PARAM_STR);
            $this->pps->bindParam(9, $estudiante->getStudentPassword(), PDO::PARAM_STR);
            $this->pps->bindParam(10, $estudiante->getStudentRol(), PDO::PARAM_STR);
            $this->pps->bindParam(11, $estudiante->getStudentFacultyidfaculties(), PDO::PARAM_STR);
            $this->pps->bindParam(12, $estudiante->getStudentPhoto(), PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            self::closeConection();
        }
    }
    public function updatestudentsId($estudiante, $studentid)
    {
        $sql = "UPDATE  students SET student_name = ?,student_firstname = ?,
         student_secondname = ?,student_sex = ?,student_telephone = ?, student_privacity = ?,
                 student_email = ?,student_password = ?,student_rol = ? ,student_facultyid_faculties = ?,student_photo = ? WHERE student_id = ?";
        try {
            self::openConection($sql);

            $this->pps->bindParam(1, $estudiante->getStudentName(), PDO::PARAM_STR);
            $this->pps->bindParam(2, $estudiante->getStudentFirstname(), PDO::PARAM_STR);
            $this->pps->bindParam(3, $estudiante->getstudentsecondname(), PDO::PARAM_STR);
            $this->pps->bindParam(4, $estudiante->getstudentsex(), PDO::PARAM_STR);
            $this->pps->bindParam(5, $estudiante->getStudentTelephone(), PDO::PARAM_STR);
            $this->pps->bindParam(6, $estudiante->getStudentPrivacity(), PDO::PARAM_STR);
            $this->pps->bindParam(7, $estudiante->getStudentEmail(), PDO::PARAM_STR);
            $this->pps->bindParam(8, $estudiante->getStudentPassword(), PDO::PARAM_STR);
            $this->pps->bindParam(9, $estudiante->getStudentRol(), PDO::PARAM_STR);
            $this->pps->bindParam(10, $estudiante->getStudentFacultyidfaculties(), PDO::PARAM_STR);
            $this->pps->bindParam(11, $estudiante->getStudentPhoto(), PDO::PARAM_STR);
            $this->pps->bindparam(12, $estudiante->getStudentId(), PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            self::closeConection();
        }
    }
    public function studentEntry($Estudiante)
    {
        $estudiante = new Estudiante();
        $estudiante = $Estudiante;
        $sql        = "SELECT * FROM students WHERE student_id = ? AND student_password = ?";
        try {
            self::openConection($sql);
            $this->pps->bindparam(1, $estudiante->getStudentId(), PDO::PARAM_STR);
            $this->pps->bindParam(2, $estudiante->getStudentPassword(), PDO::PARAM_STR);
            $this->pps->execute();
            if ($this->pps->rowCount() > 0) {
                return $this->pps->fetch();

            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            self::closeConection();
        }
    }

    public function showstudents()
    {
        $sql = "SELECT * FROM students";
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
