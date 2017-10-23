<?php 
	$paginaAtiva = "listacontato"; 
	require "php/listacont.php";
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
<?php include "php/navbar.php"; ?>

    <div class="container" id='conteudo'>
		<h3 style='text-align:center'>Contatos realizados</h3>
		<div style="overflow-x:auto;">
		<table class="table table-bordered table-hover">
			<thread>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Motivo</th>
					<th>Mensagem</th>
				</tr>
			</thread>
			
			<?php
				if($listaContato != ""){
					foreach ($listaContato as $contato){       
						echo "
							<tr>
								<td>$contato->nome</td>
								<td>$contato->email</td>
								<td>$contato->motivo</td>
								<td>$contato->mensagem</td>
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