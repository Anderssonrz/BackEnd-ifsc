<?php
require_once("conexao-bd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar e inserir dados no banco
    try {
        // Verifica se o email já existe
        $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            $message = "E-mail já cadastrado.";
        } else {
            // Insere o novo usuário
            $stmt = $conn->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
            $passwordHash = hash('sha256', $password); // Certifique-se de usar um hash seguro para senhas
            $stmt->execute([$email, $passwordHash]);
            $message = "Cadastro realizado com sucesso!";
        }
    } catch (PDOException $e) {
        $message = "Erro: " . $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Cadastro User Admin</title>
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

        .btn-primary {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            font-size: 16px;
            font-weight: 600;
        }

        .link-register {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
        }

        .link-register:hover {
            text-decoration: underline;
            background-color: #e2e6ea;
            border-radius: 5px;
            padding: 10px;
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
        <h1>Cadastre-se!</h1>
    </div>

    <div class="container">
        <?php if (isset($message)): ?>
            <div class="alert <?php echo $message === 'Cadastro realizado com sucesso!' ? 'alert-success' : 'alert-danger'; ?>" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@domain.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
            </div>
            <button type="submit" id="btnRegistro" class="btn btn-primary">Cadastrar</button>
        </form>
        <a href='index.php' class="link-register">Voltar para a tela de login</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>
