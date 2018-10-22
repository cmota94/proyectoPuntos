
CREATE TABLE usuario(
	usu_idUsuario SERIAL NOT NULL,
    usu_nombre VARCHAR(30) NOT NULL,
    usu_apellidoPaterno VARCHAR(20) NOT NULL,
    usu_apellidoMaterno VARCHAR(20) NOT NULL,		ok
    usu_estatus VARCHAR(10) NOT NULL,
    email VARCHAR(50) NULL,
    usu_contrasenia VARCHAR(40) NOT NULL,
    usu_idArea INTEGER NOT NULL,
    usu_idRol INTEGER NOT NULL,
)

CREATE TABLE actividad(
	act_idActividad SERIAL NOT NULL,
    act_nombre VARCHAR(40) NOT NULL,
    act_tipo VARCHAR(10) NOT NULL,
    act_responsable VARCHAR(40) NOT NULL,
    act_fechaInicio VARCHAR(40) NOT NULL,
    act_fechaFin VARCHAR(40) NOT NULL,
    act_horaInicio VARCHAR(40) NOT NULL,
    act_horaFin VARCHAR(40) NOT NULL,					ok
    act_numeroPuntos NUMERIC(2,0) NOT NULL,
    act_descripcion VARCHAR(40) NOT NULL,
    act_estatus VARCHAR(40) NOT NULL,
    act_idArea INTEGER NOT NULL,
    act_idSubcategoria INTEGER NOT NULL,
    act_idLugar INTEGER NOT NULL,
    created_at  TIME NOT NULL DEFAULT TIMESTAMP,

    CONSTRAINT pkActividad
    PRIMARY KEY (act_idActividad),

    CONSTRAINT fkActividadArea
    FOREIGN KEY (act_idArea)
    REFERENCES area(ar_idArea),

    CONSTRAINT fkActividadSubcategoria
    FOREIGN KEY(act_idSubcategoria)
    REFERENCES subcategoria(sub_idSubcategoria),

    CONSTRAINT fkActividadLugar
    FOREIGN KEY(act_idLugar)
    REFERENCES recinto(rec_idRecinto)
)

CREATE TABLE rol(
	rol_idRol SERIAL NOT NULL,
	rol_nombre VARCHAR(20) NOT NULL,
	rol_descripcion VARCHAR(50) NULL,

	CONSTRAINT pkRol
	PRIMARY KEY (rol_idRol)				ok
)


/*CREATE TABLE modulo(
	mod_idModulo SERIAL NOT NULL,
	mod_nombre VARCHAR(40) NOT NULL,
	mod_tipo VARCHAR(10) NOT NULL,

	CONSTRAINT pkModulo
	PRIMARY KEY (mod_idModulo)
)*/


CREATE TABLE area(
	ar_idArea SERIAL NOT NULL,
	ar_nombre VARCHAR(25) NOT NULL,
	ar_idUsuario NUMERIC(10) NOT NULL,

	CONSTRAINT pkArea 
	PRIMARY KEY (ar_idArea),				ok

	CONSTRAINT fkAreaUsuario
	FOREIGN KEY (usu_idUsuario)
	REFERENCES usuario(id),

	CONSTRAINT uqUsu_idUsuario
	UNIQUE (ar_idUsuario)
)

CREATE TABLE usuario_rol(
	usu_idUsuario SERIAL NOT NULL,
	rol_idRol INT(2) NOT NULL,
														ok
	CONSTRAINT pkUsuarioRol
	PRIMARY KEY(usu_idUsuario, rol_idRol)
)


CREATE TABLE subcategoria(
	sub_idSubcategoria SERIAL NOT NULL ,
	sub_nombre VARCHAR(25) NOT NULL,
														ok
	CONSTRAINT pkSubcategoria
	PRIMARY KEY (sub_idSubcategoria)
)

CREATE TABLE recinto(
	rec_idRecinto SERIAL NOT NULL,				//Todos los serial son integer
	rec_nombre VARCHAR(25) NOT NULL,
	rec_capacidad INT(4) NULL,
	rec_ubicacion VARCHAR(50) NOT NULL,
	rec_descripcion VARCHAR(60) NOT NULL,
	rec_idEdificio ingeter NOT NULL,
														ok
	CONSTRAINT pkRecinto					
	PRIMARY KEY(rec_idRecinto)

	CONSTRAINT fkRecintoEdificio
	FOREIGN KEY(edi_idEdificio)
	REFERENCES edificio(edi_idEdificio)
)


CREATE TABLE edificio(
	edi_idEdificio SERIAL NOT NULL ,
	edi_nombre VARCHAR(10) NOT NULL,

	CONSTRAINT pkEdificio						ok
	PRIMARY KEY(edi_idEdificio)
)


CREATE TABLE horario(
	horIdHorario SERIAL NOT NULL,
	horHoraInicio TIME NOT NULL,
	horHoraFin	TIME NOT NULL,					ok

	CONSTRAINT pkHorario
	PRIMARY KEY (horIdHorario)
)

CREATE TABLE grupo(
	gruIdGrupo SERIAL NOT NULL,
	gruLugaresDisponibles NUMERIC(3,0) NOT NULL,
	gruLugaresOcupados NUMERIC(3,0) NULL,
	gruEstatus VARCHAR(10) NOT NULL,
	gruFechaInicio DATE NULL,
	gruFechaTermino DATE NULL,
	gruIdHorario INTEGER NULL,
	gruIdActividad INTEGER NOT NULL,
															ok
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
	insIdInscripcion SERIAL NOT NULL,
	insFechaInscripcion DATE NOT NULL,
	insEstatus VARCHAR(10) NOT NULL,
	insIdGrupo INTEGER NULL,
	insIdAlumno NUMERIC(9,0) NOT NULL,
																		ok
	CONSTRAINT pkInscripcion
	PRIMARY KEY (insIdInscripcion),

	CONSTRAINT fkInscripcionGrupo
	FOREIGN KEY (insIdGrupo)
	REFERENCES grupo (gruIdGrupo)
);

CREATE TABLE bitacora(
	bit_idbitacora SERIAL NOT NULL,
	bit_dispositivo VARCHAR(50) NULL,
	bit_navegador VARCHAR(100) NULL,
	bit_direccionip VARCHAR(20) NULL,
	created_at time without time zone NULL DEFAULT now(),
	updated_at timestamp with time zone,
  	bit_idusuario integer NOT NULL,

  	CONSTRAINT pkBitacora
  	PRIMARY KEY (bit_idbitacora),

  	CONSTRAINT fkBitacoraUsuario
  	FOREIGN KEY(bit_idusuario)
  	REFERENCES usuario(id) 
);


											--------*INSERTS*---------
--HORARIO
INSERT INTO horario values (1, '14:00:00',	'16:00:00');
INSERT INTO horario values (2, 	'10:00:00', '12:00:00');


--GRUPO
INSERT INTO grupo VALUES(1, 20, 10, 'Disponible', '2018-09-19', '2018-09-19', 1, 1);
INSERT INTO grupo VALUES(2, 10,	200, 'Disponible','2018-09-20', '2018-09-20', 2, 3);
INSERT INTO grupo VALUES(3, 100, 10, 'Disponible', '2018-12-03', '2019-01-15', 2, 4);


--INSCRIPCION
INSERT INTO inscripción  VALUES (1,	'2018-09-17',	'Registrado', 	1, 	313304901);
INSERT INTO inscripción  VALUES (2,	'2018-09-16',	'Registrado', 	1, 	416063831);
INSERT INTO inscripción  VALUES (3,	'2018-09-18',	'Registrado', 	2, 	303148371);
INSERT INTO inscripción  VALUES (4,	'2018-09-25',	'Registrado', 	2, 	406081049);
INSERT INTO inscripción  VALUES (5,	'2018-09-09',	'Registrado', 	3, 	303255930);
INSERT INTO inscripción  VALUES (6,	'2018-09-04',	'Registrado', 	3, 	306188664);
INSERT INTO inscripción  VALUES (7,	'2018-09-13',	'Registrado', 	1, 	306188664);
INSERT INTO inscripción  VALUES (8,	'2018-09-19',	'Registrado', 	3, 	313304901);
INSERT INTO inscripción  VALUES (9,	'2018-09-18',	'Registrado', 	3, 	416063831);