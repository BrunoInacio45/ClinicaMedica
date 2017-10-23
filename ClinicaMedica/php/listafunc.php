<?php 
	
	require "conexaoMysql.php";
	
	class Funcionario{
		public $nome;
		public $sexo;
		public $cargo;
		public $rg;
		public $logradouro;
		public $cidade;
	}

	function getFuncionario($conn){
		
		$listaFuncionario = '';
		$listaFuncionario = array();
		$sqlf = "
			SELECT F.Nome, F.Sexo, F.Cargo, F.RG, E.Logradouro, E.Cidade from clinicamedica.funcionario F, clinicamedica.enderecofunc E where E.Id = F.Id
		";
		
		$stmt = $conn->prepare($sqlf);
		$stmt->execute();
		$stmt->bind_result($nome, $sexo, $cargo, $rg, $logradouro, $cidade);
		
		while(($stmt->fetch()) ){
			$funcionario = new Funcionario();
			
			$funcionario->nome = $nome;
			$funcionario->sexo = $sexo;
			$funcionario->cargo = $cargo;
			$funcionario->rg = $rg;
			$funcionario->logradouro = $logradouro;
			$funcionario->cidade = $cidade;
			$listaFuncionario[] = $funcionario;
		}
		
		
		
		
		
		return $listaFuncionario;
	}	
	
	$listaFuncionario = "";
	$msgErro = "";

	try{
		$conn = conectaAoMySQL();
		$listaFuncionario = getFuncionario($conn);  
	}catch (Exception $e){
		$msgErro = $e->getMessage();
	}

?>
