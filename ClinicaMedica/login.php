<?php $paginaAtiva = "agendamento"; ?>

 <?php
 
 function filtraEntrada($dado){
		$dado = trim($dado);
		$dado = stripslashes($dado);
		$dado = htmlspecialchars($dado);
		return $dado;
	}	
 
 if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$msgErro = '';
		$login = $senha = "";
		
		
		
		$login = filtraEntrada($_POST["login"]);
		$senha = filtraEntrada($_POST["senha"]);
		
		
		if(($login == 'adm') && ($senha == 'senhaadm')){
				echo "Bem-Vindo <br>";
			}else
				echo "Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
	}
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
        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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

		
<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {  
    if ($msgErro == "")
      echo "<h3 class='text-success'>Dados armazenados com sucesso!</h3>";
    else
      echo "<h3 class='text-danger'>Cadastro não realizado: $msgErro</h3>";
  }
?>
    </div>
	
<?php include "php/footer.php"; ?>
</body>
</html>