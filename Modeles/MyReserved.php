<?php

foreach($list as $book) {
    if($book->GetDateEmprunt() === 'réservé') {
        echo '- ' . $book->titre;
        echo '<br>';
    }    
}