<?php 
require 'https://ecf-mediatheque.herokuapp.com/base.html';
?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'https://ecf-mediatheque.herokuapp.com/Vues/MenuTitre.php'; ?>    
              
            <div class="col-3 col-md-2">
               
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row"> 
                <div class="col-1">                   
                </div>
                <div class="col-5 little">
                    <?php
                    session_start();
                    
                    $_SESSION['emailToRead'] = $_POST['list_email'];
                  
                    require_once '../Controleurs/ControlReadUser.php';
                    
                    ?>
                    <form action="../Modeles/ConfirmRole.php" method="post">
                        <div class="mt-3">
                            <p>Accorder un rôle à: <?php echo $read->getNom() .' '. $read->getPrenom() ?> </p>
                        </div>    
                        <div>
                            <input type="radio" id="inscr" name="role" value="INSCR" checked>
                            <label for="inscr">Utilisateur</label>
                        </div>
                        <div>                        
                            <input type="radio" id="employe" name="role" value="EMPL">
                            <label for="employe">Employé</label>
                        </div>
                        <div>                        
                            <input type="radio" id="admin" name="role" value="ADMIN"> 
                            <label for="admin">Administrateur</label>                       
                        </div>
                        <div class="mt-3">
                            <button class="button2" type="submit">Accorder le rôle</button>
                        </div>
                    </form> 
                </div> 
                <div class="col-4">
                    <?php require_once 'https://ecf-mediatheque.herokuapp.com/Vues/BooksImage.php'; ?>                        
                </div>                                      
            </div>
        </div>         
    </main>
</body>
        
