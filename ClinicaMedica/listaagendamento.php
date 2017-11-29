<?php  
	include('php/validasession.php');
	$paginaAtiva = "listaagendamento"; 
	require "php/listaagend.php";
?>


<!DOCTYPE html>
<html>
<head lang="pt-br">
        <meta charset="UTF-8">
        <title>Lista Agendamento</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="js/jquery-3.2.1.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="Bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/layout.css" type="text/css">

</head>
<body>
<?php include "php/header.php"; ?>
<?php include "php/navbar.php"; ?>

    <div class="container" id='conteudo'>
		<h3 style='text-align:center'>Agendamentos cadastrados</h3>
		<div style="overflow-x:auto;">
                <table class="table table-bordered table-striped table-hover">
			<thread>
				<tr>
					<th>Paciente</th>
					<th>Telefone</th>
					<th>Médico</th>
					<th>Especialidade</th>
					<th>Data</th>
					<th>Hora</th>
				</tr>
			</thread>
			
			<?php
				if($listaAgenda != ""){
					foreach ($listaAgenda as $agenda){       
						echo "
							<tr>
								<td>$agenda->nomePaciente</td>
								<td>$agenda->telefone</td>
								<td>$agenda->nomeMedico</td>
								<td>$agenda->especialidade</td>
								<td>$agenda->data</td>
								<td>$agenda->hora</td>
							</tr>      
						";
					}
				}	
				
		
			?>
				
		</table>
		</div>
		<?php
			if ($msgErro != "")
			echo "<p class='text-danger'>A operação não pode ser realizada: $msgErro</p>";
		?>
  
    </div>
	
<?php include "php/footer.php"; ?>
</body>
</html>