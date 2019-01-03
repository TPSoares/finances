<?php
    class despesasController extends controller {
        public function index() {

        $this->loadTemplate("despesas");

        }

        public function create() {
            $data = array(
            
            );

            if(!empty($_POST["descricao"]) && !empty($_POST["valor"]) && !empty($_POST["despesa"]) && !empty($_POST["postedDate"]) && !empty($_POST["categoria"])) {
                $descricao = $_POST["descricao"];
                $valor = $_POST["valor"];
                $despesa = $_POST["despesa"];
                $postedDate = $_POST["postedDate"];
                $categoria = $_POST["categoria"];
                
                //$despesa = $_POST["despesa"];
                $despesas = new Despesa();
                $despesas->create($descricao, $valor, $despesa, $postedDate, $categoria);

                header("Location: " . BASE_URL . "dashboard");
            }
        }

        public function edit($id) {
            $array = array();
            $despesas = new Despesa();

            if(!empty($_POST["descricao"]) && !empty($_POST["valor"]) && !empty($_POST["despesa"]) && !empty($_POST["postedDate"]) && !empty($_POST["categoria"])) {
                $descricao = $_POST["descricao"];
                $valor = $_POST["valor"];
                $despesa = $_POST["despesa"];
                $postedDate = $_POST["postedDate"];
                $categoria = $_POST["categoria"];

                $despesas->edit($id, $descricao, $valor, $despesa, $postedDate, $categoria);
            } else {
                $array["despesasInfo"] = $despesas->get($id);

                if(isset($array["despesasInfo"]["id"])) {
                    $this->loadTemplate("despesasEdit", $array);
                    exit();
                }
            }

            header("Location: " . BASE_URL . "dashboard");

        }

        public function delete($id) {
            $despesas = new Despesa();

            $despesas->delete($id);

            header("Location: " . BASE_URL . "dashboard");

        }
    }
?>