<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    // Implémentez votre code ci-dessous

    /**
     * Explication de la solution 
     * On garde la somme d'argent en indexu du tableau 0
     * On garde le nombre d'action pour faire notre boucle en index 1
     * On boucle sur le tableau a partir de l'index 2 jusqu'a le nombre d'action disponible
     * 
     * Si une action le matin est plus chere que notre somme d'argent initiale => On ignore 
     * On stocke dans un tableau toute les gains potentielle a gagner
     * Attention : les sommes négatif doivent être mise à zero.
     * 
     * Puis on utilise la fonction max pour trouver le gain maximun.
     */
    $sommeArgent = $input[0];
    $nbAction = $input[1];
    $action = array();

    for($i = 2; $i <= $nbAction; $i++ ):
        $pxMatin = $pxSoir = 0;
        list($pxMatin, $pxSoir) = explode(" ", $input[$i]);

        if($pxMatin > $sommeArgent )
            continue;
        
        $benef = ($pxSoir - $pxMatin);
        $action[] = $benef < 0 ? 0 : $benef ;
    endfor;

    echo max($action);
}
// -- Fin de votre code

// On lance les tests
Run::test();