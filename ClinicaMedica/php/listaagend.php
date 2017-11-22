<?php 
	include("conexaoMysql.php");
	
	
	class Agenda{
		public $data;
		public $hora;
		public $nomeMedico;
		public $especialidade;
		public $nomePaciente;
		public $telefone;
	}
	
	function getAgenda($conn){
		$listaAgenda = "";
		$listaAgenda = array();
		
		$sql = "
			SELECT F.Nome , F.Especialidade, P.Nome , P.Telefone ,
                        A.DataAgendamento , A.hora 
			FROM funcionario F 
			INNER JOIN agenda A 
				ON A.codFuncionario = F.id 
			INNER JOIN paciente P 
				ON P.Codigo = A.codPaciente order by F.Nome,A.DataAgendamento asc 
		";
					
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->bind_result($nomeMed,$especialidade,$nomePasc,$telefone,$data,$hora);
			
		while($stmt->fetch()){
			$agenda = new Agenda();
			
			$agenda->nomeMedico = $nomeMed;
			$agenda->especialidade = $especialidade;
			$agenda->nomePaciente = $nomePasc;
			$agenda->telefone = $telefone;
			$agenda->data = $data;
			$agenda->hora = $hora . ":00";
			
			$listaAgenda[] = $agenda;
		}
		return $listaAgenda;
	}

		
	
	
	$msgErro = "";

	try{
		$listaAgenda = getAgenda($conn);
	}catch (Exception $e){
		$msgErro = $e->getMessage();
	}

?>
