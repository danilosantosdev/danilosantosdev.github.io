<?php

if (!empty($_POST)) {

$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];

$nome_comprovante  = $_FILES['arquivo1']['name'];
$nome_comprovante2 = $_FILES['arquivo2']['name'];
$up_dir = "comprovantes";

move_uploaded_file($_FILES['arquivo1']['tmp_name'], "$up_dir/"."$nome_comprovante");
move_uploaded_file($_FILES['arquivo2']['tmp_name'], "$up_dir/"."$nome_comprovante2");

    if (!isset($hasError)) {

        require("scripts/classes/class.phpmailer.php"); // Certifique-se de que o caminho está certo.

        $mail = new PHPMailer();
        $mail->SetLanguage("br", "classes/"); // Linguagem
        $mail->SMTP_PORT = "25"; // Porta do SMTP
        $mail->SMTPSecure = "false"; // Tipo de comunicação segura
        $mail->IsSMTP();
        $mail->Host = "drwebdesigner.com.br";  // Endereço do servidor SMTP
        $mail->SMTPAuth = true; // Requer autenticação?
        $mail->Username = "smtp@drwebdesigner.com.br"; // Usuário SMTP
        $mail->Password = ""; // Senha do usuário SMTP

        $mail->From = $email; // E-mail do remetente
        $mail->FromName = "Associação Afeto - Formulário de Inscrição"; // Nome do remetente
        $mail->AddAddress("danilofla@gmail.com"); // 
        $mail->AddAttachment($up_dir."/".$nome_comprovante);
        $mail->AddAttachment($up_dir."/".$nome_comprovante2);

        $mail->IsHTML(true);
        $mail->Subject = "Associação Afeto - Formulário de Inscrição";
        $mail->Body = "<b>Nome:</b> $nome <br /><b>E-mail:</b> $email";

        if (!$mail->Send()) {
            echo "Erro: " . utf8_decode($mail->ErrorInfo);
        } else {
            $emailSent = true;
        }
    }

    if (isset($emailSent) && $emailSent == true) { 
        echo "<script> alert('Inscricao Enviada com Sucesso!'); location.href=''; </script>";
    }

}

?>


<!-- 
===========================================================
Modelo de HTML comentado para montagem de página  
Desenvolvido por Kadu Santos -  Designer Gráfico
81.8881.6004 | kadu.design@gmail.com | www.kadusantos.com
===========================================================
-->

<html>
<title>PETrans</title>
<script src="cufon-yui.js"></script>

<!-- Define o tipo de formatação do texto -->
<meta charset="utf-8">
<!-- / formatacao -->


	<!-- Linkar com um arquivo de .css -->
	<link href="css/base.css" rel="stylesheet" type="text/css">
	<link href="css/menu.css" rel="stylesheet" type="text/css">
<head>
	<!-- /Linkar com um arquivo de .css -->

	<!-- icone -->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<!-- /icone -->

	
	<!-- META TAGs - descrevem o conteúdo do seu site para os buscadores. -->
	<meta name="author" content="Nome do autor" /><!-- Nome do autor -->
	<meta name="description" content="Meta Tags - O que são e como utilizá-las"><!-- Descrição do site - um resumo do conteúdo do seu site -->
	<meta name="keywords" content="sites, web, desenvolvimento"><!-- Palavras-Chaves -->
	<meta name="robots" content="index, follow"><!-- Para o sistema ver também os links inclusos na pagina -->
	<!-- /META TAGs -->

	<!-- TAGS FACEBOOK -->
	<!-- /TAGS FACEBOOK -->
	
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="specimen_files/easytabs.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="specimen_files/specimen_stylesheet.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />

<body>


<div id="all">
	<div id="allrodape">
    	<div id="corpo">
        	<div id="topo">
            	<div id="artetopo">
	<div id="linktopo"><a href="home.php"><img src="img/layout/logo_petrans.png" border=0/></a></div>
    <div id="menu"><a class="m1" href="home.php">Quem Somos </a>
            <a class="m2" href="servicos.php">Serviços </a>
            <a class="m3" href="comocontratar.php">Como Contratar </a>
            <a class="m4" href="ocaminhodasmultas.php">O Caminho das Multas</a>
            <a class="m5" href="vantagens.php">Vantagens </a>
            <a class="m6" href="contato.php">Contato </a>
            </div>
</div>            </div>
            
            <div id="miolo">
            	<div id="blococentral">
                	<div id="tit"><img src="img/layout/tit_contato.png"></div>
                    <div id="colunaesquerda"><img src="img/esquerdas/img_lat_seta.png"></div>
                    <div id="blocodetexto">
                    
                      <!--FORMULARIO -->
                  
                        <div id="formularios"> 
                             <form action="" method="post" enctype="multipart/form-data">  
                                <ul>
                                     <li><div class="nomeform">Nome:</div><input name="txtnome" type="text" class="campoform" id="txtnome" size="50" /></li>
                                     <li><div class="nomeform">E-mail:</div><input name="txtemail" type="text" class="campoform" id="txtemail" size="50" /></li>
                                     <li><div class="nomeform">Telefone:</div><input name="txtddd" type="text" class="campoform ddd" id="txtddd" size="4" /> - <input name="txttelefone" type="text" class="campoform telefone" id="txttelefone" size="36" /></li>
                                     <li><div class="nomeform">Cidade</div><input name="cidade" type="text" class="campoform cidade" id="cidade" size="40" /> -<select name="uf" class="campoform uf" id="uf">
                                          <option>--</option>
                                          <option value="Acre - AC">AC</option>
                                          <option value="Alagoas - AL">AL</option>
                                          <option value="Amapá - AP">AP</option>
                                          <option value="Amazonas - AM">AM</option>

                                          <option value="Bahia - BA">BA</option>

                                          <option value="Ceará - CE">CE</option>
                                          <option value="Distrito Federal - DF">DF</option>
                                            <option value="Espírito Santo - ES">ES</option>
                                            <option value="Goiás - GO">GO</option>
                                            <option value="Maranhão - MA">MA</option>
                                            <option value="Mato Grosso - MT">MT</option>
                                            <option value="Mato Grosso do Sul - MS">MS</option>
                                            <option value="Minas Gerais - MG">MG</option>
                                            <option value="Pará - PA">PA</option>
                                            <option value="Paraíba - PB">PB</option>
                                            <option value="Pernambuco - PE">PE</option>
                                            <option value="Piauí - PI">PI</option>
                                            <option value="Paraná - PR">PR</option>

                                            <option value="Rio de Janeiro - RJ">RJ</option>
                                            <option value="Rio Grande do Norte - RN">RN</option>
                                            <option value="Rondônia - RO">RO</option>
                                            <option value="Roraima - RR">RR</option>
                                            <option value="Rio Grande do Sul - RS">RS</option>
                                            <option value="Santa Catarina">SC</option>
                                            <option value="Sergipe - SE">SE</option>
                                            <option value="São Paulo - SP">SP   </option>
                                            <option value="Tocantins - TO">TO   </option>
                                        </select>
                                    </li>

                                    <li><input type="file" name="arquivo1" id="arquivo1" size="50" class="file" /></li>
                                    <li><input type="file" name="arquivo2" id="arquivo2" size="50" class="file" /></li>

                                     <li><div class="nomeform">Escreva aqui seu relato:</div>
                      
                                     <textarea name="txtmensagem" wrap="virtual" rows="5" class="dentromensagem"  id="txtmensagem"></textarea>
                                     </span></li>
                                     <li><input type="image" name="imageField" id="imageField" src="img/layout/bt_enviar.png" /></li>
                    
                                </ul>
                            </form>
             </div>

                    <!--/FORMULARIO -->

                    </div>
                   
                   <!-- RODAPE -->
                   
                    <div id="rodape">
                        <div id="endereco">
                            <div class="end">PETRANS | Defesas de Multas de Trânsito</div>
                            <div class="end">R. Silveira Lobo, 32 - Casa Forte | Recife - PE | CEP: 52061-030 | Fone: 81 3265.9400</div>
                        </div>
                        <div id="midiassociais">
                        	<a href="" target="_blank"><img src="img/layout/ico_twitter.png" border=0></a>
                            <a href="" target="_blank"><img src="img/layout/ico_facebook.png" border=0></a>
                        </div>
                    
                    </div>                    
                    <!-- // FIM DO RODAPE -->
                    
                </div>
                <div id="colunadireita">
               		<div id="leiseca"><img src="img/selo_leiseca.png"></div>
                	<div id="assinaturasite"><a href="http://www.kadusantos.com" target="_blank"><img src="img/layout/assinatura.png"></a></div>
                    
                
                </div>
            </div>
            
            <div id=""></div>
        
        </div>
    
    
    </div>


</div>

</body>
</html>