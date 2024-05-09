<?php
$filename = "txt/clientes.csv";

//tenta abrir o arquivo
$file = fopen($filename, "r");

// verifica se o arquivo foi aberto
if ($file) {
   // criar array "clientes" vazio
   $aClientes = [];
   $header = null;
   // processa as linhas do arquivo
   while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
      //print_r($data);
      // adicionar $data ao array "clientes"
      if ($header == null) {
         $header = $data;
         continue;
      }
      $newdata = [];
      //print_r($newdata);
      for ($i = 0; $i < sizeof($data); $i++) {
         $newdata[$header[$i]] = $data[$i];
      }
      //print_r($newdata);
      array_push($aClientes, $data);
   }
   // converter array em json
   $json = json_encode($aClientes);
   // printar o json
   print($json);
   fclose($file);
}
