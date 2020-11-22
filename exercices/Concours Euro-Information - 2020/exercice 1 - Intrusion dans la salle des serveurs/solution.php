<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    $nbCodes = $input[0];

    for($i=1; $i<= $nbCodes; $i++) {
        $code = $input[$i];

        if( substr($code, 5, 3) == '555' ) 
            continue;

        echo $code;
        break;
    }
}
// -- Fin de votre code

// On lance les tests
Run::test();