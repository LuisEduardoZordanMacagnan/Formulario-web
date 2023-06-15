<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <?php
        session_start();
        if($_SESSION!=null){
            if($_SESSION['usuarioAtual']!=null){
                header('Location: home.php?p=');
            }
        }
    ?>
    <form action="verifica_login.php" method="post">
        <fieldset class="container">
            <legend>Login</legend>
            <label>Email:</label>
            <input type="email" name="email" placeholder="Email">
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Senha" id="">
            <br>
            <div>
                <button><a href="registro.php?c='false'">Cadastrar</a></button>
                <input style="background-color: rgb(255, 123, 47); color: white" type="submit" value="Entrar">
            </div>
        </fieldset>
    </form>
</body>
</html>