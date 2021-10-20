<?php

foreach($list as $book) {
    $emprunt = $book->GetDateEmprunt();
    $emprunt = strtr($emprunt, "/", "-");                        
    $emprunt = strtotime($emprunt);
    $datemax = date('d/m/Y', strtotime ('-21 days'));
    $datemax = strtr($datemax, "/", "-");
    $datemax = strtotime($datemax);
    
    if($book->getDateResa() === 'emprunté'){
        if($emprunt < $datemax){
            ?>
            <script type='text/javascript'>
                alert ('Attention vous avez du retard dans vos retours de livres!');
            </script>
        <?php
            echo '- RETARD/ ' . $book->titre;
            echo '<br>';
        } else {
            echo '- ' . $book->titre; 
            echo '<br>'; 
        }
    }    
} 