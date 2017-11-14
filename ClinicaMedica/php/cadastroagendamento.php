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
		
		
		$nome = filtraEntradaA($_POST["nomePasc"]);
		$telefone = filtraEntradaA($_POST["telefone"]);
		$codFuncionario = 39;
		$data = filtraEntradaA($_POST["data"]);
		$hora = filtraEntradaA($_POST["horario"]);;
		
		try{
			
			$conn->begin_transaction();
			$sql = "
				INSERT INTO clinicamedica.paciente(Codigo, Nome, Telefone)
				values (null, ? , ?);
			";
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("ss", $nome , $telefone);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao agendar o paciente: " . $conn->error);
			
			
			$sql = "
				INSERT INTO clinicamedica.agenda(codAgendamento, DataAgendamento, hora, codFuncionario, codPaciente)
				values (null, ? , ?, ?, LAST_INSERT_ID());
			";
			
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("ssi", $data , $hora, $codFuncionario);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao agendar o paciente: " . $conn->error);
    
			$conn->commit();
			
			$formProcSucesso = true;
			} catch (Exception $e){
				$msgErro = $e->getMessage();
			}
	}
	?>