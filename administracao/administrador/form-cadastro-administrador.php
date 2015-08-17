<?php
include_once('../inc-session-saudacao.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php include '../inc-head.php'; ?>

        <script src="js/jquery.ui.datepicker-pt-BR.js" type="text/javascript"></script>

        <script type="text/javascript">
        
            $(document).ready(function(){
                $('#formIncluirAdministradores').validate({
                    
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
                $('#dataCadastro').val(dia+'/'+mes+'/'+ano);
            });
            
        </script>

    </head>

    <body>

        <?php include '../inc-topo.php'; ?>

        <div id="conteudo">

            <div id="box-titulo-secao">
                <div class="limite">
                    <h1 class="tituloSecao">formulário de cadastro dos administradores</h1>
                </div>
            </div>

            <?php include_once('../inc-box-mensagem.php'); ?>

            <div class="limite">

                <form action="<?= $baseDirAdmin; ?>administrador/processo.php?op=incluirAdministrador" name="formIncluirAdministradores" id="formIncluirAdministradores" method="post" enctype="multipart/form-data">

                    <label for="nome">
                        Nome Completo (*): <br />
                        <input type="text" name="nome" id="nome" class="estilo-input-text required" />
                    </label>

                    <label for="email">
                        Email: <br /> <input type="text" name="email" id="email" class="estilo-input-text email" />
                    </label>

                    <label for="login">
                        Login (*): <br /> <input type="text" name="login" id="login" class="estilo-input-text required" />
                    </label>

                    <label for="senha">
                        Senha (*): <br /> <input type="password" name="senha" id="senha" class="estilo-input-text" />
                    </label>                   

                    <label for="situacao">
                        Situação (*): <br />
                        <select name="situacao" id="situacao" class="required">
                            <option value="">Selecione ...</option>
                            <option value="sim">Ativo</option>
                            <option value="nao">Inativo</option>
                        </select>
                    </label>

                    <label for="dataCadastro">
                        Data Cadastro (*): <br /><input type="text" name="dataCadastro" id="dataCadastro" class="required" value="" readonly="readonly" />
                    </label>

                    <label class="camposObrigatorios">
                        Campos Obrigatórios (*)
                    </label>

                    <input type="submit" value="Cadastrar Administrador" class="estiloBtn" />

                </form>

            </div>

        </div>

        <?php include '../inc-rodape.php'; ?> 

    </body>

</html>