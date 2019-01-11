<?php
    class homeController extends controller {
        public function index() {

            $data = array(
            
            );

            
            $data["erro"] = 0;
            $this->loadTemplate("home", $data);

        }

        public function signup() {

            echo "FELADAPUTA";

        }
    }
?>