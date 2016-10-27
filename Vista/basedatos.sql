-- Database: autor

-- DROP DATABASE autor;

CREATE DATABASE autor
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'Spanish_Spain.1252'
       LC_CTYPE = 'Spanish_Spain.1252'
       CONNECTION LIMIT = -1;

CREATE TABLE public.autor
(
  iduser integer NOT NULL DEFAULT nextval('autor_iduser_seq'::regclass),
  nombre character varying(100),
  apellido character varying(100),
  correo character varying(200),
  genero character varying(200),
  instrumento character varying(200),
  rol character varying(20),
  password character varying(50),
  CONSTRAINT autor_pkey PRIMARY KEY (iduser)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.autor
  OWNER TO postgres;
