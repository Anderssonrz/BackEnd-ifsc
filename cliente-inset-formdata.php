<?php
if($_SERVER('REQUEST_METHOD')== 'POST'){
print_r($_POST);
$cliente =  new stdClass();
foreach($_POST as $key => $value){
    $cliente->$key = $value;
}
var_dump($client);

$filename = "txt/clientes.csv";
$file = fopen($filename, "a");

if ($file) {
    $linha = "$cliente->codigo;$cliente->nome;$cliente->email\n";
    fwrite($file,$linha);
    fclose($file);
}
}

