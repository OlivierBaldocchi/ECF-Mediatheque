<?php

foreach($list as $book) {
    if($book->GetDateEmprunt() === 'réservé') {
        echo '- ' . $book->titre; ?> 
        <a href="../Controleurs/ControlEmprunt.php?user=
        <?php echo $book->getUtilisateurId() ?> &book=<?php echo $book->getBookid() ?>"
        >Confirmer l'emprunt</a> <?php 
        echo '<br>';
    }    
}