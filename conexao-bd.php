<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "meubanco";

try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES UTF8');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();

    try {
        $conn = new PDO("mysql:host=$server", $user, $pass);
        $stmt = $conn->prepare("CREATE DATABASE meubanco");
        $stmt->execute();
        $stmt = $conn->prepare("USE meubanco");
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    $stmt = $conn->prepare("SELECT count(*) FROM user");
    $stmt->execute();
} catch (PDOException $e) {
    $stmt = $conn->prepare("CREATE TABLE user (
        id int not null auto_increment, 
        email varchar(256), 
        password char(64), 
        primary key (id))");
    $stmt->execute();
}

try {
    $stmt = $conn->prepare("SELECT count(*) FROM uf");
    $stmt->execute();
} catch (PDOException $e) {
    $stmt = $conn->prepare("CREATE TABLE uf (
            id_uf int(11) NOT NULL AUTO_INCREMENT,
            nome varchar(100) NOT NULL,
            sigla varchar(100) NOT NULL,
            PRIMARY KEY (id))");
    $stmt->execute();
}


try {
    $stmt = $conn->prepare("SELECT count(*) FROM cliente");
    $stmt->execute();
} catch (PDOException $e) {
    $stmt = $conn->prepare("CREATE TABLE cliente (
        id_cliente int(11) NOT NULL AUTO_INCREMENT,
        nome varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        id_uf int NOT NULL,
        PRIMARY KEY (id_cliente),
        FOREIGN KEY (id_uf) REFERENCES uf(id)
        )");
    $stmt->execute();
}
