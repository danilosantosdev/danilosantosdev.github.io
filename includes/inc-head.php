<?php 
    //define("URL", "http://www.danilosantos.cc");
    define("URL", "http://danilosantosdev.github.io/");
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $titulo; ?></title>
    <meta name="author" content="Dr. Web Designer" />
    <meta name="title" content="<?= $titulo; ?>" />
    <meta name="description" content="<?= $descricao; ?>" />
    <meta name="keywords" content="<?= $keywords; ?>" />
    <meta name="language" content="pt-BR" />
    <meta name="robots" content="All" />
    <meta name="revisit" content="7 days" />
    <!-- css -->
    <link href="<?= URL; ?>/css/reset.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="<?= URL; ?>/css/estilo.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="<?= URL; ?>/css/jquery.pajinate.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="<?= URL; ?>/fancybox/jquery.fancybox-1.3.4.css" type="text/css" rel="stylesheet" media="screen" />
    
    <!-- javascript -->
    <script language="javascript" type="text/javascript" src="<?= URL; ?>/js/jquery.js"></script>    
    <script language="javascript" type="text/javascript" src="<?= URL; ?>/js/cufon-yui.js"></script>
    <script language="javascript" type="text/javascript" src="<?= URL; ?>/js/Franklin_Gothic_Medium_Cond_400.font.js"></script>
    <script type="text/javascript" languague="javascript" src="<?= URL; ?>/js/jquery.pajinate.js"></script>
    <script type="text/javascript" languague="javascript" src="<?= URL; ?>/js/funcoes.js"></script>
    <script language="javascript" type="text/javascript" src="<?= URL; ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $('.paging_container').pajinate({
                nav_label_first : 'Primeira',
                nav_label_last : 'Última',
                nav_label_prev : '<< Anterior',
                nav_label_next : 'Próximo >>',
                items_per_page : 6                    
            });
        });
            
    </script>

    <script type="text/javascript" language="javascript">
        
        function verificaCamposContato() {
            
            var nome = document.contatoform.nome.value;                
            var email = document.contatoform.email.value;                                
            var mensagem = document.contatoform.mensagem.value;
    
            if( nome == "nome*" || nome == "" ) {
                alert ('Por favor, preencher o campo NOME!');
                return false;
            } else if (email == "email*" || email == "") {
                alert ('Por favor, preencher o campo E-MAIL!');
                return false;
            } else if (mensagem == "" || mensagem == "mensagem*") {                    
                alert ('Por favor, digite uma Mensagem!');
                return false;
            } else {
                document.contatoform.submit();
            }
    
        }

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#box-email-enviado").delay(4000).fadeOut("slow"); 
        });    
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("a.modalPortfolio").fancybox({                    
                'transitionIn'  :   'elastic',
                'transitionOut' :   'elastic',
                'speedIn'       :   600, 
                'speedOut'      :   200, 
                'overlayShow'   :   false,
                'width'             :       700,
                'height'            :       450,
                'hideOnContentClick':       false,
                'autoDimensions'    :       false,
                'showNavArrows'     :       false,
                'overlayShow'       :       true,
                'overlayOpacity'    :       0.8,
                'overlayColor'      :       '#999',
                'type'              :       'iframe'
            });
        });
    </script>

    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-33448490-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

</head>