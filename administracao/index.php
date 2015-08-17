<?php    
    require_once('classes/Util.php');
    $baseDirAdmin = "http://localhost/danilosantos/administracao/";
    //$baseDirAdmin = "http://www.drwebdesigner.com.br/webteste/fwturismo/administracao/";
    //$baseDirAdmin = "http://www.fwturismo.com.br/administracao/";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Gerenciador de Conteúdo</title>
        <meta name="author" content="Dr. Web Designer" />
        <meta name="title" content="Gerenciador de Conteúdo" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="language" content="pt-BR" />
        <meta name="robots" content="All" />
        <meta name="revisit" content="7 days" />
        <link href="css/reset.css" type="text/css" rel="stylesheet" media="screen" />
        <link href="css/format.css" type="text/css" rel="stylesheet" media="screen" />        
        <script language="javascript" type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.validate.js"></script>

        <script type="text/javascript">
        
            $(document).ready(function(){
                $('#loginSistema').validate({
                    
                    rules: {
                        senha: {
                            required: true,
                            minlength: 8  
                        } 
                    },
                    messages: {
                        senha: {
                            required: "Campo Obrigatório!",
                            maxlength: "Digite no mínimo 8 caracteres"  
                        } 
                    }
                    
                });
            });

        </script>

        <style type="text/css">

            body {background: #f2f2f2 ; color: #000; font: 13px "Trebuchet MS";}            

        </style>

    </head>

    <body>

        <div id="logo">
            <img src="../imagens/logotipo.png" alt="" />
        </div>

        <div id="formLogin">

            <?php
                if (isset($_GET['msg']) && isset($_GET['tipoMsg'])) {
                        $var = $_GET['msg'];
                        $tipoMsg = $_GET['tipoMsg'];

                        $msgPartes = explode("/", $var);
                        $msg = $msgPartes[0] . $msgPartes[1] . $msgPartes[2] . $msgPartes[3];
                        $msg = implode(" ", $msgPartes);
                    } else {
                        $msg = "";
                        $tipoMsg = "";
                    }

                    if ($msg != "" && $tipoMsg != "") {
                        ?>
                        
                        <div id="box-mensagem-index" class="<?= $tipoMsg; ?>">
                            <p><?php echo $msg; ?></p>
                        </div>                        

                        <?php
                    }
            ?>

            <form action="login/processo.php?op=logar" name="loginSistema" id="loginSistema" method="post">

                <p>Preencha os Campos Abaixo para efetuar Login no Sistema:</p>

                <label for="login">
                    Login: <br /> <input type="text" name="login" id="login" class="required estilo-input-text" />
                </label>

                <label for="senha">
                    Senha: <br /> <input type="password" name="senha" id="senha" class="estilo-input-text" />
                </label>

                <label for="">
                    <input type="submit" name="submit" value="Entrar" />
                </label>

            </form>

        </div>

    </body>

</html>