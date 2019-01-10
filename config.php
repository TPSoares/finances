<?php
    require "environment.php";

    $config = array();

    if(ENVIRONMENT == "development") {
        define("BASE_URL", "http://localhost/finances/");
        $config["dbname"] = "finances";
        $config["host"] = "localhost";
        $config["dbuser"] = "root";
        $config["dbpass"] = "root";
    } else {
        define("BASE_URL", "http://minhasfinancas.webdev-solutions.com/");
        $config["dbname"] = "u500688611_fncs";
        $config["host"] = "localhost";
        $config["dbuser"] = "u500688611_admin";
        $config["dbpass"] = "admin00";
    }

    global $db;

    try {
        $db = new PDO("mysql:dbname=".$config["dbname"].
                        ";host=".$config["host"], 
                        $config["dbuser"], 
                        $config["dbpass"]
                    );
    } catch (PDOException $e) {
        echo "ERRO: " . $e->getMessage();
        exit; 
    }
?>