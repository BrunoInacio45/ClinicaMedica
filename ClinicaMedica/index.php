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
	<script>
				
		
		
	</script>
  
</head>

<body>
<?php include "php/header.php"; ?>
<?php include "php/navbar.php"; ?>

<div class="container" id="conteudo">


<div >
	<div id='desc'>
        <h2>Descrição</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then</p>
    </div>
    <div id="missao">
        <h2>Missão</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to</p>
    </div>
    <div id="valores">
        <h2>Valores <a href="#" id="linkMostraConteudo"></a></h2>
        <div id='mostraConteudo' style='display:none;'>
			<ul>
				<li>Valor 1 da clinica médica</li>
				<li>Valor 2 da clinica médica</li>
				<li>Valor 3 da clinica médica</li>
				<li>Valor 4 da clinica médica</li>
			</ul>
		</div>
    </div>
</div>
</div>


<?php include "php/footer.php"; ?> 
</body>
</html>
