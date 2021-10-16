<?php 
require '../base.html'; 
session_start();
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
            <div class="row"> 
                <div class="col-1"> </div>
                <div class="col-4  mt-5">
                    <?php 
                    
                    require_once '../Controleurs/ControlReservBook.php';
                    
                    if ($dispo && $resa) {
                        echo 'Vous avez bien réservé:' .'<br>'.'" ' .$titre. ' "'.'<br>'.
                            'Vous avez jusqu\'au ' . date('d/m/Y', strtotime ('+3 days')) . ' inclus'.'<br>'. 
                            'pour venir récupérer votre livre.';
                    } else {
                        echo 'Un problème est survenu. Veuillez réessayer svp';
                    }
                    ?>
                </div>
                <div class="col-4"> 
                    <?php require_once 'BooksImage.php'; ?>                
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