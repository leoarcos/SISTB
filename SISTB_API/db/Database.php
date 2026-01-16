<?php

/*
    @author LLEO ARCOS
*/

header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Métodos permitidos 

class Database {

    public $_connection;
    private static $_instance; // La única instancia
    private $_host = "localhost";      // servidor
    private $_port = "5432";           // puerto por defecto PostgreSQL
    private $_username = "postgres";   // usuario
    private $_password = "123456";           // contraseña
    private $_database = "ids2016";   // nombre de la base de datos

    public $key = '6446ECA43764FC454D4E19EE88A71F97FF9B0835E763EA82F574036054641772';
    public $token;

    // Singleton: obtener la instancia
    public static function getInstance() {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Constructor
    public function __construct() {
        try {
            // DSN para PostgreSQL
            $dsn = "pgsql:host=".$this->_host.";port=".$this->_port.";dbname=".$this->_database.";";

            $this->_connection = new PDO($dsn, $this->_username, $this->_password);

            // Opciones recomendadas: errores como excepciones
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $err) {
            echo "Error de conexión: " . $err->getMessage();
        }
    }

    // Evitar clonación de la instancia
    private function __clone() { }

    // Obtener la conexión PDO
    public function getConnection() {
        return $this->_connection;
    }
}
