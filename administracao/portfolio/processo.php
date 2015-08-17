<?php

require_once ("../classes/Conexao.php");
require_once ("../classes/Portfolio.php");
require_once ("../classes/Util.php");

$op = $_GET['op'];

if (isset($op)) {

    switch ($op) {

        // processos para a classe portfolio //

        case "incluirPortfolio":

            $c = new Conexao();
            $con = $c->abrirConexao();
            $util = new Util();

            if ($con) {

                $titulo = $util->checarVariavel( $_POST['titulo'] );
                $link = $util->checarVariavel( $_POST['link'] );                
                $descricao = $util->checarVariavel( $_POST['descricao'] );
                $empresa = $util->checarVariavel( $_POST['empresa'] );                
                $publicado = $util->checarVariavel( $_POST['publicado'] );             
                $tecnologia = $util->checarVariavel( $_POST['tecnologia'] );
                // dados da imagem
                $arquivo = $util->checarVariavel( $_FILES['arquivo']['name'] );
                $tmp_arquivo = $util->checarVariavel($_FILES['arquivo']['tmp_name']);
                $tipos = array("image/pjpeg", "image/jpg" ,"image/jpeg", "image/gif", "image/png");
                $diretorio_arquivo = "arquivosportfolio/" . $arquivo;
                $tipo_arquivo = $_FILES['arquivo']['type'];
                $tamanho_arquivo = $_FILES['arquivo']['size'];
                // fim dados da imagem
                
                if ($titulo == "" || $publicado == "" || $arquivo == "") {
                    header("Location: form-cadastro-portfolio.php?msg=Preencha/os/Campos/Obrigatórios!&tipoMsg=erro");
                } else {

                    $port = new Portfolio();

                    if ( $port->uploadArquivo( $tmp_arquivo, $diretorio_arquivo, $tipo_arquivo, $tipos, $tamanho_arquivo ) ) {                                            
                            
                        $port->setTitulo($titulo);
                        $port->setLink($link);
                        $port->setPublicado($publicado);
                        $port->setArquivo($diretorio_arquivo);
                        $port->setDescricao($descricao);
                        $port->setEmpresa($empresa);
                        $port->setTecnologia($tecnologia);                     
                        
                        $port->cadastrar();

                    }

                }
            } else {
                $c->erroConexao();
            }

            $c->fecharConexao($con);
            unset($c);
            unset($port);
            unset($util);

        break;

        case "editarPortfolio":

            $c = new Conexao();
            $con = $c->abrirConexao();
            $util = new Util();

            if ($con) {

                $idPortfolio = $_POST['idPortfolio'];
                $titulo = $util->checarVariavel( $_POST['titulo'] );
                $link = $util->checarVariavel( $_POST['link'] );
                $tecnologia = $util->checarVariavel( $_POST['tecnologia'] );
                $descricao = $util->checarVariavel( $_POST['descricao'] );
                $empresa = $util->checarVariavel( $_POST['empresa'] );
                $publicado = $util->checarVariavel( $_POST['publicado'] );
                // dados da imagem
                $imagem = $util->checarVariavel( $_FILES['arquivo']['name'] );
                $tmp_imagem = $util->checarVariavel($_FILES['arquivo']['tmp_name']);
                $tipos = array("image/pjpeg", "image/jpg" ,"image/jpeg", "image/gif", "image/png");
                $diretorio_arquivo = "arquivosportfolio/" . $imagem;
                $tipo_imagem = $_FILES['arquivo']['type'];
                $tamanho_imagem = $_FILES['arquivo']['size'];
                // fim dados da imagem

                if ($titulo == "" || $publicado == "" ) {
                    header("Location: form-cadastro-portfolio.php?msg=Preencha/os/Campos/Obrigatórios!&tipoMsg=erro");
                } else {

                    $port = new Portfolio();

                    if ( $imagem != null) {
                        
                        if ( $port->uploadArquivo( $tmp_imagem, $diretorio_arquivo, $tipo_imagem, $tipos, $tamanho_imagem ) ) {
                                
                            $port->setTitulo($titulo);
                            $port->setLink($link);
                            $port->setTecnologia($tecnologia);                         
                            $port->setPublicado($publicado);
                            $port->setArquivo($diretorio_arquivo);
                            $port->setEmpresa($empresa);
                            $port->setDescricao($descricao);
                            $port->editar($idPortfolio, $imagem);                                                       

                        }

                    } else {

                        $port->setTitulo($titulo);
                        $port->setLink($link);
                        $port->setTecnologia($tecnologia);
                        $port->setDescricao($descricao);
                        $port->setEmpresa($empresa);
                        $port->setPublicado($publicado);
                        $port->editar($idPortfolio, $imagem);                                                                             
                    }

                }
            } else {
                $c->erroConexao();
            }

            $c->fecharConexao($con);
            unset($c);
            unset($port);
            unset($util);            

        break;

        case "excluirPortfolio":

            $c = new Conexao();
            $con = $c->abrirConexao();            

            $idPortfolio = $_GET['idPortfolio'];

            if ($con) {
                
                $port = new Portfolio();
                $port->excluir($idPortfolio);

            } else {
                $c->erroConexao();
            }

            $c->fecharConexao($con);
            unset($c);
            unset($con);
            unset($port);
            

        break;


    }
}

?>