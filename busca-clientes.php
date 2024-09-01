<?php
require_once("conexao-bd.php");

//print_r($_REQUEST);

try {
    if (empty($_REQUEST['expressaoBusca'])){
        $stmt = $conn->prepare("SELECT cliente.id_cliente, cliente.nome, cliente.email, uf.sigla 
        FROM cliente,uf
        WHERE cliente.id_uf= uf.id_uf
        ORDER BY nome");
    } else {
        $e = $_REQUEST['expressaoBusca'];
        $stmt = $conn->prepare("SELECT cliente.id_cliente, cliente.nome, cliente.email, uf.sigla    
        FROM cliente,uf
        WHERE cliente.id_uf= uf.id_uf
        AND cliente.nome LIKE '%$e%' 
        ORDER BY nome");
    }
    
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
        $json = json_encode($results);
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();     
    }
    print($json);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>