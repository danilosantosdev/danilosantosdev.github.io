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
            plugins : "table, media"
        });
        </script>

        <script type="text/javascript">
        
            $(document).ready(function(){
                $('#formIncluirPortfolio').validate();
            });

        </script>

    </head>

    <body>

        <?php include '../inc-topo.php'; ?>

        <div id="conteudo">

            <div id="box-titulo-secao">
                <div class="limite">
                    <h1 class="tituloSecao">formulário de cadastro do portfólio</h1>
                </div>
            </div>

            <?php include_once('../inc-box-mensagem.php'); ?>

            <div class="limite">

                <form action="processo.php?op=incluirPortfolio" name="formIncluirPortfolio" id="formIncluirPortfolio" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="707200" />

                    <label for="titulo">
                        Título do Projeto (*): <br />
                        <input type="text" name="titulo" id="titulo" class="estilo-input-text required" />
                    </label>

                    <label for="link">
                        Link do Projeto (*): <br />
                        <input type="text" name="link" id="link" class="estilo-input-text required" />
                    </label>

                    <label for="tecnologia">
                        Tecnologias Utilizadas: <br />
                        <input type="text" name="tecnologia" id="tecnologia" class="estilo-input-text" />
                    </label>

                    <label for="empresa">
                        Trabalhava onde?: <br />
                        <input type="text" name="empresa" id="empresa" class="estilo-input-text" />
                    </label>

                    <label for="publicado">
                        Publicado (*): <br />
                        <select name="publicado" id="publicado" class="required">
                            <option value="">Selecione ...</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </label>

                    <label for="arquivo">
                        Imagem do Projeto (*) - Formatos .JPG e .PNG - 260px X 180px: <br /> <input type="file" name="arquivo" id="arquivo" class="estilo-file required" />
                    </label>

                    <label class="labelTextarea" for="descricao">
                        Descrição do Projeto : <br /> <textarea name="descricao" id="descricao" class="estilo-input-text"></textarea>
                    </label>     

                    <input type="submit" value="Cadastrar Projeto" class="estiloBtn" />

                    <label class="camposObrigatorios">
                        Campos Obrigatórios (*)
                    </label>

                </form>

            </div>

        </div>

        <?php include '../inc-rodape.php'; ?> 

    </body>

</html>