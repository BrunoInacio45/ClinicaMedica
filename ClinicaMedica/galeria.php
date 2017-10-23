<?php

$paginaAtiva = "galeria";

?>


<!DOCTYPE html>
<html>
<head lang="pt-br">
        <meta charset="UTF-8">
        <title>Galeria</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
        <script src="js/jquery-3.2.1.js"></script>
        <script src="Bootstrap/js/bootstrap.min.js"></script>
        <script src="js/galeria.js"></script>
        <link rel="stylesheet" href="css/layout.css" type="text/css">
        <link rel="stylesheet" href="css/galeria.css?v=15" type="text/css">
		<script>
		$(document).ready(function() {
			
		$(".imgGalery").each(function(i) {
			$(this).delay(200*i).fadeIn();
		});
		
		$(".imgGalery").hover(
		
			function(){
				$(this).animate({
					width: '280px',
					height: '250px'
				});
			},
			
			function(){
				$(this).animate({
					width: '230px',
					height: '200px'
				});
			}			
		);
		
	});

	function bordaIn(img){
		img.style.border = "4px ridge #EE0000";
	}

	function bordaOut(img){
		img.style.border = "none";
	}
		</script>
</head>
<body>
<?php include "php/header.php"; ?>
<?php include "php/navbar.php"; ?>

    <div class="container" id='conteudo'>
	<h2>Galeria</h2>
    
	
	<table class="center" border="0" style="horizontal-align:center;">
	<tr>
		<td><img onMouseEnter='bordaIn(this)' onMouseLeave='bordaOut(this)' class="imgGalery" src="images/1.jpg" id="img01"></td>
		<td><img onMouseEnter='bordaIn(this)' onMouseLeave='bordaOut(this)' class="imgGalery" src="images/2.jpg" id="img02"></td>
		<td><img onMouseEnter='bordaIn(this)' onMouseLeave='bordaOut(this)' class="imgGalery" src="images/3.jpg" id="img03"></td>
		</tr>
	<tr>
		<td><img onMouseEnter='bordaIn(this)' onMouseLeave='bordaOut(this)' class="imgGalery" src="images/4.jpg" id="img05"></td>
		<td><img onMouseEnter='bordaIn(this)' onMouseLeave='bordaOut(this)' class="imgGalery" src="images/5.jpg" id="img06"></td>
		<td><img onMouseEnter='bordaIn(this)' onMouseLeave='bordaOut(this)' class="imgGalery" src="images/6.jpg" id="img07"></td>
		</tr>
	<tr>
</table>

    
	</div>
	
<?php include "php/footer.php"; ?>	
</body>
</html>