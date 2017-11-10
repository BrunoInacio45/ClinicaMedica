<?php

	include("conexaoMysql.php");
		
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
		
		
		$nome = filtraEntradaA($_POST["nome"]);
		$telefone = filtraEntradaA($_POST["telefone"]);
		$codFuncionario = filtraEntradaA($_POST["codFuncionario"]);
		$codPaciente = filtraEntradaA($_POST["codPaciente"]);
		$data = filtraEntradaA($_POST["data"]);
		$hora = filtraEntradaA($_POST["hora"]);
		
		try{
			
			$conn->begin_transaction();
			$sql = "
				INSERT INTO clinicamedica.paciente(Id, Nome, Telefone)
				values (null, ? , ?);
			";
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("ss", $nome , $Telefone);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao agendar o paciente: " . $conn->error);
			
			$sql = "
				INSERT INTO clinicamedica.agenda(codAgendamento, data, hora, codFuncionario, codPaciente)
				values (null, ? , ?, ?, LAST_INSERT_ID());
			";
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("ssi", $data , $hora, $codFuncionario);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao agendar o paciente: " . $conn->error);
    
			
			$formProcSucesso = true;
			} catch (Exception $e){
				$msgErro = $e->getMessage();
			}
	}
	?>