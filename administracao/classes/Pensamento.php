<?php

	class Pensamento {

		private $id;
		private $titulo;
		private $descricao;
		private $link;
		private $publicado;
		private $data;

		/* gette's */

		function getId() {
			return $this->id;
		}

		function getTitulo() {
			return $this->titulo;
		}

		function getDescricao() {
			return $this->descricao;
		}

		function getLink() {
			return $this->link;
		}

		function getPublicado() {
			return $this->publicado;
		}

		function getData() {
			return $this->data;
		}

		/* setter's */

		function setId($nId) {
			$this->id = $nId;
		}

		function setTitulo($nTitulo) {
			$this->titulo = $nTitulo;
		}

		function setDescricao($nDescricao) {
			$this->descricao = $nDescricao;
		}

		function setLink($nLink) {
			$this->link = $nLink;
		}

		function setPublicado($nPublicado) {
			$this->publicado = $nPublicado;
		}

		function setData($nData) {
			$this->data = $nData;
		}

		/* métodos */

		function cadastrar() {

			$sqlInsert = "INSERT INTO pensamento (titulo, descricao, publicado, link, data) VALUES ('$this->titulo', '$this->descricao', '$this->publicado', '$this->link', '$this->data') ";
			$insercao = mysql_query($sqlInsert);

			if ($insercao) {
				header("location: form-cadastro-pensamento.php?msg=Pensamento/Cadastrada/com/Sucesso!&tipoMsg=sucesso");
			} else {
				header("location: form-cadastro-pensamento.php?msg=Erro/ao/Cadastrar/Pensamento!&tipoMsg=erro");
			}

			unset($sqlInsert);
			unset($insercao);

		}

		function editar($idPensamento) {

			$sqlUpdate = "UPDATE pensamento SET titulo = '$this->titulo', descricao = '$this->descricao', publicado = '$this->publicado', link = '$this->link', data = '$this->data' WHERE id = '$idPensamento' ";

			$alteracao = mysql_query($sqlUpdate);

			if ($alteracao) {
				header("location: form-editar-pensamento.php?msg=Pensamento/Alterado/com/Sucesso!&tipoMsg=sucesso&idPensamento=$idPensamento");
			} else {
				header("location: form-editar-pensamento.php?msg=Erro/ao/Alterar/Pensamento!&tipoMsg=erro&idPensamento=$idPensamento");
			}

			unset($sqlUpdate);
			unset($alteracao);

		}

		function listar($query, $origem) {

			require_once 'Util.php';
			
			$consulta = mysql_query($query);		

			$util = new Util();

			if ( mysql_num_rows($consulta) > 0 ) {

				while ($dados = mysql_fetch_array($consulta)) {
					
					$this->setId( $dados['id'] );
					$this->setTitulo( $dados['titulo'] );
					$this->setLink( $dados['link'] );
					$this->setPublicado( $dados['publicado'] );
					$this->setData( $util->dataBr( $dados['data'] ) );
					$this->setDescricao( $dados['descricao'] );

					if($origem == "administrador") {

						echo "<tr>                                
			                    <td>$this->id</td>
			                    <td>$this->titulo</td>
			                    <td>$this->link</td>
			                    <td>$this->data</td>
			                    <td>$this->publicado</td>
			                    <td>
			                        <a href='form-editar-pensamento.php?idPensamento=$this->id' rel='shadowbox;height=500;width=960;options={relOnClose:true}'><img src='../imagens/edit.png' width='21' height='22' alt='Editar Registro' title='Editar Registro' /></a>
			                        <a onClick='return confirmarExclusao();' href='processo.php?op=excluirPensamento&idPensamento=$this->id'><img src='../imagens/delete.png' width='20' height='23' alt='Excluir Registro' title='Excluir Registro' /></a>
			                    </td>
			                </tr>";

		            } else {

		            	echo "

		            		<li>
		            			<h1><a href='detalhe.php?id=$this->id' class='pointer' rel='shadowbox;height=350;width=700' >$this->titulo</a></h1>
		            			<a class='pointer' href='detalhe.php?id=$this->id' rel='shadowbox;height=350;width=600' ><img src='administracao/portfolio/$this->arquivo' alt='$this->titulo' /></a>
		            		</li>

		            	";

		            }

				}

			} else {
				echo "<p>Nenhum Pensamento Cadastrado!</p>";
			}

			unset($sqlSelect);
			unset($consulta);		

		}

		function listarId($idPensamento) {

			$sqlSelect = "SELECT * FROM pensamento WHERE id = '$idPensamento' ";
			$consulta = mysql_query($sqlSelect);		

			$dados = mysql_fetch_array($consulta);
			
			$this->setId( $dados['id'] );
			$this->setTitulo( $dados['titulo'] );
			$this->setLink( $dados['link'] );			
			$this->setPublicado( $dados['publicado'] );
			$this->setDescricao( $dados['descricao'] );
			$this->setData( $dados['data'] );			
			
			unset($sqlSelect);
			unset($consulta);
			unset($dados);
			unset($util);
			unset($resultado);

		}

		function excluir($idPensamento) {

			$sqlDelete = "DELETE FROM pensamento WHERE id = '$idPensamento' ";
			$exclusao = mysql_query($sqlDelete);

			if ($exclusao) {
				header("location: listagem-pensamentos.php?msg=Pensamento/Excluída/com/Sucesso!&tipoMsg=sucesso");
			} else {
				header("location: listagem-pensamentos.php?msg=Erro/ao/Excluir/Pensamento!&tipoMsg=erro");
			}

			unset($sqlDelete);
			unset($exclusao);		

		}

	}

?>