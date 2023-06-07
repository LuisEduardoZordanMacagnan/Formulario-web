<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="verifica_registro.php" method="post">
        <fieldset>
            <legend>Registro</legend>
            <label>Login:</label>
            <input type="text" name="nome" placeholder="Login">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Email">
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Senha" id="">
            <label>Confirmar senha:</label>
            <input type="password" placeholder="Senha" id="">
            <br>
            <div>
                <input type="submit" value="Cadastrar">
                <button><a style="color: black; text-decoration: none;" href="index.php">Logar</a></button>
            </div>
        </fieldset>
    </form>
</body>
</html>