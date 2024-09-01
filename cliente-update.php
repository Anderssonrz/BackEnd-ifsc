<?php
include_once("conexao-bd.php");
print_r($_REQUEST);


try {
    // prepara a query
    $stmt = $conn->prepare("UPDATE cliente SET nome = :nome, email = :email, id_uf = :id_uf WHERE id_cliente = :id_cliente" );

    // executa a query passando o parametro codigo
    $stmt->execute($_REQUEST);

   
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;


