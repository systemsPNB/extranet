<?php
// Conexión 1---------------------------------------------------------------------------------------------------------------------
const SERVER = "190.202.37.62 options='--client_encoding=UTF8'";
const DBNAME = 'extranet_db';
const DBUSER = 'postgres';
const DBPASS = 'extranet-systems-cpnb';
const DBPORT = 5432; // Solo para base de datos PostgreSQL
// Para Bases de datos MySQL
// const SGBD = 'mysql:host='.SERVER.';dbname='.DBNAME;
// Para Bases de datos PostgreSQL
const SGBD = 'pgsql:host='.SERVER.';port='.DBPORT.';dbname='.DBNAME;

/* Constantes para el modo de encriptación de las contraseñas */
// No modificar
const METHOD = 'AES-256-CBC';
// Colocar aquí las iniciales del sistema, incluir algunos simbolos, esto antes de registrar una cuenta de usuario en la base de datos, luego de registrar algo, no se puede modificar esta constante, ya que si se hace, no se podra recuperar el valor de la contraseña encriptada
const SECRET_KEY = '$SWE@001';
// Colocar solo números, cualquier valor, esto antes de registrar una cuenta de usuario en la base de datos, luego de registrar algo, no se puede modificar esta constante, ya que si se hace, no se podra recuperar el valor de la contraseña encriptada
const SECRET_IV = '152518';

// Segunda conexión
const SERVER2 = "192.168.8.10 options='--client_encoding=UTF8'";
const DBNAME2 = 'sigefirrhh';
const DBUSER2 = 'postgres';
const DBPASS2 = '12345678';
const DBPORT2 = 5432; // Solo para base de datos PostgreSQL
// Para Bases de datos MySQL
// const SGBD = 'mysql:host='.SERVER.';dbname='.DBNAME;
// Para Bases de datos PostgreSQL
const SGBD2 = 'pgsql:host='.SERVER2.';port='.DBPORT2.';dbname='.DBNAME2;