<?php 
require '../index.html';
session_start();
$token = $_SESSION['token'];  
require_once '../Modeles/Token.php';
?>
 
<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once '../Vues/MenuTitre.php'; ?>    
              
            <div class="col-10 col-lg-5 col-xl-2 m-4">
                <?php include_once '../Vues/ButtonLogOut.php'; ?>
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row"> 
                <div class="col-1">                   
                </div>
                <div class="col-10 col-md-6 little">
                    <?php

                    include_once '../controller.php';
                    $read = readUser();
                                                               
                    ?>
                    <form action="../Modeles/ConfirmRole.php" method="post">
                        <div class="mt-3 mb-5">
                            <p>Confirmer le compte de: <?php echo $read->getNom() .' '. $read->getPrenom() ?> </p>
                        </div>    
                        <div>
                            <input type="radio" id="inscr" name="role" value="INSCR" checked>
                            <label class="infos" for="inscr">Inscrit</label>
                        </div>
                        <div class="mt-3">
                            <button class="button2 m-5" type="submit">Confirmer</button>
                        </div>
                    </form> 
                </div> 
                <div class="col-0 col-md-5 mt-5 mb-5">
                    <?php require_once 'BooksImage.php'; ?>                        
                </div>                                      
            </div>
        </div>         
    </main>
</body>
        
