<?php
   $filename = "txt/clientes.csv";
   $file = fopen($filename, "r");//tenta abrir o arquivo
   if ($file) { // verifica se o arquivo foi aberto
      $aCliente = [];
      while (!feof($file)) { // enquanto nao for final do arquivo
         $line = fgets($file); // le uma linha do arquivo
         $line = str_replace(["\n","\r"],'',$line); // remove quebras de linha
         if ($line != "") {//se a linha nao esta vazia
            //print("*$line*\n");
            $record = explode(";",$line);//divide a string em pedaços
            $record[0] = intval($record[0]);//converte o código de str->int
            //print_r($record);
            array_push($aCliente, $record);//adiciona o registro no array
         }
      }
      //print_r($arr);
      $json = json_encode($aCliente);//converte o array em json
      print($json);
      fclose($file);//fecha o arquivo
  }
?>