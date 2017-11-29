<?php
session_start();
$paginaAtiva = "home";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Clínica Médica</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-3.2.1.js"></script>
	<script src="js/index.js"></script>
    <script src="Bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/layout.css" type="text/css">
	<style>
				
	.aligncenter {
        display: block;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        padding: 3px;
		border: 1px solid #ADD8E6;
		border-radius: 10px;
       }	
	</style>
  
</head>

<body>
<?php include "php/header.php"; ?>
<?php include "php/navbar.php"; ?>
<div>
	<img src="http://clinicadeolhosvisar.com.br/wp-content/uploads/clinica-visar-araxa-recepcao-2.jpg" class="aligncenter img-responsive" alt=""/>
</div>	

<div class="container" id="conteudo">

<div >

    <div id='desc'>
		<h2>Descrição</h2>
		<p>Nossa clínica oferece aos nossos clientes, diversos tipos de especialidades médicas, com os melhores profissionais do mercado</p>
    </div>
    <div id="missao">
        <h2>Missão</h2>
        <p>Preservar a saúde e a qualidade de vida das pessoas, a partir de um atendimento profissional, ético, humano e personalizado.</p>
    </div>
    <div id="valores">
        <h2>Valores <a href="#" id="linkMostraConteudo"></a></h2>
        <div id='mostraConteudo' style='display:none;'>
			<ul>
				<li>Compromisso com o cliente.</li>
				<li>Ética nos negócios</li>
				<li>Educação e formação de pessoas.</li>
				<li>Disposição e energia positiva.</li>
                                
                                <li>Responsabilidade social.</li>
                                <li>Respeito e valorização do ser humano.</li>
                                <li>Responsabilidade pelos resultados.</li>
                                <li>Transparência.</li>
                                <li>Qualidade de produtos e serviços.</li>
			</ul>
		</div>
    </div>
</div>
</div>


<?php include "php/footer.php"; ?> 
</body>
</html>
