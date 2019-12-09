<?php
// Conexión 1---------------------------------------------------------------------------------------------------------------------
const SERVER = "localhost options='--client_encoding=UTF8'";
const DBNAME = 'nomina';
const DBUSER = 'postgres';
const DBPASS = 'sistemas-cpnb';
const DBPORT = 5432; // Solo para base de datos PostgreSQL
// Para Bases de datos MySQL
// const SGBD = 'mysql:host='.SERVER.';dbname='.DBNAME;
// Para Bases de datos PostgreSQL
const SGBD = 'pgsql:host='.SERVER.';port='.DBPORT.';dbname='.DBNAME;

/* Constantes para el modo de encriptación de las contraseñas */
// No modificar
const METHOD = 'AES-256-CBC';
// Colocar aquí las iniciales del sistema, incluir algunos simbolos, esto antes de registrar una cuenta de usuario en la base de datos, luego de registrar algo, no se puede modificar esta constante, ya que si se hace, no se podra recuperar el valor de la contraseña encriptada
const SECRET_KEY = '$SW@001';
// Colocar solo números, cualquier valor, esto antes de registrar una cuenta de usuario en la base de datos, luego de registrar algo, no se puede modificar esta constante, ya que si se hace, no se podra recuperar el valor de la contraseña encriptada
const SECRET_IV = '151519';

// Segunda conexión
const SERVER2 = "ipserver options='--client_encoding=UTF8'";
const DBNAME2 = 'database';
const DBUSER2 = 'userdatabase';
const DBPASS2 = 'pass';
const DBPORT2 = 5432; // Solo para base de datos PostgreSQL
// Para Bases de datos MySQL
// const SGBD = 'mysql:host='.SERVER.';dbname='.DBNAME;
// Para Bases de datos PostgreSQL
const SGBD2 = 'pgsql:host='.SERVER2.';port='.DBPORT2.';dbname='.DBNAME2;