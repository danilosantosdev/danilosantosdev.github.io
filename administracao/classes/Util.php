<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Util
 *
 * @author Danilo
 */
class Util {

    function dataIng($data) {
        $vetorData = explode("/", $data);
        return $vetorData[2] . "-" . $vetorData[1] . "-" . $vetorData[0];
    }

    function dataBr($data) {
        $vetorData = explode("-", $data);
        return $vetorData[2] . "/" . $vetorData[1] . "/" . $vetorData[0];
    }

    function substr($string, $inicio, $fim) {
        $string = substr($string, $inicio, $fim);
        return $string;
    }

    function nl2br($string) {
        $novaString = nl2br($string);
        return $novaString;
    }

    function checarVariavel($var) {
        trim($var);
        strip_tags($var);
        return $var;
    }   
    
    function verificaSessao() {

        if ( $_SESSION['login'] == "" || $_SESSION['login'] == null ) {
            $redirect = "http://www.danilosantos.cc/administracao/?msg=Você/não/está/Logado no Sistema!&tipoMsg=erro";
            //$redirect = "http://www.fwturismo.com.br/administracao/";
            
            header("location:$redirect");
        }     

    }

}

?>