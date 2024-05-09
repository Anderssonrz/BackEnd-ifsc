<?php
// recebe dados de requisicao
$cliente = json_decode(file_get_contents('php://input'));
$filename = "txt/clentes2.csv";
// tenta abrir o arquivo
$file = fopen($filename, "a");
// verifica se o arquivo fi aberto
if($file) {
    $linha = "$cliente->codigo;$cliente->nome;$cliente->email\n";
    fwrite($file,$linha);
    fclose($file);
}
?>