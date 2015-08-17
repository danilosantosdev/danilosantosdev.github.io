<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <?php
    	$titulo = "Danilo Santos - Vídeo Aulas de HTML5 e CSS3";
	    $descricao = "Vídeo Aulas sobre HTML5 e CSS3.";
	    $keywords = "video aulas danilo santos, video aulas tutor brasil, video aulas html5, video aulas css3";
    	include_once '../includes/inc-head.php';
    	require_once '../administracao/classes/Conexao.php';
    	require_once '../administracao/classes/Portfolio.php';
    ?>

    <body>

    	<div class="limite">

			<!-- topo -->
			<header class="left relative">
				<?php include_once '../includes/inc-topo.php'; ?>
			</header>

			<!-- conteúdo -->
			<section id="conteudo" class="left">

				<section id="video-aula" class="left">
					<h1 class="titulos-internas">Vídeo Aulas</h1>
					<p>Olá pessoal, nesta seção irei disponibilizar algumas vídeo aulas que venho gravando para o Canal Tutor Brasil do Professor André Rossiter. Iremos abordar assuntos de HTML5 e CSS3. Espero que gostem! Valeu!</p>					

                    <ul id="lista-videos">

                    	<li>
                    		<h2>Inserir Vídeo com HTML5</h2>
                    		<iframe width="265" height="250" src="http://www.youtube.com/embed/11gU58YH2fA" frameborder="0" allowfullscreen></iframe>                        		
                    	</li>

                    	<li>
                    		<h2>Validando Formulário com HTML5</h2>                        		
                    		<iframe width="265" height="250" src="http://www.youtube.com/embed/20RJA1Nun1k" frameborder="0" allowfullscreen></iframe>
                    	</li>

                    	<li>
                    		<h2>Bordas Arrendondadas com CSS 3</h2>                        		
                    		<iframe width="265" height="250" src="http://www.youtube.com/embed/v8tQ2LqkSHk" frameborder="0" allowfullscreen></iframe>
                    	</li>

                    	<li>
                    		<h2>Transições de menu com CSS 3</h2>                        		
                    		<iframe width="265" height="250" src="http://www.youtube.com/embed/aWOaKhhXD_U" frameborder="0" allowfullscreen></iframe>
                    	</li>

                	</ul>

				</section>

				<section id="publicidade" class="left">
					<h1 class="titulos">Publicidade</h1>

		            <div id="box-anuncio">
			            <script type="text/javascript">
			                bb_bid = "1672463";
			                bb_lang = "pt-BR";
			                bb_keywords = "";
			                bb_name = "custom";
			                bb_limit = "8";
			                bb_format = "bbb";
			            </script>
			            <script type="text/javascript" src="http://static.boo-box.com/javascripts/embed.js"></script>
		            </div>

				</section>

			</section>

		</div>

		<!-- rodapé -->
		<footer class="left">
			<div class="limite">
				<?php include_once '../includes/inc-rodape.php'; ?>
			</div>
		</footer>

	</body>

</html>

