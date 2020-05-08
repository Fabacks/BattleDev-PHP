<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
/*
    * Pour trouver la solution, on doit compter le nombre de fois que chaque couleur apparait
    * 1. Pour cela, on doit créer un tableau
    *   clef   : la couleur en string
    *   valeur : le nombre de fois que la couleur apparait 
    * 2. Une fois la boucle fini, on trie du plus grand au plus petit
    * 3. On fait un echo sur les deux plus grandes valeurs
    */

    $listCouleur = array();
    $count = count($input) -1;
    for($i = 1; $i <= $count; $i++):
        $couleur = $input[$i];

        if( !array_key_exists($couleur, $listCouleur) ):
            $listCouleur[$couleur] = 0;
        endif;
        
        $listCouleur[$couleur] += 1;
    endfor;
    
    arsort($listCouleur);
    echo array_keys($listCouleur)[0].' '.array_keys($listCouleur)[1];
}
// -- Fin de votre code

// On lance les tests
Run::test();