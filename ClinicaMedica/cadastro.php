<?php 

	$paginaAtiva = "cadastro"; 
	require "php/cadastrofunc.php";
	
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="js/jquery-3.2.1.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="Bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/layout.css" type="text/css">
		<script src="js/cadastro.js"></script>
		<script>
			function validaDate(){
				var date = document.forms['formCadastro']['data'].value;
				var d = new Date(date);
				var da = new Date();
				if(d > da){
					alert("Data inválida, tente novamente!");
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
        <form name='formCadastro' onSubmit="return validaDate()" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
		
			<h3>Dados Pessoais</h3><br>
			
			<div class="form-group">
              <label class="control-label col-sm-2" for="nome">Nome do funcionário:</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="nome" placeholder="Digite o nome">
              </div>
            </div>
			
			<div class="form-group">
              <label class="control-label col-sm-2" for="data">Data de nascimento:</label>
              <div class="col-sm-5">
                <input type="date" class="form-control" name="data" placeholder="Digite o data">
              </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="sexo">Sexo:</label>
                <div class="col-sm-5"> 
                    <label class="radio-inline"><input type="radio" name='sexo' value='1' checked>Masculino</label>
                    <label class="radio-inline"><input type="radio" name='sexo' value='2'>Feminino</label>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="ec">Estado civil:</label>
                <div class="col-sm-5"> 
                    <select id='ec' name="ec" class="form-control">
                        <option value="Solteiro">Solteiro(a)</option>
                        <option value="Casado">Casado(a)</option>
                        <option value="Divorciado">Divorciado(a)</option>
                        <option value="Viuvo">Viúvo(a)</option>
                        <option value="Separado">Separado(a)</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="cargo">Cargo:</label>
                <div class="col-sm-5"> 
                    <select id="cargo" name="cargo" class="form-control" onchange="especialidade()">
                        <option value="medico">Medico(a)</option>
                        <option value="enfermeiro" selected>Enfermeiro(a)</option>
                        <option value="secretário">Secretário(a)</option>
                        <option value="outro">Outro(a)</option>
                    </select>
                </div>
            </div>
			
			<div id="espec" class="form-group">
                <label class="control-label col-sm-2" for="especialidade">Especialidade médica:</label>
                <div class="col-sm-5"> 
                    <input type="text" id="especialidade" name="especialidade" class="form-control">
                </div>
			</div>
			
			<!--............................................................................................................-->
			
			<h3>Documentos</h3><br>
			
			<div class="form-group">
                <label class="control-label col-sm-2" for="cpf">CPF:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="cpf" placeholder="Digite o CPF">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="rg">RG:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="rg" placeholder="Digite o RG">
                </div>
            </div>
                        
            <div class="form-group">
                <label class="control-label col-sm-2" for="outro">Outro:</label>
                <div class="col-sm-5">
					<input type="text" class="form-control" name="outro" placeholder="Digite algum outro tipo de documento">
                </div>
            </div>

			<!--............................................................................................................-->
			
			<h3>Endereço</h3><br>
			
			<div class="form-group">
                <label class="control-label col-sm-2" for="cep">CEP:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="cep" placeholder="Digite o CEP">
                </div>
			</div>
    
            <div class="form-group">
                <label class="control-label col-sm-2" for="tip_log">Tipo de logradouro:</label>
                <div class="col-sm-5"> 
                    <select id="tip_log" name="tip_log" class="form-control">
                        <option value="rua">Rua</option>
                        <option value="avenida" selected>Avenida</option>
                        <option value="praça">Praça</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="logradouro">Logradouro:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="logradouro" placeholder="Digite o logradouro">
                </div>
            </div>
                            
            <div class="form-group">
                <label class="control-label col-sm-2" for="numero">Número:</label>
				<div class="col-sm-2">
                    <input type="number" class="form-control" name="numero" placeholder="Digite o número">
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="complemento">Complemento:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="complemento" placeholder="Digite o complemento">
                </div>
            </div>
			
			<div class="form-group">
                <label class="control-label col-sm-2" for="bairro">Bairro:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="bairro" placeholder="Digite o bairro">
                </div>
            </div>
			
			<div class="form-group">
                <label class="control-label col-sm-2" for="cidade">Cidade:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="cidade" placeholder="Digite a cidade">
                </div>
            </div>
			
			<div class="form-group">
                <label class="control-label col-sm-2" for="estado">Estado:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="estado" placeholder="Digite o estado">
                </div>	
            </div>
			
			<div class="form-group">
				<div class="col-sm-8">
					<button type="submit" class="btn btn-default">Cadastrar</button>
				</div>	
			</div>
			
		</form>	
		
	<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {  
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