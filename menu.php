<?php
session_start();
if (empty($_SESSION['email'])) {
    header("Location: index.php");
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <header>
    <p>Usuário <?= $_SESSION['email'] ?> conectado.</p>
    </header>
    <div class="titulo">
        <h3>PÁGINA INICIAL</h3>
    </div>
    <div class="container">
        <div class="box1">
            <lu>

                <h4><li class="bi bi-door-open"><a href="cliente.php">Cadastro de Clientes</a></li></h4>
                <br>
                <h4><li class="bi bi-door-open"><a href="logout.php">Logout</a></li></h4>
            </lu>
        </div>
    </div>
    <footer></footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>
</body>

</html>