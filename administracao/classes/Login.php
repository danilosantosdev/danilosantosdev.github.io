<?php

class Login {

	function logar($login, $senha) {

		$sqlSelect = "SELECT id FROM administrador WHERE login = '$login' AND senha = '$senha' AND situacao = 'sim' ";		
		$consulta = mysql_query($sqlSelect);

		while( $dados = mysql_fetch_array($consulta) ) {

			if ($dados['id']) {				
				return $dados['id'];
			} else {				
				return false;				
			}			

		}

		unset($sqlSelect);
		unset($consulta);

	}

}


?>