<?php
	include_once "banco_dados.php";
	include_once "usuario.php";
	session_start();

	$usuario = getUsuario($_POST['id']);
	$usuarioAtual = $_SESSION['usuarioAtual'];

	if($_POST['nome']==null){
		$nome = $usuario['nome'];
	} else {
		$nome = $_POST['nome'];
	}

	if($_POST['email']==null){
		$email = $usuario['email'];
	} else {
		$email = $_POST['email'];
	}

	if($_POST['senha']==null){
		$senha = $usuario['senha'];
	} else {
		$senha = $_POST['senha'];
	}

	if($usuarioAtual->getId() == $usuario['id']){
		$usuarioAtual->setNome($nome);
		$usuarioAtual->setEmail($email);
		$usuarioAtual->setSenha($senha); 
		$_SESSION['usuarioAtual']=$usuarioAtual;
	}

	alterarUsuario($_POST['id'], $nome, $email, $senha);

	header('Location: home.php');
?>