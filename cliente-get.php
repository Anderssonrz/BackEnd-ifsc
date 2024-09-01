<?php
include_once("conexao-bd.php");
//print_r($_REQUEST);
$request = (object) $_REQUEST;

try {
    // prepara a query
    $stmt = $conn->prepare("SELECT * FROM cliente WHERE id_cliente = ?" );

    // executa a query passando o parametro codigo
    $stmt->execute([$request->id_cliente]);

    // pega resultado do SQL
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // transforma esse resultadonem uma string JSON
    $json = json_encode($results);

    // devolve a string JSON para o fro
    print($json);
   


} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;


