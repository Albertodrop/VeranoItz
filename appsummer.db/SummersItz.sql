CREATE DATABASE IF NOT EXISTS SummerItz;

    /*USAR LA BASE DE DATOS */
    USE SummerItz;

    /*CREAR LAS TABLAS INDEPENDIENTES*/

    CREATE TABLE IF NOT EXISTS Faculties( 	/*<= Carreras */
    	faculty_id VARCHAR(13),
    	faculty_name VARCHAR(50) NOT NULL,
    	faculty_building VARCHAR(2) NOT NULL
    	);
    ALTER TABLE Faculties ADD CONSTRAINT pk_faculty_id_faculties PRIMARY KEY (faculty_id);



    CREATE TABLE IF NOT EXISTS departaments(
    	departament_id VARCHAR(7),
    	departament_name VARCHAR(50) NOT NULL
    	);
    ALTER TABLE departaments ADD CONSTRAINT pk_departament_id_departaments PRIMARY KEY (departament_id);


    /*CREATE TABLE IF NOT EXISTS Shedules( PENDIENTE
    	shedule_id INT AUTO_INCREMENT, 
    	shedule_starthour VARCHAR(2),
    	shedule_finalhour VARCHAR(2),
    	shedule_day VARCHAR(37),
    	shedule_turn VARCHAR(10),
    	);*/

    /*CREAR LAS TABLAS DEPENDIENTES*/

    CREATE TABLE IF NOT EXISTS teachers(
    	teacher_id 	VARCHAR(8),	/*Investigar un ejemplo de clave para los profesores*/
    	teacher_name VARCHAR(50) NOT NULL,
    	teacher_firstname VARCHAR(50) NOT NULL,
    	teacher_secondname VARCHAR(50) NOT NULL,
    	teacher_sex VARCHAR(10) NOT NULL,
    	teacher_telephone VARCHAR(10),
    	teacher_image VARCHAR(50),
    	teacher_email VARCHAR(100),
    	teacher_password VARCHAR(250) NOT NULL,
    	teacher_departamentid_departaments VARCHAR(7)
    	);
    ALTER TABLE teachers ADD CONSTRAINT pk_teacher_id_teachers PRIMARY KEY (teacher_id);

    ALTER TABLE teachers ADD CONSTRAINT pk_teacher_departamentid_departaments
    FOREIGN KEY (teacher_departamentid_departaments) REFERENCES departaments (departament_id)
  	ON UPDATE CASCADE ON DELETE CASCADE;

    CREATE TABLE IF NOT EXISTS students(
    	student_id 	VARCHAR(8),
    	student_name VARCHAR(50) NOT NULL,
    	student_firstname VARCHAR(50) NOT NULL,
    	student_secondname VARCHAR(50) NOT NULL,
    	student_sex VARCHAR(10) NOT NULL,
    	student_telephone VARCHAR(10),
    	student_image VARCHAR(50),
    	student_email VARCHAR(100),
    	student_password VARCHAR(250) NOT NULL,
    	student_rol VARCHAR(20),
    	student_facultyid_faculties VARCHAR(13)
    );
    ALTER TABLE students ADD CONSTRAINT pk_students_id_students PRIMARY KEY (student_id);

    ALTER TABLE students ADD CONSTRAINT pk_student_facultyid_faculties 
    FOREIGN KEY (student_facultyid_faculties ) REFERENCES Faculties (faculty_id)
  	ON UPDATE CASCADE ON DELETE CASCADE;
   /* CREATE TABLE IF NOT EXISTS Courses(
    	course_id
    	course_name


    	);
 */

 CREATE TABLE IF NOT EXISTS summerscourses(
 	summer_id VARCHAR(18),
 	summer_dateregistry VARCHAR(10),  
 	summer_available INT,
 	summer_codesearch VARCHAR(6),
 	summer_studentcapacity INT NOT NULL,
 	summer_price FLOAT,
 	summer_status VARCHAR(10),
 	summer_description VARCHAR(100),
    summer_photo VARCHAR(100),
 	summer_namecourse VARCHAR(50) NOT NULL,
    summer_nameteacher VARCHAR(50) NOT NULL,
 	summer_matterid VARCHAR(7) NOT NULL,
 	summer_starthour INT NOT NULL,
    summer_finalhour INT NOT NULL,
    summer_facultyid_faculties VARCHAR(13),
    summer_student_id_students VARCHAR(8)																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																					
 	);
ALTER TABLE summerscourses ADD CONSTRAINT fk_sc_facultyid_faculties FOREIGN KEY (summer_facultyid_faculties) REFERENCES Faculties (faculty_id)
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE summerscourses ADD CONSTRAINT fk_sc_student_id_students FOREIGN KEY (summer_student_id_students) REFERENCES students (student_id)
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE summerscourses ADD CONSTRAINT pk_sc_facultyid_faculties  PRIMARY KEY (summer_id);





 CREATE TABLE IF NOT EXISTS summerregistry(
 	sr_studentid_students VARCHAR(8),
 	sr_summer_id_summers VARCHAR(17),
 	rs_status VARCHAR(10),
 	PRIMARY KEY (sr_summer_id_summers,sr_studentid_students)
 	);
 /*ALTER TABLE summerregistry ADD CONSTRAINT pk_sr_id_summerregistry 
 	PRIMARY KEY (sr_summer_id_summers,sr_studentid_students);*/

ALTER TABLE summerregistry ADD CONSTRAINT fk_sr_summer_id_summers
    FOREIGN KEY (sr_summer_id_summers) REFERENCES summerscourses (summer_id)
  	ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE summerregistry ADD CONSTRAINT fk_sr_studentid_students 
    FOREIGN KEY (sr_studentid_students) REFERENCES students (student_id)
  	ON UPDATE CASCADE ON DELETE CASCADE; 	


 CREATE TABLE IF NOT EXISTS comments(
 	comments_id INT AUTO_INCREMENT,
 	summer_id VARCHAR(13),
 	comments_nameusuario VARCHAR(30),
 	comments_message VARCHAR(130),
 	comments_date DATE,
 	comments_summer_id_summerscourses VARCHAR(17),
 	PRIMARY KEY(comments_id)
 	);
ALTER TABLE comments ADD CONSTRAINT fk_comments_summer_id
    FOREIGN KEY (comments_summer_id_summerscourses) REFERENCES summerscourses (summer_id)
  	ON UPDATE CASCADE ON DELETE CASCADE;

SELECT st.student_id,st.student_name,st.student_firstname,st.student_secondname,
st.student_telephone,st.student_facultyid_faculties FROM students st JOIN summerregistry sr ON
st.student_id = sr.sr_studentid_students where sr.sr_summer_id_summers = '15091055ACA091018';


SELECT sc.* FROM summerscourses sc JOIN summerregistry sr ON
		 sc.summer_id = sr.sr_summer_id_summers WHERE sr.sr_studentid_students = '15091055';



          ALTER TABLE teachers ADD CONSTRAINT pk_teacher_departamentid_departaments
    FOREIGN KEY (teacher_departamentid_departaments) REFERENCES departaments (departament_id)
    ON UPDATE CASCADE ON DELETE CASCADE;

    ALTER TABLE students ADD CONSTRAINT pk_student_facultyid_faculties 
    FOREIGN KEY (student_facultyid_faculties ) REFERENCES Faculties (faculty_id)
    ON UPDATE CASCADE ON DELETE CASCADE;

    ALTER TABLE summerscourses ADD CONSTRAINT fk_sc_facultyid_faculties FOREIGN KEY (summer_facultyid_faculties) REFERENCES Faculties (faculty_id)
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE summerscourses ADD CONSTRAINT fk_sc_student_id_students FOREIGN KEY (summer_student_id_students) REFERENCES students (student_id)
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE summerregistry ADD CONSTRAINT fk_sr_summer_id_summers
    FOREIGN KEY (sr_summer_id_summers) REFERENCES summerscourses (summer_id)
    ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE summerregistry ADD CONSTRAINT fk_sr_studentid_students 
    FOREIGN KEY (sr_studentid_students) REFERENCES students (student_id)
    ON UPDATE CASCADE ON DELETE CASCADE; 

    ALTER TABLE comments ADD CONSTRAINT fk_comments_summer_id
    FOREIGN KEY (comments_summer_id_summerscourses) REFERENCES summerscourses (summer_id)
    ON UPDATE CASCADE ON DELETE CASCADE;