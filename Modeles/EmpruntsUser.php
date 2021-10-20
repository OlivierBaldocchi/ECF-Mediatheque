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
            echo '- RETARD/ ' . $book->titre; ?>
            <a class="mb-5" href="../Controleurs/ControlReturnBook.php?book=<?php echo $book->getBookid() ?>"
            >Confirmer le retour</a> <?php 
            echo '<br>'; 
        } else {
            echo '- ' . $book->titre; ?>
            <a class="mb-5" href="../Controleurs/ControlReturnBook.php?book=<?php echo $book->getBookid() ?>"
            >Confirmer le retour</a> <?php 
            echo '<br>'; 
        }
    }    
}    