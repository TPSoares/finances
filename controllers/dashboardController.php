<?php
    class dashboardController extends controller {
        public function index() {

            $data = array(
            
            );

            

            if(!empty($_POST["email"]) && !empty($_POST["senha"])) {

                $email = $_POST["email"];
                $senha = $_POST["senha"];

                $usuario = new Usuario();
                $usuario->read($email, $senha);

                if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                    
                    $this->loadTemplate("dashboard", $data);
                } else {
                    $this->loadTemplate("home", $data);
                    
                }
            } else {
                Header("Location: " . BASE_URL);
            }

        }

        public function logout() {

            unset($_SESSION["id"]);

            Header("Location:" . BASE_URL);
            exit();
        }
    }
?>