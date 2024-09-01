<?php
require_once("conexao-bd.php")
    ?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <div class="titulo">
    <h1>Registro Admin</h1>
    </div>
    
    <!-- Formulário para Cadastrar Administrador do SITE -->
    <div class="container">
        <div class="box">
            <br><br>
            <form method="POST" action="verifica_login.php">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="email@domain.com">
                <br>
                <br>
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="senha">
                <br>
                <br>
                <h1><button type="submit" class="btn btn-primary">Acessar</button></h1>
                <button type="reset" class="btn btn-primary">Limpar</button>
            </form>
            <br>
            <a href='registro.php'>Cadastre-se!</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>
</body>

</html>