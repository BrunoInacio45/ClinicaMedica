<?php

class Hora 
{
  public $horario;
}

try
{
  require "conexaoMysql.php";
  $listahorario = "";
  $listahorario = array();
  
  if (isset($_POST["data"])){
    $data = $_POST["data"];
    $nomeEsp = $_POST["nomeEsp"];
  }
  
  $SQL = "
    SELECT A.hora 
	FROM funcionario F 
		INNER JOIN agenda A 
		ON F.id = A.codFuncionario 
	WHERE F.Nome = '$nomeEsp' and A.DataAgendamento = '$data'
  ";
  
  
	$stmt = $conn->prepare($SQL);
	$stmt->execute();
	$stmt->bind_result($hora);
		
	while($stmt->fetch()){
		$horarioInd = new Hora();
		
		$horarioInd->horario = $hora;
		
		$listahorario[] = $horarioInd;
	}
	
	$jsonStr = json_encode($listahorario);
	echo $jsonStr;
  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}


if ($conn != null)
  $conn->close();

?>