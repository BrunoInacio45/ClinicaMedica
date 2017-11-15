<?php
	include("validaLogin.php");
	if(!isset($_SESSION["login"])){
		$logado = false;
	}else
		$logado = true;
?>
 
	
 
 <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav" >
		<?php if($logado == false){ ?>
		<li <?php if ($paginaAtiva == 'home') echo "class='active' "; ?>><a href="index.php">Home</a></li>
        <li <?php if ($paginaAtiva == 'galeria') echo "class='active' "; ?>><a href="galeria.php">Galeria</a></li>    
        <li <?php if ($paginaAtiva == 'contato') echo "class='active' "; ?>><a href="contato.php">Contato</a></li>    
		<li <?php if ($paginaAtiva == 'agendamento') echo "class='active' "; ?>><a href="agendamento.php">Agendamento</a></li> 
		<?php
		}?>
		
		<?php if($logado == true){ ?>
		<li <?php if ($paginaAtiva == 'home') echo "class='active' "; ?>><a href="index.php">Home</a></li>
        <li <?php if ($paginaAtiva == 'galeria') echo "class='active' "; ?>><a href="galeria.php">Galeria</a></li>    
        <li <?php if ($paginaAtiva == 'contato') echo "class='active' "; ?>><a href="contato.php">Contato</a></li>    
		<li <?php if ($paginaAtiva == 'agendamento') echo "class='active' "; ?>><a href="agendamento.php">Agendamento</a></li> 
		<li <?php if ($paginaAtiva == 'cadastro') echo "class='active' "; ?>><a href="cadastro.php">Cadastro</a></li>
        <li <?php if ($paginaAtiva == 'listafuncionario') echo "class='active' "; ?>><a href="listafuncionario.php">Lista Funcionário</a></li>    
        <li <?php if ($paginaAtiva == 'listacontato') echo "class='active' "; ?>><a href="listacontato.php">Contatos realizados</a></li>    
		<li <?php if ($paginaAtiva == 'listaagendamento') echo "class='active' "; ?>><a href="listaagendamento.php">teste</a></li> 
		<?php 
		}		
		?>
	  </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php 
			if($logado == false) 
				echo"<li><a href='#myModal' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-log-in' ></span> Login</a></li>";
			else
				echo"<li><a href='php/logout.php'><span class='glyphicon glyphicon-log-out' ></span> Sair</a></li>";
		?>	
		
		
		
      </ul>
    </div>
	
	
	<div class="container">
  
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Conteúdo -->
      <div class="modal-content">
			
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Digite os dados para fazer o login</h4>
        </div>
				
        <div class="modal-body"> 
			<form name='form1' class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="login">Login:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="login" id="login" placeholder="Digite o login" required>
				</div>
				</div>
            
				<div class="form-group">
					<label class="control-label col-sm-2" for="senha">Senha:</label>
					<div class="col-sm-4"> 
						<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite a senha" required>
					</div>
				</div>
				
				<div class=text-right>
				<div class="form-group">
					<div class="col-sm-4">
						<button type="submit" class="btn btn-primary">Acessar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>	
				</div>
				</div>
            
				
				
			</form>	
        </div>
				
        <div class="modal-footer">
			
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</nav>
  
  

