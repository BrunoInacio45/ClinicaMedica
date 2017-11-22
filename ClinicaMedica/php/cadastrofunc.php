<?php
	include("conexaoMysql.php");
	
		
	function filtraEntrada($dado){
		$dado = trim($dado);
		$dado = stripslashes($dado);
		$dado = htmlspecialchars($dado);
		return $dado;
	}	
	
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$msgErro = '';
		$cep = $tip_log = $logradouro = $numero = $complemento = $bairro = $cidade = $estado = "";
		$nome = $data = $sexo = $ec = $cargo = $especialidade = $cpf = $rg = $outro = "";
		
		
		$nome = filtraEntrada($_POST["nome"]);
		$data = filtraEntrada($_POST["data"]);
		$sexo = filtraEntrada($_POST["sexo"]);
		$ec = filtraEntrada($_POST["ec"]);
		$cargo = filtraEntrada($_POST["cargo"]);
		$especialidade = filtraEntrada($_POST["especialidade"]);
		$cpf = filtraEntrada($_POST["cpf"]);
		$rg = filtraEntrada($_POST["rg"]);
		$outro = filtraEntrada($_POST["outro"]);
		$cep = filtraEntrada($_POST["cep"]);
		$tip_log = filtraEntrada($_POST["tip_log"]);
		$logradouro = filtraEntrada($_POST["rua"]);
		$numero = filtraEntrada($_POST["numero"]);
		$complemento = filtraEntrada($_POST["bairro"]);
		$bairro = filtraEntrada($_POST["bairro"]);
		$cidade = filtraEntrada($_POST["cidade"]);
		$estado = filtraEntrada($_POST["estado"]);
		
		try{
			
			$conn->begin_transaction();
			
			$sql = "
				INSERT INTO funcionario(Id, Nome, DataNasc, Sexo, EstadoCivil, Cargo, Especialidade, CPF, RG, Outro)
				values (null, ? , ? , ? , ? , ? , ? , ? , ? , ?);
			";
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("ssissssss", $nome , $data , $sexo , $ec , $cargo , $especialidade , $cpf , $rg , $outro);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao inserir o funcionario: " . $conn->error);
    
						
			$sql = "
				INSERT INTO EnderecoFunc(CodEndereco, CEP, TipoLogradouro, Logradouro, Numero, Complemento, Bairro, Cidade, Estado, Id)
				values (null, ?, ?, ?, ?, ?, ?, ?, ?,  LAST_INSERT_ID());
			";
			
			$stmt = $conn->prepare($sql);

			$stmt->bind_param("sssissss", $cep, $tip_log, $logradouro, $numero, $complemento, $bairro, $cidade, $estado);
        
			if (! $stmt->execute())
				throw new Exception("Erro ao inserir o endereço do funcionário: " . $conn->error);
    
			
			$conn->commit();
    
			$formProcSucesso = true;
			echo "<script>
					alert('Cadastro realizado');
					window.location.replace('cadastro.php');
				</script>"; 
			} catch (Exception $e){
				$conn->rollback();echo"<script>
					alert('Cadastro não realizado, tente novamente');
					window.location.replace('cadastro.php');
				</script>"; 
			}
	}
	?>