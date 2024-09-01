<?php
require_once("conexao-bd.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Registro Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .titulo {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 60px auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            margin-top: 15px;
            font-weight: 500;
            color: #555;
        }

        .btn-primary, .btn-success {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            font-size: 16px;
            font-weight: 600;
        }

        .btn-secondary {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
        }

        .link-register {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
        }

        .link-register:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .container {
                margin: 30px 20px;
                padding: 15px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="titulo">
        <h1>Registro Admin</h1>
    </div>

    <!-- Formulário para Cadastrar Administrador do SITE -->
    <div class="container">
        <form method="POST" action="verifica_login.php">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@domain.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Acessar</button>
            <button type="reset" class="btn btn-secondary">Limpar</button>
            <button type="button" class="btn btn-success" onclick="window.location.href='registro.php';">Cadastrar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>
