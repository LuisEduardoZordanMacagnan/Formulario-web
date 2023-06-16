<?php
    include_once "banco_dados.php";
    include_once "usuario.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(!empty($_FILES["foto"]["name"])){
        $target_dir = "imagens/";
        $target_file = $target_dir.basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        $fotoNome = $_FILES['foto']['name'];
        $image_base64 = base64_encode(file_get_contents('imagens/'.$fotoNome) );
        $foto = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    } else {
        $foto = null;
    }

    if($nome==null || $email == null || $senha == null || verificarCadastro($email) != null){
        if($_POST['c'] == 'true'){
            header("Location: registro.php?c=true");
        } else {
            header("Location: registro.php?c=false");
        }
    } else {    
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $usuario->setFoto($foto);

        $usuario->setId(inserirUsuario($usuario->getNome(), $usuario->getEmail(), $usuario->getSenha(), $usuario->getFoto()));

        if($_POST['c']!='true'){
            session_start();
            $_SESSION['usuarioAtual']=$usuario;
        }
        header('Location: home.php?p=');
    }
?>