<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    // Implémentez votre code ci-dessous
    $product = array();
    $count = $input[0];

    // On créer une liste de chaine et version OS
    for($i=1; $i <= $count; $i++):
        $p = $v = null;
        list($p, $v) = explode(' ', $input[$i]);
        $product[$p] = $v;
    endfor;

    // On regarde quelle ligne de production à des numéros de version identiques
    $os = array();
    foreach($product as $key => $value):
        if( !array_key_exists($value, $os) ):
            $os[$value]['value'] = 0;
            $os[$value]['chaine'] = $key;
        endif;

        $os[$value]['value'] += 1;
    endforeach;

    // On recherche la valeur possédant 1, car c'est la seul ligne compromise différente des autres
    foreach($os as $value):
        if( $value['value'] != 1 ) continue;

        echo $value['chaine'];
        break;
    endforeach;
}
// -- Fin de votre code

// On lance les tests
Run::test();