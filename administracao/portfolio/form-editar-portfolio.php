<?php
include_once('../inc-session-saudacao.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php include '../inc-head.php'; ?>

        <script type="text/javascript" src="../tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
        tinyMCE.init({
            mode : "textareas",
            theme : "simple",
            plugins : "table"
        });
        </script>

        <script type="text/javascript">
        
            $(document).ready(function(){
                $('#formEditarPortfolio').validate();
            });

        </script>

    </head>

    <body>

        <div id="conteudo">

            <div id="box-titulo-secao">
                <div class="limite">
                    <h1 class="tituloSecao">formulário de edição do portfólio</h1>
                </div>
            </div>

            <?php include_once('../inc-box-mensagem.php'); ?>

            <div class="limite">

                <?php

                    require_once('../classes/Portfolio.php');
                    require_once('../classes/Conexao.php');
                    require_once('../classes/Util.php');
                    
                    $c = new Conexao();

                    $con = $c->abrirConexao();

                    if ($con) {
                        
                        $idPortfolio = $_GET['idPortfolio'];
                        $port = new Portfolio();
                        $port->listarPortfolioId($idPortfolio);

                    } else {
                        $c->erroConexao();
                    }
                    

                ?>

                <form action="processo.php?op=editarPortfolio" name="formEditarPortfolio" id="formEditarPortfolio" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idPortfolio" value="<?= $idPortfolio; ?>" />

                    <div id="box-info-edicao" class="left">

                        <label for="titulo">
                            Título do Projeto (*): <br />
                            <input type="text" name="titulo" id="titulo" value="<?= $port->getTitulo(); ?>" class="estilo-input-text required" />
                        </label>

                        <label for="link">
                            Link do Projeto (*): <br />
                            <input type="text" name="link" id="link" value="<?= $port->getLink(); ?>" class="estilo-input-text required" />
                        </label>

                        <label for="tecnologia">
                            Tecnologias Utilizadas: <br />
                            <input type="text" name="tecnologia" id="tecnologia" value="<?= $port->getTecnologia(); ?>" class="estilo-input-text" />
                        </label>

                        <label for="empresa">
                            Trabalhava onde?: <br />
                            <input type="text" name="empresa" id="empresa" value="<?= $port->getEmpresa(); ?>" class="estilo-input-text" />
                        </label>

                        <label for="publicado">
                            Publicado (*): <br />
                            <select name="publicado" id="publicado" class="required">
                                <option value="sim" <?php
                                    if ($port->getPublicado() == "sim") {
                                            echo "selected = 'selected' ";
                                        }
                                    ?> >Sim</option>
                                                <option value="nao" <?php
                                    if ($port->getPublicado() == "nao") {
                                            echo "selected = 'selected' ";
                                        }
                                    ?> >Não
                                </option>
                            </select>
                        </label>

                        <label class="labelTextarea" for="descricao">
                            Descrição :<br /> <textarea name="descricao" id="descricao" class="estilo-input-text" style="width: 500px;" ><?= $port->getDescricao(); ?></textarea>
                        </label>

                    </div>
                    
                    <div id="box-arquivo-edicao" class="right">

                        <h1>Arquivo Atual:</h1>

                        <div id="box-titulo-arquivo" class="left">                            
                            <img src='<?= $port->getArquivo(); ?>' title='<?= $port->getArquivo(); ?>' width='150' height='104' />
                        </div>

                        <div id="box-novo-arquivo" class="left">

                            <label for="arquivo">
                                Imagem do Projeto : <br /> <input type="file" name="arquivo" id="arquivo" class="estilo-file " />
                            </label>

                        </div>

                        <div id="info">
                            <p>Tamanho Máximo : 700Kb<br />Formatos Permitidos: .JPG e .PNG<br />Dimensões: 260px X 180px</p>
                        </div>

                    </div>                    

                    <input type="submit" value="Editar Projeto" class="estiloBtn" />

                    <label class="camposObrigatorios" style="clear: left;">
                        Campos Obrigatórios (*)
                    </label>

                </form>

            </div>

        </div>

    </body>

</html>