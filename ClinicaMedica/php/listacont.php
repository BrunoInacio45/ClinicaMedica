<?php 
	
	include("conexaoMysql.php");
	
	class Contato{
		public $nome;
		public $email;
		public $motivo;
		public $mensagem;
	}

	function getContato($conn){
		$listaContato = '';
		$listaContato = array();
		$sqlf = "
			SELECT Nome, Email, Motivo, Mensagem FROM clinicamedica.contato
		";
		
		$stmt = $conn->prepare($sqlf);
		$stmt->execute();
		$stmt->bind_result($nome, $email, $motivo, $mensagem);
		
		while(($stmt->fetch()) ){
			$contato = new Contato();
			
			$contato->nome = $nome;
			$contato->email = $email;
			$contato->motivo = $motivo;
			$contato->mensagem = $mensagem;
			$listaContato[] = $contato;
		}
		
		return $listaContato;
	}	
	
	$listaContato = "";
	$msgErro = "";

	try{
		$listaContato = getContato($conn);  
	}catch (Exception $e){
		$msgErro = $e->getMessage();
	}

?>
