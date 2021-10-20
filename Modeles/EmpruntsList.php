<?php

try {
    foreach ($list as $book) {

        $emprunt = $book->GetDateEmprunt();
        $emprunt = strtr($emprunt, "/", "-");                        
        $emprunt = strtotime($emprunt);
        $datemax = date('Y/m/d', strtotime ('-21 days'));
        $datemax = strtr($datemax, "/", "-");
        $datemax = strtotime($datemax);

        if($book->getDateResa() === 'emprunté'){
           
            if($emprunt < $datemax){
                echo '- RETARD / ' . $book->titre .', emprunté par: '. $book->email;    
                echo '<br>';
            }
            if($emprunt > $datemax) {
                echo '- ' . $book->titre .', emprunté par: '. $book->email; 
                echo '<br>'; 
            }
        }    
    }                                                                                                                               
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des livres';
}