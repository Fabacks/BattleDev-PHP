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
    unset($input[0]);

    // On compte le nombre d'occurrence
    $resp = array_count_values($input);

    // On récupéré la clef ou le mot est juste 2 fois
    echo array_keys($resp, 2)[0];
}
// -- Fin de votre code

// On lance les tests
Run::test();