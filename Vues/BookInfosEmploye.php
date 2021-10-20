<?php 
require '../base.html';
session_start();
$token = $_SESSION['token'];  
require_once '../Modeles/Token.php';

if (isset($_SESSION['role']) {
?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'MenuTitre.php'; ?>    
              
            <div class="col-3 col-md-2">
                
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row mt-5">  
                    <div class="col-1"></div> 
                    <div class="col-11 col-md-6 col-xl-3 mt-5 infos">
                        <?php 
                         
                        require_once '../Controleurs/ControlReadUser.php';  
                        
                        require_once '../Modeles/ReadBook.php';             
                        ?>
                    </div> 
                    
                    <div class="col-0 col-md-4">
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