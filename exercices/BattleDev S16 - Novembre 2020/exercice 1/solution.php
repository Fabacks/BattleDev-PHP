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
    // Implémentez votre code ci-dessous
    $nbCodes = $input[0];
    $nbFake = 0;

    for($i=1; $i<= $nbCodes; $i++) {
        $compte = $input[$i];

        $length = strlen($compte);
        $end = substr($compte, ($length -5), 5);
        if( is_numeric($end) ):
            $nbFake += 1;
        endif;
    }

    echo $nbFake;
}
// -- Fin de votre code

// On lance les tests
Run::test();