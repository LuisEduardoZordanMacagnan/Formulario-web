<?php
	include_once "banco_dados.php";
	include_once "usuario.php";
	session_start();

	$usuario = getUsuario($_POST['id']);
	$usuarioAtual = $_SESSION['usuarioAtual'];

	$header = 'Location: home.php?p=';

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

	if(isset($_POST["excluirFoto"])){
		$header = "Location: usuarioInfo.php?id=".$_POST['id'];
		$foto = null;
	} else {
		if(!empty($_FILES["foto"]["name"])){
			$target_dir = "imagens/";
			$target_file = $target_dir.basename($_FILES["foto"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
			$fotoNome = $_FILES['foto']['name'];
			$image_base64 = base64_encode(file_get_contents('imagens/'.$fotoNome) );
			$foto = 'data:image/'.$imageFileType.';base64,'.$image_base64;
		} else {
			$foto = $usuario['foto'];
		}
	}

	if($usuarioAtual->getId() == $usuario['id']){
		$usuarioAtual->setNome($nome);
		$usuarioAtual->setEmail($email);
		$usuarioAtual->setSenha($senha); 
		$usuarioAtual->setFoto($foto); 
		$_SESSION['usuarioAtual']=$usuarioAtual;
	}

	alterarUsuario($_POST['id'], $nome, $email, $senha, $foto);

	header($header);
?>