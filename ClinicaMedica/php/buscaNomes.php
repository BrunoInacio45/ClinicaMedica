<?php

class Medico 
{
  public $nome;
}

try
{
  require "conexaoMysql.php";
  
  $especialidade = "";
  if (isset($_POST["especialidade"]))
    $especialidade = $_POST["especialidade"];
  
  $SQL = "
    SELECT Nome
    FROM funcionario
    WHERE Especialidade = '$especialidade';
  ";
  
  if (! $result = $conn->query($SQL))
    throw new Exception('Ocorreu uma falha ao buscar os nomes: ' . $conn->error);
    
  if ($result->num_rows > 0)
  {
    $row = $result->fetch_assoc();
    
    $medico = new Medico();
    
    $medico->nome = $row["Nome"];
    
  } 
  
  $jsonStr = json_encode($medico);
  echo $jsonStr;
  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}


if ($conn != null)
  $conn->close();

?>