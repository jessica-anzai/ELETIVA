<?php
    include("cabecalho.php");

    $diaSemana = 3;
    switch($diaSemana){
        case 1:
            echo "Hoje é domingo";
            break;
        case 2:
            echo "Hoje é segunda-feira";
            break;
        case 3:
            echo "Hoje é terça-feira";
            break;
        
        default:
            echo "Hoje pode ser terça-feira, quarta-feira ou sábado";
    }

    include("rodape.php");
?>