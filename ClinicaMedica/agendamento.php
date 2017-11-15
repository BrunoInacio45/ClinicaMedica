<?php 
	session_start();
	$paginaAtiva = "agendamento"; 
	include("php/listafunc.php");
	include("php/cadastroagendamento.php");
	
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
        <meta charset="UTF-8">
        <title>Agendamento</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="js/jquery-3.2.1.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="Bootstrap/js/bootstrap.min.js"></script>
		<script src="js/especialidadeMedica.js"></script>
		<link rel="stylesheet" href="css/layout.css" type="text/css">
		
		
</head>
<body>
<?php include "php/header.php"; ?>
<?php include "php/navbar.php"; ?>

    <div class="container" id='conteudo'>
	<h3>Faça o agendamento de sua consulta</h3>
	<hr/>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
		<div class="form-group">
            <label for="especialidade">Especialidade médica desejada:</label>
			<select id='especialidade' name="especialidade" class="form-control" onchange="buscaNome(this.value)" required>
               <?php
				if($listaMedico != ""){
					foreach ($listaMedico as $medico){       
						echo "
							<option value='$medico->especialidade'>$medico->especialidade</option>
						";
					}
				}	
				?>
			
            </select>
		</div>
		
		<div class="form-group">
            <label for="nomeEsp">Nome do médico especialista</label>
			<select id='nomeEsp' name="nomeEsp" class="form-control" onchange="buscaHorario(this.value)" required>
                <option value='#'>Escolha a especialidade médica</option>
            </select>
		</div>
		
		<div class="form-group">
            <label for="data">Data da consulta</label>
			<input type='date' class="form-control" name='dataConsulta' required>
		</div>
		
		<div class="form-group">
            <label for="horario">Horário disponível para consulta</label>
			<select id='horario' name="horario" class="form-control" required>
                
            </select>
		</div>
		
		<div class="form-group">
            <label for="nomePasc">Nome do paciente</label>
			<input type='text' class="form-control" name='nomePasc' id='nomePasc' required>
		</div>
		
		<div class="form-group">
            <label for="telefone">Telefone do paciente</label>
			<input type='telefone' class="form-control" name='telefone' required>
		</div>
		
		<div class="form-group">
            <button type='submit' class='btn btn-primary btn-block' style="font-size:18px">Agendar</button>
		</div>
	
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  
			if ($msgErro == "")
				echo "<h3 class='text-success'>Agendamento realizado com sucesso!</h3>";
		else
			echo "<h3 class='text-danger'>Agendamento não realizado: $msgErro</h3>";
		}
	?>
	
	
	</div>

<?php include "php/footer.php"; ?>
</body>
</html>