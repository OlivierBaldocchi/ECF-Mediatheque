<?php

try {
    foreach ($books as $book) {
                       
        if ($book->getStatut() == 1) {     
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="green" class="bi bi-bookmark" viewBox="0 0 16 16">
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
            </svg> 
            <?php echo $book->getTitre(); ?> 
            <a style="color:orangered" href="router.php?id=<?= $book->getId() ?>&dispo=<?= $book->getStatut() ?>&route=infosbook">détails</a>
        <?php                 
            echo '<br>';
        } else { 
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" color="red" class="bi bi-bookmark" viewBox="0 0 16 16">
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
            </svg>  
            <?php echo $book->getTitre(); ?>
            <a style="color:orangered" href="router.php?id=<?= $book->getId() ?>&dispo=<?= $book->getStatut() ?>&route=infosbook">détails</a>
        <?php               
            echo '<br>'; 
        }        
    }         
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des livres';
}