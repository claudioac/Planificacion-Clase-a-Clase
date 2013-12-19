--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: asignatura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE asignatura (
    codigo character varying(8) NOT NULL,
    nombre character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.asignatura OWNER TO postgres;

--
-- Name: carrera; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE carrera (
    codigo integer NOT NULL,
    nombre character varying(255),
    escuela_fk integer NOT NULL,
    jefecarrera_fk character varying(12) NOT NULL
);


ALTER TABLE public.carrera OWNER TO postgres;

--
-- Name: carrera_asignatura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE carrera_asignatura (
    codigo_carrera integer NOT NULL,
    codigo_asignatura character varying(8) NOT NULL
);


ALTER TABLE public.carrera_asignatura OWNER TO postgres;

--
-- Name: comuna; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE comuna (
    pk integer NOT NULL,
    nombre character varying(255) NOT NULL,
    provincia_fk integer NOT NULL
);


ALTER TABLE public.comuna OWNER TO postgres;

--
-- Name: comuna_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE comuna_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comuna_pk_seq OWNER TO postgres;

--
-- Name: comuna_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE comuna_pk_seq OWNED BY comuna.pk;


--
-- Name: contenido; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE contenido (
    clasificacion_fk integer NOT NULL,
    semana integer NOT NULL,
    objetivo text,
    contenido text,
    evaluacion text
);


ALTER TABLE public.contenido OWNER TO postgres;

--
-- Name: contenido_semana_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE contenido_semana_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contenido_semana_seq OWNER TO postgres;

--
-- Name: contenido_semana_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE contenido_semana_seq OWNED BY contenido.semana;


--
-- Name: cursos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos (
    pk integer NOT NULL,
    semestre integer NOT NULL,
    anio integer NOT NULL,
    docente_fk character varying(12) NOT NULL,
    seccion integer NOT NULL,
    codigo character varying(8) NOT NULL
);


ALTER TABLE public.cursos OWNER TO postgres;

--
-- Name: cursos_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cursos_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cursos_pk_seq OWNER TO postgres;

--
-- Name: cursos_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cursos_pk_seq OWNED BY cursos.pk;


--
-- Name: decano; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE decano (
    rut character varying(12) NOT NULL,
    facultad_fk integer NOT NULL
);


ALTER TABLE public.decano OWNER TO postgres;

--
-- Name: departamentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE departamentos (
    pk integer NOT NULL,
    facultad_fk integer NOT NULL,
    departamento character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.departamentos OWNER TO postgres;

--
-- Name: departamentos_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE departamentos_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamentos_pk_seq OWNER TO postgres;

--
-- Name: departamentos_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE departamentos_pk_seq OWNED BY departamentos.pk;


--
-- Name: directordepartamento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE directordepartamento (
    rut character varying(12) NOT NULL,
    departamento_fk integer NOT NULL
);


ALTER TABLE public.directordepartamento OWNER TO postgres;

--
-- Name: docentes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE docentes (
    pk integer NOT NULL,
    nombre character varying(255) NOT NULL,
    apellidos character varying(255) NOT NULL,
    rut character varying(12) NOT NULL,
    fecha_nacimiento date,
    genero character(1),
    direccion character varying(255) NOT NULL,
    comuna_fk integer NOT NULL,
    telefono character varying(255),
    celular character varying(255),
    email character varying(255) NOT NULL,
    departamento_fk integer NOT NULL,
    jerarquia character varying(255) NOT NULL,
    contrato character varying(255) NOT NULL,
    jornada character varying(255) NOT NULL,
    grado integer NOT NULL,
    funcion character varying(255) NOT NULL,
    eliminado integer NOT NULL
);


ALTER TABLE public.docentes OWNER TO postgres;

--
-- Name: docentes_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE docentes_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.docentes_pk_seq OWNER TO postgres;

--
-- Name: docentes_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE docentes_pk_seq OWNED BY docentes.pk;


--
-- Name: escuela; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE escuela (
    pk integer NOT NULL,
    departamento_fk integer NOT NULL,
    escuela character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.escuela OWNER TO postgres;

--
-- Name: escuela_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE escuela_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.escuela_pk_seq OWNER TO postgres;

--
-- Name: escuela_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE escuela_pk_seq OWNED BY escuela.pk;


--
-- Name: facultades; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE facultades (
    pk integer NOT NULL,
    facultad character varying(255) NOT NULL,
    descripcion text
);


ALTER TABLE public.facultades OWNER TO postgres;

--
-- Name: facultades_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE facultades_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.facultades_pk_seq OWNER TO postgres;

--
-- Name: facultades_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE facultades_pk_seq OWNED BY facultades.pk;


--
-- Name: jefecarrera; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE jefecarrera (
    docente_fk character varying(12) NOT NULL,
    escuela_fk integer NOT NULL
);


ALTER TABLE public.jefecarrera OWNER TO postgres;

--
-- Name: paises; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE paises (
    pk integer NOT NULL,
    cod_num integer NOT NULL,
    alfa_tres character varying(3) NOT NULL,
    alfa_dos character varying(2) NOT NULL,
    nombre character varying(255) NOT NULL
);


ALTER TABLE public.paises OWNER TO postgres;

--
-- Name: paises_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paises_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paises_pk_seq OWNER TO postgres;

--
-- Name: paises_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE paises_pk_seq OWNED BY paises.pk;


--
-- Name: planificacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE planificacion (
    cod_clasificacion integer NOT NULL,
    rut character varying(12) NOT NULL,
    facultad integer NOT NULL,
    departamento integer NOT NULL,
    escuela integer NOT NULL,
    objetivo text,
    asignatura character varying(8) NOT NULL,
    semestre integer,
    fecha date,
    estrategia text,
    carrera integer
);


ALTER TABLE public.planificacion OWNER TO postgres;

--
-- Name: planificacion_cod_clasificacion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE planificacion_cod_clasificacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.planificacion_cod_clasificacion_seq OWNER TO postgres;

--
-- Name: planificacion_cod_clasificacion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE planificacion_cod_clasificacion_seq OWNED BY planificacion.cod_clasificacion;


--
-- Name: provincias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE provincias (
    pk integer NOT NULL,
    nombre character varying(255) NOT NULL,
    regiones_fk integer NOT NULL
);


ALTER TABLE public.provincias OWNER TO postgres;

--
-- Name: provincias_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE provincias_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.provincias_pk_seq OWNER TO postgres;

--
-- Name: provincias_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE provincias_pk_seq OWNED BY provincias.pk;


--
-- Name: regiones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE regiones (
    pk integer NOT NULL,
    nombre character varying(255) NOT NULL,
    corfo character varying(255) NOT NULL,
    codigo character varying(5) NOT NULL,
    numero integer NOT NULL,
    paises_fk integer NOT NULL
);


ALTER TABLE public.regiones OWNER TO postgres;

--
-- Name: regiones_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE regiones_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.regiones_pk_seq OWNER TO postgres;

--
-- Name: regiones_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE regiones_pk_seq OWNED BY regiones.pk;


--
-- Name: semana; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE semana (
    pk integer NOT NULL,
    semana_anual integer NOT NULL,
    semana_planificada character(15),
    contenido_fk integer
);


ALTER TABLE public.semana OWNER TO postgres;

--
-- Name: semana_pk_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE semana_pk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.semana_pk_seq OWNER TO postgres;

--
-- Name: semana_pk_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE semana_pk_seq OWNED BY semana.pk;


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comuna ALTER COLUMN pk SET DEFAULT nextval('comuna_pk_seq'::regclass);


--
-- Name: semana; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contenido ALTER COLUMN semana SET DEFAULT nextval('contenido_semana_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos ALTER COLUMN pk SET DEFAULT nextval('cursos_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY departamentos ALTER COLUMN pk SET DEFAULT nextval('departamentos_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docentes ALTER COLUMN pk SET DEFAULT nextval('docentes_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY escuela ALTER COLUMN pk SET DEFAULT nextval('escuela_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY facultades ALTER COLUMN pk SET DEFAULT nextval('facultades_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paises ALTER COLUMN pk SET DEFAULT nextval('paises_pk_seq'::regclass);


--
-- Name: cod_clasificacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY planificacion ALTER COLUMN cod_clasificacion SET DEFAULT nextval('planificacion_cod_clasificacion_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY provincias ALTER COLUMN pk SET DEFAULT nextval('provincias_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY regiones ALTER COLUMN pk SET DEFAULT nextval('regiones_pk_seq'::regclass);


--
-- Name: pk; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY semana ALTER COLUMN pk SET DEFAULT nextval('semana_pk_seq'::regclass);


--
-- Data for Name: asignatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO asignatura VALUES ('INF-635', 'Ingeniería en Software', '');


--
-- Data for Name: carrera; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO carrera VALUES (21030, 'Ingeniería en Informatica', 1, '11.111.111-1');


--
-- Data for Name: carrera_asignatura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO carrera_asignatura VALUES (21030, 'INF-635');


--
-- Data for Name: comuna; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO comuna VALUES (1, 'Macul', 1);


--
-- Name: comuna_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('comuna_pk_seq', 1, true);


--
-- Data for Name: contenido; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: contenido_semana_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('contenido_semana_seq', 1, false);


--
-- Data for Name: cursos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cursos VALUES (1, 2, 2013, '12.345.678-9', 1, 'INF-635');


--
-- Name: cursos_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cursos_pk_seq', 1, true);


--
-- Data for Name: decano; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO decano VALUES ('21.212.212-2', 2);


--
-- Data for Name: departamentos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO departamentos VALUES (1, 2, 'Informática y Computación', '');
INSERT INTO departamentos VALUES (2, 2, 'Industria', '');
INSERT INTO departamentos VALUES (3, 2, 'Electricidad', '');
INSERT INTO departamentos VALUES (4, 2, 'Mecánica', '');


--
-- Name: departamentos_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('departamentos_pk_seq', 4, true);


--
-- Data for Name: directordepartamento; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO directordepartamento VALUES ('22.222.222-2', 1);


--
-- Data for Name: docentes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO docentes VALUES (1, 'Sebastian', 'Salazar Molina', '12.345.678-9', '1990-01-12', 'M', 'Macul 123', 1, '1233445', '1233455', 'asdasd@gmail.cl', 1, 'Profesor', 'Part-time', 'Parcial', 1, 'Profesor', 0);
INSERT INTO docentes VALUES (2, 'Crescente', 'Urrutia Ortega', '21.212.212-2', '1991-01-12', 'M', 'Macul 123', 1, '12334567', '12334566', 'asdas@gmg.cl', 3, 'Decano', 'Indefinido', 'Full-time', 1, 'Decano', 0);
INSERT INTO docentes VALUES (3, 'Hector', 'Pincheira', '11.111.111-1', '1980-01-12', 'M', 'Macul 123', 1, '1234556', '12334565', 'asdad@gmail.co', 1, 'Jefe Carrera', 'Indenifinido', 'Full-time', 1, 'Jefe Carrera', 0);
INSERT INTO docentes VALUES (4, 'Mauro', 'Castillo Valdes', '22.222.222-2', '1981-01-12', 'M', 'macul 123', 1, '12345687', '123456877', 'asdasd@mail.cl', 1, 'Director Departamento', 'Indefinido', 'Full-time', 0, 'Director', 0);


--
-- Name: docentes_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('docentes_pk_seq', 4, true);


--
-- Data for Name: escuela; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO escuela VALUES (1, 1, 'Informática', '');
INSERT INTO escuela VALUES (2, 2, 'Industria', '');
INSERT INTO escuela VALUES (3, 3, 'Electrónica', '');
INSERT INTO escuela VALUES (4, 4, 'Mecánica', '');
INSERT INTO escuela VALUES (5, 2, 'Industria de la Madera', '');
INSERT INTO escuela VALUES (6, 4, 'Geomensura', '');
INSERT INTO escuela VALUES (7, 2, 'Transporte y Tránsito', '');


--
-- Name: escuela_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('escuela_pk_seq', 7, true);


--
-- Data for Name: facultades; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO facultades VALUES (1, 'Administración y Economia', '');
INSERT INTO facultades VALUES (2, 'Ingeníeria', '');
INSERT INTO facultades VALUES (3, 'Ciencias de la Construcción y Ordenamiento Territorial', '');
INSERT INTO facultades VALUES (4, 'Ciencias Naturales, Matemática y del Medio Ambiente', '');
INSERT INTO facultades VALUES (5, 'Humanidades y Tecnologías de la Comunicación Social', '');


--
-- Name: facultades_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('facultades_pk_seq', 5, true);


--
-- Data for Name: jefecarrera; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO jefecarrera VALUES ('11.111.111-1', 1);


--
-- Data for Name: paises; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO paises VALUES (5, 4, 'AUT', 'AT', 'Austria');
INSERT INTO paises VALUES (25, 5, 'BRA', 'BR', 'Brasil');
INSERT INTO paises VALUES (3, 2, 'CHN', 'CN', 'China');
INSERT INTO paises VALUES (1, 1, 'CHL', 'CL', 'Chile');


--
-- Name: paises_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paises_pk_seq', 27, true);


--
-- Data for Name: planificacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO planificacion VALUES (1, '12.345.678-9', 2, 1, 1, 'asdasd', 'INF-635', 2, '2013-12-13', 'asdasdasd', 21030);
INSERT INTO planificacion VALUES (2, '12.345.678-9', 2, 1, 1, 'Hola Mundo', 'INF-635', 1, '2013-12-14', 'Hola Mundo', 21030);
INSERT INTO planificacion VALUES (4, '11.111.111-1', 2, 1, 1, '313', 'INF-635', 1, '2013-12-12', '12123', 21030);
INSERT INTO planificacion VALUES (6, '11.111.111-1', 2, 1, 1, '', 'INF-635', 1, '2013-12-01', '', 21030);


--
-- Name: planificacion_cod_clasificacion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('planificacion_cod_clasificacion_seq', 6, true);


--
-- Data for Name: provincias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO provincias VALUES (1, 'Santiago', 1);


--
-- Name: provincias_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('provincias_pk_seq', 1, true);


--
-- Data for Name: regiones; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO regiones VALUES (1, 'Metropolitana', 'corfo', '13', 13, 1);


--
-- Name: regiones_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('regiones_pk_seq', 1, true);


--
-- Data for Name: semana; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: semana_pk_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('semana_pk_seq', 1, false);


--
-- Name: asignatura_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY asignatura
    ADD CONSTRAINT asignatura_nombre_key UNIQUE (nombre);


--
-- Name: asignatura_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY asignatura
    ADD CONSTRAINT asignatura_pkey PRIMARY KEY (codigo);


--
-- Name: carrera_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY carrera
    ADD CONSTRAINT carrera_pkey PRIMARY KEY (codigo);


--
-- Name: comuna_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY comuna
    ADD CONSTRAINT comuna_nombre_key UNIQUE (nombre);


--
-- Name: comuna_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY comuna
    ADD CONSTRAINT comuna_pkey PRIMARY KEY (pk);


--
-- Name: contenido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contenido
    ADD CONSTRAINT contenido_pkey PRIMARY KEY (clasificacion_fk);


--
-- Name: cursos_anio_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_anio_key UNIQUE (anio);


--
-- Name: cursos_codigo_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_codigo_key UNIQUE (codigo);


--
-- Name: cursos_docente_fk_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_docente_fk_key UNIQUE (docente_fk);


--
-- Name: cursos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_pkey PRIMARY KEY (pk);


--
-- Name: cursos_semestre_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_semestre_key UNIQUE (semestre);


--
-- Name: decano_facultad_fk_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY decano
    ADD CONSTRAINT decano_facultad_fk_key UNIQUE (facultad_fk);


--
-- Name: decano_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY decano
    ADD CONSTRAINT decano_pkey PRIMARY KEY (rut);


--
-- Name: departamentos_departamento_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_departamento_key UNIQUE (departamento);


--
-- Name: departamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_pkey PRIMARY KEY (pk);


--
-- Name: directordepartamento_departamento_fk_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY directordepartamento
    ADD CONSTRAINT directordepartamento_departamento_fk_key UNIQUE (departamento_fk);


--
-- Name: directordepartamento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY directordepartamento
    ADD CONSTRAINT directordepartamento_pkey PRIMARY KEY (rut);


--
-- Name: docentes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_pkey PRIMARY KEY (pk);


--
-- Name: docentes_rut_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_rut_key UNIQUE (rut);


--
-- Name: escuela_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY escuela
    ADD CONSTRAINT escuela_pkey PRIMARY KEY (pk);


--
-- Name: facultades_facultad_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY facultades
    ADD CONSTRAINT facultades_facultad_key UNIQUE (facultad);


--
-- Name: facultades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY facultades
    ADD CONSTRAINT facultades_pkey PRIMARY KEY (pk);


--
-- Name: jefecarrera_docente_fk_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY jefecarrera
    ADD CONSTRAINT jefecarrera_docente_fk_key UNIQUE (docente_fk);


--
-- Name: jefecarrera_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY jefecarrera
    ADD CONSTRAINT jefecarrera_pkey PRIMARY KEY (docente_fk);


--
-- Name: paises_alfa_dos_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY paises
    ADD CONSTRAINT paises_alfa_dos_key UNIQUE (alfa_dos);


--
-- Name: paises_alfa_tres_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY paises
    ADD CONSTRAINT paises_alfa_tres_key UNIQUE (alfa_tres);


--
-- Name: paises_cod_num_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY paises
    ADD CONSTRAINT paises_cod_num_key UNIQUE (cod_num);


--
-- Name: paises_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY paises
    ADD CONSTRAINT paises_nombre_key UNIQUE (nombre);


--
-- Name: paises_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY paises
    ADD CONSTRAINT paises_pkey PRIMARY KEY (pk);


--
-- Name: planificacion_cod_clasificacion_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY planificacion
    ADD CONSTRAINT planificacion_cod_clasificacion_key UNIQUE (cod_clasificacion);


--
-- Name: planificacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY planificacion
    ADD CONSTRAINT planificacion_pkey PRIMARY KEY (cod_clasificacion);


--
-- Name: provincias_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY provincias
    ADD CONSTRAINT provincias_nombre_key UNIQUE (nombre);


--
-- Name: provincias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY provincias
    ADD CONSTRAINT provincias_pkey PRIMARY KEY (pk);


--
-- Name: regiones_codigo_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY regiones
    ADD CONSTRAINT regiones_codigo_key UNIQUE (codigo);


--
-- Name: regiones_nombre_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY regiones
    ADD CONSTRAINT regiones_nombre_key UNIQUE (nombre);


--
-- Name: regiones_numero_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY regiones
    ADD CONSTRAINT regiones_numero_key UNIQUE (numero);


--
-- Name: regiones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY regiones
    ADD CONSTRAINT regiones_pkey PRIMARY KEY (pk);


--
-- Name: semana_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY semana
    ADD CONSTRAINT semana_pkey PRIMARY KEY (pk);


--
-- Name: carrera_asignatura_codigo_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carrera_asignatura
    ADD CONSTRAINT carrera_asignatura_codigo_asignatura_fkey FOREIGN KEY (codigo_asignatura) REFERENCES asignatura(codigo) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: carrera_asignatura_codigo_carrera_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carrera_asignatura
    ADD CONSTRAINT carrera_asignatura_codigo_carrera_fkey FOREIGN KEY (codigo_carrera) REFERENCES carrera(codigo) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: carrera_escuela_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carrera
    ADD CONSTRAINT carrera_escuela_fk_fkey FOREIGN KEY (escuela_fk) REFERENCES escuela(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: carrera_jefecarrera_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY carrera
    ADD CONSTRAINT carrera_jefecarrera_fk_fkey FOREIGN KEY (jefecarrera_fk) REFERENCES jefecarrera(docente_fk);


--
-- Name: comuna_provincia_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comuna
    ADD CONSTRAINT comuna_provincia_fk_fkey FOREIGN KEY (provincia_fk) REFERENCES provincias(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: contenido_clasificacion_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY contenido
    ADD CONSTRAINT contenido_clasificacion_fk_fkey FOREIGN KEY (clasificacion_fk) REFERENCES planificacion(cod_clasificacion) ON DELETE CASCADE;


--
-- Name: cursos_codigo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_codigo_fkey FOREIGN KEY (codigo) REFERENCES asignatura(codigo) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: cursos_docente_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_docente_fk_fkey FOREIGN KEY (docente_fk) REFERENCES docentes(rut);


--
-- Name: decano_facultad_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY decano
    ADD CONSTRAINT decano_facultad_fk_fkey FOREIGN KEY (facultad_fk) REFERENCES facultades(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: decano_rut_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY decano
    ADD CONSTRAINT decano_rut_fkey FOREIGN KEY (rut) REFERENCES docentes(rut) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: departamentos_facultad_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_facultad_fk_fkey FOREIGN KEY (facultad_fk) REFERENCES facultades(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: directordepartamento_departamento_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY directordepartamento
    ADD CONSTRAINT directordepartamento_departamento_fk_fkey FOREIGN KEY (departamento_fk) REFERENCES departamentos(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: directordepartamento_rut_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY directordepartamento
    ADD CONSTRAINT directordepartamento_rut_fkey FOREIGN KEY (rut) REFERENCES docentes(rut) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: docentes_comuna_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_comuna_fk_fkey FOREIGN KEY (comuna_fk) REFERENCES comuna(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: docentes_departamento_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_departamento_fk_fkey FOREIGN KEY (departamento_fk) REFERENCES departamentos(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: escuela_departamento_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY escuela
    ADD CONSTRAINT escuela_departamento_fk_fkey FOREIGN KEY (departamento_fk) REFERENCES departamentos(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: jefecarrera_docente_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY jefecarrera
    ADD CONSTRAINT jefecarrera_docente_fk_fkey FOREIGN KEY (docente_fk) REFERENCES docentes(rut);


--
-- Name: jefecarrera_escuela_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY jefecarrera
    ADD CONSTRAINT jefecarrera_escuela_fk_fkey FOREIGN KEY (escuela_fk) REFERENCES escuela(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: planificacion_asignatura_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY planificacion
    ADD CONSTRAINT planificacion_asignatura_fkey FOREIGN KEY (asignatura) REFERENCES cursos(codigo) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: planificacion_carrera_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY planificacion
    ADD CONSTRAINT planificacion_carrera_fkey FOREIGN KEY (carrera) REFERENCES carrera(codigo);


--
-- Name: planificacion_departamento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY planificacion
    ADD CONSTRAINT planificacion_departamento_fkey FOREIGN KEY (departamento) REFERENCES departamentos(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: planificacion_escuela_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY planificacion
    ADD CONSTRAINT planificacion_escuela_fkey FOREIGN KEY (escuela) REFERENCES escuela(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: planificacion_facultad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY planificacion
    ADD CONSTRAINT planificacion_facultad_fkey FOREIGN KEY (facultad) REFERENCES facultades(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: planificacion_rut_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY planificacion
    ADD CONSTRAINT planificacion_rut_fkey FOREIGN KEY (rut) REFERENCES docentes(rut) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: provincias_regiones_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY provincias
    ADD CONSTRAINT provincias_regiones_fk_fkey FOREIGN KEY (regiones_fk) REFERENCES regiones(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: regiones_paises_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY regiones
    ADD CONSTRAINT regiones_paises_fk_fkey FOREIGN KEY (paises_fk) REFERENCES paises(pk) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: semana_contenido_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY semana
    ADD CONSTRAINT semana_contenido_fk_fkey FOREIGN KEY (contenido_fk) REFERENCES contenido(clasificacion_fk) ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

