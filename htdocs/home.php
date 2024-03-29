<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <?php
    include_once "banco_dados.php";
    include_once "usuario.php";
    $getUsuarios = pesquisaUsuarios($_GET['p']);
    session_start();
    $usuarioAtual = $_SESSION['usuarioAtual'];
    ?>
    <?php if($usuarioAtual->getFoto()!=null){
        $foto = $usuarioAtual->getFoto();
        echo "<img style='width: 10%; height: 20%; border: 2px solid gray; border-radius: 100%;' src='$foto' />";
    }?>
   
    <label>Usuario: <?php echo $usuarioAtual->getNome(); ?></label>
    <br>
    <form action="home.php" method="get">
        <div>
            <input type="text" placeholder="Pesquisa" style="width: 60%;" name="p">
            <input style="background-color: rgb(255, 123, 47); color: white" type="submit" value="Pesquisar" />
        </div>
    </form>
    <br>
    <fieldset class="container">
        <legend>Lista de usuarios</legend>
        <table id="tabela">
            <tr>
                <th>ID</th>
                <th>||</th>
                <th>Nome</th>
                <th>||</th>
                <th>Email</th>
                <th>||</th>
                <th>Editar</th>
            </tr>
            <?php foreach($getUsuarios as $usuario){ ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td>||</td>
                <td><?php echo $usuario['nome']; ?></td>
                <td>||</td>
                <td><?php echo $usuario['email']; ?></td>
                <td>||</td>
                <td><button><a href="usuarioInfo.php?id=<?php echo $usuario['id'] ?>">Editar</a></button></td>
            </tr>
            <?php } ?>
        </table>
        <div>
            <button><a href="logoff.php">Deslogar</a></button>
            <button><a href="registro.php?c=true">Cadastrar</a></button>
        </div>
    </fieldset>
</body>
</html>