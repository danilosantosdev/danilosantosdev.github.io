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

        <script src="js/jquery.ui.datepicker-pt-BR.js" type="text/javascript"></script>

        <script type="text/javascript">
        
            $(document).ready(function(){
                $('#formIncluirPensamento').validate({
                    
                    rules: {
                        senha: {
                            required: true,
                            minlength: 8  
                        } 
                    },
                    messages: {
                        senha: {
                            required: "Campo Obrigatório!",
                            maxlength: "Digite no mínimo 8 caracteres"  
                        } 
                    }
                    
                });
            });

        </script>

        <script type="text/javascript">            
            
            data = new Date();
            dia = data.getDate();
            mes = data.getMonth() + 1;
            ano = data.getFullYear();
            
            $(document).ready(function () {
                $('#dataPublicacao').val(dia+'/'+mes+'/'+ano);
            });
            
        </script>

    </head>

    <body>

        <?php include '../inc-topo.php'; ?>

        <div id="conteudo">

            <div id="box-titulo-secao">
                <div class="limite">
                    <h1 class="tituloSecao">formulário de cadastro dos pensamentos</h1>
                </div>
            </div>

            <?php include_once('../inc-box-mensagem.php'); ?>

            <div class="limite">

                <form action="processo.php?op=incluirPensamento" name="formIncluirPensamento" id="formIncluirPensamento" method="post" enctype="multipart/form-data">

                    <label for="titulo">
                        Título (*): <br />
                        <input type="text" name="titulo" id="titulo" class="estilo-input-text required" />
                    </label>

                    <label for="link">
                        Link: <br /> <input type="text" name="link" id="link" class="estilo-input-text" />
                    </label>

                    <label for="publicado">
                        Publicado (*): <br />
                        <select name="publicado" id="publicado" class="required">
                            <option value="">Selecione ...</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </label>

                    <label for="dataCadastro">
                        Data Publicação (*): <br /><input type="text" name="dataPublicacao" id="dataPublicacao" class="required" value="" readonly="readonly" />
                    </label>

                    <label class="labelTextarea" for="descricao">
                        Descrição: <br /> <textarea name="descricao" id="descricao" class="estilo-input-text"></textarea>
                    </label>

                    <label class="camposObrigatorios">
                        Campos Obrigatórios (*)
                    </label>

                    <input type="submit" value="Cadastrar Pensamento" class="estiloBtn" />

                </form>

            </div>

        </div>

        <?php include '../inc-rodape.php'; ?> 

    </body>

</html>