<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <?php
    include_once "banco_dados.php";
    $id = $_GET['id'];
    $usuario = getUsuario($id);
    ?>
    <?php if($usuario['foto']!=null){
        $foto = $usuario['foto'];
        echo "<img style='width: 10%; height: 20%; border: 2px solid gray;' src='$foto' />";
    }?>
    <form method="post" action="atualizarUsuario.php" enctype="multipart/form-data">
        <fieldset class="container">
            <input name="id" type="hidden" value="<?php echo $usuario['id']; ?>" />
            <input type="hidden" value="<?php echo $usuario['senha']; ?>" id="senha" />
            <legend>Info</legend>
            <label>Nome:</label>
            <input name="nome" type="text" value="<?php echo $usuario['nome']; ?>" />
            <label>Email:</label>
            <input name="email" type="email" value="<?php echo $usuario['email']; ?>" />
            <label>Senha antiga:</label>
            <input type="password" placeholder="Senha" id="campoSenhaAntiga" onkeyup="compararSenhaAntiga()" />
            <label>Nova senha:</label>
            <input name="senha" type="password" placeholder="Senha" id="campoSenhaNova" onkeyup="compararSenhaAntiga()" />
            <label>Foto:</label>
            <div>
                <input style="background-color: rgb(255, 123, 47); color: white" type="file" name="foto" accept="image/png, image/jpeg" />
                <input type="submit" value="Excluir foto" name="excluirFoto" />
            </div>
            <br />
            <div>
                <button><a href="home.php?p=">Voltar</a></button>
                <input style="background-color: rgb(255, 123, 47); color: white" type="submit" value="Atualizar" id="submitSenha" />
                <button><a href="deletarUsuario.php?id=<?php echo $id; ?>">Deletar</a></button>
            </div>
        </fieldset>
    </form>
</body>
<script src="scripts.js"></script>
</html>