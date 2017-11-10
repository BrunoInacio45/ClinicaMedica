<?php
	include("conexaoMysql.php");
		
	function filtraEntradaC($dado){
		$dado = trim($dado);
		$dado = stripslashes($dado);
		$dado = htmlspecialchars($dado);
		return $dado;
	}	
	
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$msgErro = '';
		$nome = $email = $motivo = $mensagem = "";
		
		
		$nome = filtraEntradaC($_POST["nome"]);
		$email = filtraEntradaC($_POST["email"]);
		$motivo = filtraEntradaC($_POST["motivo"]);
		$mensagem = filtraEntradaC($_POST["mensagem"]);
		
		try{
			
			
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