<?php 
require '../base.html';

?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'MenuTitre.php';?>   
              
            <div class="col-3 col-md-2">
                
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row"> 
                <div class="col-1"> 
                </div>
                <div class="col-10 col-sm-5 little">
                    <p>
                    <?php
                    function validateDate($date, $format = 'Y-m-d') {
                        $d = DateTime::createFromFormat($format, $date);
                        return $d && $d->format($format) == $date;
                    }

                    if (validateDate($_POST['date_naissance'])) {
                        if ($_POST['nom'] !== '' && $_POST['prenom'] !== '' && $_POST['date_naissance'] !== '' 
                            && $_POST['email'] !== '' && $_POST['password'] !== '' && $_POST['adresse'] !== '') {

                            require_once '../Controleurs/ControlCreateUser.php';    
                        
                            if ($createOk) {
                                echo 'Merci, le compte de ' .'<br>'. $_POST['prenom'] . ' ' . $_POST['nom'] .'<br>'. ' a été créé.' 
                                        .'<br>'. 'Votre demande sera traitée' .'<br>'. 'dans les 24h.' .'<br>'. 
                                        'Vous recevrez un email' .'<br>'. 'de confirmation.';
                            } else {
                                echo 'Impossible de créer le nouveau compte';    
                            }             
                        } else {
                            echo 'Tous les champs du formulaire' .'<br>'. 'd\'inscription doivent' .'<br>'. 'être remplis, merci';
                        }
                    } else {
                        echo 'Veuillez remplir correctement' .'<br>'. 'votre date de naissance, merci';
                    }   ?> 
                    </p> 
                </div>                     
                <div class="col-5 col-sm-4">
                    <?php require_once 'BooksImage.php'; ?>                        
                </div>
            </div>
        </div>         
    </main>
</body>  