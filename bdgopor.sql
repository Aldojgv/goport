CREATE DATABASE IF NOT EXISTS bdgopor;
USE bdgopor;
CREATE TABLE tbl_cliente
(
	idcliente            INTEGER AUTO_INCREMENT,
	cnombre              VARCHAR(255) NULL,
	cdesc                VARCHAR(255) NULL,
	RUC                  VARCHAR(11) NULL,
	PRIMARY KEY(idcliente)
)ENGINE=InnoDb;

INSERT INTO tbl_cliente (`idcliente`, `cnombre`, `cdesc`, `RUC`) VALUES
(1, 'Entel', 'Empresa de telecomunicaciones', '12345678901');


CREATE TABLE tbl_competidor
(
	idcompetidor         INTEGER AUTO_INCREMENT,
	cnombre              VARCHAR(255) NULL,
	cdesc                VARCHAR(255) NULL,
	PRIMARY KEY(idcompetidor)

)ENGINE=InnoDb;
INSERT INTO tbl_competidor (`idcompetidor`, `cnombre`, `cdesc`) VALUES
(1, 'Indra', 'Consultora');


CREATE TABLE tbl_oestado
(
	idoestado            INTEGER AUTO_INCREMENT,
	oestado              VARCHAR(255) NULL,
	edesc                VARCHAR(255) NULL,
	PRIMARY KEY(idoestado)

)ENGINE=InnoDb;
INSERT INTO tbl_oestado (`idoestado`, `oestado`, `edesc`) VALUES
(1, 'Adquirido', 'Activo');
INSERT INTO tbl_oestado (`idoestado`, `oestado`, `edesc`) VALUES
(2, 'No Adquirido', 'Rechazao');
INSERT INTO tbl_oestado (`idoestado`, `oestado`, `edesc`) VALUES
(3, 'Pendiente', 'Espera respuesta');


CREATE TABLE tbl_otipo
(
	idotipo              INTEGER AUTO_INCREMENT,
	tdesc                VARCHAR(255) NULL,
	PRIMARY KEY(idotipo)

)ENGINE=InnoDb;
INSERT INTO tbl_otipo (`idotipo`, `tdesc`) VALUES
(1, 'Desarrollo web');
INSERT INTO tbl_otipo (`idotipo`, `tdesc`) VALUES
(2, 'Pruebas QA');
INSERT INTO tbl_otipo (`idotipo`, `tdesc`) VALUES
(3, 'Help Desk');


CREATE TABLE tbl_personal
(
	idpersonal           INTEGER AUTO_INCREMENT,
	papaterno            VARCHAR(255) NULL,
	pamaterno            VARCHAR(255) NULL,
	pnombre              VARCHAR(255) NULL,
	pcargo               VARCHAR(255) NULL,
	PRIMARY KEY(idpersonal)

)ENGINE=InnoDb;
INSERT INTO tbl_personal (`idpersonal`, `papaterno`, `pamaterno`, `pnombre`, `pcargo`) VALUES
(1, 'Saona', 'Neyra', 'Juan', 'Client Manager');
INSERT INTO tbl_personal (`idpersonal`, `papaterno`, `pamaterno`, `pnombre`, `pcargo`) VALUES
(2, 'Quispe', 'Quispe', 'Ricardo', 'Lider de proyecto');
INSERT INTO tbl_personal (`idpersonal`, `papaterno`, `pamaterno`, `pnombre`, `pcargo`) VALUES
(3, 'Perez', 'Alcalde', 'Marco', 'Analista');


CREATE TABLE tbl_solicitante
(
	idsolicitante        INTEGER AUTO_INCREMENT,
	sapaterno            VARCHAR(255) NULL,
	samaterno             VARCHAR(255) NULL,
	snombre              VARCHAR(255) NULL,
	scargo               VARCHAR(255) NULL,
	PRIMARY KEY(idsolicitante)

)ENGINE=InnoDb;
INSERT INTO tbl_solicitante (`idsolicitante`, `sapaterno`, `samaterno`, `snombre`, `scargo`) VALUES
(1, 'Torres', 'Medal', 'Jose', 'Analista E');


CREATE TABLE tbl_usuario
(
	idusuario            INTEGER AUTO_INCREMENT,
	apaterno             VARCHAR(255) NOT NULL,
	amaterno             VARCHAR(255) NOT NULL,
	nombre               VARCHAR(255) NOT NULL,
	usuario              VARCHAR(255) NOT NULL,
	clave                VARCHAR(255) NOT NULL,
	tipo                 INTEGER NOT NULL,
	status               INTEGER NOT NULL,
	fregistro            DATETIME NOT NULL,
	PRIMARY KEY(idusuario)

)ENGINE=InnoDb;

INSERT INTO tbl_usuario (`idusuario`, `aPaterno`, `aMaterno`, `nombre`, `usuario`, `clave`, `tipo`, `status`, `fRegistro`) VALUES
(1, 'Paredes', 'Rengifo', 'Sandy', 'admin', 'admin', 1, 1, '2017-11-18 16:02:42');


CREATE TABLE tbl_oportunidad
(
	idoport              INTEGER AUTO_INCREMENT,
	desoport             VARCHAR(255) NOT NULL,
	ofoport              DATE NULL,
	ofvigencia           DATE NOT NULL,
	idoestado            INTEGER NOT NULL,
	idpersonal           INTEGER NOT NULL,
	idotipo              INTEGER NOT NULL,
	idcliente            INTEGER NOT NULL,
	idcompetidor         INTEGER NULL,
	idsolicitante        INTEGER NOT NULL,
	idusuario            INTEGER NOT NULL,
	PRIMARY KEY(idoport)

)ENGINE=InnoDb;
INSERT INTO tbl_oportunidad (`idoport`, `desoport`, `ofoport`, `ofvigencia`, `idoestado`, `idpersonal`, `idotipo`, `idcliente`, `idcompetidor`, `idsolicitante`, `idusuario`) VALUES
(1, 'Actualizacion pagina', '2017-11-18 16:02:42', '2017-11-30 23:02:42', 1,1,1,1,1,1,1);
INSERT INTO tbl_oportunidad (`idoport`, `desoport`, `ofoport`, `ofvigencia`, `idoestado`, `idpersonal`, `idotipo`, `idcliente`, `idcompetidor`, `idsolicitante`, `idusuario`) VALUES
(2, 'reparacion error', '2017-11-18 16:02:42', '2017-11-30 23:02:42', 1,1,1,1,1,1,1);


CREATE TABLE tbl_cotizacion
(
	idcot         INTEGER AUTO_INCREMENT,
	vigencia             DATE NULL,
	cotestado            VARCHAR(255) NULL,
	cotestdesc           VARCHAR(255) NULL,
	cotmonto             INTEGER NULL,
	idoport              INTEGER NULL,
	PRIMARY KEY(idcot)

)ENGINE=InnoDb;
INSERT INTO tbl_cotizacion (`idcot`, `vigencia`, `cotestado`, `cotestdesc`, `cotmonto`, `idoport`) VALUES
(1, '2017-11-30 23:02:42', 'Presentado', 'Aprobado', 5000,1);
INSERT INTO tbl_cotizacion (`idcot`, `vigencia`, `cotestado`, `cotestdesc`, `cotmonto`, `idoport`) VALUES
(2, '2017-11-30 23:02:42', 'Pendiente', 'A espera de respuesta', 3000,2);

CREATE TABLE tbl_tarea
(
	idtarea              INTEGER AUTO_INCREMENT,
	tdesc                VARCHAR(255) NULL,
	idoport              INTEGER NOT NULL,
	PRIMARY KEY(idtarea)

)ENGINE=InnoDb;
INSERT INTO tbl_tarea (`idtarea`, `tdesc`, `idoport`) VALUES
(1, 'Analisis funcional', 1);


CREATE TABLE tbl_ordencompra
(
	idorden              INTEGER AUTO_INCREMENT,
	oestado              VARCHAR(255) NULL,
	idcot                INTEGER NULL,
	PRIMARY KEY(idorden)

)ENGINE=InnoDb;
INSERT INTO tbl_ordencompra (`idorden`, `oestado`, `idcot`) VALUES
(1, 'cobrado', 1);


ALTER TABLE tbl_cotizacion
ADD FOREIGN KEY R_3 (idoport) REFERENCES tbl_oportunidad (idoport);



ALTER TABLE tbl_oportunidad
ADD FOREIGN KEY R_6 (idoestado) REFERENCES tbl_oestado (idoestado);



ALTER TABLE tbl_oportunidad
ADD FOREIGN KEY R_7 (idpersonal) REFERENCES tbl_personal (idpersonal);



ALTER TABLE tbl_oportunidad
ADD FOREIGN KEY R_8 (idotipo) REFERENCES tbl_otipo (idotipo);



ALTER TABLE tbl_oportunidad
ADD FOREIGN KEY R_9 (idcliente) REFERENCES tbl_cliente (idcliente);



ALTER TABLE tbl_oportunidad
ADD FOREIGN KEY R_10 (idcompetidor) REFERENCES tbl_competidor (idcompetidor);



ALTER TABLE tbl_oportunidad
ADD FOREIGN KEY R_13 (idsolicitante) REFERENCES tbl_solicitante (idsolicitante);



ALTER TABLE tbl_oportunidad
ADD FOREIGN KEY R_18 (idusuario) REFERENCES tbl_usuario (idusuario);



ALTER TABLE tbl_ordencompra
ADD FOREIGN KEY R_15 (idcot) REFERENCES tbl_cotizacion (idcot);



ALTER TABLE tbl_tarea
ADD FOREIGN KEY R_19 (idoport) REFERENCES tbl_oportunidad (idoport);
