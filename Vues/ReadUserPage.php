<?php 
require 'index.html';

$token = $_SESSION['token'];  
require_once 'Modeles/Token.php';

if ($_SESSION['role'] === 'EMPL' || $_SESSION['role'] === 'ADMIN') {
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
                
                <div class="col-10 col-lg-2 m-5 infos">
                    <p class="">Profil utilisateur</p>
                    <form action="router.php" method="post">
                        <input type="hidden" name="route" value="canceluser">
                    <?php 
                                                      
                        if ($_POST) {
                            $_SESSION['emailToRead'] = $_POST['list_email'];
                        }                  
                        if ($_GET) {
                            $_SESSION['emailToRead'] = $_GET['emailtoread'];
                        }
                    
                        require_once 'Modeles/ReadUser.php';
                       
                        if($_SESSION['role'] === 'ADMIN') {
                            $_SESSION['idToCancel'] = $read->getId();
                            ?> 
                            <div class="mt-5">
                                <button type="submit" class="button1">Supprimer</button>
                            </div> 
                            <?php
                        }  ?> 
                    </form>                    
                </div>

                <div class="col-10 col-lg-3 m-5">
                    <p class="little">Livres réservés</p>
                    <?php
                    require_once 'controller.php';
                    $id = $read->getId();                      
                    $list = userReservedBooks($id);                 
                    require_once 'Modeles/UserReservedBooks.php';
                    ?>
                </div>                     
                
                <div class="col-10 col-lg-4 m-5">
                    <p class="little">Livres empruntés</p>
                    <?php
                    require_once 'controller.php';
                    $id = $read->getId();
                    $list = userReservedBooks($id);                   
                    require_once 'Modeles/EmpruntsUser.php';
                      
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
        
 