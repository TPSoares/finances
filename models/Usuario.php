<?php
    
class Usuario extends model {
    
    public function create($nome, $email, $senha) {

        $array = array();

        $sql = "INSERT INTO user (nome, email, senha) VALUES (:nome, :email, :senha)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
    }

    public function read($email, $senha) {

        $array = array();

        $sql = "SELECT * FROM user WHERE email = :email AND senha = :senha";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $array = $sql->fetch();

            $_SESSION["id"] = $array["id"];
            
 
        }

        return $array;
    }

    public function get($id) {

        $array = array();

        $sql = "SELECT * FROM user WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $array = $sql->fetch();
        }

        return $array;
    }

    public function edit($id, $nome, $email) {

        $sql = "UPDATE user SET nome = :nome, email = :email WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->execute();
    }
}