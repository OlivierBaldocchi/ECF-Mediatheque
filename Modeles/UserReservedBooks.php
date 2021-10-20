<?php

foreach($list as $book) {
    if($book->GetDateEmprunt() === 'réservé') {
        echo '- ' . $book->titre; ?> 
        <a href="router.php?user=
        <?php echo $book->getUtilisateurId() ?> &book=<?php echo $book->getBookid() ?> &route=emprunt"
        >Confirmer l'emprunt</a> <?php 
        echo '<br>';
    }    
}