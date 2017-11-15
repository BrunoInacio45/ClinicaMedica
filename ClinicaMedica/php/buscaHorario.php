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
  
  if (isset($_POST["dataConsulta"])){
    $data = $_POST["dataConsulta"];
	echo "<script>alert($data)</script>";
  }
  
  $SQL = "
    SELECT hora
    FROM agenda
    WHERE DataAgendamento = '$data';
  ";
  
  
	$stmt = $conn->prepare($SQL);
	$stmt->execute();
	$stmt->bind_result($hora);
		
	while($stmt->fetch()){
		$horario = new Hora();
		
		$horario->horario = $hora;
		
		$listahorario[] = $horario;
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