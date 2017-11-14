<?php 
	$paginaAtiva = "listafuncionario"; 
	require "php/listafunc.php";
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
		<link rel="stylesheet" href="css/layout.css" type="text/css">

</head>
<body>
<?php include "php/header.php"; ?>
<?php include "php/navbarRestrito.php"; ?>

    <div class="container" id='conteudo'>
		<h3 style='text-align:center'>Funcionários cadastrados</h3>
		<table class="table table-striped">
			<thread>
				<tr>
					<th>Nome</th>
					<th>Sexo</th>
					<th>Cargo</th>
					<th>RG</th>
					<th>Logradouro</th>
					<th>Cidade</th>
				</tr>
			</thread>
			
			<?php
				if($listaFuncionario != ""){
					foreach ($listaFuncionario as $funcionario){       
						echo "
							<tr>
								<td>$funcionario->nome</td>
								<td>$funcionario->sexo</td>
								<td>$funcionario->cargo</td>
								<td>$funcionario->rg</td>
								<td>$funcionario->logradouro</td>
								<td>$funcionario->cidade</td>
							</tr>      
						";
					}
				}	
				
		
			?>
				
		</table>
		
		<?php
			if ($msgErro != "")
			echo "<p class='text-danger'>A operação não pode ser realizada: $msgErro</p>";
		?>
  
    </div>
	
<?php include "php/footer.php"; ?>
</body>
</html>