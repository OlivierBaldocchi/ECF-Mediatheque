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
                <div class="col-xl-1"></div>          
                <div class="col-11 col-xl-7 little">
                    
                    <?php require_once '../Modeles/BooksList.php'; ?>
                </div>  
                <div class="col-xl-3">
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