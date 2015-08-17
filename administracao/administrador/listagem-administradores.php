<?php
include_once('../inc-session-saudacao.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php include '../inc-head.php'; ?>

        <script type="text/javascript">
        
            function confirmarExclusao() {                
                var resultado = confirm("Tem certeza que deseja excluir esse Administrador?");				
                return resultado;                
            }        

        </script>

    </head>

    <body>

        <?php include '../inc-topo.php'; ?>

        <div id="conteudo">

            <div id="box-titulo-secao">
                <div class="limite">
                    <h1 class="tituloSecao">listagem dos administradores</h1>
                </div>
            </div>

            <?php include_once('../inc-box-mensagem.php'); ?>

            <div class="limite">

                <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabela-listagem">

                    <thead>

                        <tr>                        
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Login</th>                            
                            <th>Ativo</th>
                            <th>Data de Cadastro</th>                        
                            <th>Ações</th>
                        </tr>

                    </thead>

                    <tbody>
                        
                        <?php

                            require_once('../classes/Administrador.php');

                            $c = new Conexao();
                            $con = $c->abrirConexao();

                            if($con) {

                                $adm = new Administrador();
                                $adm->listarAdministrador();

                            } else {
                                $c->erroConexao();
                            }

                            unset($c);
                            unset($con);
                            unset($adm);

                        ?>

                    </tbody>

                </table>

            </div>

        </div>

        <?php include '../inc-rodape.php'; ?>  

    </body>

</html>