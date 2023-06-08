<?php
    function conectaBD(){
        $con = new PDO("mysql:host=localhost;dbname=web", "root", "");
        return $con;
    }

    function inserirUsuario($nome, $email, $senha){
        try{
            $con=conectaBD();
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
            $stm=$con->prepare($sql);
            $stm->bindParam(1, $nome);
            $stm->bindParam(2, $email);
            $stm->bindParam(3, $senha);
            $stm->execute();
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
        try{
            $con=conectaBD();
            $sql="SELECT * FROM usuario";
            $stm=$con->prepare($sql);
            $stm->execute();
            $result=$stm->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getUsuario($id){
        try{
            $con=conectaBD();
            $sql="SELECT * FROM usuario WHERE id=?";
            $stm=$con->prepare($sql);
            $stm->bindParam(1, $id);
            $stm->execute();
            $result=$stm->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function pesquisaUsuarios($nome){
        try{
            $con=conectaBD();
            $sql="SELECT * FROM usuario WHERE nome LIKE ?;";
            $stm=$con->prepare($sql);
            $nomee="%".$nome."%";
            $stm->bindParam(1, $nomee);
            $stm->execute();
            $result=$stm->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function logar($email, $senha){
        try{
            $con=conectaBD();
            $sql="SELECT * FROM usuario WHERE email LIKE ? AND senha LIKE ?;";
            $stm=$con->prepare($sql);
            $stm->bindParam(1, $email);
            $stm->bindParam(2, $senha);
            $stm->execute();
            $result=$stm->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function verificarCadastro($email){
    try{
            $con=conectaBD();
            $sql="SELECT * FROM usuario WHERE email LIKE ?;";
            $stm=$con->prepare($sql);
            $stm->bindParam(1, $email);
            $stm->execute();
            $result=$stm->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function verificarUsuario(){
        session_start();
        if($_SESSION['usuarioAtual']==null){
            $result = 'false';
        } else {
            $result = 'true';
        }
        return $result;
    }
?>