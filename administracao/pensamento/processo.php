<?php

require_once ("../classes/Conexao.php");
require_once ("../classes/Pensamento.php");
require_once ("../classes/Util.php");

$op = $_GET['op'];

if (isset($op)) {

    switch ($op) {

        // processos para a classe administrador //

        case "incluirPensamento":

            $c = new Conexao();
            $con = $c->abrirConexao();
            $util = new Util();

            if ($con) {

                $titulo = $util->checarVariavel( $_POST['titulo'] );
                $link = $util->checarVariavel( $_POST['link'] );                
                $publicado = $util->checarVariavel( $_POST['publicado'] );                
                $dataPublicacao = $util->checarVariavel( $util->dataIng( $_POST['dataPublicacao'] ) );
                $descricao = $util->checarVariavel( $_POST['descricao'] );

                if ( $titulo == "" || $publicado == "" || $dataPublicacao == "" ) {
                    header("Location: form-cadastro-pensamento.php?msg=Preencha/os/Campos/Obrigatórios!&tipoMsg=erro");
                } else {
                    
                    $pen = new Pensamento();
                    $pen->setTitulo($titulo);
                    $pen->setLink($link);
                    $pen->setPublicado($publicado);
                    $pen->setData($dataPublicacao);
                    $pen->setDescricao($descricao);

                    $pen->cadastrar();

                }
            } else {
                $c->erroConexao();
            }

            $c->fecharConexao($con);
            unset($c);
            unset($con);
            unset($pen);
            unset($util);

            break;

        case "editarPensamento":

            $c = new Conexao();
            $con = $c->abrirConexao();
            $util = new Util();

            if ($con) {

                $idPensamento = (int) $_POST['idPensamento'];
                $titulo = $util->checarVariavel( $_POST['titulo'] );
                $link = $util->checarVariavel( $_POST['link'] );                
                $publicado = $util->checarVariavel( $_POST['publicado'] );                
                $dataPublicacao = $util->checarVariavel( $util->dataIng( $_POST['dataPublicacao'] ) );
                $descricao = $util->checarVariavel( $_POST['descricao'] );

                if ( $titulo == "" || $publicado == "" || $dataPublicacao == "" ) {
                    header("Location: form-cadastro-pensamento.php?msg=Preencha/os/Campos/Obrigatórios!&tipoMsg=erro");
                } else {
                    
                    $pen = new Pensamento();
                    $pen->setTitulo($titulo);
                    $pen->setLink($link);
                    $pen->setPublicado($publicado);
                    $pen->setData($dataPublicacao);
                    $pen->setDescricao($descricao);

                    $pen->editar($idPensamento);

                }
            } else {
                $c->erroConexao();
            }

            $c->fecharConexao($con);
            unset($c);
            unset($con);
            unset($pen);
            unset($util);

            break;

        case "excluirPensamento":

            $c = new Conexao();
            $con = $c->abrirConexao();

            if($con) {

                $idPensamento = (int)($_GET['idPensamento']);
                $pen = new Pensamento();
                $pen->excluir($idPensamento);

            }

            unset($c);
            unset($con);
            unset($pen);

            break;
    }
}
?>
