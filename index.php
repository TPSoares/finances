<?php
    session_start();
    // session_destroy();
    require "config.php";

    ini_set('display_errors', 'On');
    ini_set('html_errors', 0);
    

    spl_autoload_register(function($class) {
        
        if(file_exists("controllers/" . $class . ".php")) {
            require "controllers/" . $class . ".php";
        } else if (file_exists("models/" . $class . ".php")) {
            require "models/" . $class . ".php";
        } else if (file_exists("core/" . $class . ".php")) {
            require "core/" . $class . ".php";
        }
    });

    $core = new Core();
    $core->run();
?>