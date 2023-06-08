<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">
    <form action="verifica_registro.php" method="post">
        <fieldset class="container">
            <legend>Registro</legend>
            <label>Login:</label>
            <input type="text" name="nome" placeholder="Login">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Email">
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Senha" id="senha1" onkeyup="compararSenha()">
            <label>Confirmar senha:</label>
            <input type="password" placeholder="Senha" id="senha2" onkeyup="compararSenha()">
            <?php if($_GET['c']=='true'){ $c = 'true'; } else { $c = null; } ?>
            <input type="hidden" name="c" value="<?php echo $c; ?>">
            <br>
            <div>
                <button style="<?php if($_GET['c']=='true'){ echo " visibility: hidden;"; } ?>"><a href="index.php">Logar</a></button>
                <input disabled type="submit" value="Cadastrar" id="submit">
            </div>
        </fieldset>
    </form>
</body>
<script src="scripts.js"></script>
</html>