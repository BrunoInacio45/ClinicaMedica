<?php
	session_start();
	include("conexaoMysql.php");

	function filtraEntradaV($dado){
		$dado = trim($dado);
		$dado = stripslashes($dado);
		$dado = htmlspecialchars($dado);
		return $dado;
	};	
	
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$login = filtraEntradaV($_POST["login"]);
		$senha = filtraEntradaV($_POST["senha"]);
		
		
		$sql = "SELECT Login FROM clinicamedica.usuario where Login = '$login' and Senha = '$senha' ";
		$resultado = $conn->query($sql);
		
		if($resultado->num_rows <= 0){
			echo "<script>alert('Dados incorretos')</script>";}
		else
			$_SESSION["login"] = $login;
			
	}
	
		
	?>