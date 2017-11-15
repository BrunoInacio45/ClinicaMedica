<?php
 
 $paginaAtiva = "login"; 
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
        
        <h3 style="text-align:center">Faça o login com sua conta</h3>
		<br>
        <form class="form-horizontal" action="php/validaLogin.php" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-2" for="login">Login:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="login" id="login" placeholder="Digite o login">
              </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="senha">Senha:</label>
                <div class="col-sm-4"> 
					<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a senha">
                </div>
            </div>
            
            <div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Acessar</button>
                </div>
            </div>
		</form>	

		

    </div>
	
<?php include "php/footer.php"; ?>
</body>
</html>