<?php 
	
	$paginaAtiva = "contato"; 
	require "php/cadastrocont.php";
	
	
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
        <meta charset="UTF-8">
        <title>Contato</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="js/jquery-3.2.1.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="Bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/layout.css?=v15" type="text/css">
		<script>
					
			function validaForm(){
				var mensagem = document.forms['formContato']['mensagem'].value;
				if(mensagem.length > 200){
					alert("O campo para a mensagem permite no máximo 200 caracteres, tente novamente!);
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
    <h3>Envie sua mensagem</h3>
	<hr/>
    <form name='formContato' onSubmit="return validaForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="motivo">Motivo</label>
            <select name="motivo" id='motivo' class="form-control" required>
                <option value='Reclamação'>Reclamação</option>
                <option value='Sugestão'>Sugestão</option>
                <option value='Elogio' selected>Elogio</option>
                <option value='Dúvida'>Dúvida</option>
            </select>    
        </div>

        <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea class="form-control" rows="5" name="mensagem" id='mensagem' required></textarea>
        </div>
		
		<div class=text-right>
		<div class="form-group">
            <button type="submit" class="btn btn-default">Enviar</button>
        </div>
		</div>
		
		
    </form>
	
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  
			if ($msgErro == "")
				echo "<h3 class='text-success'>Contato realizado com sucesso!</h3>";
		else
			echo "<h3 class='text-danger'>Contato não realizado: $msgErro</h3>";
		}
	?>
	
    </div>

<?php include "php/footer.php"; ?>
</body>
</html>