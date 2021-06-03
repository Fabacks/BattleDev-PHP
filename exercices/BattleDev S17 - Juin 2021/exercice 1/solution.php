<?php

// Inclusion de tous les polyfills utiles du dossier
foreach( glob("polyfill/*.php") as $filename):
    include $filename;
endforeach;

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    $coef = 5;

    $d = $input[0];
    $l = $input[1];

    echo $d+($coef*$l);
}
// -- Fin de votre code

// On lance les tests
Run::test();