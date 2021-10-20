<?php 
require 'index.html';
session_start();
$token = $_SESSION['token'];  
require_once 'Modeles/Token.php';

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
                        <form action="Modeles/CancelBook.php" method="post">
                            <?php 

                            require_once 'Modeles/ReadBook.php';
                            
                            if($_SESSION['role'] === 'ADMIN' || $_SESSION['role'] === 'EMPL') {
                                $_SESSION['bookToCancel'] = $read->getId();
                                ?> 
                                <div class="mt-5 mb-5">
                                    <button type="submit" class="button1">Supprimer</button>
                                </div> 
                                <?php
                            } ?> 
                        </form>           
                    </div> 
                    <div class="col-10 col-md-6 col-xl-4 mt-5 mb-5">
                        <?php
                        $_SESSION['bookToReserv'] = $_GET['id'];
                        if ($_GET['dispo'] == 1) { 
                            ?>
                            <form action="router.php" method="post">
                                <input type="hidden" name="route" value="reserv">
                                <p>Vous pouvez réserver ce livre, puis vous
                                devrez venir le récuperer dans les 3 jours.</p>
                                <div class="m-4">
                                    <button class="button1" type="submit">Réserver</button>
                                </div>                                
                            </form>
                            <?php } ?>                        
                    </div>  
                    <div class="col-10 col-md-6 col-xl-3 mt-5 mb-5">
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