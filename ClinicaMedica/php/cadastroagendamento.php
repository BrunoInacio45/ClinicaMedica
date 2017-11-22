<?php

	include("conexaoMysql.php");
		
	class Medico2 {
		public $id;
	}	
		
	function filtraEntradaA($dado){
		$dado = trim($dado);
		$dado = stripslashes($dado);
		$dado = htmlspecialchars($dado);
		return $dado;
	}	
	
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$msgErro = '';
		$nome = $telefone = "";
		$codFuncionario = $codPaciente = $data = $hora = "";
		
		
		$nome = filtraEntradaA($_POST["nomePasc"]);
		$telefone = filtraEntradaA($_POST["telefone"]);
		$data = filtraEntradaA($_POST["data"]);
		$hora = filtraEntradaA($_POST["horario"]);;
		
	try{	
		if (isset($_POST["nomeEsp"]) ){
			$nomeEsp = $_POST["nomeEsp"];	
		}
  
	$SQL = "
		SELECT Id
		FROM funcionario
		WHERE Nome = '$nomeEsp';
	";
  
  
	$stmt = $conn->prepare($SQL);
	$stmt->execute();
	$stmt->bind_result($idMedico);
		
	while($stmt->fetch()){
		$medico = new Medico2();
		
		$medico->id = $idMedico;
		
	}
	
  
	}catch (Exception $e){
		$msgErro = $e->getMessage();
	}	
		
		
	if(	($medico->id != '') || ($nome != '') || ($telefone != '') || ($data != '') || ($hora != '')){
		try{
			
			$conn->begin_transaction();
			$sql = "
				INSERT INTO paciente(Codigo, Nome, Telefone)
				values (null, ? , ?);
			";
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("ss", $nome , $telefone);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao agendar o paciente: " . $conn->error);
			
			
			$sql = "
				INSERT INTO agenda(codAgendamento, DataAgendamento, hora, codFuncionario, codPaciente)
				values (null, ? , ?, ?, LAST_INSERT_ID());
			";
			
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("ssi", $data , $hora, $medico->id);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao agendar o paciente: " . $conn->error);
    
			$conn->commit();
			
			echo "<script>
					alert('Agendamento realizado');
					window.location.replace('agendamento.php');
				</script>"; 
			
			$formProcSucesso = true;
			} catch (Exception $e){
				$msgErro = $e->getMessage();
			}
		}
	}
	?>