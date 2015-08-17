<?php

require_once ("../classes/Conexao.php");
require_once ("../classes/Login.php");
require_once ("../classes/Util.php");

$op = $_GET['op'];

if( isset($op) ) {

	switch ($op) {
		case "logar":
			
			$c = new Conexao();
			$con = $c->abrirConexao();

			if ($con) {

				$util = new Util();
				
				$login = $util->checarVariavel( $_POST['login'] );
				$senha = $util->checarVariavel( md5( $_POST['senha'] ) );

				$log = new Login();
				$vflag = $log->logar($login, $senha);

				if ($vflag) {					
					session_start();
                    $_SESSION['login'] = $login;
                    $_SESSION['senha'] = $senha;
					header("location: ../home.php");	
				} else {
					header("location: ../index.php?msg=Dados/de/Acesso/Incorretos!&tipoMsg=erro");
				}
				

			} else {
				$c->erroConexao();
			}

			$c->fecharConexao($con);		

			break;

		case "deslogar":
				
				session_start();
				session_destroy();
				session_unset();
				unset($_SESSION['login']);
				unset($_SESSION['senha']);

				header("location: ../index.php?msg=Logout/Efetuado/Com/Sucesso!&tipoMsg=sucesso");				

			break;	
		
	}

}




?>