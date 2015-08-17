<?php

class Portfolio {

	private $id;
	private $titulo;
	private $link;
	private $tecnologia;
	private $descricao;
	private $arquivo;
	private $empresa;
	private $publicado;

	/* getter's */

	function getId() {
		return $this->id;
	}

	function getTitulo() {
		return $this->titulo;
	}

	function getLink() {
		return $this->link;
	}

	function getTecnologia() {
		return $this->tecnologia;
	}

	function getDescricao() {
		return $this->descricao;
	}

	function getArquivo() {
		return $this->arquivo;
	}

	function getEmpresa() {
		return $this->empresa;
	}

	function getPublicado() {
		return $this->publicado;
	}

	/* setter's */

	function setId($nId) {
		$this->id = $nId;
	}

	function setTitulo($nTitulo) {
		$this->titulo = $nTitulo;
	}

	function setLink($nLink) {
		$this->link = $nLink;
	}

	function setTecnologia($nTecnologia) {
		$this->tecnologia = $nTecnologia;
	}

	function setDescricao($nDescricao) {
		$this->descricao = $nDescricao;
	}

	function setArquivo($nArquivo) {
		$this->arquivo = $nArquivo;
	}

	function setEmpresa($nEmpresa) {
		$this->empresa = $nEmpresa;
	}

	function setPublicado($nPublicado) {
		$this->publicado = $nPublicado;
	}

	function cadastrar() {

		$sqlInsert = "INSERT INTO portfolio (titulo, link, tecnologia, descricao, arquivo, empresa, publicado) VALUES ('$this->titulo', '$this->link', '$this->tecnologia', '$this->descricao', '$this->arquivo', '$this->empresa', '$this->publicado') ";
		$insercao = mysql_query($sqlInsert);

		if ($insercao) {
			header("location: form-cadastro-portfolio.php?msg=Portfólio/Cadastrada/com/Sucesso!&tipoMsg=sucesso");
		} else {
			header("location: form-cadastro-portfolio.php?msg=Erro/ao/Cadastrar/Portfólio!&tipoMsg=erro");
		}

		unset($sqlInsert);
		unset($insercao);

	}

	function editar($idPortfolio, $imagem) {

		if($imagem != null) 
			$sqlUpdate = "UPDATE portfolio SET titulo = '$this->titulo', link = '$this->link', tecnologia = '$this->tecnologia', descricao = '$this->descricao', arquivo = '$this->arquivo', empresa = '$this->empresa', publicado = '$this->publicado' WHERE id = '$idPortfolio' ";
		else
			$sqlUpdate = "UPDATE portfolio SET titulo = '$this->titulo', link = '$this->link', tecnologia = '$this->tecnologia', descricao = '$this->descricao', empresa = '$this->empresa', publicado = '$this->publicado' WHERE id = '$idPortfolio' ";

		$alteracao = mysql_query($sqlUpdate);

		if ($alteracao) {
			header("location: form-editar-portfolio.php?msg=Portfólio/Alterada/com/Sucesso!&tipoMsg=sucesso&idPortfolio=$idPortfolio");
		} else {
			header("location: form-editar-portfolio.php?msg=Erro/ao/Alter/Portfólio!&tipoMsg=erro&idPortfolio=$idPortfolio");
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
				$this->setDescricao( $dados['descricao'] );
				$this->setArquivo( $dados['arquivo'] );
				$this->setPublicado( $dados['publicado'] );

				if($origem == "administrador") {

					echo "<tr>                                
		                    <td>$this->id</td>
		                    <td>$this->titulo</td>
		                    <td><img src='$this->arquivo' width='150' height='104' /></td>
		                    <td>$this->publicado</td>
		                    <td>
		                        <a href='form-editar-portfolio.php?idPortfolio=$this->id' rel='shadowbox;height=500;width=960;options={relOnClose:true}'><img src='../imagens/edit.png' width='21' height='22' alt='Editar Registro' title='Editar Registro' /></a>
		                        <a onClick='return confirmarExclusao();' href='processo.php?op=excluirPortfolio&idPortfolio=$this->id'><img src='../imagens/delete.png' width='20' height='23' alt='Excluir Registro' title='Excluir Registro' /></a>
		                    </td>
		                </tr>";

	            } else {

	            	echo "

	            		<li>
	            			<h1><a href='http://www.danilosantos.cc/detalhe.php?id=$this->id' class='pointer modalPortfolio' >$this->titulo</a></h1>
	            			<a class='pointer modalPortfolio' href='http://www.danilosantos.cc/detalhe.php?id=$this->id' ><img src='http://www.danilosantos.cc/administracao/portfolio/$this->arquivo' alt='$this->titulo' /></a>
	            		</li>

	            	";

	            }

			}

		} else {
			echo "<p>Nenhum Portfólio Cadastrado!</p>";
		}

		unset($sqlSelect);
		unset($consulta);		

	}

	function listarPortfolioId($idPortfolio) {

		$sqlSelect = "SELECT * FROM portfolio WHERE id = '$idPortfolio' ";
		$consulta = mysql_query($sqlSelect);		

		$dados = mysql_fetch_array($consulta);
		
		$this->setId( $dados['id'] );
		$this->setTitulo( $dados['titulo'] );
		$this->setLink( $dados['link'] );
		$this->setTecnologia( $dados['tecnologia'] );
		$this->setDescricao( $dados['descricao'] );
		$this->setArquivo( $dados['arquivo'] );
		$this->setEmpresa( $dados['empresa'] );
		$this->setPublicado( $dados['publicado'] );
		
		unset($sqlSelect);
		unset($consulta);
		unset($dados);
		unset($util);
		unset($resultado);

	}

	function excluir($idPortfolio) {

		$sqlDelete = "DELETE FROM portfolio WHERE id = '$idPortfolio' ";
		$exclusao = mysql_query($sqlDelete);

		if ($exclusao) {
			header("location: listagem-portfolio.php?msg=Portfólio/Excluída/com/Sucesso!&tipoMsg=sucesso");
		} else {
			header("location: listagem-portfolio.php?msg=Erro/ao/Excluir/Portfólio!&tipoMsg=erro");
		}

		unset($sqlDelete);
		unset($exclusao);		

	}

	function uploadArquivo($arquivo, $diretorio_arquivo, $tipo_arquivo, $tipos, $tamanho_arquivo) {

        if ( in_array( $tipo_arquivo, $tipos ) ) {
            
            if ($tamanho_arquivo <= 707200) {

            	if( move_uploaded_file($arquivo, $diretorio_arquivo) ) {
            		return true;
            	} else {
            		return false;
            	}

            } else {
                header("location: form-cadastro-portfolio.php?msg=A Imagem/deve ter/ no Máximo/ 700Kb!&tipoMsg=erro");
            }            

        } else {
            header("location: form-cadastro-portfolio.php?msg=Formato de Arquivo Inválido./ Os Permitidos/ são:/.JPG ou .PNG!&tipoMsg=erro");
        }

    }

}


?>