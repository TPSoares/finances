<?php
    class dashboardController extends controller {
        public function index() {

            $data = array(
            
            );

            $usuario = new Usuario();   
                     

            if(!empty($_POST["email"]) && !empty($_POST["senha"])) {

                $email = $_POST["email"];
                $senha = $_POST["senha"];

                
                $usuario->read($email, $senha);
                //Leitura de todas as despesas por usuário
                $despesas = new Despesa();
                
                $data["despesas"] = $despesas->read($_SESSION["id"]);

                if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                    $data["info"] = $usuario->get($_SESSION["id"]);
                    
                    $this->loadTemplate("dashboard", $data);
                } else {
                    $this->loadTemplate("home", $data);
                    
                }
            } else {
                
                if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
                    $data["info"] = $usuario->get($_SESSION["id"]);
                    //Leitura de todas as despesas por usuário
                    $despesas = new Despesa();
                    $data["despesas"] = $despesas->read($_SESSION["id"]);
                    $this->loadTemplate("dashboard", $data);
                } else {
                    Header("Location: " . BASE_URL);                    
                }

                
            }
        }

        public function edit($id) {

            $array = array();
            $usuario = new Usuario();
                
            if(!empty($_POST["nome"]) && !empty($_POST["email"])) {
                $nome = $_POST["nome"];
                $email = $_POST["email"];

                $usuario->edit($id, $nome, $email);

            } else {
                $array["info"] = $usuario->get($id);

                if(isset($array["info"]["id"])) {
                    $this->loadTemplate("edit", $array);
                    exit();
                }
            }    

            header("Location: " . BASE_URL . "dashboard");
        }

        public function logout() {

            unset($_SESSION["id"]);

            Header("Location:" . BASE_URL);
            exit();
        }
    }
?>