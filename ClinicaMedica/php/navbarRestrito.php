
 <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      
      <ul class="nav navbar-nav" >
        <li <?php if ($paginaAtiva == 'cadastro') echo "class='active' "; ?>><a href="cadastro.php">Cadastro de funcionário</a></li>
        <li <?php if ($paginaAtiva == 'contatosRealizados') echo "class='active' "; ?>><a href="listacontato.php">Contatos realizados</a></li>    
        <li <?php if ($paginaAtiva == 'agendamentos') echo "class='active' "; ?>><a href="#">Agendamentos</a></li>    
		<li <?php if ($paginaAtiva == 'funcionarios') echo "class='active' "; ?>><a href="listafuncionario.php">Funcionários</a></li> 
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Área pública
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="galeria.php">Galeria</a></li>
				<li><a href="contato.php">Contato</a></li>
				<li><a href="agendamento.php">Agendamento</a></li>
			</ul>
		</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
		
		<li><a href="#"><span class="glyphicon glyphicon-log-out" ></span> Sair</a></li>
      </ul>
    </div>
	
	
	
</nav>
  
  



