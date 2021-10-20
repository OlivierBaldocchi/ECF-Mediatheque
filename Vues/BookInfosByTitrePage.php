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
                    <div class="col-md-7 col-xl-3 mt-5 infos">
                        <?php  
                        
                        require_once 'Modeles/ReadByTitreBook.php'   
                        ?>
                    </div> 
                    <div class="col-md-4 col-xl-3 mt-5">
                        <?php
                        $_SESSION['bookToReserv'] = $id;
                        if ($dispo === 1) { ?>
                            <form action="router.php" method="post"> 
                                <input type="hidden" name="route" value="reserv">
                                <p>Vous pouvez réserver ce livre, puis vous
                                devrez venir le récuperer dans les 3 jours.</p>
                                <div class="m-5">
                                    <button class="button1" type="submit">Réserver</button>
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
    <?php
    } else {
        echo 'Vous n\'êtes pas autorisé à acceder à cette page';
    }
    ?>
</body>