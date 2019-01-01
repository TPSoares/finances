<?php

class Despesa extends model {
    public function create($descricao, $valor, $despesa, $postedDate) {

        $array = array();

        $id = $_SESSION["id"];

        $sql = "INSERT INTO financas (descricao, valor, userId, despesa, postedDate) 
                VALUES (:descricao, :valor, :userId, :despesa, :postedDate)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":despesa", $despesa);
        $sql->bindValue(":postedDate", $postedDate);
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

        }
        
        //query to filter number of returned results
        $sql = "SELECT * FROM financas WHERE userId = :userId LIMIT $offset, $no_of_records_per_page"; 
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":userId", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $array["info"] = $sql->fetchAll();

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

    public function edit($id, $descricao, $valor, $despesa, $postedDate) {
        $sql = "UPDATE financas SET descricao = :descricao, valor = :valor, despesa = :despesa, postedDate = :postedDate WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":despesa", $despesa);
        $sql->bindValue(":postedDate", $postedDate);
        $sql->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM financas WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}