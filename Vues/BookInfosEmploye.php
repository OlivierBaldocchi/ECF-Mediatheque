<?php 
require 'https://ecf-mediatheque.herokuapp.com/base.html';
session_start();
if (isset($_SESSION['role'])) {
?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'https://ecf-mediatheque.herokuapp.com/Vues/MenuTitre.php'; ?>    
              
            <div class="col-3 col-md-2">
                
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row mt-5">  
                    <div class="col-1"></div> 
                    <div class="col-4 mt-5 info">
                        <?php 
                         
                        require_once '../Controleurs/ControlReadUser.php';  
                        
                        if ($user) {                            
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
                    
                    <div class="col-4">
                        <?php require_once 'BooksImage.php'; ?>                        
                    </div>                  
                </div>
            </div>
        </div>         
    </main>
    <?php
    } else {
        echo 'Vous n\'êtes pas autorisé à acceder à cette page';
    }
    ?>
</body>