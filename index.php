<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <?php
    	$titulo = "Danilo Santos - Desenvolvedor Web - Recife";
	    $descricao = "Sou desenvolver web há 4 anos - HTML5, CSS3, Javascript, Jquery e PHP.";
	    $keywords = "danilo santos, front-end recife, desenvolvedor web, criação de sites recife, web designer recife";
    	include_once 'includes/inc-head.php';
    	
    ?>

    <body>

    	<div class="limite">

			<!-- topo -->
			<header class="left">
				<?php include 'includes/inc-topo.php'; ?>
			</header>

			<!-- conteúdo -->
			<section id="conteudo" class="left">

				<!-- <section id="portfolio" class="left">
						
					<div class="container paging_container">

                        <ul class="content relative">

                        	<?php

                        		// $c = new Conexao();
                          //   	$con = $c->abrirConexao();

                        		// if($con) {

                        		// 	$port = new Portfolio();
                        		// 	$port->listar("SELECT * FROM portfolio WHERE publicado = 'sim' ORDER BY id DESC", "site");

                        		// } else {
                        		// 	$c->erroConexao();
                        		// }

                        	?>

                    	</ul>

                        <div class="page_navigation"></div>

                    </div>

				</section> -->

				<section id="contato" class="left">
					<h1 class="titulos">Contato</h1>
					<p>Fale comigo através do email <a href="mailto: job@danilosantos.cc" class="email underline">job@danilosantos.cc</a> ou preencha o formulário abaixo:</p>

					<?php include 'includes/inc-form-contato.php'; ?>

				</section>

				<section id="expertises" class="right">

					<h1 class="titulos">Expertises</h1>

					<h2 class="underline">Formação:</h2>
					<ul>
						<li>Cursando Sistemas para Internet - FMR</li>
					</ul>

					<h2 class="underline">Certificados:</h2>
					<ul>
						<li>PHP Developer - Especializa - 2012</li>
						<li>PHP Programmer - Especializa - 2012</li>
						<li>Web Designer - SENAC - 2007</li>
					</ul>

					<h2 class="underline">Tecnologias:</h2>
					<ul>
						<li>HTML5</li>
						<li>CSS3</li>
						<li>JAVASCRIPT / JQUERY</li>
						<li>PHP Orientado a Objeto</li>
						<li>SQL</li>
					</ul>

				</section>				

			</section>

		</div>

		<!-- rodapé -->
		<footer class="left">
			<div class="limite">
				<?php include 'includes/inc-rodape.php'; ?>
			</div>
		</footer>

	</body>

</html>

