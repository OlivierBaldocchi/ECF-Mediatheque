<?php 
require 'C:\xampp\htdocs\MEDIATHEQUE\base.html';
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
            <div class="row"> 
                <div class="col-4 mt-5 infos">
                    <p class="little">Profil utilisateur</p>
                    <?php
                    session_start();
                   
                    if ($_POST) {
                        $_SESSION['emailToRead'] = $_POST['list_email'];
                    }                     
                    
                    require_once '../Controleurs/ControlReadUser.php';                           
                    
                    if ($read) {
                        echo 'Numéro d\'enregistré :' .$read->getId() .'<br>';
                        echo 'Nom: ' .$read->getNom() .'<br>';
                        echo 'Prenom :' .$read->getPrenom() .'<br>';
                        echo 'Date de naissance :' .$read->getDateNaissance() .'<br>';
                        echo 'Email :' .$read->getEmail() .'<br>';
                        echo 'Adresse :' .$read->getAdresse() .'<br>';
                        echo 'Rôle :' .$read->getRole() .'<br>';
                    } 
                    ?>   
                </div>
                <div class="col-3 mt-5 little">
                    <p>Livres réservés</p>
                    <?php
                    $id = $read->getId();

                    require_once '../Controleurs/ControlUserReservedBooks.php';

                    
                    foreach($list as $book) {
                        if($book->getDateEmprunt() === 'réservé') {
                            echo $book->getBookid(); ?> <a href="../Controleurs/ControlEmprunt.php?user=
                            <?php echo $book->getUtilisateurId() ?> &book=<?php echo $book->getBookid() ?>"
                            >Confirmer l'emprunt</a> <?php 
                            echo '<br>';
                        }    
                    } ?>
                </div>                     
                
                <div class="col-3 mt-5 little">
                    <p>Livres empruntés</p>
                    <?php
                    $id = $read->getId();

                    require_once '../Controleurs/ControlUserReservedBooks.php';

                    
                    foreach($list as $book) {
                        if($book->getDateResa() === 'emprunté') {
                            echo $book->getBookid(); 
                            echo '<br>';
                        }    
                    } ?>
                </div>  
            </div>
        </div>         
    </main>
</body>
        
