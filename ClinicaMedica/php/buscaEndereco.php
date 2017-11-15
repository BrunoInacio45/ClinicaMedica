<?php

class Endereco 
{
  public $logradouro;
  public $cidade;
  public $bairro;
}

try
{
  require "conexaoMysql.php";
  
  $endereco = "";
  $cep = "";
  if (isset($_POST["cep"]))
    $cep = $_POST["cep"];
  
  $SQL = "
    SELECT Logradouro, Cidade, Bairro
    FROM clinicamedica.enderecofunc
    WHERE CEP = '$cep';
  ";
  
  if (! $result = $conn->query($SQL))
    throw new Exception('Ocorreu uma falha ao buscar o endereco: ' . $conn->error);
    
  if ($result->num_rows > 0)
  {
    $row = $result->fetch_assoc();
    
    $endereco = new Endereco();
    
    $endereco->logradouro = $row["Logradouro"];
    $endereco->cidade = $row["Cidade"];
    $endereco->bairro = $row["Bairro"];

  } 
  
  $jsonStr = json_encode($endereco);
  echo $jsonStr;
  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}


if ($conn != null)
  $conn->close();

?>