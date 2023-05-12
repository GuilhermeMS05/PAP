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
        $resp = "<div class='sucesso'><span class='material-icons'>check</span>$m</div>";
        return $resp;
    }

    function msg_erro($m){
        $resp = "<div class='erro'><span class='material-icons'>cancel</span>$m</div>";
        return $resp;
    }
?>  