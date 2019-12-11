<?php

/**
 * @author Fabacks
 * @github https://github.com/Fabacks/
 * @date 11/12/2019
 */
Class Run {

    const NUMERO_DEPART_FICHIERS_TEST = 1;
    const PREFIXE_DOSSIER_TEST = __DIR__.DIRECTORY_SEPARATOR.'tests'.DIRECTORY_SEPARATOR;
    const PREFIXE_FICHIER_INPUT = "input";
    const PREFIXE_FICHIER_OUTPUT = "output";
    
    const ICONE_SUCCES = array("👍", "👌", "🎉", "🤘", "😎", "💪", "👊", "🤙", "🍾", "👏", "🙌", "🙏");

    // Retourne les chemins relatifs des fichiers de tests d'entrée et de sortie
    public  static function cheminsFichiersDeTest($numero)
    {
        return array(
            self::PREFIXE_DOSSIER_TEST.self::PREFIXE_FICHIER_INPUT.$numero.'.txt',
            self::PREFIXE_DOSSIER_TEST.self::PREFIXE_FICHIER_OUTPUT.$numero.'.txt'
        );
    }

    // Ecriture dans la console de debug
    public static function sortieConsole($message) 
    {
        echo is_array($message) ? implode(" ", $message) : $message;
        echo PHP_EOL;
    }

    // Retourne une icône aléatoire de succès
    public static function iconeAleatoireSucces()
    {
        $rand =  array_rand(self::ICONE_SUCCES);
        return self::ICONE_SUCCES[$rand];
    }

    // Lance la phase de test
    public static function test() {
        // Calcule le nombre de tests à passer
        $nombreTotalDeTests = 0;
        $numero = self::NUMERO_DEPART_FICHIERS_TEST;
        $fichierDeTest = self::cheminsFichiersDeTest($numero);

        self::sortieConsole("Recherche de tests...");
        while( file_exists($fichierDeTest[0]) && file_exists($fichierDeTest[1]) ):
            $nombreTotalDeTests++;
            $numero++;
            $fichierDeTest = self::cheminsFichiersDeTest($numero);
        endwhile;
        unset($numero);
        unset($fichierDeTest);

        if( $nombreTotalDeTests > 0 ):
            self::sortieConsole("Nombre de test trouvés $nombreTotalDeTests");
            self::sortieConsole("=> Lancement des tests...");
        else : 
            self::sortieConsole("Aucun test trouvé. Copiez vos fichiers dans le répertoire ./tests.");
            return false;
        endif;

        $numeroTest = self::NUMERO_DEPART_FICHIERS_TEST;
        $nombreDeTestsReussis = 0;
        $succes = true;
        $fichierEntree = $fichierSortie = "";
        list($fichierEntree, $fichierSortie) = self::cheminsFichiersDeTest($numeroTest);

        // On parcourt tous les tests, on s'arrête dès qu'un test ne passe pas
        while( file_exists($fichierEntree) && file_exists($fichierSortie) && $succes ):
            $contenuEntree = file_get_contents($fichierEntree);
            $contenuSortie = file_get_contents($fichierSortie);
            self::sortieConsole("=======[ Test $numeroTest ]=======");
            self::sortieConsole("-- Valeurs d'entrée --");
            self::sortieConsole($contenuEntree);

            // On travaille avec des lignes sous forme de tableaux
            $contenuEntree = preg_split('/\r\n|\r|\n/', $contenuEntree);

            // On affiche la sortie correcte attendue
            self::sortieConsole("-- Sortie attendue --");
            self::sortieConsole($contenuSortie);

            // Tout ce qui sera affiché via echo depuis code.php va être stocké dans contenuConsole
            ob_start();
            ContestResponse($contenuEntree);
            $contenuConsole = ob_get_contents();
            ob_end_clean();

            // On affiche la valeur reçue
            self::sortieConsole("-- Valeur reçue (de code.php) --");
            if( strlen($contenuConsole) <= 0 ):
                self::sortieConsole("ERREUR: Aucune sortie reçue. Utilisez echo dans code.php pour soumettre votre réponse !");
                $succes = false;
            else :
                self::sortieConsole($contenuConsole);
                if( strcmp(trim($contenuConsole), trim($contenuSortie)) !== 0 ):
                    $succes = false;
                endif;
            endif;

            if( $succes ):
                $nombreDeTestsReussis++;
                self::sortieConsole("✅ Test $numeroTest réussi");
            endif;

            // On passe aux prochains fichiers de test
            $numeroTest++;
            list($fichierEntree, $fichierSortie) = self::cheminsFichiersDeTest($numeroTest);
        endwhile;

        // Affiche le taux de réussite
        self::sortieConsole("");
        if( $nombreDeTestsReussis === $nombreTotalDeTests):
            $emojiSucces = self::iconeAleatoireSucces();
            $messageSucces = "{ 100% des tests réussis }";
            $longeurEmotiji = strlen($messageSucces) / 2 + 2;

            self::sortieConsole( str_repeat($emojiSucces, $longeurEmotiji) );
            self::sortieConsole( $messageSucces);
            self::sortieConsole( str_repeat($emojiSucces, $longeurEmotiji) );
        else:
            $messagePourcentage =
            "Tests réussis : [".
            "✅".$nombreDeTestsReussis.
            " || ".
            "❌".($nombreTotalDeTests - $nombreDeTestsReussis).
            "] ".round(($nombreDeTestsReussis * 100) / $nombreTotalDeTests, 2)."%";

            self::sortieConsole($messagePourcentage);
        endif;
    }
}