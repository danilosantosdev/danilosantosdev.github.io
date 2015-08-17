<?php
include_once('../inc-session-saudacao.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script language="javascript" type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
        <script language="javascript" type="text/javascript" src="../js/jquery.validate.js"></script>
        <link rel="stylesheet" href="../css/format.css" media="screen" />

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
                $('#formEditarPensamento').validate({
                    
                    rules: {
                        senhaNova: {                            
                            minlength: 8  
                        } 
                    },
                    messages: {
                        senhaNova: {                            
                            maxlength: "Digite no mínimo 8 caracteres"  
                        } 
                    }
                    
                });
            });

        </script>

        <script type="text/javascript">            
            $(document).ready(function(){
                $("#box-mensagem").delay(10000).slideUp("slow");         
            });    
        </script>

    </head>

    <body>

        <div id="conteudo">

            <div id="box-titulo-secao">
                <div class="limite">
                    <h1 class="tituloSecao">formulário de edição do pensamento</h1>
                </div>
            </div>

            <?php include_once('../inc-box-mensagem.php'); ?>

            <div class="limite">

                <?php

                    require_once('../classes/Pensamento.php');
                    require_once('../classes/Util.php');

                    $util = new Util();

                    $c = new Conexao();
                    $con = $c->abrirConexao();

                    if($con) {
                    
                    $idPensamento = $_GET['idPensamento'];
                    $pen = new Pensamento();
                    $pen->listarId($idPensamento);

                    }  else {
                        $c->erroConexao();
                    }

                ?>

                <form action="processo.php?op=editarPensamento" name="formEditarPensamento" id="formEditarPensamento" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idPensamento" id="idPensamento" value="<?= $idPensamento; ?>" />

                    <label for="titulo">
                        Título (*): <br />
                        <input type="text" name="titulo" id="titulo" class="estilo-input-text required" value="<?= $pen->getTitulo(); ?>" />
                    </label>

                    <label for="link">
                        Link: <br /> <input type="text" name="link" id="link" class="estilo-input-text" value="<?= $pen->getlink(); ?>" />
                    </label>

                    <label for="publicado">
                            Publicado (*): <br />
                            <select name="publicado" id="publicado" class="required">
                                <option value="sim" <?php
                                    if ($pen->getPublicado() == "sim") {
                                            echo "selected = 'selected' ";
                                        }
                                    ?> >Sim</option>
                                                <option value="nao" <?php
                                    if ($pen->getPublicado() == "nao") {
                                            echo "selected = 'selected' ";
                                        }
                                    ?> >Não
                                </option>
                            </select>
                        </label>

                    <label for="dataCadastro">
                        Data Publicação (*): <br /><input type="text" name="dataPublicacao" id="dataPublicacao" class="required" value="<?= $util->dataBr($pen->getData()); ?>" readonly="readonly" />
                    </label>

                    <label class="labelTextarea" for="descricao">
                        Descrição: <br /> <textarea name="descricao" id="descricao" class="estilo-input-text"><?= $pen->getDescricao(); ?></textarea>
                    </label>

                    <label class="camposObrigatorios">
                        Campos Obrigatórios (*)
                    </label>

                    <input type="submit" value="Editar Pensamento" class="estiloBtn" />

                </form>

            </div>

        </div>

    </body>

</html>