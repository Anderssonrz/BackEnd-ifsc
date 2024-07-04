<?php
//print_r($_SERVER);

//print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente =  new stdClass();
    foreach ($_POST as $key => $value) {
        $cliente->$key = $value;
    }
    var_dump($cliente);

    $filename = "txt/clientes.csv";
    $file = fopen($filename, "a");

    if ($file) {
        $linha = "$cliente->codigo;$cliente->nome;$cliente->email\n";
        fwrite($file, $linha);
        fclose($file);
    }
}
  