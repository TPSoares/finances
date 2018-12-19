<?php
    class signupController extends controller {
        public function index() {

            $data = array(
            
            );

            $this->loadTemplate("signup", $data);

        }

        //create user
        public function create() {

            $data = array();

            if(!empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["senha"])) {
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];

                $usuario = new Usuario();
                $usuario->create($nome, $email, $senha);

                header("Location: " . BASE_URL);
            }
        }
    }
?>