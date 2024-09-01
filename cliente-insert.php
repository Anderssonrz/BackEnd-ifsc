<?php
require_once("conexao-bd.php");
// print_r($_REQUEST);
$request = (object) $_REQUEST;
try {
    $stmt = $conn->prepare("INSERT INTO cliente (nome,email,id_uf) VALUES(?,?,?)");
    $stmt->execute([$request->nome,$request->email,$request->id_uf]);
    // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $json = json_encode($results);
    // print($json);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>