<?php
    require "environment.php";

    $config = array();

    if(ENVIRONMENT == "development") {
        define("BASE_URL", "http://localhost/finances/");
        $config["dbname"] = "finances";
        $config["host"] = "localhost";
        $config["dbuser"] = "tenodar";
        $config["dbpass"] = "teste";
    } else {
        define("BASE_URL", "http://localhost/finances/");
        $config["dbname"] = "finances";
        $config["host"] = "localhost";
        $config["dbuser"] = "tenodar";
        $config["dbpass"] = "teste";
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