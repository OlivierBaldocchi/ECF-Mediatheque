<?php 
require '../index.html';

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

                    require_once '../Modeles/Inscription.php';
                    ?> 
                    </p> 
                </div>                     
                <div class="col-5 col-sm-4">
                    <?php require_once 'BooksImage.php'; ?>                        
                </div>
            </div>
        </div>         
    </main>
</body>  