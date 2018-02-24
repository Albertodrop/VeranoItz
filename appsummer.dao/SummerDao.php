<?php
/* CARGA DE CLASES */
require_once 'conexion.php';
require_once '../appsummer.clases/CursoVerano.php';
require_once '../appsummer.clases/RegistroVerano.php';

class SummerDao
{
    // Inicializando las variables para trabajar con la consultas
    private $con = null;
    private $pps = null;
    private $rs  = null;

    public function __construct()
    {

    }
    // Funcion que te permite crear un verano
    public function createSummers($Verano)
    {

        $sql = 'INSERT INTO summerscourses VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

        try {
            self::openConection($sql);

            $this->pps->bindParam(1, $Verano->getSummer_id(), PDO::PARAM_STR);
            $this->pps->bindParam(2, $Verano->getSummer_dateregistry(), PDO::PARAM_STR);
            $this->pps->bindParam(3, $Verano->getSummer_Available(), PDO::PARAM_BOOL);
            $this->pps->bindParam(4, $Verano->getSummer_Codesearch(), PDO::PARAM_STR);
            $this->pps->bindParam(5, $Verano->getSummer_Studentcapacity(), PDO::PARAM_INT);
            $this->pps->bindParam(6, $Verano->getSummer_Price(), PDO::PARAM_INT);
            $this->pps->bindParam(7, $Verano->getSummer_status(), PDO::PARAM_STR);
            $this->pps->bindParam(8, $Verano->getSummer_description(), PDO::PARAM_STR);
            $this->pps->bindParam(9, $Verano->getSummer_fotho(), PDO::PARAM_STR);
            $this->pps->bindParam(10, $Verano->getSummer_namecourse(), PDO::PARAM_STR);
            $this->pps->bindParam(11, $Verano->getSummer_nameteacher(), PDO::PARAM_STR);
            $this->pps->bindParam(12, $Verano->getSummer_matterid(), PDO::PARAM_STR);
            $this->pps->bindParam(13, $Verano->getSummer_starthour(), PDO::PARAM_INT);
            $this->pps->bindParam(14, $Verano->getSummer_finalhour(), PDO::PARAM_INT);
            $this->pps->bindParam(15, $Verano->getSummer_facultyid_faculties(), PDO::PARAM_STR);
            $this->pps->bindParam(16, $Verano->getSummer_studentid_students(), PDO::PARAM_STR);
            $this->pps->bindParam(17, $Verano->getSummer_contact(), PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        } finally {
            self::closeConection();
        }
    }
    // Esta funcion devuelve el codigo del verano
    public function getCodeSearch($codeseacrh)
    {
        try {
            $sql = "SELECT summer_codesearch FROM summerscourses WHERE summer_codesearch = ?";
            self::openConection($sql);
            $this->pps->bindParam(1, $codeseacrh, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    //
    public function deleteRegistry($summer_id, $student_id)
    {
        try {
            $sql = "DELETE FROM  summerregistry WHERE sr_summer_id_summers = ? AND sr_studentid_students = ?";
            self::openConection($sql);

            $this->pps->bindParam(1, $summer_id, PDO::PARAM_STR);
            $this->pps->bindParam(2, $student_id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function deleteChildrenSummer($summer_id){
        try {
            $sql = "DELETE FROM  summerregistry WHERE sr_summer_id_summers = ?";
            self::openConection($sql);

            $this->pps->bindParam(1, $summer_id, PDO::PARAM_STR);

            $this->pps->execute();
            return $this->pps->rowCount() >= 0;
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }

    } 
    public function checkCreateSummer($student_id){
        try {
            $sql = "SELECT summer_id FROM summerscourses WHERE summer_student_id_students = ? ";
            self::openConection($sql);
            $this->pps->bindParam(1, $student_id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function deleteSummer($summer_id, $student_id)
    {
        try {
            $sql = "DELETE FROM  summerscourses WHERE summer_id = ? AND summer_student_id_students = ?";
            self::openConection($sql);

            $this->pps->bindParam(1, $summer_id, PDO::PARAM_STR);
            $this->pps->bindParam(2, $student_id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function updateSummersId($verano, $student_id, $summer_id)
    {
        try {
            $sql = "UPDATE summerscourses SET summer_id = ?, summer_available = ?, summer_codesearch = ?, summer_studentcapacity = ?, summer_price = ?, summer_description = ?, summer_namecourse = ?, summer_nameteacher = ?, summer_matterid = ?, summer_starthour = ?, summer_finalhour = ?, summer_facultyid_faculties = ?, summer_contact = ? WHERE summer_id = ? AND summer_student_id_students = ? ";
            /*   " UPDATE summerscourses SET summer_id = '15091055ACF090218', summer_available = '1', summer_codesearch =  '' , summer_studentcapacity = 30, summer_price = 2000, summer_description = 'algo', summer_namecourse = 'Calculo', summer_nameteacher = 'juan', summer_matterid = 'ACF0902', summer_starthour = '8'  , summer_finalhour = '12', summer_facultyid_faculties = 'ISIC-2010-224', summer_contact = '7341008978'WHERE summer_id = '15091055ACF090218' and summer_student_id_students = '15091055';"*/
            self::openConection($sql);

            $this->pps->bindParam(1, $verano->getSummer_id(), PDO::PARAM_STR);
            $this->pps->bindParam(2, $verano->getSummer_Available(), PDO::PARAM_BOOL);
            $this->pps->bindParam(3, $verano->getSummer_Codesearch(), PDO::PARAM_STR);

            $this->pps->bindParam(4, $verano->getSummer_Studentcapacity(), PDO::PARAM_INT);
            $this->pps->bindParam(5, $verano->getSummer_Price(), PDO::PARAM_INT);
            $this->pps->bindParam(6, $verano->getSummer_description(), PDO::PARAM_STR);

            $this->pps->bindParam(7, $verano->getSummer_namecourse(), PDO::PARAM_STR);
            $this->pps->bindParam(8, $verano->getSummer_nameteacher(), PDO::PARAM_STR);
            $this->pps->bindParam(9, $verano->getSummer_matterid(), PDO::PARAM_STR);

            $this->pps->bindParam(10, $verano->getSummer_starthour(), PDO::PARAM_STR);
            $this->pps->bindParam(11, $verano->getSummer_finalhour(), PDO::PARAM_STR);
            $this->pps->bindParam(12, $verano->getSummer_facultyid_faculties(), PDO::PARAM_STR);

            $this->pps->bindParam(13, $verano->getSummer_contact(), PDO::PARAM_STR);
            $this->pps->bindParam(14, $summer_id, PDO::PARAM_STR);
            $this->pps->bindParam(15, $student_id, PDO::PARAM_STR);

            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function getSummerIdEdit($summer_id, $student_id)
    {
        try {
            $sql = "SELECT sc.*,f.faculty_name,f.faculty_id FROM  summerscourses sc JOIN
            faculties f ON sc.summer_facultyid_faculties= f.faculty_id WHERE summer_id = ? AND summer_student_id_students = ?";
            self::openConection($sql);
            $this->pps->bindParam(1, $summer_id, PDO::PARAM_STR);
            $this->pps->bindParam(2, $student_id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->fetch();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function summerSearchCode($summer_id, $summer_codesearch)
    {
        try {
            $sql = "SELECT summer_id FROM summerscourses WHERE summer_id = ? AND summer_codesearch = ?";
            self::openConection($sql);
            $this->pps->bindParam(1, $summer_id, PDO::PARAM_STR);
            $this->pps->bindParam(2, $summer_codesearch, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->fetch();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function showSummersHome($student_faculty)
    {

        try {
            $sql = "SELECT sc.*,f.faculty_name,st.student_name,st.student_firstname,st.student_secondname FROM summerscourses sc JOIN faculties f ON
             sc.summer_facultyid_faculties = faculty_id JOIN students st ON sc.summer_student_id_students = st.student_id  WHERE summer_facultyid_faculties = ?  ";
            self::openConection($sql);

            $this->pps->bindParam(1, $student_faculty, PDO::PARAM_STR);

            $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function showSummersAllHome()
    {

        try {
            $sql = "SELECT sc.*,f.faculty_name,st.student_name,st.student_firstname,st.student_secondname FROM summerscourses sc JOIN faculties f ON
             sc.summer_facultyid_faculties = faculty_id JOIN students st ON sc.summer_student_id_students = st.student_id  ";
            self::openConection($sql);
          $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }

    /**
     * @return null
     */
    public function showMySummers($student_id)
    {
        try {
            $sql = "SELECT sc.* FROM summerscourses sc JOIN summerregistry sr ON
         sc.summer_id = sr.sr_summer_id_summers WHERE sr.sr_studentid_students = ?";
            self::openConection($sql);
            $this->pps->bindParam(1, $student_id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function showSummersSeacrh($search)
    {
        try {
            $sql = "SELECT sc.*,f.faculty_name,st.student_name,st.student_firstname,st.student_secondname FROM summerscourses sc JOIN faculties f ON
             sc.summer_facultyid_faculties = f.faculty_id JOIN students st ON sc.summer_student_id_students = st.student_id WHERE sc.summer_facultyid_faculties LIKE
              '%$search%' OR f.faculty_name LIKE '%$search%' OR sc.summer_namecourse LIKE '%$search%' OR
              sc.summer_nameteacher LIKE '%$search%' OR sc.summer_codesearch LIKE '$search%'";
            self::openConection($sql);
            $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (PDOException $ex) {
            $ex - getMesagge();
        } finally {
            self::closeConection();
        }
    }
    public function getSummerId($id)
    {
        try {

            $sql = "SELECT sc.summer_id,sc.summer_available,sc.summer_namecourse,sc.summer_nameteacher,sc.summer_status,sc.summer_studentcapacity,sc.summer_price,sc.summer_dateregistry,
            sc.summer_matterid,sc.summer_starthour,sc.summer_finalhour,sc.summer_dateregistry,
            sc.summer_description,sc.summer_photo,sc.summer_contact,f.faculty_name,st.student_id,st.student_name,st.
            student_firstname FROM summerscourses sc JOIN faculties f
            ON sc.summer_facultyid_faculties = f.faculty_id JOIN students st ON
            sc.summer_student_id_students = st.student_id
             WHERE summer_id = ?";
            self::openConection($sql);
            $this->pps->bindParam(1, $id);

            $this->pps->execute();
            return $this->pps->fetch();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function showUserRegistry($student_id, $summer_id)
    {
        try {
            $sql = 'SELECT * FROM summerregistry WHERE sr_studentid_students = ? AND sr_summer_id_summers = ?';
            self::openConection($sql);
            $this->pps->bindParam(1, $student_id, PDO::PARAM_STR);
            $this->pps->bindParam(2, $summer_id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (PDOException $e) {

        } finally {
            self::closeConection();
        }
    }

    public function summerregistry($Registro)
    {
        try {
            $sql = 'INSERT INTO summerregistry VALUES(?,?,?)';
            self::openConection($sql);
            $this->pps->bindParam(1, $Registro->getSrStudentidStudents(), PDO::PARAM_STR);
            $this->pps->bindParam(2, $Registro->getSrSummerIdSummers(), PDO::PARAM_STR);
            $this->pps->bindParam(3, $Registro->getRsStatus(), PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (PDOException $e) {

        } finally {
            self::closeConection();
        }

    }
    public function getCountSummer($summer_id)
    {
        try {
            $sql = "SELECT * FROM summerregistry WHERE sr_summer_id_summers = ?";
            self::openConection($sql);
            $this->pps->bindParam(1, $summer_id);

            $this->pps->execute();
            return $this->pps->rowCount();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function showMySummersCreating($student_id)
    {
        try {
            $sql = "SELECT * FROM summerscourses WHERE summer_student_id_students = ?";
            self::openConection($sql);
            $this->pps->bindParam(1, $student_id);

            $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function getStudentSummer($summer_id)
    {
        try {
            $sql = "SELECT st.student_id,st.student_name,st.student_firstname,st.student_secondname,
            st.student_telephone,st.student_facultyid_faculties,sr.rs_status FROM students st JOIN summerregistry sr ON
            st.student_id = sr.sr_studentid_students where sr.sr_summer_id_summers = ?";
            self::openConection($sql);
            $this->pps->bindParam(1, $summer_id);

            $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    public function cambiarStatus($student_id, $summer_id, $status)
    {
        $sql = "UPDATE summerregistry SET rs_status = ? WHERE sr_studentid_students = ? AND sr_summer_id_summers = ?";
        try {
            self::openConection($sql);
            $this->pps->bindParam(1, $status, PDO::PARAM_STR);
            $this->pps->bindParam(2, $student_id, PDO::PARAM_STR);
            $this->pps->bindParam(3, $summer_id, PDO::PARAM_STR);
            $this->pps->execute();
            return $this->pps->rowCount() > 0;
        } catch (Exception $e) {

        } finally {
            self::closeConection();
        }

    }
    /**
     Se empeiza hacer los metodos para la parte administrativo
    */
     public function showSummersByFaculty($faculty_id)
    {

        try {
            $sql = "SELECT sc.*,f.faculty_name,st.student_name,st.student_firstname,st.student_secondname FROM summerscourses sc JOIN faculties f ON
             sc.summer_facultyid_faculties = faculty_id JOIN students st ON sc.summer_student_id_students = st.student_id  WHERE summer_facultyid_faculties = ?  ";
            self::openConection($sql);

            $this->pps->bindParam(1, $faculty_id, PDO::PARAM_STR);

            $this->pps->execute();
            return $this->pps->fetchAll();
        } catch (Exception $ex) {

        } finally {
            self::closeConection();
        }
    }
    // Metodo que indica el numero de estudiantes registrados a la plataforma
    public function getCountStudentAll(){
        $sql = "SELECT student_id FROM students";
        try {
            self::openConection($sql);
            $this->pps->execute();
            return $this->pps->rowCount();
        } catch (PDOException $e) {

        }finally{
            self::closeConection();
        }
    }
    public function getCountSummerAll(){
        $sql = "SELECT summer_id FROM summerscourses";
        try {
            self::openConection($sql);
            $this->pps->execute();
            return $this->pps->rowCount();
        } catch (PDOException $e) {

        }finally{
            self::closeConection();
        }
    }
     public function getCountSummerRegistryAll(){
        $sql = "SELECT sr_studentid_students FROM summerregistry";
        try {
            self::openConection($sql);
            $this->pps->execute();
            return $this->pps->rowCount();
        } catch (PDOException $e) {

        }finally{
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
