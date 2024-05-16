<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "meubanco";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
