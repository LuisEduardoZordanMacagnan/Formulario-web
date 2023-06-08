<?php
	include_once "banco_dados.php";

	$usuario = getUsuario($_POST['id']);

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

	alterarUsuario($_POST['id'], $nome, $email, $senha);

	header('Location: home.php');
?>