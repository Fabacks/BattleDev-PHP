<?php

require_once 'run.php';

// -- Développez votre code dans la fonction ContestResponse ci-après
// Implémentez votre code ci-dessous
function ContestResponse($input) 
{
    /*
    * Explication avec le cas 1 : 
    * On souhaite un carrer de taille égale la plus grande possible. 
    * On doit d'abord chercher le longeur la plus petite pour former le carrer (car on ne peut rajouter des centimetres).
    * => Soit 3 centimetre
    *
    * Une fois la longuer minimale trouvé, on vient soustraire les valeurs 
    * (8 - 3) + (5 - 3) + (3 - 3) + (5 - 3) = 5 + 2 + 0 + 2 = 9
    * On vas donc jetter 9 centimetres de bois.
    */
    $totalPerdu = 0;
    $tailleMin = 10001;
    for($i = 0; $i <= 3; $i++ ):
        if( $tailleMin > $input[$i] )
        $tailleMin = $input[$i];
    endfor;

    for($i = 0; $i <= 3; $i++ ):
        $totalPerdu += $input[$i] - $tailleMin;
    endfor;

    echo $totalPerdu;
}
// -- Fin de votre code

// On lance les tests
Run::test();