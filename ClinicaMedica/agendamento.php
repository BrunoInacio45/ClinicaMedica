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
                
        <script>
			function pegaValores() {
				var a = document.getElementById("nomeEsp").value;
				var b = document.getElementById("data").value;
				buscaHorario(b,a);
			}
                        
                        function apagaData() {
                                $("#data").val('');
				$("#horario").empty();
                                var campoSelect = document.getElementById("horario");
                                var option = document.createElement("option");
                                option.text = "Escolha o(a) médico(a) e a data da consulta" ;
                                option.value = '#';
                                campoSelect.add(option);
			}
                        
                        function validaDate(){
				var espec = document.getElementById("especialidade").value;
				var medico = document.getElementById("nomeEsp").value;
				var horario = document.getElementById("horario").value;
				if((espec == '#') || (medico == '#') || (horario == '#')){
					alert("Dados incorretos, tente novamente!");
					return false;
				}
				return true;
			}
 
		</script>       
		
		
</head>
<body>
<?php include "php/header.php"; ?>
<?php include "php/navbar.php"; ?>

    <div class="container" id='conteudo'>
	<h3>Faça o agendamento de sua consulta</h3>
	<hr/>
    <form onSubmit="return validaDate()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
		<div class="form-group">
            <label for="especialidade">Especialidade médica desejada:</label>
			<select id='especialidade' name="especialidade" class="form-control" onchange="buscaNome(this.value)" required>
               <option value='#'>-</option>
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
			<select id='nomeEsp' name="nomeEsp" class="form-control"  onchange="apagaData()" required>
                <option value='#'>Escolha a especialidade médica</option>
            </select>
		</div>
		
		<div class="form-group">
            <label for="data">Data da consulta</label>
			<input type='date' class="form-control" id='data' name='data' onkeyup='pegaValores()' required>
		</div>
		
		<div class="form-group">
            <label for="horario">Horários disponíveis para consulta</label>
		<select id='horario' name="horario" class="form-control" required>
                    <option value='#'>Escolha o(a) médico(a) e a data da consulta</option>    
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
	
	
	</div>

<?php include "php/footer.php"; ?>
</body>
</html>