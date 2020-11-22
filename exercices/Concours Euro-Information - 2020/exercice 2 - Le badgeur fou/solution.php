<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    // Fonctionne mais le test echoue;
    $nbCodes = $input[0];

    $list = array();
    for($i=1; $i<= $nbCodes; $i++) {
        $key = $input[$i];

        if( !array_key_exists($key, $list) ):
            $list[$key] = 0;
        endif;

        $list[$key] += 1;
    }

    echo array_search(max($list), $list);
}
// -- Fin de votre code

// On lance les tests
Run::test();