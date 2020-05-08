<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    /*
    * Pour trouver cette solution, nous devons chercher combien de fois le même chiffre sort à la suite.
    * Mais, on doit garder le nombre de fois (le plus grand) qu'une serie est sortie.
    * Pour cela : 
    *   1. On boucle sur tous les nombres. 
    *   2.1 Si, c'est le même nombre que le précédent on ajoute 1 à la répétition.
    *   2.1 Puis, on regarde si la serie précédente est inférieure. Si oui, on ajoute la répétition à celui-ci
    *   2.2 Si différent de la répétition précédente, on remet la répétition à zéro
    *   3. Enfin, on affiche la répétition la plus grande
    */
    
    $chiffreReap = null;
    $comptage = 0;
    $maxSerie = 0;

    $count = count($input) -1;
    for($i = 1; $i <= $count; $i++): 
        $valeur = $input[$i];

        if( $chiffreReap == $valeur ):
            $comptage += 1;
            $maxSerie = max($comptage, $maxSerie);
        else :
            $chiffreReap = $valeur;
            $comptage = 1;
        endif;
    endfor;

    echo $maxSerie;
}
// -- Fin de votre code

// On lance les tests
Run::test();