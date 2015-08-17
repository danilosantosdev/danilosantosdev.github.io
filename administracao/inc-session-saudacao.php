<?php
    session_start();
    require_once('classes/Conexao.php');
    require_once('classes/Util.php');

    $c = new Conexao();
    $con= $c->abrirConexao();

    if ($con) {

        $util = new Util();
        $util->verificaSessao();

    } else {
        $c->erroConexao();
    }

?>