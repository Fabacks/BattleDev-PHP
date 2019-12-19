<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    // Implémentez votre code ci-dessous

    /*
    * Le but est de trouver le batton le plus petit qui correspond au nom de la personne qui a perdu. 
    * Pour cela, stocke le nombre de participant
    * Puis on boucle sur chaque participant pour avoir le baton le plus petit. Sachant que le baton le plus grand peut faire 1000cm.
    * On test avec la valeur que l'on a si plus petit, on garde le nom de la personne.
    * Puis on affiche son nom
    *
    * Info :
    * On démmarre le for à 1, car la premeire ligne est le nombre de participant.
    *
    */
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