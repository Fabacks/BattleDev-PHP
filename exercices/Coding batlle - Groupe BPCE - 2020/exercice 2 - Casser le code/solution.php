<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    $msgEncode = $input[1];
    $msgLenght = strlen($msgEncode) -1;
    $msgDecode = '';
    
    $startCursor = 0;
    $shift = $input[0];

    for($i=0; $i <= $msgLenght; $i++):
        if( $startCursor > $msgLenght ):
            $startCursor -= $msgLenght;
        endif;

        $msgDecode .= substr($msgEncode, $startCursor, 1);
        $startCursor += $shift;
    endfor;

    echo $msgDecode;
}
// -- Fin de votre code

// On lance les tests
Run::test();