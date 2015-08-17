<?php
    //$baseDirAdmin = "http://localhost/danilosantos/administracao/";
    $baseDirAdmin = "http://www.danilosantos.cc/administracao/";   
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gerenciador de Conteúdo | Danilo Santos</title>
<meta name="author" content="Dr. Web Designer" />
<meta name="title" content="Gerenciador de Conteúdo - Connect" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="language" content="pt-BR" />
<meta name="robots" content="All" />
<meta name="revisit" content="7 days" />
<link href="<?php echo $baseDirAdmin; ?>css/reset.css" type="text/css" rel="stylesheet" media="screen" />
<link href="<?php echo $baseDirAdmin; ?>css/format.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" href="<?php echo $baseDirAdmin; ?>css/jquery-ui-1.8.14.custom.css" media="screen" />
<link rel="stylesheet" href="<?php echo $baseDirAdmin; ?>css/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="<?php echo $baseDirAdmin; ?>shadowbox/shadowbox.css" media="screen" />

<script language="javascript" type="text/javascript" src="<?php echo $baseDirAdmin; ?>js/jquery-1.5.1.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $baseDirAdmin; ?>js/jquery-ui-1.8.14.custom.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $baseDirAdmin; ?>js/jquery.validate.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $baseDirAdmin; ?>shadowbox/shadowbox.js"></script>

<script type="text/javascript">
    Shadowbox.init({
        modal: true,
        overlayOpacity: 0.7
    });
</script>

<script type="text/javascript">
        
    $(document).ready(function(){
        $(".btnNovo").hover(function(){
            $("#submenuBtnNovo").slideDown("slow");
        }, function(){
            $("#submenuBtnNovo").slideUp("slow");
        }) 
    });
    
</script>

<link rel="stylesheet" href="<?php echo $baseDirAdmin; ?>css/demo_table.css" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo $baseDirAdmin; ?>js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        $('#tabela-listagem').dataTable( {
            "sPaginationType": "full_numbers",
            "aaSorting": [[ 0, "desc" ]],
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ registros por página.",
                "sZeroRecords": "Nenhum registro encontrado.",
                "sInfo": "Mostrando _START_ até _END_ de _TOTAL_ registros.",
                "sInfoEmpty": "Showing 0 to 0 of 0 records",
                "sInfoFiltered": "(filtered from _MAX_ total records)"                       
            }
                    
        } );
    } );

</script>

<script type="text/javascript">            
    $(document).ready(function(){
        $("#box-mensagem").delay(3500).slideUp("slow");         
    });    
</script>