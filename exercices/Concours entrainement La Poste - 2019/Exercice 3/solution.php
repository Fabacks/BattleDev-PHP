<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    /**
     * Explication de la solution 
     * On garde le nombre de dalle qui sont inversé
     * On créer une liste des numéros de dalles séparer par un espace
     *
     * On récupere le début du tableau jusqu'a la fin des dalles inversé avec la fonction array_slice
     * On inverse le tableau avec la fonction array_reverse
     * 
     * On récupere la fin fin du tableau avec la fonction array_slice
     * 
     * On vient assemblé le tableau du début avec le tableau de fin avec la fonction array_merge
     * Puis, on affiche le résultat sous forme de chaine avec un implode du tableau
     * 
     */
    $nbInverser = $input[0];
    $liste = explode(" ", $input[1]);

    $limit = $nbInverser;
    $listDebut = array_slice($liste, 0, $limit);
    $listDebut = array_reverse($listDebut);
    
    $offset = $nbInverser;
    $listFin   = array_slice($liste, $offset);

    $final = array_merge($listDebut, $listFin);
    echo implode(" ", $final);
}
// -- Fin de votre code

// On lance les tests
Run::test();