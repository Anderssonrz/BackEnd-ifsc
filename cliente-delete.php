<?php
require_once("conexao-bd.php");

// Verifica se o ID do cliente foi enviado
if (!isset($_POST['id_cliente'])) {
    echo "Erro: ID do cliente não fornecido.";
    exit;
}

$id_cliente = $_POST['id_cliente'];

try {
    $stmt = $conn->prepare("DELETE FROM cliente WHERE id_cliente = ?");
    $stmt->execute([$id_cliente]);

    // Verifica se alguma linha foi afetada (excluída)
    if ($stmt->rowCount() > 0) {
        echo "Cliente excluído com sucesso.";
    } else {
        echo "Erro: Nenhum cliente encontrado com este ID.";
    }
} catch(PDOException $e) {
    echo "Erro ao excluir cliente: " . $e->getMessage();
}

$conn = null;
?>
