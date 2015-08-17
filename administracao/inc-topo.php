<div id="topo">

    <div class="limite">

        <div id="logomarca">
            <img src="<?php echo $baseDirAdmin; ?>imagens/logomarca-drweb.png" width="260" height="65" alt="Dr. Web Designer - Seu Site do Seu Jeito!" title="Dr. Web Designer - Seu Site do Seu Jeito!" />
        </div>

    </div>

    <div id="box-menu">
  <div class="limite">
            <ul id="menu">

                <li>
                    <a href="<?php echo $baseDirAdmin; ?>portfolio/listagem-portfolio.php">Projetos</a>
                    <ul class="submenu none submenuMaior">
                        <li><a href="<?php echo $baseDirAdmin; ?>portfolio/form-cadastro-portfolio.php">cadastrar projetos</a></li>
                        <li><a href="<?php echo $baseDirAdmin; ?>portfolio/listagem-portfolio.php">listar projetos</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $baseDirAdmin; ?>pensamento/listagem-pensamento.php">Pensamentos</a>
                    <ul class="submenu none submenuMaior">
                        <li><a href="<?php echo $baseDirAdmin; ?>pensamento/form-cadastro-pensamento.php">cadastrar pensamentos</a></li>
                        <li><a href="<?php echo $baseDirAdmin; ?>pensamento/listagem-pensamentos.php">listar pensamentos</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $baseDirAdmin; ?>administrador/listagem-administradores.php">administradores</a>
                    <ul class="submenu none submenuMaior">
                        <li><a href="<?php echo $baseDirAdmin; ?>administrador/form-cadastro-administrador.php">cadastrar administrador</a></li>
                        <li><a href="<?php echo $baseDirAdmin; ?>administrador/listagem-administradores.php">listar administradores</a></li>
                    </ul>
                </li>

            </ul>

            <div class="btnNovo">
                <a href="javascript:;">novo +</a>
                <ul id="submenuBtnNovo" class="none">
                    <li><a href="<?php echo $baseDirAdmin; ?>portfolio/form-cadastro-portfolio.php">Projeto</a></li>
                    <li><a href="<?php echo $baseDirAdmin; ?>administrador/form-cadastro-administrador.php">Administrador</a></li>
                </ul>
            </div>

        </div>
    </div>

    <div id="box-icones">
        <div class="limite">           

            <div id="box-saudacao-titulo">

                <p class="txt-saudacao">Olá! Bem-Vindo ao ...</p>

                <h1 class="tituloGerenciador">gerenciador de conteúdo.</h1>

            </div>

            <div id="logomarca-cliente">
                <a href="<?php echo $baseDirAdmin; ?>home.php"><img src="<?php echo $baseDirAdmin; ?>imagens/logomarca-cliente.png" alt="Logotipo Danilo Santos - Portfólio" title="Danilo Santos"  /></a>
            </div>

            <div id="lista-icones">

                <a href="<?php echo $baseDirAdmin; ?>administrador/listagem-administradores.php"><img src="<?php echo $baseDirAdmin; ?>imagens/icone-administradores.png" alt="Ícone de acesso a listagem dos Administradores" title="Clique para acessar os Administradores do Sistema." /></a>                
                <a href="<?php echo $baseDirAdmin; ?>portfolio/listagem-portfolio.php"><img src="<?php echo $baseDirAdmin; ?>imagens/icone-projetos.png" alt="Ícone de acesso a listagem dos Projetos" title="Clique para acessar os Projetos Cadastrados." /></a>                

            </div>

        </div>

    </div>

</div>