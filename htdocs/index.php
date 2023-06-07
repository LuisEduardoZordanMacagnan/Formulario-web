<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="verifica_login.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <label>Login:</label>
            <input type="text" name="nome" placeholder="Login">
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Senha" id="">
            <br>
            <div>
                <input type="submit" value="Entrar">
                <button ><a style="color: black; text-decoration: none;" href="registro.php">Cadastrar</a></button>
            </div>
        </fieldset>
    </form>
</body>
</html>