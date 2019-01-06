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
            
            $info = $despesas->getJSON($_SESSION["id"]);
            $data = json_encode($despesas->getJSON($_SESSION["id"]), JSON_PRETTY_PRINT);
           
            // $data = json_encode($usuario->get($_SESSION["id"]));

            // print_r($info);

            // $result = array();

            // for ($i=0; $i < sizeof($info); $i++) { 
            //     // echo $info[$i]["categoria"];
            //     if(in_array($info[$i]["categoria"], $result)) {
            //         //$result[$i]["valor"] += $info[$i]["valor"];
            //         echo "dota";
            //     } else {
            //         $result[$i]["categoria"] = $info[$i]["categoria"];
            //         $result[$i]["valor"] = $info[$i]["valor"];
            //         echo "a";  
            //     }
            // }

            print $data;

        } else {
            $this->loadTemplate("home", $data);
            
        }


    }

}
