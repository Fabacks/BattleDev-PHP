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

    $start = strtotime("01.01.1970 7:59"); 
    $end = strtotime("01.01.1970 20:00");

    for($i=1; $i<= $nbCodes; $i++) {
        $compte = $input[$i];

        $heure = strtotime("01.01.1970 ".$compte); 
        if( $start < $heure && $heure < $end ):
            continue;
        endif;
        
        $nbFake += 1;
    }

    echo $nbFake < ($nbCodes/2) ? 'OK' : 'SUSPICIOUS';
}
// -- Fin de votre code

// On lance les tests
Run::test();