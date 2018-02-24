CREATE TABLE bitacora (
	id_operacion SERIAL PRIMARY KEY,
	operacion VARCHAR(20),
	fecha timestamp,
	obj_info VARCHAR(20),
	valores VARCHAR(500),
	valor_anterior varchar(500),
	valor_nuevo varchar(500));



/*Disparadores tabla students*/
CREATE OR REPLACE FUNCTION operationStudents () returns trigger as $$
DECLARE
vali varchar(200);
nuevo varchar(100); 
viejo varchar(200);
BEGIN
IF(TG_OP= 'INSERT') THEN 
vali=NEW.student_id || ',' || NEW.student_name  || ',' || NEW.student_firstname || ',' 
|| NEW.student_secondname || ',' || NEW.student_sex || ',' || NEW.student_email || ',' || NEW.student_password || ','
 || NEW.student_rol || ',' || NEW.student_facultyid_faculties;
INSERT INTO bitacora (operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)
values ('INSERT', now(),TG_RELNAME, vali, null, null);
RETURN NEW;
ELSIF (TG_OP='UPDATE') THEN 
vali=NEW.student_id || ',' || NEW.student_name  || ',' || NEW.student_firstname || ',' 
|| NEW.student_secondname || ',' || NEW.student_sex || ',' || NEW.student_telephone || 
',' || NEW.student_image || ',' || NEW.student_email || ',' || NEW.student_password || ','
 || NEW.student_rol || ',' || NEW.student_facultyid_faculties;
 nuevo = '<--- VALOR NUEVO = ';
 viejo = '<--- VALOR VIEJO = ';
IF(NEW.student_id<> OLD.student_id) THEN
nuevo=nuevo || NEW.student_id || ','; viejo = viejo  || OLD.student_id || ','; 
END IF; 
IF(NEW.student_name<> OLD.student_name) THEN
nuevo= || NEW.student_name || ','; viejo= viejo  || OLD.student_name || ','; 
END IF;
IF(NEW.student_firstname<> OLD.student_firstname) THEN
nuevo=nuevo || NEW.student_firstname || ','; viejo= viejo  || OLD.student_firstname || ',';
END IF;
IF(NEW.student_secondname<> OLD.student_secondname) THEN
nuevo=nuevo || NEW.student_secondname || ','; viejo= viejo  || OLD.student_secondname || ',';
END IF;
IF(NEW.student_sex<> OLD.student_sex) THEN
nuevo=nuevo || NEW.student_sex || ','; viejo= viejo  || OLD.student_sex || ',';
END IF;
IF(NEW.student_email<> OLD.student_email) THEN
nuevo=nuevo || NEW.student_email || ','; viejo= viejo  || OLD.student_email || ',';
END IF;
IF(NEW.student_password<> OLD.student_password) THEN
nuevo=nuevo || NEW.student_password || ','; viejo= viejo  || OLD.student_password || ',';
END IF;
IF(NEW.student_rol<> OLD.student_rol) THEN
nuevo=nuevo || NEW.student_rol || ','; viejo= viejo  || OLD.student_rol || ',';
END IF;
IF(NEW.student_facultyid_faculties<> OLD.student_facultyid_faculties) THEN
nuevo=nuevo || NEW.student_facultyid_faculties || ','; viejo= viejo  || OLD.student_facultyid_faculties || ',';
END IF;

INSERT INTO bitacora(operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)
values ('UPDATE', now(),TG_RELNAME, vali, viejo || ' --->', nuevo || ' --->');
RETURN NEW;
ELSIF (TG_OP='DELETE') THEN
vali=OLD.student_id || ',' || OLD.student_name  || ',' || OLD.student_firstname || ',' 
|| OLD.student_secondname || ',' || OLD.student_sex || ',' || OLD.student_telephone || 
',' || OLD.student_image || ',' || OLD.student_email || ',' || OLD.student_password || ','
 || OLD.student_rol || ',' || OLD.student_facultyid_faculties;
INSERT INTO bitacora(operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)  
values ('DELETE', now(),TG_RELNAME, vali, null, null);
RETURN OLD;
END IF;
RETURN NULL;
END;
$$LANGUAGE plpgsql;

CREATE TRIGGER student_trigger BEFORE INSERT OR DELETE OR UPDATE ON students FOR EACH ROW EXECUTE PROCEDURE operationStudents();
/*PRUEBAS  ----*/

/**END PRUEBAS/	
/*-----------------------------------------------------------------------------------------------------------------------------*/
/*Disparadores tabla departaments*/
CREATE OR REPLACE FUNCTION operationDepartaments() returns trigger as $$
DECLARE
vali varchar(100);
nuevo varchar(50); 
viejo varchar(50);
BEGIN
IF(TG_OP= 'INSERT') THEN 
vali=NEW.departament_id || ',' || NEW.departament_name;
INSERT INTO bitacora (operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)
values ('INSERT', now(),TG_RELNAME, vali, null, null);
RETURN NEW;
ELSIF (TG_OP='UPDATE') THEN 
vali=NEW.departament_id || ',' || NEW.departament_name;
 nuevo = '<--- VALOR NUEVO = ';
 viejo = '<--- VALOR VIEJO = ';
IF(NEW.departament_id<> OLD.departament_id) THEN
nuevo= nuevo || NEW.departament_id || ','; viejo= viejo || OLD.departament_id || ','; 
END IF;
IF(NEW.departament_name<> OLD.departament_name) THEN
nuevo= nuevo || NEW.departament_name || ','; viejo= viejo || OLD.departament_name || ','; 
END IF;
INSERT INTO bitacora(operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)  
values ('UPDATE', now(),TG_RELNAME, vali, viejo || ' --->', nuevo || ' --->');
RETURN NEW;
ELSIF (TG_OP='DELETE') THEN
vali=OLD.departament_id || ',' || OLD.departament_name;
INSERT INTO bitacora(operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)  
values ('DELETE', now(),TG_RELNAME, vali, null, null);
RETURN OLD;
END IF;
RETURN NULL;
END;
$$LANGUAGE plpgsql;

CREATE TRIGGER departament_trigger BEFORE INSERT OR DELETE OR UPDATE ON departaments FOR EACH ROW EXECUTE PROCEDURE operationDepartaments();


/*Disparadores Faculties*/
CREATE OR REPLACE FUNCTION operationFaculties() returns trigger as $$
DECLARE
vali varchar(100);
nuevo varchar(50); 
viejo varchar(50);
BEGIN
IF(TG_OP= 'INSERT') THEN 
vali=NEW.faculty_id || ',' || NEW.faculty_name || ',' || NEW.faculty_building ;
INSERT INTO bitacora (operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)
values ('INSERT', now(),TG_RELNAME, vali, null, null);
RETURN NEW;
ELSIF (TG_OP='UPDATE') THEN 
vali=NEW.faculty_id || ',' || NEW.faculty_name || ',' || NEW.faculty_building ;
 nuevo = '<--- VALOR NUEVO = ';
 viejo = '<--- VALOR VIEJO = ';
IF(NEW.faculty_id<> OLD.faculty_id) THEN
nuevo=NEW.faculty_id; viejo=OLD.faculty_id; 
END IF;
IF(NEW.faculty_name<> OLD.faculty_name) THEN
nuevo=NEW.faculty_name; viejo=OLD.faculty_name; 
END IF;
IF(NEW.faculty_building<> OLD.faculty_building) THEN
nuevo=NEW.faculty_building; viejo=OLD.faculty_building;
END IF;
INSERT INTO bitacora(operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)  
values ('UPDATE', now(),TG_RELNAME, vali, viejo || ' --->', nuevo || ' --->');
RETURN NEW;
ELSIF (TG_OP='DELETE') THEN
vali=OLD.faculty_id || ',' || OLD.faculty_name || ',' || OLD.faculty_building;
INSERT INTO bitacora(operacion, fecha, obj_info, valores, valor_anterior, valor_nuevo)  
values ('DELETE', now(),TG_RELNAME, vali, null, null);
RETURN OLD;
END IF;
RETURN NULL;
END;
$$LANGUAGE plpgsql;

CREATE TRIGGER faculty_trigger BEFORE INSERT OR DELETE OR UPDATE ON faculties FOR EACH ROW EXECUTE PROCEDURE operationFaculties();



DROP TRIGGER student_trigger on students;
DROP TRIGGER departament_trigger on departaments;
DROP TRIGGER faculty_trigger on faculties;
INSERT INTO students VALUES('15091051','Maltha','Kit','Jorge','hombre','','','reny@hotmail.com',
	'495471abe4f0d97210ec94203d646ba651ece2cf','STUDENT','ISIC-2010-224');
update students set student_name = 'Maritza', student_firstname = 'Tellez' where student_id = '15091051';

/**INSERT*/
INSERT INTO faculties VALUES('ISIC-2010-224','Ing. Sistemas computacionales','02');	
INSERT INTO students VALUES('15091055','Albelto','Lopez','Fabian','hombre','','','lf_alberto@hotmai.com',
	'495471abe4f0d97210ec94203d646ba651ece2cf','STUDENT','ISIC-2010-224');
INSERT INTO faculties VALUES('ICTA-2010-224','Ing. Ciencias de la tierra','03');
INSERT INTO departaments VALUES('DEPTO01','Recursos financieros');
INSERT INTO students VALUES('15091051','Jovani','Garcia','Ibrente','hombre','','','garcia@hotmail.com',
	'495471abe4f0d97210ec94203d646ba651ece2cf','STUDENT','ISIC-2010-224');
INSERT INTO faculties VALUES('SBIQ-2010-223','Ing. BIO','01');
INSERT INTO departaments VALUES('DEPTO02','Depto. Sistemas computacionales');

/**END INSERT*/
/*UPDATE*/
UPDATE faculties SET faculty_id = 'IBIQ-2010-224', faculty_name = 'Ing. Bioquimica' where faculty_building = '01';
UPDATE departaments SET departament_name = 'Depto. Recursos financieros' where departament_id = 'DEPTO01';
UPDATE students SET  student_name = 'Hector Alberto', student_email = 'lf_alberto@gmail.com', 
student_rol = 'USER-STUDENT' where student_id = '15091055';
update students set student_name = 'Marco', student_firstname = 'Tellez' where student_id = '15091051';
/*ENDUPDATE*/
/*DELETE*/
DELETE FROM students;
DELETE FROM faculties WHERE faculty_name = 'Ing. Bioquimica';
DELETE FROM departaments where departament_id 'DEPTO02';


/*ENDDELETE*/

