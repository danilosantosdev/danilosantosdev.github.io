<?php

/* 

Nome: Conexao
Autor: Danilo Santos
Descrição: Classe utulizada para efetuar a conexão com o Banco de Dados
Data: 17/08/2012

*/

class Conexao {    

    /* online 
    private $usuario = "dsantos_cms";
    private $host = "localhost";
    private $banco = "dsantos_cms";
    private $password = "cms_db_dsantos";*/

	/* local */
    private $usuario = "adminDS";
    private $host = "localhost";
    private $banco = "cms-dsantos";
    private $password = "cms-db-danilosantos"; 

    function abrirConexao() {
        $conexao = mysql_connect($this->host, $this->usuario, $this->password);
        $b = mysql_select_db($this->banco, $conexao);
        return $conexao;
    }

    function fecharConexao($conexao) {
        mysql_close($conexao);
        unset ($conexao);
    }
    
    function erroConexao(){
        return "Erro na Conexão com o Banco de Dados!";
    }	
	

}

?>