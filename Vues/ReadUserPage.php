<?php 
require '../base.html';
session_start();
if (isset($_SESSION['role']) and $_SESSION['role'] === 'EMPL' or $_SESSION['role'] === 'ADMIN') {
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
            <div class="row"> 
                <div class="col-1 col-xl-0">
                </div>
                <div class="col-10 col-xl-4 mt-5 infos">
                    <p class="little">Profil utilisateur</p>
                    <?php
                                   
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
                <div class="col-10 col-xl-4 mt-5 infos">
                    <p class="little">Livres réservés</p>
                    <?php
                    $id = $read->getId();
 
                    require_once '../Controleurs/ControlUserReservedBooks.php';
                    
                    foreach($list as $book) {
                        if($book->GetDateEmprunt() === 'réservé') {
                            echo $book->titre; ?> 
                            <a href="../Controleurs/ControlEmprunt.php?user=
                            <?php echo $book->getUtilisateurId() ?> &book=<?php echo $book->getBookid() ?>"
                            >Confirmer l'emprunt</a> <?php 
                            echo '<br>';
                        }    
                    } ?>
                </div>                     
                
                <div class="col-10 col-xl-4 mt-5 infos">
                    <p class="little">Livres empruntés</p>
                    <?php
                    $id = $read->getId();

                    require_once '../Controleurs/ControlUserReservedBooks.php';

                    foreach($list as $book) {
                        $emprunt = $book->GetDateEmprunt();
                        $emprunt = strtr($emprunt, "/", "-");                        
                        $emprunt = strtotime($emprunt);
                        $datemax = date('d/m/Y', strtotime ('-21 days'));
                        $datemax = strtr($datemax, "/", "-");
                        $datemax = strtotime($datemax);
                        
                        if($book->getDateResa() === 'emprunté'){
                            if($emprunt < $datemax){
                                echo $book->titre .' -- RETARD -- '; ?>
                                <a href="../Controleurs/ControlReturnBook.php?book=<?php echo $book->getBookid() ?>"
                                >Confirmer le retour</a> <?php 
                                echo '<br>'; 
                            } else {
                                echo $book->titre; ?>
                                <a href="../Controleurs/ControlReturnBook.php?book=<?php echo $book->getBookid() ?>"
                                >Confirmer le retour</a> <?php 
                                echo '<br>'; 
                            }
                        }    
                    }    

                     ?>
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
        
 