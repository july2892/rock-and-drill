CREATE DATABASE planilla;
USE planilla;

CREATE TABLE trabajador(
	id_trabajador int(10) auto_increment primary key,
	nombre varchar(250) not null,
	apellido_p varchar(100) not null,
	apellido_m varchar(100) not null,
    tipo_doc int(1) not null,
	num_doc char(12) not null,
	sexo int(1) not null,
	fecha_nacimiento date not null,
    departamento int(1) not null,
    provincia int(1) not null,
    distrito int(1) not null,
    direccion varchar(200) not null,
    estado boolean not null,
	fecha_registro datetime not null
);

CREATE TABLE sexo (
	id_sexo int(1) primary key,
	nombre_sexo varchar(100)  NOT NULL
);

INSERT INTO sexo VALUES (1, 'FEMENINO');
INSERT INTO sexo VALUES (2, 'MASCULINO');
INSERT INTO sexo VALUES (3, 'PREFIERO NO DECIR');

CREATE TABLE tipoDocumento (
	id_tipoDoc int(1) primary key,
	nombre_tipoDoc varchar(100)  NOT NULL,
    longitud_digitos int(2) not null
);

INSERT INTO tipoDocumento VALUES (1, 'DNI', 8);
INSERT INTO tipoDocumento VALUES (2, 'PASAPORTE', 12);
INSERT INTO tipoDocumento VALUES (3, 'RUC', 11);

CREATE TABLE departamentos (
    id_departamento int(2) primary key,
    nombre_departamento varchar(250) NOT NULL
);

INSERT INTO departamentos VALUES (1, 'Amazonas');
INSERT INTO departamentos VALUES (2, 'Áncash');
INSERT INTO departamentos VALUES (3, 'Apurímac');
INSERT INTO departamentos VALUES (4, 'Arequipa');
INSERT INTO departamentos VALUES (5, 'Ayacucho');
INSERT INTO departamentos VALUES (6, 'Cajamarca');
INSERT INTO departamentos VALUES (7, 'Callao');
INSERT INTO departamentos VALUES (8, 'Cusco');
INSERT INTO departamentos VALUES (9, 'Huancavelica');
INSERT INTO departamentos VALUES (10, 'Huánuco');
INSERT INTO departamentos VALUES (11, 'Ica');
INSERT INTO departamentos VALUES (12, 'Junín');
INSERT INTO departamentos VALUES (13, 'La Libertad');
INSERT INTO departamentos VALUES (14, 'Lambayeque');
INSERT INTO departamentos VALUES (15, 'Lima');
INSERT INTO departamentos VALUES (16, 'Loreto');
INSERT INTO departamentos VALUES (17, 'Madre de Dios');
INSERT INTO departamentos VALUES (18, 'Moquegua');
INSERT INTO departamentos VALUES (19, 'Pasco');
INSERT INTO departamentos VALUES (20, 'Piura');
INSERT INTO departamentos VALUES (21, 'Puno');
INSERT INTO departamentos VALUES (22, 'San Martín');
INSERT INTO departamentos VALUES (23, 'Tacna');
INSERT INTO departamentos VALUES (24, 'Tumbes');
INSERT INTO departamentos VALUES (25, 'Ucayali');

CREATE TABLE provincias (
    id_provincia int(2) primary key,
    idDepartamento int(2) NOT NULL,
    nombre_provincia varchar(250) NOT NULL
);

INSERT INTO provincias VALUES (1, 1, 'Chachapoyas');
INSERT INTO provincias VALUES (2, 1, 'Bagua');
INSERT INTO provincias VALUES (3, 2, 'Carhuaz');
INSERT INTO provincias VALUES (4, 2, 'Huaraz');
INSERT INTO provincias VALUES (5, 2, 'Yungay');
INSERT INTO provincias VALUES (6, 3, 'Abancay');
INSERT INTO provincias VALUES (7, 3, 'Antabamba');
INSERT INTO provincias VALUES (8, 4, 'Arequipa');
INSERT INTO provincias VALUES (9, 4, 'Camaná');
INSERT INTO provincias VALUES (10, 5, 'Cangallo');
INSERT INTO provincias VALUES (11, 5, 'Huanta');
INSERT INTO provincias VALUES (12, 6, 'Cajamarca');
INSERT INTO provincias VALUES (13, 6, 'Cajabamba');
INSERT INTO provincias VALUES (14, 7, 'Callao');
INSERT INTO provincias VALUES (15, 8, 'Cuzco');
INSERT INTO provincias VALUES (16, 9, 'Huancavelica');
INSERT INTO provincias VALUES (17, 10, 'Huánuco');
INSERT INTO provincias VALUES (18, 11, 'Ica');
INSERT INTO provincias VALUES (19, 11, 'Chincha');
INSERT INTO provincias VALUES (20, 12, 'Huancayo');
INSERT INTO provincias VALUES (21, 13, 'Trujillo');
INSERT INTO provincias VALUES (22, 14, 'Chiclayo');
INSERT INTO provincias VALUES (23, 15, 'Lima');
INSERT INTO provincias VALUES (24, 16, 'Ucayali');
INSERT INTO provincias VALUES (25, 17, 'Tambopata');
INSERT INTO provincias VALUES (26, 18, 'Ilo');
INSERT INTO provincias VALUES (27, 19, 'Oxapampa');
INSERT INTO provincias VALUES (28, 20, 'Sullana');
INSERT INTO provincias VALUES (29, 21, 'Lampa');
INSERT INTO provincias VALUES (30, 22, 'Moyobamba');
INSERT INTO provincias VALUES (31, 23, 'Tarata');
INSERT INTO provincias VALUES (32, 24, 'Zarumilla');
INSERT INTO provincias VALUES (33, 25, 'Atalaya');

CREATE TABLE distritos (
    id_distrito int(3) primary key,
    idProvincia int(2) NOT NULL,
    nombre_distrito varchar(250) NOT NULL
);

INSERT INTO distritos VALUES (1, 1, 'Chuquibamba');
INSERT INTO distritos VALUES (2, 1, 'Huancas');
INSERT INTO distritos VALUES (3, 1, 'Sonche');
INSERT INTO distritos VALUES (4, 2, 'Bagua');
INSERT INTO distritos VALUES (5, 2, 'Aramango');
INSERT INTO distritos VALUES (6, 3, 'Carhuaz');
INSERT INTO distritos VALUES (7, 3, 'Tinco');
INSERT INTO distritos VALUES (8, 3, 'Ataquero');
INSERT INTO distritos VALUES (9, 4, 'Huaraz');
INSERT INTO distritos VALUES (10, 4, 'Huanchay');
INSERT INTO distritos VALUES (11, 4, 'Cochabamba');
INSERT INTO distritos VALUES (12, 5, 'Yungay');
INSERT INTO distritos VALUES (13, 5, 'Quillo');
INSERT INTO distritos VALUES (14, 5, 'Yanama');
INSERT INTO distritos VALUES (15, 6, 'Abancay');
INSERT INTO distritos VALUES (16, 6, 'Curahuasi');
INSERT INTO distritos VALUES (17, 7, 'El Oro');
INSERT INTO distritos VALUES (18, 7, 'Pachaconas');
INSERT INTO distritos VALUES (19, 8, 'Cayma');
INSERT INTO distritos VALUES (20, 8, 'Arequipa');
INSERT INTO distritos VALUES (21, 8, 'Characato');
INSERT INTO distritos VALUES (22, 9, 'Camaná');
INSERT INTO distritos VALUES (23, 9, 'Ocoña');
INSERT INTO distritos VALUES (24, 10, 'Cangallo');
INSERT INTO distritos VALUES (25, 10, 'Chuschi');
INSERT INTO distritos VALUES (26, 11, 'Huanta');
INSERT INTO distritos VALUES (27, 11, 'Ayahuanco');
INSERT INTO distritos VALUES (28, 12, 'Cajamarca');
INSERT INTO distritos VALUES (29, 12, 'Asunción');
INSERT INTO distritos VALUES (30, 13, 'Cajabamba');
INSERT INTO distritos VALUES (31, 13, 'Condebamba');
INSERT INTO distritos VALUES (32, 14, 'Callao');
INSERT INTO distritos VALUES (33, 14, 'La Perla');
INSERT INTO distritos VALUES (34, 15, 'Cusco');
INSERT INTO distritos VALUES (35, 15, 'Wanchaq');
INSERT INTO distritos VALUES (36, 16, 'Ascensión');
INSERT INTO distritos VALUES (37, 16, 'Huancavelica');
INSERT INTO distritos VALUES (38, 17, 'Huánuco');
INSERT INTO distritos VALUES (39, 17, 'Amarilis');
INSERT INTO distritos VALUES (40, 18, 'Ica');
INSERT INTO distritos VALUES (41, 18, 'Ocucaje');
INSERT INTO distritos VALUES (42, 19, 'Chincha Alta');
INSERT INTO distritos VALUES (43, 19, 'Sunampe');
INSERT INTO distritos VALUES (44, 20, 'Carhuacallanga');
INSERT INTO distritos VALUES (45, 20, 'Chacapampa');
INSERT INTO distritos VALUES (46, 21, 'Trujillo');
INSERT INTO distritos VALUES (47, 21, 'El Porvenir');
INSERT INTO distritos VALUES (48, 22, 'Chiclayo');
INSERT INTO distritos VALUES (49, 22, 'Eten');
INSERT INTO distritos VALUES (50, 23, 'Lima');
INSERT INTO distritos VALUES (51, 23, 'Ancón');
INSERT INTO distritos VALUES (52, 23, 'Ate');
INSERT INTO distritos VALUES (53, 23, 'Barranco');
INSERT INTO distritos VALUES (54, 23, 'Breña');
INSERT INTO distritos VALUES (55, 23, 'Carabayllo');
INSERT INTO distritos VALUES (56, 23, 'Chaclacayo');
INSERT INTO distritos VALUES (57, 23, 'Chorrillos');
INSERT INTO distritos VALUES (58, 23, 'Cieneguilla');
INSERT INTO distritos VALUES (59, 23, 'Comas');
INSERT INTO distritos VALUES (60, 23, 'El Agustino');
INSERT INTO distritos VALUES (61, 23, 'Independencia');
INSERT INTO distritos VALUES (62, 23, 'Jesús María');
INSERT INTO distritos VALUES (63, 23, 'La Molina');
INSERT INTO distritos VALUES (64, 23, 'La Victoria');
INSERT INTO distritos VALUES (65, 23, 'Lince');
INSERT INTO distritos VALUES (66, 23, 'Los Olivos');
INSERT INTO distritos VALUES (67, 23, 'Lurigancho-Chosica');
INSERT INTO distritos VALUES (68, 23, 'Lurin');
INSERT INTO distritos VALUES (69, 23, 'Magdalena del Mar');
INSERT INTO distritos VALUES (70, 23, 'Miraflores');
INSERT INTO distritos VALUES (71, 23, 'Pueblo Libre');
INSERT INTO distritos VALUES (72, 24, 'Contamana');
INSERT INTO distritos VALUES (73, 24, 'Inahuaya');
INSERT INTO distritos VALUES (74, 25, 'Tambopata');
INSERT INTO distritos VALUES (75, 25, 'Las Piedras');
INSERT INTO distritos VALUES (76, 26, 'Ilo');
INSERT INTO distritos VALUES (77, 26, 'El Algarrobal');
INSERT INTO distritos VALUES (78, 26, 'Pacocha');
INSERT INTO distritos VALUES (79, 27, 'Oxapampa');
INSERT INTO distritos VALUES (80, 27, 'Chontabamba');
INSERT INTO distritos VALUES (81, 28, 'Sullana');
INSERT INTO distritos VALUES (82, 28, 'Bellavista');
INSERT INTO distritos VALUES (83, 29, 'Cabanilla');
INSERT INTO distritos VALUES (84, 29, 'Calapuja');
INSERT INTO distritos VALUES (85, 30, 'Moyobamba');
INSERT INTO distritos VALUES (86, 30, 'Soritor');
INSERT INTO distritos VALUES (87, 31, 'Tarata');
INSERT INTO distritos VALUES (88, 31, 'Estique');
INSERT INTO distritos VALUES (89, 32, 'Zarumilla');
INSERT INTO distritos VALUES (90, 32, 'Papayal');
INSERT INTO distritos VALUES (91, 33, 'Raimondi');
INSERT INTO distritos VALUES (92, 33, 'Yuruá');