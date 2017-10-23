  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      
      <ul class="nav navbar-nav" >
        <li <?php if ($paginaAtiva == 'home') echo "class='active' "; ?>><a href="index.php">Home</a></li>
        <li <?php if ($paginaAtiva == 'galeria') echo "class='active' "; ?>><a href="galeria.php">Galeria</a></li>    
        <li <?php if ($paginaAtiva == 'contato') echo "class='active' "; ?>><a href="contato.php">Contato</a></li>    
		<li <?php if ($paginaAtiva == 'agendamento') echo "class='active' "; ?>><a href="agendamento.php">Agendamento</a></li> 
		<li <?php if ($paginaAtiva == 'listafuncionario') echo "class='active' "; ?>><a href="listafuncionario.php">Listagem de funcionário</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>
  



