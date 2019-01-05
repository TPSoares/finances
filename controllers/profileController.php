<?php

class profileController extends controller {
    public function index() {

        $data = array();
        $usuario = new Usuario();
       
        if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {

            $despesas = new Despesa();
                
            $data["despesas"] = $despesas->read($_SESSION["id"]);
           
            $data["info"] = $usuario->get($_SESSION["id"]);
            $this->loadTemplate("profile", $data);
        
        } else {
            $this->loadTemplate("home", $data);
            
        }
        //$this->loadTemplate("profile");

    }

    public function data() {
        header('Content-Type: application/json');

        $data = array();
        $usuario = new Usuario();
       
        if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {

            $despesas = new Despesa();
                
            $data = json_encode($despesas->getJSON($_SESSION["id"]), JSON_PRETTY_PRINT);
           
            // $data = json_encode($usuario->get($_SESSION["id"]));

            print $data;

        } else {
            $this->loadTemplate("home", $data);
            
        }


    }

}
