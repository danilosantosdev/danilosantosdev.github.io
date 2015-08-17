<?php

require_once ("../classes/Conexao.php");
require_once ("../classes/Administrador.php");
require_once ("../classes/Util.php");

$op = $_GET['op'];

if (isset($op)) {

    switch ($op) {

        // processos para a classe administrador //

        case "incluirAdministrador":

            $c = new Conexao();
            $con = $c->abrirConexao();
            $util = new Util();

            if ($con) {

                $nome = $util->checarVariavel( $_POST['nome'] );
                $email = $util->checarVariavel( $_POST['email'] );
                $login = $util->checarVariavel( $_POST['login'] );
                $senha = $util->checarVariavel( md5( $_POST['senha'] ) );
                $situacao = $util->checarVariavel( $_POST['situacao'] );                
                $dataCadastro = $util->checarVariavel( $util->dataIng( $_POST['dataCadastro'] ) );

                if ( $nome == "" || $login == "" || $senha == "" || $situacao == "" || $dataCadastro == "" ) {
                    header("Location: form-cadastro-administrador.php?msg=Preencha/os/Campos/Obrigatórios!&tipoMsg=erro");
                } else {
                    
                    $adm = new Administrador();
                    $adm->setNome($nome);
                    $adm->setEmail($email);
                    $adm->setLogin($login);
                    $adm->setSenha($senha);
                    $adm->setSituacao($situacao);
                    $adm->setDataCadastro($dataCadastro);

                    $adm->cadastrarAdministrador();

                }
            } else {
                $c->erroConexao();
            }

            $c->fecharConexao($con);
            unset($c);
            unset($con);
            unset($adm);
            unset($util);

            break;

        case "editarAdministrador":

            $c = new Conexao();
            $con = $c->abrirConexao();
            $util = new Util();

            if ($con) {
                
                $idAdministrador = (int)($_POST['idAdministrador']);
                $nome = $util->checarVariavel( $_POST['nome'] );
                $email = $util->checarVariavel( $_POST['email'] );
                $login = $util->checarVariavel( $_POST['login'] );
                $senha = $util->checarVariavel( $_POST['senha'] );
                $senhaAntiga = $util->checarVariavel( $_POST['senhaAntiga'] );
                $senhaNova = $util->checarVariavel( $_POST['senhaNova'] );
                $situacao = $util->checarVariavel( $_POST['situacao'] );
                $dataCadastro = $util->checarVariavel( $util->dataIng( $_POST['dataCadastro'] ) );

                if ($idAdministrador == "" || $nome == "" || $login == "" || $situacao == "" || $dataCadastro == "") {
                    header("location: form-editar-administrador.php?msg=Prencha/os/Campos/Obrigatórios&tipoMsg=erro&idAdministrador=$idAdministrador");
                } else {

                    if ($senhaAntiga != "" && $senhaNova != "") {

                        $senhaAntigaMd5 = md5($senhaAntiga);
                        $senhaNovaMd5 = md5($senhaNova);

                        $adm = new Administrador();
                        if ( $adm->verificaSenha( $senhaAntigaMd5, $senhaNovaMd5, $idAdministrador ) ) {                            
                            $adm->setNome($nome);
                            $adm->setEmail($email);
                            $adm->setLogin($login);
                            $adm->setSenha($senhaNovaMd5);
                            $adm->setSituacao($situacao);
                            $adm->setDataCadastro($dataCadastro);

                            if( $adm->editarAdministrador($idAdministrador) ) {
                                header("location: form-editar-administrador.php?msg=Dados/Alterados/Com/Sucesso!&tipoMsg=sucesso&idAdministrador=$idAdministrador");
                            } else {
                                header("location: form-editar-administrador.php?msg=Erro/ao/Alterar/Dados!&tipoMsg=erro&idAdministrador=$idAdministrador");
                            }
                            
                        } else {
                            $adm = new Administrador();
                            $adm->setNome($nome);
                            $adm->setEmail($email);
                            $adm->setLogin($login);
                            $adm->setSenha($senha);                        
                            $adm->setSituacao($situacao);
                            $adm->setDataCadastro($dataCadastro);
                            if( $adm->editarAdministrador($idAdministrador) ) {                                
                                header("location: form-editar-administrador.php?msg=Sua senha não foi alterada, pois a Senha Antiga não é igual a do Banco de Dados ou a Nova Senha não é diferente da Atual./Só os dados/referentes ao/cadastro foram alterados, se necessário!&tipoMsg=erro&idAdministrador=$idAdministrador");
                            } else {
                                header("location: form-editar-administrador.php?msg=Erro/ao/Alterar/Dados!&tipoMsg=erro&idAdministrador=$idAdministrador");
                            }

                        }

                    } else if ($senhaAntiga != "" || $senhaNova != "") {
                        $adm = new Administrador();
                        $adm->setNome($nome);
                        $adm->setEmail($email);
                        $adm->setLogin($login);
                        $adm->setSenha($senha);                      
                        $adm->setSituacao($situacao);
                        $adm->setDataCadastro($dataCadastro);

                        if( $adm->editarAdministrador($idAdministrador) ) {
                            header("location: form-editar-administrador.php?msg=Sua senha não foi alterada, pois é necessário preencher ambos os campos./Só os dados/referentes ao/cadastro foram alterados, se necessário!&tipoMsg=erro&idAdministrador=$idAdministrador");
                        } else {
                            header("location: form-editar-administrador.php?msg=Erro/ao/Alterar/Dados!&tipoMsg=erro&idAdministrador=$idAdministrador");
                        }

                    } else {
                        $adm = new Administrador();
                        $adm->setNome($nome);
                        $adm->setEmail($email);
                        $adm->setLogin($login);
                        $adm->setSenha($senha);                        
                        $adm->setSituacao($situacao);
                        $adm->setDataCadastro($dataCadastro);
                        if( $adm->editarAdministrador($idAdministrador) ) {
                            header("location: form-editar-administrador.php?msg=Dados/Alterados/Com/Sucesso!&tipoMsg=sucesso&idAdministrador=$idAdministrador");
                        } else {
                            header("location: form-editar-administrador.php?msg=Erro/ao/Alterar/Dados!&tipoMsg=erro&idAdministrador=$idAdministrador");
                        }
                        
                    }

                }                

            } else {
                $c->erroConexao();
            }

            unset($c);
            unset($con);
            unset($util);
            unset($adm);
            

            break;

        case "excluirAdministrador":

            $c = new Conexao();
            $con = $c->abrirConexao();

            if($con) {

                $idAdministrador = (int)($_GET['idAdministrador']);
                $adm = new Administrador();
                $adm->excluirAdministrador($idAdministrador);

            }

            unset($c);
            unset($con);
            unset($adm);

            break;
    }
}
?>
