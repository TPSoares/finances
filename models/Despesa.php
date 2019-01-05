<?php

class Despesa extends model {

    public function colorCategory($categoria) {
        switch ($categoria) {
            case "Alimentação":
                return "#ff0000";
                break;

            case "Saúde":
                return "#33ff33";
                break;

            case "Lazer":
                return "#0099ff";
                break;

            case "Educação":
                return "#009933";
                break;
            
            case "Moradia":
                return "#cc3399";
                break;
            
            case "Pagamentos":
                return "#ff6600";
                break;
            
            case "Roupa":
                return "#9933ff";
                break;
            
            case "Transporte":
                return "#ffff4d";
                break;

            default:
                return "#FFF";
                break;
        }
    }  
    
    public function teste() {
        echo "dota";
    }

    public function create($descricao, $valor, $despesa, $postedDate, $categoria) {

        $array = array();

        $id = $_SESSION["id"];

        $corCategoria = $this->colorCategory($categoria);
       
        $sql = "INSERT INTO financas (descricao, valor, userId, despesa, postedDate, categoria, corCategoria) 
                VALUES (:descricao, :valor, :userId, :despesa, :postedDate, :categoria, :corCategoria)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":despesa", $despesa);
        $sql->bindValue(":postedDate", $postedDate);
        $sql->bindValue(":categoria", $categoria);
        $sql->bindValue(":corCategoria", $corCategoria);
        $sql->bindValue(":userId", $id);
        $sql->execute();
    }

    public function read($id) {

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        //starting pagination
        $no_of_records_per_page = 3;
        $offset = ($pageno-1) * $no_of_records_per_page; 
    
        $array = array();
       
        //query to calculate total number of pages
        $sql = "SELECT * FROM financas WHERE userId = :userId";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":userId", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $totalRows = $sql->rowCount();
            $totalPages = ceil($totalRows / $no_of_records_per_page);
            $array["total"] = $sql->fetchAll();
            // $array["json"] = json_encode($array["total"]);
            
        } else {
            $totalRows = 0;
            $totalPages = 0;
            $array["total"] = 0;
        }
        
        //query to filter number of returned results
        $sql = "SELECT * FROM financas WHERE userId = :userId LIMIT $offset, $no_of_records_per_page"; 
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":userId", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $array["info"] = $sql->fetchAll();

        } else {
            $array["info"] = 0;
        }

        $paginationInfo = [
            "pageno" => $pageno,
            "offset" => $offset,
            "totalRows" => $totalRows,
            "totalPages" => $totalPages
        ];

        $array["paginator"] = $paginationInfo;

        return $array;

    }

    public function get($id) {

        $array = array();

        $sql = "SELECT * FROM financas WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getJSON($id) {

        $array = array();

        $sql = "SELECT * FROM financas WHERE userId = :userId";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":userId", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function edit($id, $descricao, $valor, $despesa, $postedDate, $categoria) {

        $corCategoria = $this->colorCategory($categoria);

        $sql = "UPDATE financas SET descricao = :descricao, valor = :valor, despesa = :despesa, postedDate = :postedDate, categoria = :categoria, corCategoria = :corCategoria WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":despesa", $despesa);
        $sql->bindValue(":postedDate", $postedDate);
        $sql->bindValue(":categoria", $categoria);
        $sql->bindValue(":corCategoria", $corCategoria);
        $sql->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM financas WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}