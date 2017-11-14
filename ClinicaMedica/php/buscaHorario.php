<?php

class Hora 
{
  public $horario;
}

try
{
  require "conexaoMysql.php";
  
  $hora = "";
  $data = "";
  $nomeEsp = "";
  if (isset($_POST["data"]) ){
    $data = $_POST["data"];	
  }
  
  $SQL = "
    SELECT hora
    FROM agenda
    WHERE CodAgendamento >= 1;
  ";
  
  if (! $result = $conn->query($SQL))
    throw new Exception('Ocorreu uma falha ao buscar os horários: ' . $conn->error);
    
  if ($result->num_rows > 0)
  {
    $row = $result->fetch_assoc();
    
    $hora = new Hora();
  
    $hora->horario = $row["hora"];
    
  } 
  
  $jsonStr = json_encode($hora);
  echo $jsonStr;
  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}


if ($conn != null)
  $conn->close();

?>