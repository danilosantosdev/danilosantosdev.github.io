<?php

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];    
    $mensagem = $_POST['mensagem'];

    if ($nome == "nome*") {
        $nome = "";
    }

    if ($email == "email*") {
        $email = "";
    }

    if ($mensagem == "mensagem*") {
        $mensagem = "";
    }

    //If there is no error, send the email
    if (!isset($hasError)) {

        require("classes/class.phpmailer.php"); // Certifique-se de que o caminho est� certo.

        $mail = new PHPMailer();
        $mail->SetLanguage("br", "classes/"); // Linguagem
        $mail->SMTP_PORT = "25"; // Porta do SMTP
        $mail->SMTPSecure = "false"; // Tipo de comunica��o segura
        $mail->IsSMTP();
        $mail->Host = "drwebdesigner.com.br";  // Endere�o do servidor SMTP
        $mail->SMTPAuth = true; // Requer autentica��o?
        $mail->Username = "smtp@drwebdesigner.com.br"; // Usu�rio SMTP
        $mail->Password = "mai123456mai"; // Senha do usu�rio SMTP

        $mail->From = $email; // E-mail do remetente
        $mail->FromName = "Portf�lio Danilo Santos - Formul�rio de Contato"; // Nome do remetente
        $mail->AddAddress("job@danilosantos.cc"); // 

        $mail->IsHTML(true);
        $mail->Subject = "Portf�lio Danilo Santos - Formul�rio de Contato";
        $mail->Body = "<b>Nome:</b> $nome <br /><b>E-mail:</b> $email <br /> <b>Telefone:</b> $telefone <br /> <b>Mensagem:</b> $mensagem";

        if (!$mail->Send()) {
            echo "Erro: " . utf8_decode($mail->ErrorInfo);
        } else {
            $emailSent = true;
        }
    }
    
    if (isset($emailSent) && $emailSent == true) {  //If email is sent   
        header("Location: ../?msg=Mensagem/Enviada/com/Sucesso!#contato");        
    }

?>