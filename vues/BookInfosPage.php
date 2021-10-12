<?php 
require 'C:\xampp\htdocs\MEDIATHEQUE\base.html';
session_start();
?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'C:\xampp\htdocs\MEDIATHEQUE\Vues\MenuTitre.php'; ?>    
              
            <div class="col-3 col-md-2">
                
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row mt-5"> 
                    <div class="col-1"></div>
                    <div class="col-4 mb-5 info">
                        <?php  
                        require_once '../Controleurs/ControlReadBook.php';  

                        if ($read) {                            
                            echo '<u>Titre</u> :' .'<br>'. $read->getTitre() .'<br>';
                            echo '<br>';
                            echo '<u>Année de parution</u> :' .'<br>'. $read->getParution() .'<br>';
                            echo '<br>';
                            echo '<u>Résumé</u> :' .'<br>'.$read->getDescription() .'<br>';
                            echo '<br>';
                            echo '<u>Auteur</u> :' .'<br>'. $read->getAuteur() .'<br>';
                            echo '<br>';
                            echo '<u>Genre</u> :' .'<br>'. $read->getGenre() .'<br>';
                        }                     
                        ?>
                    </div> 
                    <div class="col-3">
                        <?php
                        $_SESSION['bookToReserv'] = $_GET['id'];
                        if ($_GET['dispo'] == 1) { ?>
                            <form action="ReservBookPage.php">
                                <p>Vous pouvez réserver ce livre, puis vous
                                devrez venir le récuperer dans les 3 jours.</p>
                                <div class="m-5">
                                    <button class="button1" type="submit">Réserver ce livre</button>
                                </div>                                
                            </form>
                            <?php } ?>                        
                    </div>  
                    <div class="col-4">
                        <?php require_once 'BooksImage.php'; ?>                        
                    </div>                  
                </div>
            </div>
        </div>         
    </main>
</body>