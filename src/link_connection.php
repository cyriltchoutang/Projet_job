<?php
    define('SQL_HOST', 'localhost');
    define('SQL_USER', 'root');
    define('SQL_PWD', '');
    define('SQL_DB', 'cmc_db');
    define('RESSOURCES_DIR', __DIR__ . '/../resources/');
    
    spl_autoload_register(function (string $classname) {
        include_once(__DIR__ . '/' . $classname . '.php');
    });

    function connectionWithoutDb($host, $username, $password){
        $db = new PDO('mysql:host=' . $host, $username, $password);
        return $db;
    }

    function connectionWithDb($host, $databaseName, $username, $password){
        $db = new PDO('mysql:host=' . $host . ';dbname=' . $databaseName, $username, $password);
        return $db;
    }

?>