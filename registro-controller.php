<?php
// print_r($_REQUEST);
require_once("conexao-bd.php");



if (!empty($_REQUEST['email']) && !empty($_REQUEST['password'])){
    try {
    $email = $_REQUEST['email'];
    $password = hash('sha256', $_REQUEST['password']);

    $stmt = $conn->prepare("INSERT INTO user (email,password) VALUES (?,?)");
    $stmt->execute([$email, $password]);

    $msg = ['code' => 200, 'text' => 'Sucesso'];
    print(json_encode($msg));
    
}
catch (PDOException $e) {

    $msg = ['code' => $e->getCode(), 'text' => $e->getMessage()];
    print(json_encode($msg));
}
}
