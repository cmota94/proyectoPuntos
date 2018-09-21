
CREATE TABLE rol(
	rol_idRol INT(2) NOT NULL AUTO_INCREMENT,
	rol_nombre VARCHAR(20) NOT NULL,
	rol_descripcion VARCHAR(50) NULL,

	CONSTRAINT pkRol
	PRIMARY KEY (rol_idRol)
)


CREATE TABLE modulo(
	mod_idModulo INT(1) NOT NULL AUTO_INCREMENT,
	mod_nombre VARCHAR(40) NOT NULL,
	mod_tipo VARCHAR(10) NOT NULL,

	CONSTRAINT pkModulo
	PRIMARY KEY (mod_idModulo)
)


CREATE TABLE area(
	ar_idArea INT(1) NOT NULL AUTO_INCREMENT,
	ar_nombre VARCHAR(25) NOT NULL,
	usu_idUsuario INT(10) NOT NULL,

	CONSTRAINT pkArea 
	PRIMARY KEY (ar_idArea),

	CONSTRAINT fkAreaUsuario
	FOREIGN KEY (usu_idUsuario)
	REFERENCES usuario(id),

	CONSTRAINT uqUsu_idUsuario
	UNIQUE (usu_idUsuario)
)

CREATE TABLE usuario_rol(
	usu_idUsuario INT(10) NOT NULL,
	rol_idRol INT(2) NOT NULL,

	CONSTRAINT pkUsuarioRol
	PRIMARY KEY(usu_idUsuario, rol_idRol)
)


CREATE TABLE subcategoria(
	sub_idSubcategoria INT(2) NOT NULL AUTO_INCREMENT,
	sub_nombre VARCHAR(25) NOT NULL,

	CONSTRAINT pkSubcategoria
	PRIMARY KEY (sub_idSubcategoria)
)

CREATE TABLE recinto(
	rec_idRecinto INT(2) NOT NULL AUTO_INCREMENT,
	rec_nombre VARCHAR(25) NOT NULL,
	rec_capacidad INT(4) NULL,
	rec_ubicacion VARCHAR(50) NOT NULL,
	rec_descripcion VARCHAR(60) NOT NULL,
	edi_idEdificio INT(2) NOT NULL,

	CONSTRAINT pkRecinto
	PRIMARY KEY(rec_idRecinto)

	CONSTRAINT fkRecintoEdificio
	FOREIGN KEY(edi_idEdificio)
	REFERENCES edificio(edi_idEdificio)
)


CREATE TABLE edificio(
	edi_idEdificio INT(2) NOT NULL AUTO_INCREMENT,
	edi_nombre VARCHAR(10) NOT NULL,

	CONSTRAINT pkEdificio
	PRIMARY KEY(edi_idEdificio)
)


CREATE TABLE horario(
	horIdHorario INT(3) NOT NULL AUTO_INCREMENT,
	horHoraInicio TIME NOT NULL,
	horHoraFin	TIME NOT NULL,

	CONSTRAINT pkHorario
	PRIMARY KEY (horIdHorario)
)

CREATE TABLE grupo(
	gruIdGrupo INT(6) NOT NULL AUTO_INCREMENT,
	gruLugaresDisponibles NUMERIC(3,0) NOT NULL,
	gruLugaresOcupados NUMERIC(3,0) NULL,
	gruEstatus VARCHAR(10) NOT NULL,
	gruFechaInicio DATE NULL,
	gruFechaTermino DATE NULL,
	gruIdHorario NUMERIC(3,0) NULL,
	gruIdActividad NUMERIC(10) NOT NULL,

	CONSTRAINT pkGrupo
	PRIMARY KEY (gruIdGrupo),

	CONSTRAINT fkGrupoActividad
	FOREIGN KEY (gruIdActividad)
	REFERENCES actividad(act_idActividad),

	CONSTRAINT fkGrupoHorario
	FOREIGN KEY (gruIdHorario)
	REFERENCES horario (horIdHorario)
);


CREATE TABLE inscripción(
	insIdInscripcion INT(7) NOT NULL,
	insFechaInscripcion DATE NOT NULL,
	insEstatus VARCHAR(10) NOT NULL,
	insPuntosCulturales NUMERIC(1,0) NOT NULL,
	insPuntosDeportivos NUMERIC(1,0) NOT NULL,
	insPuntosResponsabilidadSocial NUMERIC(1,0) NOT NULL,
	insIdGrupo NUMERIC(6,0) NULL,
	insIdAlumno NUMERIC(9,0) NOT NULL,

	CONSTRAINT pkInscripcion
	PRIMARY KEY (insIdInscripcion),

	CONSTRAINT fkInscripcionGrupo
	FOREIGN KEY (insIdGrupo)
	REFERENCES grupo (gruIdGrupo)
);



-----------------------------------------------

INSERT INTO rol(rol_nombre) VALUES('Titular cultural');
INSERT INTO rol(rol_nombre) VALUES('Responsable cultural');
INSERT INTO rol(rol_nombre) VALUES('Titular responsabilidad social');
INSERT INTO rol(rol_nombre) VALUES('Responsable responsabilidad social');
INSERT INTO rol(rol_nombre) VALUES('Titular deportivo');
INSERT INTO rol(rol_nombre) VALUES('Responsable deportivo');
INSERT INTO rol(rol_nombre) VALUES('Responsable proyectos especiales');
INSERT INTO rol(rol_nombre) VALUES('Administración escolar');
INSERT INTO rol(rol_nombre) VALUES('Administrador del sistema');

---------

INSERT INTO modulo(mod_nombre) VALUES('Administrar eventos de puntos');
INSERT INTO modulo(mod_nombre) VALUES('Buscar eventos');
INSERT INTO modulo(mod_nombre) VALUES('Administrar inscripción');
INSERT INTO modulo(mod_nombre) VALUES('Administrar puntos');

----------

INSERT INTO subcategoria(sub_nombre) VALUES('Conferencia');
INSERT INTO subcategoria(sub_nombre) VALUES('Concierto');
INSERT INTO subcategoria(sub_nombre) VALUES('Actividad física');
INSERT INTO subcategoria(sub_nombre) VALUES('Apoyo social');
INSERT INTO subcategoria(sub_nombre) VALUES('Taller');
INSERT INTO subcategoria(sub_nombre) VALUES('Teatro');
INSERT INTO subcategoria(sub_nombre) VALUES('Literatura');
INSERT INTO subcategoria(sub_nombre) VALUES('Otro');

INSERT INTO subcategoria(sub_nombre) VALUES('Maratones');
INSERT INTO subcategoria(sub_nombre) VALUES('Carreras');
INSERT INTO subcategoria(sub_nombre) VALUES('Conferencias deportivas');
INSERT INTO subcategoria(sub_nombre) VALUES('Talleres deportivos');
INSERT INTO subcategoria(sub_nombre) VALUES('Partido FCA');
INSERT INTO subcategoria(sub_nombre) VALUES('Partido UNAM');


---------------------

INSERT INTO recinto(rec_nombre) VALUES('Auditorio Mtro. Carlos Pérez del Toro');
INSERT INTO recinto(rec_nombre) VALUES('Auditorio José Antonio Echenique García');
INSERT INTO recinto(rec_nombre) VALUES('Auditorio C.P. Alfonso Ochoa Ravizé');
INSERT INTO recinto(rec_nombre) VALUES('Aula magna de profesores eméritos');
INSERT INTO recinto(rec_nombre) VALUES('Aulas del edificio J segundo piso');
INSERT INTO recinto(rec_nombre) VALUES('Externos a la FCA');
INSERT INTO recinto(rec_nombre) VALUES('Ajenos a la UNAM');
INSERT INTO recinto(rec_nombre) VALUES('Otro');



--///////////////////////////////// BASE DE DATOS DE POSTRGRES RIGEL, PRUEBAS ----------------

CREATE DATABASE pruebas;

CREATE TABLE alumno(

	alumIdAlumno NUMERIC(9,0) NOT NULL,
	alumNombre VARCHAR(40) NOT NULL,
	alumApellidoPaterno VARCHAR(40) NOT NULL,
	alumApellidoMaterno VARCHAR(40) NOT NULL,
	alumIdConstancia NUMERIC(9,0) NOT NULL,

	CONSTRAINT pkAlumno
	PRIMARY KEY(alumIdAlumno),

	CONSTRAINT fkAlumnoConstancia
	FOREIGN KEY (alumIdConstancia)
	REFERENCES constancia(consIdConstancia)
);


alter table alumno alter column alumIdConstancia drop not null;

alter table planEstudios alter column plesGeneracion drop not null;


CREATE TABLE empleado(
	perIdPersona NUMERIC(3,0) NOT NULL,
	perNombre VARCHAR(40) NOT NULL,
	perApellidoPaterno VARCHAR(40) NOT NULL,
	perApellidoMaterno VARCHAR(40) NOT NULL,
	perRol VARCHAR(30) NOT NULL,
	perEstatus VARCHAR(10) NOT NULL,
	perFechaAlta DATE NOT NULL DEFAULT dfFechaAlta TIMESTAMP,
	perFechaBaja DATE NULL,

	CONSTRAINT pkPersona
	PRIMARY KEY(perIdPersona)

);

CREATE TABLE constancia(
	consIdConstancia NUMERIC(9,0) NOT NULL,
	consIdAlumno NUMERIC(9,0) NOT NULL,
	consPlanEstudios VARCHAR(20) null,
	consFecha DATE NULL,
	consEstatus VARCHAR(15) NOT NULL,
	consEstatusImpreso VARCHAR(2) NULL,
	consPersona NUMERIC(3,0) NOT NULL,

	CONSTRAINT pkConstancia
	PRIMARY KEY (consIdConstancia),

	CONSTRAINT fkConstanciaPersona
	FOREIGN KEY(consPersona)
	REFERENCES empleado(perIdPersona)
);


CREATE TABLE carrera(
	carrIdCarrera NUMERIC(1,0) NOT NULL,
	carrNombre VARCHAR(25) NOT NULL,
	carrFechaCreacion DATE NOT NULL,

	CONSTRAINT pkCarrera
	PRIMARY KEY(carrIdCarrera)
);


CREATE TABLE planEstudios(
	plesIdPlan NUMERIC(2,0) NOT NULL,
	plesNombre VARCHAR(30) NOT NULL,
	plesSistema VARCHAR(20) NOT NULL,
	plesGeneracion VARCHAR(10) NULL,
	plesIdCarrera NUMERIC(1,0) NOT NULL,

	CONSTRAINT pkPlanEstudios
	PRIMARY KEY (plesIdPlan),

	CONSTRAINT fkPlanEstudiosCarrera
	FOREIGN KEY (plesIdCarrera)
	REFERENCES carrera(carrIdCarrera)
);

CREATE TABLE alumno_planEstudios(
	alplaIdPlanEstudios NUMERIC(2,0) NOT NULL,
	alplaIdAlumno NUMERIC(9,0) NOT NULL,

	CONSTRAINT pkAlumnoPlan
	PRIMARY KEY(alplaIdAlumno, alplaIdPlanEstudios),

	CONSTRAINT fkAlumnoPlanAlumno
	FOREIGN KEY(alplaIdAlumno)
	REFERENCES alumno(alumIdAlumno),

	CONSTRAINT fkAlumnoPlanPlan
	FOREIGN KEY(alplaIdPlanEstudios)
	REFERENCES planEstudios(plesIdPlan)
);

CREATE TABLE empleado(
	emplIdEmpleado NUMERIC(3,0) NOT NULL,
	empNombre VARCHAR(40) NOT NULL,
	emoApellidoPaterno VARCHAR(40) NOT NULL,
	ampApellidoMaterno VARCHAR(40) NOT NULL,
	empRol VARCHAR(20) NULL,
	empEstatus VARCHAR(10) NOT NULL,

	CONSTRAINT pkEmpleado
	PRIMARY KEY(emplIdEmpleado)
)

--///////////////  INSERTS  ////////


INSERT INTO carrera VALUES(1, 'Administracion', '1959-01-01');
INSERT INTO carrera VALUES(2, 'Contaduría', '1957-01-01');
INSERT INTO carrera VALUES(3, 'Informatica', '1968-01-01');
INSERT INTO carrera VALUES(4, 'Negocios internacionales', '2017-01-01');

UPDATE carrera
SET carrNombre = 'Contaduria'
WHERE carrIdCarrera = 2;

---
	--Administracion
INSERT INTO planEstudios VALUES(1, 'Plan 1998', 'Escolarizado', '', 1);
INSERT INTO planEstudios VALUES(2, 'Plan 2006', 'Escolarizado', '', 1);
INSERT INTO planEstudios VALUES(3, 'Plan 2012', 'Escolarizado', '', 1);
INSERT INTO planEstudios VALUES(4, 'Plan 2012', 'SUAyED', '', 1);
INSERT INTO planEstudios VALUES(5, 'Plan 2016', 'Escolarizado', '', 1);
INSERT INTO planEstudios VALUES(6, 'Plan 2016', 'SUAyED', '', 1);

	--Contaduria
INSERT INTO planEstudios VALUES(7, 'Plan 1998', 'Escolarizado', '', 2);
INSERT INTO planEstudios VALUES(8, 'Plan 2004', 'Escolarizado', '', 2);
INSERT INTO planEstudios VALUES(9, 'Plan 2006', 'Escolarizado', '', 2);
INSERT INTO planEstudios VALUES(10, 'Plan 2012', 'Escolarizado', '', 2);
INSERT INTO planEstudios VALUES(11, 'Plan 2012', 'SUAyED', '', 2);
INSERT INTO planEstudios VALUES(12, 'Plan 2016', 'Escolarizado', '', 2);
INSERT INTO planEstudios VALUES(13, 'Plan 2016', 'SUAyED', '', 2);

	--Informatica
INSERT INTO planEstudios VALUES(14, 'Plan 1998', 'Escolarizado', '', 3);
INSERT INTO planEstudios VALUES(15, 'Plan 2006', 'Escolarizado', '', 3);
INSERT INTO planEstudios VALUES(16, 'Plan 2012', 'Escolarizado', '', 3);
INSERT INTO planEstudios VALUES(17, 'Plan 2012', 'SUAyED', '', 3);
INSERT INTO planEstudios VALUES(18, 'Plan 2016', 'Escolarizado', '', 3);
INSERT INTO planEstudios VALUES(19, 'Plan 2016', 'SUAyED', '', 3);

	--Negocios internacionales
INSERT INTO planEstudios VALUES(20, 'Plan 2018', 'Escolarizado', '', 4);

INSERT INTO alumno_planEstudios(alplaidplanestudios, alplaidalumno) VALUES(18, 313304901);
INSERT INTO alumno_planEstudios(alplaidplanestudios, alplaidalumno) VALUES(18, 416063831);

INSERT INTO alumno_planEstudios(alplaidplanestudios, alplaidalumno) VALUES(20, 303148371);
INSERT INTO alumno_planEstudios(alplaidplanestudios, alplaidalumno) VALUES(12, 406081049);
INSERT INTO alumno_planEstudios(alplaidplanestudios, alplaidalumno) VALUES(12, 303255930);
INSERT INTO alumno_planEstudios(alplaidplanestudios, alplaidalumno) VALUES(5, 306188664);

INSERT INTO area(ar_idArea, ar_nombre, usu_idUsuario)
VALUES (1, 'Culturales', 2);



----


INSERT INTO alumno(alumIdAlumno, alumNombre, alumApellidoPaterno, alumApellidoMaterno) 
VALUES(313304901, 'Cesar Jair', 'Mota', 'Sanchez');

INSERT INTO alumno(alumIdAlumno, alumNombre, alumApellidoPaterno, alumApellidoMaterno) 
VALUES(416063831, 'Ma. Guadalupe', 'Damian', 'Contreras');

INSERT INTO alumno(alumIdAlumno, alumNombre, alumApellidoPaterno, alumApellidoMaterno) 
VALUES(303148371, 'Alvaro A', 'Rosa', 'Pavan');
INSERT INTO alumno(alumIdAlumno, alumNombre, alumApellidoPaterno, alumApellidoMaterno) 
VALUES(406081049, 'Omar G', 'Juarez', 'Andrade');
INSERT INTO alumno(alumIdAlumno, alumNombre, alumApellidoPaterno, alumApellidoMaterno) 
VALUES(303255930, 'Karla L', 'Sanchez', 'Macario');
INSERT INTO alumno(alumIdAlumno, alumNombre, alumApellidoPaterno, alumApellidoMaterno) 
VALUES(306188664, 'Ana L', 'Lazo', 'Ojeda');



--////////////////// QUERYS 

SELECT 	alumNombre, 
		alumIdAlumno, 
		carrNombre, 
		plesSistema 
FROM alumno INNER JOIN alumno_planEstudios
	ON (alumIdAlumno = alplaIdAlumno, plesIdPlan = alplaIdPlanEstudios) INNER JOIN planEstudios
			ON (alumIdAlumno = alplaIdAlumno, plesIdPlan = alplaIdPlanEstudios ) carrera
				ON (plesIdCarrera = carrIdCarrera)
WHERE alumIdAlumno = 313304901;


SELECT 	alumNombre, 
		alumIdAlumno, 
		carrNombre, 
		plesSistema 
FROM alumno, alumno_planEstudios, planEstudios, carrera 
WHERE alumIdAlumno = alplaIdAlumno
AND plesIdPlan = alplaIdPlanEstudios
AND plesIdCarrera = carrIdCarrera
AND alumIdAlumno = 313304091;


SELECT *
FROM inscripción
WHERE insIdGrupo = 1;


SELECT 	act_nombre,
		insPuntosCulturales, 
		insIdAlumno
FROM actividad, grupo, inscripción
WHERE act_idActividad = gruIdActividad
AND gruIdGrupo = insIdGrupo


FROM actividad JOIN grupo ON (actividad.idactividad = grupo.idactividad)


SELECT 	insIdAlumno,
		SUM(act_numeroPuntos),
FROM grupo LEFT OUTER JOIN inscripción
	ON (gruIdGrupo = insIdGrupo) INNER JOIN actividad
		ON (gruIdActividad = act_idActividad)
WHERE insIdAlumno = 416063831
group by insIdAlumno;


//SELECT * FROM inscripción WHERE insIdAlumno = 416063831;

SELECT insIdAlumno
FROM actividad, grupo, inscripción
WHERE gruIdGrupo = insIdGrupo
AND gruIdActividad = act_idActividad
AND ar_idArea = 1
GROUP BY insIdAlumno
HAVING SUM(act_numeroPuntos) >= 15;