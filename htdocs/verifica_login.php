<?php
    include_once "banco_dados.php";
    include_once "usuario.php";

    $u = logar($_POST['email'], $_POST['senha']);
    if($u==null){
        header('Location: index.php');
    } else {
        $usuario = new Usuario();
        $usuario->setNome($u['nome']);
        $usuario->setEmail($u['email']);
        $usuario->setSenha($u['senha']); 
        $usuario->setId($u['id']);
        session_start();
        $_SESSION['usuarioAtual']=$usuario;
        header('Location: home.php');
    }
?>