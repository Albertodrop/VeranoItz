-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2017 a las 02:57:12
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `summeritz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `summer_id` varchar(13) DEFAULT NULL,
  `comments_nameusuario` varchar(30) DEFAULT NULL,
  `comments_message` varchar(130) DEFAULT NULL,
  `comments_date` date DEFAULT NULL,
  `comments_summer_id_summerscourses` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departaments`
--

CREATE TABLE `departaments` (
  `departament_id` varchar(7) NOT NULL,
  `departament_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faculties`
--

CREATE TABLE `faculties` (
  `faculty_id` varchar(13) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `faculty_building` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `student_id` varchar(8) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_firstname` varchar(50) NOT NULL,
  `student_secondname` varchar(50) NOT NULL,
  `student_sex` varchar(10) NOT NULL,
  `student_telephone` varchar(10) DEFAULT NULL,
  `student_image` varchar(50) DEFAULT NULL,
  `student_email` varchar(100) DEFAULT NULL,
  `student_password` varchar(250) NOT NULL,
  `student_rol` varchar(20) DEFAULT NULL,
  `student_facultyid_faculties` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `summerregistry`
--

CREATE TABLE `summerregistry` (
  `sr_studentid_students` varchar(8) NOT NULL,
  `sr_summer_id_summers` varchar(17) NOT NULL,
  `rs_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `summerscourses`
--

CREATE TABLE `summerscourses` (
  `summer_id` varchar(18) NOT NULL,
  `summer_dateregistry` date DEFAULT NULL,
  `summer_available` tinyint(1) DEFAULT NULL,
  `summer_codesearch` varchar(6) DEFAULT NULL,
  `summer_studentcapacity` int(2) NOT NULL,
  `summer_price` float DEFAULT NULL,
  `summer_status` varchar(10) DEFAULT NULL,
  `summer_description` varchar(100) DEFAULT NULL,
  `sumer_namecourse` varchar(50) NOT NULL,
  `sumer_matterid` varchar(7) NOT NULL,
  `sumer_starthour` int(2) NOT NULL,
  `sumer_finalhour` int(2) NOT NULL,
  `summer_facultyid_faculties` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` varchar(8) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_firstname` varchar(50) NOT NULL,
  `teacher_secondname` varchar(50) NOT NULL,
  `teacher_sex` varchar(10) NOT NULL,
  `teacher_telephone` varchar(10) DEFAULT NULL,
  `teacher_image` varchar(50) DEFAULT NULL,
  `teacher_email` varchar(100) DEFAULT NULL,
  `teacher_password` varchar(250) NOT NULL,
  `teacher_departamentid_departaments` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `fk_comments_summer_id` (`comments_summer_id_summerscourses`);

--
-- Indices de la tabla `departaments`
--
ALTER TABLE `departaments`
  ADD PRIMARY KEY (`departament_id`);

--
-- Indices de la tabla `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `pk_student_facultyid_faculties` (`student_facultyid_faculties`);

--
-- Indices de la tabla `summerregistry`
--
ALTER TABLE `summerregistry`
  ADD PRIMARY KEY (`sr_summer_id_summers`,`sr_studentid_students`),
  ADD KEY `fk_sr_studentid_students` (`sr_studentid_students`);

--
-- Indices de la tabla `summerscourses`
--
ALTER TABLE `summerscourses`
  ADD PRIMARY KEY (`summer_id`),
  ADD KEY `fk_sc_facultyid_faculties` (`summer_facultyid_faculties`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `pk_teacher_departamentid_departaments` (`teacher_departamentid_departaments`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_summer_id` FOREIGN KEY (`comments_summer_id_summerscourses`) REFERENCES `summerscourses` (`summer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `pk_student_facultyid_faculties` FOREIGN KEY (`student_facultyid_faculties`) REFERENCES `faculties` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `summerregistry`
--
ALTER TABLE `summerregistry`
  ADD CONSTRAINT `fk_sr_studentid_students` FOREIGN KEY (`sr_studentid_students`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sr_summer_id_summers` FOREIGN KEY (`sr_summer_id_summers`) REFERENCES `summerscourses` (`summer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `summerscourses`
--
ALTER TABLE `summerscourses`
  ADD CONSTRAINT `fk_sc_facultyid_faculties` FOREIGN KEY (`summer_facultyid_faculties`) REFERENCES `faculties` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `pk_teacher_departamentid_departaments` FOREIGN KEY (`teacher_departamentid_departaments`) REFERENCES `departaments` (`departament_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
