<?php
	include_once "banco_dados.php";
	include_once "usuario.php";

	if(verificarUsuario() == 'false'){
		header('Location: index.php');
	} else {
		deletarUsuario($_GET['id']);
		$usuario = $_SESSION['usuarioAtual'];
		if($usuario->getId() == $_GET['id']){
			header('Location: logoff.php');
		}else{
			header('Location: home.php');
		}
	}
?>