<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
    <?php
    	include_once 'administracao/classes/Conexao.php';
    	include_once 'administracao/classes/Portfolio.php';
    ?>

    <head>
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />        
    	
    	<style type="text/css">

        	@font-face {
    		    font-family: 'AldoSemiBold';
    		    src: url('fontes/aldo_semi-bold0.12-webfont.eot');
    		    src: url('fontes/aldo_semi-bold0.12-webfont.eot?#iefix') format('embedded-opentype'),
    		         url('fontes/aldo_semi-bold0.12-webfont.woff') format('woff'),
    		         url('fontes/aldo_semi-bold0.12-webfont.ttf') format('truetype'),
    		         url('fontes/aldo_semi-bold0.12-webfont.svg#AldoSemiBold') format('svg');
    		    font-weight: normal;
    		    font-style: normal;

    		}	

    	</style>	

    </head>

    <body>

		<?php

    		$con = new Conexao();
    		$con->abrirConexao();

    		if($con) {

    			$id = $_GET['id'];
    			$port = new Portfolio();
    			$port->listarPortfolioId($id);

    		}


    	?>

    	<div id="box-detalhe">
    		<h1><?= $port->getTitulo(); ?></h1>    		
            <div id="box-img-addthis">
                <img src="administracao/portfolio/<?= $port->getArquivo(); ?>" alt="<?= $port->getTitulo(); ?>" title="<?= $port->getTitulo(); ?>" />
                <h2>Gostou? Compartilhe!</h2>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e4e831505df0db3"></script>
                <!-- AddThis Button END -->
            </div>
    		
            <div class="box-descricao">
                <h2>Descrição:</h2>
                <?= $port->getDescricao(); ?>
                <h2>Tecnologias:</h2>
                <p><?= $port->getTecnologia(); ?></p>
                <h2>Link do Projeto:</h2>
                <p><a href="<?= $port->getLink(); ?>" target="blank" title="<?= $port->getTitulo(); ?>"><?= $port->getLink(); ?></a></p>
                <h2>Trabalhando pela:</h2>
                <p><?= $port->getEmpresa(); ?></p>
            </div>
            
    	</div>

	</body>

</html>

