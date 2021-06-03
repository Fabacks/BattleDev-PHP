// Implémentez votre code ci-dessous
    $game = array();
    
    $line = count($input) -1;
    for($i = 0; $i <= $line; $i++):
        $game[$i] = str_split($input[$i]);
    endfor;

    // On boucle sur les lignes
    for($i = 0; $i <= $line -3; $i++):
        // On boucle sur les colonnes
        for($j = 0; $j <= 9; $j++):
            
            // On test si toute la ligne empêche de passer;
            $block = true;
            for($k = 0; $k <= 9; $k++):
                if( $game[$i][$k] != '.') continue;
                
                $block = false;
                break 1;
            endfor;

            if( $block ):
                break 2;
            endif;

            // On check si on, a un espace pour insérer la barre
            if( $game[$i][$j] == '.' && $game[$i+1][$j] == '.' && $game[$i+2][$j] == '.' && $game[$i+3][$j] == '.' && ($i+3 == $line || (!empty($game[$i+4][$j]) && $game[$i+4][$j] == '#')) ):
                
                $isOk = false;
                //Si un espace, on check si toute les lignes sont complete
                for($k = 0; $k <= 9; $k++):
                    if( $k == $j ) continue;

                    if( $game[$i][$k] == '#' && $game[$i+1][$k] == '#' && $game[$i+2][$k] == '#' && $game[$i+3][$k] == '#' ):
                        $isOk = true;
                    else : 
                        $isOk = false;
                        break;
                    endif;
                endfor;

                if( $isOk ):
                    echo 'BOOM '.($j+1);
                    return;
                endif;
            endif; 

        endfor;
    endfor;

    echo 'NOPE';