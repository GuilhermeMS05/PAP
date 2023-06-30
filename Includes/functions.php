<?php
    function images ($file){
        $caminho = "../Imagens/$file";
        if(is_null($file) || !file_exists($caminho)){
            return "../Imagens/imgindisponivel.jpg";
        } else{
            return $caminho;
        }
    }

    function msg_sucesso($m){
        $resp = "<div class='sucesso'><span class='material-icons checkIcon'>check</span><br> $m</div>";
        return $resp;
    }

    function msg_erro($m){
        $resp = "<div class='erro'><span class='material-symbols-outlined errorIcon'>error</span><br> $m</div>";
        return $resp;
    }

    function obterDiaAtual() {
        date_default_timezone_set('Europe/Lisbon');

        $diaAtual = date('Y-m-d');
      
        return $diaAtual;
      }
?>  