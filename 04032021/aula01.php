<?php

$filmes = array(
    2016 => array('A chegada', ' A garota no Trem', ' O Túnel'),
    2017 => array('Vida', ' Dunkirk', ' Vingança'),
    2018 => array('Todo dia', ' Acrimony', ' Jogador n 1'),
    2019 => array('Godzilla 2', ' A possessão de Mary', ' Us'),
    2020 => array('Ava', ' Becky', ' Jiu Jitsu')
);

foreach ($filmes as $ano => $valor) {
    echo $ano . " teve 3 filmes: ";
    foreach ($valor as $filme) {
        echo $filme;
    }
    echo "<br>";
}

?>