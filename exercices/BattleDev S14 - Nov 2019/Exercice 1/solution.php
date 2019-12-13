<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    // Implémentez votre code ci-dessous
    $nbParticipant = $input[0];
    $valeurMin = 10001;
    $nomPersonne = "";

    for($i = 1; $i <= $nbParticipant; $i++):
        $tableTemps = explode(" ", $input[$i]);
        
        if( $valeurMin > $tableTemps[1] ) :
            $nomPersonne = $tableTemps[0];
            $valeurMin = $tableTemps[1];
        endif;
    endfor;

    echo $nomPersonne;
}
// -- Fin de votre code

// On lance les tests
Run::test();