<?php
    class despesasController extends controller {
        public function index() {

        $this->loadTemplate("despesas");

        }

        public function create() {
            $data = array(
            
            );

            if(!empty($_POST["descricao"]) && !empty($_POST["valor"]) && !empty($_POST["despesa"])) {
                $descricao = $_POST["descricao"];
                $valor = $_POST["valor"];
                $despesa = $_POST["despesa"];
                //$despesa = $_POST["despesa"];
                $despesas = new Despesa();
                $despesas->create($descricao, $valor, $despesa);

                header("Location: " . BASE_URL . "dashboard");
            }

           

        }
    }
?>