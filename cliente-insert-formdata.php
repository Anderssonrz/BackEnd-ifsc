<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // opcao1
    $cliente = new stdClass();
    foreach($_POST as $key => $value) {
        $cliente->$key = $value;
    }
    print(implode(";",$_POST));

    $filename = "txt/clientes.csv";
    $file = fopen($filename, "a"); // abre arquivo modo append
    if ($file) {
        // opcao 1 - precisa das linhas 4 a 7 acima
        $linha = "$cliente->id_cliente;$cliente->nome;$cliente->email;$cliente->id_uf \n";
        // opcao 2
        // $linha = $_POST['codigo'].";".$_POST['nome'].";".$_POST['email'].";".$_POST['id_uf']."\n";
        //$linha = implode(";",$_POST);
        
        fwrite($file,$linha);
        fclose($file);

        // informar o cliente que a inclusão foi feita com sucesso
    }
}
?>
