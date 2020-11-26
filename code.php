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

}
// -- Fin de votre code

// On lance les tests
Run::test();