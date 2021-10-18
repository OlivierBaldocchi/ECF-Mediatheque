<?php 
require '../base.html';
session_start();
$token = $_SESSION['token'];  
require_once '../Modeles/Token.php';

if (isset($_SESSION['role'])) {
?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'MenuTitre.php'; ?>    
              
            <div class="col-3 col-md-2 m-4">
                <?php include_once 'ButtonLogOut.php'; ?>
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row mt-5"> 
                    <div class="col-1"></div>
                    <div class="col-11 col-md-6 col-xl-3 mt-5 infos">
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
                    <div class="col-5 col-md-6 col-xl-4">
                        <?php
                        $_SESSION['bookToReserv'] = $_GET['id'];
                        if ($_GET['dispo'] == 1) { ?>
                            <form action="ReservBookPage.php">
                                <p class="little">Vous pouvez réserver ce livre, puis vous
                                devrez venir le récuperer dans les 3 jours.</p>
                                <div class="m-5">
                                    <button class="button1" type="submit">Réserver ce livre</button>
                                </div>                                
                            </form>
                            <?php } ?>                        
                    </div>  
                    <div class="col-5 col-md-6 col-xl-3">
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