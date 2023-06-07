<?php
    function conectaBD(){
        $con = new PDO("mysql:host=localhost;dbname=web", "root", "aluno");
        return $con;
    }



    function inserirUsuario($usuario){
        try{
            $con=conectaBD();
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
            $stm=$con->prepare($sql);
            $stm->bindParam(1, $usuario->getNome());
            $stm->bindParam(2, $usuario->getEmail());
            $stm->bindParam(3, $usuario->getSenha());
            $stm->execute();
            $usuario->setId(lastInsertId());
        } catch(PDOException $e){
            echo $e->getMessage();
        }

        return $con->lastInsertId();
    }

    function alterarUsuario($id, $nome, $email, $senha){
        try{
            $con=conectaBD();
            $sql = "UPDATE usuario SET email = ?, senha = ?, nome = ? WHERE id = ?;";
            $stm=$con->prepare($sql);
            $stm->bindParam(1, $email);
            $stm->bindParam(2, $senha);
            $stm->bindParam(3, $nome);
            $stm->bindParam(4, $id);
            $stm->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function deletarUsuario($id){
        try{
            $con=conectaBD();
            $sql = "DELETE FROM usuario WHERE id = ?;";
            $stm=$con->prepare($sql);
            $stm->bindParam(1, $id);
            $stm->execute();
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }  

    function listarUsuarios(){
        
    }
?>