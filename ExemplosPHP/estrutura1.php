  <?php
    // > < >= != == ===
    // && || !

    include("cabecalho.php");

    $valor = 10;
    if(($valor > 20)&&($valor < 30)){
      echo "Valor maior que 20";
    }
    else{
      echo "Valor menor ou igual que 20";
    }

    include("rodape.php");
  ?>