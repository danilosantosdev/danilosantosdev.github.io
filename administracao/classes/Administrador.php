<?php

class Administrador {
	
	private $id;
	private $nome;
	private $email;
	private $dataCadastro;
	private $situacao;
	private $login;
	private $senha;

	function getId() {
		return $this->id;
	}

	function setId($novoId) {
		$this->id = $novoId;
	}

	function getNome() {
		return $this->nome;
	}

	function setNome($novoNome) {
		$this->nome = $novoNome;
	}

	function getEmail() {
		return $this->email;
	}

	function setEmail($novoEmail) {
		$this->email = $novoEmail;
	}

	function getDataCadastro() {
		return $this->dataCadastro;
	}

	function setDataCadastro($novoDataCadastro) {
		$this->dataCadastro = $novoDataCadastro;
	}

	function getSituacao() {
		return $this->situacao;
	}

	function setSituacao($novoSituacao) {
		$this->situacao = $novoSituacao;
	}

	function getLogin() {
		return $this->login;
	}

	function setLogin($novoLogin) {
		$this->login = $novoLogin;
	}

	function getSenha() {
		return $this->senha;
	}

	function setSenha($novoSenha) {
		$this->senha = $novoSenha;
	}

	function cadastrarAdministrador() {

		$sqlInsert = "INSERT INTO administrador (nome, email, login, senha, situacao, dataCadastro) VALUES ('$this->nome', '$this->email', '$this->login', '$this->senha', '$this->situacao', '$this->dataCadastro') ";
		$insercao = mysql_query($sqlInsert);

		if ($insercao) {
			header("location: form-cadastro-administrador.php?msg=Administrador/Cadastrado/com/Sucesso!&tipoMsg=sucesso");
		} else {
			header("location: form-cadastro-administrador.php?msg=Erro/ao/Cadastrar/Administrador!&tipoMsg=erro");
		}

		unset($sqlInsert);
		unset($insercao);

	}

	function editarAdministrador($idAdministrador) {

		$sqlUpdate = "UPDATE administrador SET nome = '$this->nome', email = '$this->email', login = '$this->login', senha = '$this->senha', situacao = '$this->situacao', dataCadastro = '$this->dataCadastro' WHERE id = '$idAdministrador' ";
		$alteracao = mysql_query($sqlUpdate);

		if ($alteracao) {
			return true;			
		} else {
			return false;			
		}

		unset($sqlUpdate);
		unset($alteracao);

	}

	function listarAdministrador() {


		$sqlSelect = "SELECT * FROM administrador ORDER BY id DESC";
		$consulta = mysql_query($sqlSelect);		

		$util = new Util();

		while ($dados = mysql_fetch_array($consulta)) {
			
			$this->setId( $dados['id'] );
			$this->setNome( $dados['nome'] );
			$this->setEmail( $dados['email'] );
			$this->setLogin( $dados['login'] );
			$this->setSenha( $dados['senha'] );
			$this->setSituacao( $dados['situacao'] );
			$this->setDataCadastro( $util->dataBr( $dados['dataCadastro'] ) );

			echo "<tr>                                
                    <td>$this->id</td>
                    <td>$this->nome</td>
                    <td>$this->email</td>
                    <td>$this->login</td>                    
                    <td>$this->situacao</td>
                    <td>$this->dataCadastro</td>
                    <td>
                        <a href='form-editar-administrador.php?idAdministrador=$this->id' rel='shadowbox;height=370;width=960;options={relOnClose:true}'><img src='../imagens/edit.png' width='21' height='22' alt='Editar Registro' title='Editar Registro' /></a>
                        <a onClick='return confirmarExclusao();' href='processo.php?op=excluirAdministrador&idAdministrador=$this->id'><img src='../imagens/delete.png' width='20' height='23' alt='Excluir Registro' title='Excluir Registro' /></a>
                    </td>
                </tr>";

		}

		unset($sqlSelect);
		unset($consulta);		

	}

	function listarAdministradorId($idAdministrador) {

		$sqlSelect = "SELECT * FROM administrador WHERE id = '$idAdministrador' ";
		$consulta = mysql_query($sqlSelect);		

		$dados = mysql_fetch_array($consulta);

		$util = new Util();
		
		$this->setId( $dados['id'] );
		$this->setNome( $dados['nome'] );
		$this->setEmail( $dados['email'] );
		$this->setLogin( $dados['login'] );
		$this->setSenha( $dados['senha'] );
		$this->setSituacao( $dados['situacao'] );
		$this->setDataCadastro( $util->dataBr( $dados['dataCadastro'] ) );
		
		unset($sqlSelect);
		unset($consulta);
		unset($dados);
		unset($util);
		unset($resultado);

	}

	function excluirAdministrador($idAdministrador) {

		$sqlDelete = "DELETE FROM administrador WHERE id = '$idAdministrador' ";
		$exclusao = mysql_query($sqlDelete);

		if ($exclusao) {
			header("location: listagem-administradores.php?msg=Administrador/Excluído/com/Sucesso!&tipoMsg=sucesso");
		} else {
			header("location: listagem-administradores.php?msg=Erro/ao/Excluir/Administrador!&tipoMsg=erro");
		}

		unset($sqlDelete);
		unset($exclusao);		

	}

	function verificaSenha($senhaAntiga, $senhaNova, $idAdministrador) {

		$sqlSelect = "SELECT senha FROM administrador WHERE id = '$idAdministrador' ";
        $consulta = mysql_query($sqlSelect);

        while ($dados = mysql_fetch_array($consulta)) {
            if ($senhaAntiga == $dados['senha'] && $senhaNova != $dados['senha']) {                                
                return true;
            } else {                
                return false;
            }
        }

	}

}

?>