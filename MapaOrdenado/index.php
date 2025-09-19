<?php
    $valor = array(1,2,3,4,5);
    echo "<p>Primeiro valor do vetor: ".$valor[0]."</p>";

    $vetor = [1,2,3,4,5];

    //função para exibir valores de vetor
    var_dump($vetor);
    echo"<br/>";
    print_r($vetor);

    $vetor[4] = 6;
    echo "<p>Novo valor da posição 4:".$vetor[4]."</p>";

    $v = 'nome';
    $vetor['$v'] = "Jessica";
    print_r($vetor);

    $valores=[
        'nome' => 'Jessica',
        'sobrenome' => 'Anzai',
        'idade' => 25
    ];

    foreach($valores as $v){
        echo "<p>$v</p>";
    }

    foreach($valores as $c => $v){
        echo "<p>Posição: $c = Valor $v</p>";
    }
?>