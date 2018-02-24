-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dbitz_summer
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbitz_summer
-- -----------------------------------------------------


CREATE SCHEMA IF NOT EXISTS `dbitz_summer` DEFAULT CHARACTER SET utf8 ;
USE `dbitz_summer` ;

-- -----------------------------------------------------
-- Table `dbitz_summer`.`faculties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbitz_summer`.`faculties` (
  `faculty_id` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `faculty_name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `faculty_building` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  PRIMARY KEY (`faculty_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `dbitz_summer`.`students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbitz_summer`.`students` (
  `student_id` VARCHAR(8) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `student_name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `student_firstname` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `student_secondname` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `student_sex` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `student_telephone` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `student_privacity` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `student_email` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `student_password` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `student_rol` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `student_facultyid_faculties` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `student_photo` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  PRIMARY KEY (`student_id`),
  INDEX `pk_student_facultyid_faculties` (`student_facultyid_faculties` ASC),
  CONSTRAINT `pk_student_facultyid_faculties`
    FOREIGN KEY (`student_facultyid_faculties`)
    REFERENCES `dbitz_summer`.`faculties` (`faculty_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `dbitz_summer`.`summerscourses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbitz_summer`.`summerscourses` (
  `summer_id` VARCHAR(18) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `summer_dateregistry` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `summer_available` VARCHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `summer_codesearch` VARCHAR(6) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `summer_studentcapacity` INT(11) NOT NULL,
  `summer_price` FLOAT NULL DEFAULT NULL,
  `summer_status` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `summer_description` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `summer_photo` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `summer_namecourse` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `summer_nameteacher` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `summer_matterid` VARCHAR(7) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `summer_starthour` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `summer_finalhour` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `summer_facultyid_faculties` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `summer_student_id_students` VARCHAR(8) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `summer_contact` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`summer_id`),
  INDEX `fk_sc_facultyid_faculties` (`summer_facultyid_faculties` ASC),
  INDEX `fk_sc_student_id_students` (`summer_student_id_students` ASC),
  CONSTRAINT `fk_sc_facultyid_faculties`
    FOREIGN KEY (`summer_facultyid_faculties`)
    REFERENCES `dbitz_summer`.`faculties` (`faculty_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_sc_student_id_students`
    FOREIGN KEY (`summer_student_id_students`)
    REFERENCES `dbitz_summer`.`students` (`student_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `dbitz_summer`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbitz_summer`.`comments` (
  `comments_id` INT(11) NOT NULL AUTO_INCREMENT,
  `summer_id` VARCHAR(13) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `comments_nameusuario` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `comments_message` VARCHAR(130) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `comments_date` DATE NULL DEFAULT NULL,
  `comments_summer_id_summerscourses` VARCHAR(17) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`comments_id`),
  INDEX `fk_comments_summer_id` (`comments_summer_id_summerscourses` ASC),
  CONSTRAINT `fk_comments_summer_id`
    FOREIGN KEY (`comments_summer_id_summerscourses`)
    REFERENCES `dbitz_summer`.`summerscourses` (`summer_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `dbitz_summer`.`departaments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbitz_summer`.`departaments` (
  `departament_id` VARCHAR(7) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `departament_name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  PRIMARY KEY (`departament_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `dbitz_summer`.`summerregistry`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbitz_summer`.`summerregistry` (
  `sr_studentid_students` VARCHAR(8) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `sr_summer_id_summers` VARCHAR(17) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `rs_status` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`sr_summer_id_summers`, `sr_studentid_students`),
  INDEX `fk_sr_studentid_students` (`sr_studentid_students` ASC),
  CONSTRAINT `fk_sr_studentid_students`
    FOREIGN KEY (`sr_studentid_students`)
    REFERENCES `dbitz_summer`.`students` (`student_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_sr_summer_id_summers`
    FOREIGN KEY (`sr_summer_id_summers`)
    REFERENCES `dbitz_summer`.`summerscourses` (`summer_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `dbitz_summer`.`teachers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbitz_summer`.`teachers` (
  `teacher_id` VARCHAR(8) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `teacher_name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `teacher_firstname` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `teacher_secondname` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `teacher_sex` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `teacher_telephone` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `teacher_image` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `teacher_email` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `teacher_password` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `teacher_departamentid_departaments` VARCHAR(7) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`teacher_id`),
  INDEX `pk_teacher_departamentid_departaments` (`teacher_departamentid_departaments` ASC),
  CONSTRAINT `pk_teacher_departamentid_departaments`
    FOREIGN KEY (`teacher_departamentid_departaments`)
    REFERENCES `dbitz_summer`.`departaments` (`departament_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

