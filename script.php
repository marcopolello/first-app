<?php
    $directory = 'C:/Users/MarcoPolello/Documents/cartella-test/';

    // Ottieni il contenuto della cartella
    $files = scandir($directory);

    // Cicla attraverso i file nella cartella
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            // Ottieni il contenuto del file
            $content = file_get_contents($directory . $file);
            // Fai qualcosa con il contenuto, ad esempio stampalo a schermo
            echo "Contenuto di $file: $content";
        }
    }
?>
