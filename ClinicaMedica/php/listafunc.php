<?php 
	include("conexaoMysql.php");
	
	
	class Funcionario{
		public $nome;
		public $sexo;
		public $cargo;
		public $rg;
		public $logradouro;
		public $cidade;
	}

	class Medico{
		public $id;
		public $especialidade;
		
	}	
	function getFuncionario($conn){
		
		$listaFuncionario = '';
		$listaFuncionario = array();
		$sqlf = "
			SELECT F.Nome, F.Sexo, F.Cargo, F.RG, E.Logradouro, E.Cidade from funcionario F, EnderecoFunc E where E.Id = F.Id;
		";
		
		$stmt = $conn->prepare($sqlf);
		$stmt->execute();
		$stmt->bind_result($nome, $sexo, $cargo, $rg, $logradouro, $cidade);
		
		while($stmt->fetch()) {
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
	};	
	
	function getMedico($conn){
		$listaMedico = "";
		$listaMedico = array();
		$sql = "
			SELECT DISTINCT Especialidade FROM funcionario where Cargo = 'medico';
		";
		
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($especialidade);
		
		while($stmt->fetch()){
			$medico = new Medico();
			
			$medico->especialidade = $especialidade;
			
			$listaMedico[] = $medico;
		}
		return $listaMedico;
	};
	
	
	$msgErro = "";

	try{
		$listaFuncionario = getFuncionario($conn);  
		$listaMedico = getMedico($conn);
	}catch (Exception $e){
		$msgErro = $e->getMessage();
	}

?>
