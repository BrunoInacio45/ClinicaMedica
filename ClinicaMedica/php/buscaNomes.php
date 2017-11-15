<?php

class Medico 
{
  public $nome;
  
}

try
{
	require "conexaoMysql.php";
	$listaMedico = "";
	$listaMedico = array();
	
	if (isset($_POST["especialidade"]))
    $especialidade = $_POST["especialidade"];
	
	$sql = "
		SELECT Nome
		FROM funcionario
		WHERE Especialidade = '$especialidade';
	";
	
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($nome);
		
	while($stmt->fetch()){
		$medico = new Medico();
		
		$medico->nome = $nome;
		
		$listaMedico[] = $medico;
	}
	
	$jsonStr = json_encode($listaMedico);
	echo $jsonStr;
  
}
catch (Exception $e)
{
  $msgErro = $e->getMessage();
}


if ($conn != null)
  $conn->close();

?>