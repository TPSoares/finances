<?php

class profileController extends controller {
    public function index() {

        $data = array();
        $usuario = new Usuario();
       
        if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
           
            $data["info"] = $usuario->get($_SESSION["id"]);
            $this->loadTemplate("profile", $data);
        
        } else {
            $this->loadTemplate("home", $data);
            
        }
        //$this->loadTemplate("profile");

    }

}
