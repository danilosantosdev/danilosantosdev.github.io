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

        <script type="text/javascript">
        
            $(document).ready(function(){
                $('#formEditarAdministradores').validate({
                    
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
            
            data = new Date();
            dia = data.getDate();
            mes = data.getMonth() + 1;
            ano = data.getFullYear();
            
            $(document).ready(function () {
                $('#dataCadastro').val(dia+'/'+mes+'/'+ano);
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
                    <h1 class="tituloSecao">formulário de edição do administrador</h1>
                </div>
            </div>

            <?php include_once('../inc-box-mensagem.php'); ?>

            <div class="limite">

                <?php

                    require_once('../classes/Administrador.php');

                    $c = new Conexao();
                    $con = $c->abrirConexao();

                    if($con) {
                    
                    $idAdministrador = $_GET['idAdministrador'];
                    $adm = new Administrador();
                    $adm->listarAdministradorId($idAdministrador);

                    }  else {
                        $c->erroConexao();
                    }

                ?>

                <form action="processo.php?op=editarAdministrador" name="formEditarAdministradores" id="formEditarAdministradores" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="senha" id="senha" value="<?= $adm->getSenha(); ?>" />

                    <label for="idAdministrador">
                        ID do Administrador: <br /> <input type="text" value="<?= $idAdministrador; ?>" name="idAdministrador" id="idAdministrador" class="estilo-input-text" readonly="readonly" />
                    </label>

                    <label for="nome">
                        Nome (*): <br />
                        <input type="text" name="nome" id="nome" value="<?= $adm->getNome(); ?>" class="estilo-input-text required" />
                    </label>

                    <label for="email">
                        Email: <br /> <input type="text" name="email" id="email" value="<?= $adm->getEmail(); ?>" class="estilo-input-text required email" />
                    </label>

                    <label for="login">
                        Login (*): <br /> <input type="text" name="login" id="login" value="<?= $adm->getLogin(); ?>" class="estilo-input-text required" />
                    </label>                    

                    <label for="situacao">
                        Situação (*): <br />
                        <select name="situacao" id="situacao" class="required">
                            <option value="sim" <?php
                                if ($adm->getSituacao() == "sim") {
                                        echo "selected = 'selected' ";
                                    }
                                ?> >Ativo</option>
                                            <option value="nao" <?php
                                if ($adm->getSituacao() == "nao") {
                                        echo "selected = 'selected' ";
                                    }
                                ?> >Inativo
                            </option>
                        </select>
                    </label>

                    <label for="dataCadastro">
                        Data Cadastro (*): <br /><input type="text" name="dataCadastro" id="dataCadastro" class="required" value="<?= $adm->getDataCadastro(); ?>" readonly="readonly" />
                    </label>

                    <fieldset id="mudaSenha">
                        <legend>Mudança de Senha - Preencher apenas no caso de mudança de senha</legend>

                        <label for="senhaAntiga">
                            Senha Antiga : <br /> <input type="password" name="senhaAntiga" id="senhaAntiga" value="" class="estilo-input-text" />
                        </label>

                        <label for="senhaNova">
                            Nova Senha : <br /> <input type="password" name="senhaNova" id="senhaNova" value="" class="estilo-input-text" />
                        </label>

                    </fieldset>

                    <label class="camposObrigatorios">
                        Campos Obrigatórios (*)
                    </label>

                    <input type="submit" value="Editar Administrador" class="estiloBtn" />

                </form>

            </div>

        </div>

    </body>

</html>