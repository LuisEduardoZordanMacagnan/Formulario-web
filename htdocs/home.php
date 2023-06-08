<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<script>
    function pesquisa() {
        tabela.innerHTML = "";
        tr = document.createElement('tr');
        th = document.createElement('th'); th.innerHTML = "ID"; tr.appendChild(th);
        th = document.createElement('th'); th.innerHTML = "Nome"; tr.appendChild(th);
        th = document.createElement('th'); th.innerHTML = "Email"; tr.appendChild(th);
        th = document.createElement('th'); th.innerHTML = "Editar"; tr.appendChild(th);
        tabela.appendChild(tr);
        
        var pesq = pes.value;
        <?php $pesq = "<script>document.write(pesq)</script>";
        $getUsuarios = pesquisaUsuarios($pesq);
        foreach($getUsuarios as $usuario){ ?>
            tr = document.createElement('tr');
            td = document.createElement('td'); td.innerHTML = <? php echo $usuario['id']; ?>; tr.appendChild(td);
            td = document.createElement('td'); td.innerHTML = <? php echo $usuario['nome']; ?>; tr.appendChild(td);
            td = document.createElement('td'); td.innerHTML = <? php echo $usuario['email']; ?>; tr.appendChild(td);
            td = document.createElement('td'); td.innerHTML = "<button><a href=<q>usuarioInfo.php?id=".<?php echo $usuario['id'] ?>."</q>>Editar</a></button>"; tr.appendChild(td);
            tabela.appendChild(tr);
        <?php } ?>
    } 
</script>
<body class="container">
    <?php
    include_once "banco_dados.php";
    include_once "usuario.php";
    session_start();
    $usuarioAtual = $_SESSION['usuarioAtual'];
    ?>
    <input type="text" placeholder="Pesquisa" onkeypress="pesquisa()" style="width: 20%;" id="pes">
    <label style="border: 2px solid black">Usuario: <?php echo $usuarioAtual->getNome(); ?></label>
    <fieldset class="container">
        <legend>Lista de usuarios</legend>
        <table id="tabela"></table>
        <div>
            <button><a href="logoff.php">Deslogar</a></button>
            <button><a href="registro.php?c=true">Cadastrar</a></button>
        </div>
    </fieldset>
    <script> pesquisa() </script>
</body>
<script>
    var tabela = document.getElementById('tabela');
    var pes = document.getElementById('pes');
</script>
</html>