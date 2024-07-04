<?php
require_once("conexao.php");

try{
    $stmt = $conn->prepare("SELECT * FROM cliente");
    $stmt->execute();

    // foreach ($stmt->fetchAll() as $k=>$v) {
    //     print_r($v) ;
    // }
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $jsan = json_encode($results);
    print($jsan);

} catch(PDOexception $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
