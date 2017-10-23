<?php

require "conexaoMysql.php";
		
	function filtraEntrada($dado){
		$dado = trim($dado);
		$dado = stripslashes($dado);
		$dado = htmlspecialchars($dado);
		return $dado;
	}	
	
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$msgErro = '';
		$nome = $email = $motivo = $mensagem = "";
		
		
		$nome = filtraEntrada($_POST["nome"]);
		$email = filtraEntrada($_POST["email"]);
		$motivo = filtraEntrada($_POST["motivo"]);
		$mensagem = filtraEntrada($_POST["mensagem"]);
		
		try{
			
			$conn = conectaAoMySQL();
			
			$sql = "
				INSERT INTO clinicamedica.contato(Id, Nome, Email, Motivo, Mensagem)
				values (null, ? , ? , ? , ?);
			";
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("ssss", $nome , $email , $motivo , $mensagem);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao realizar o contato: " . $conn->error);
    
			
			$formProcSucesso = true;
			} catch (Exception $e){
				$msgErro = $e->getMessage();
			}
	}
	?>