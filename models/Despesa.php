<?php

class Despesa extends model {
    public function create($descricao, $valor, $despesa) {

        $array = array();

        $id = $_SESSION["id"];
       

        $sql = "INSERT INTO financas (descricao, valor, userId, despesa) 
                VALUES (:descricao, :valor, :userId, :despesa)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":despesa", $despesa);
        //$sql->bindValue(":postedDate", $postedDate);
        $sql->bindValue(":userId", $id);
        $sql->execute();
    }
}