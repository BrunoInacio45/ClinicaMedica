<?php 
// Inicia sessões 
	session_start();
	if(!isset($_SESSION["login"]))
		echo "<script>
					alert('Você precisa estar logado para acessar essa página, por favor realize o login');
					window.location.replace('index.php');
				</script>"; 
?> 