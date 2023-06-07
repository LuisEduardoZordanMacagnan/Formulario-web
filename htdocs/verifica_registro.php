<?php
    include_once "banco_dados.php";
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($nome==null || $email == null || $senha == null){
        header('Location: registro.php');
    }

    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);

    session_start();
    $_SESSION['usuarioAtual']=$usuario;

    echo inserirUsuario($usuario);
?>