<?php 
require 'C:\xampp\htdocs\MEDIATHEQUE\base.html';
?>

<body>
    <?php
    
    if (isset($_SESSION['role']) and $_SESSION['role'] === 'EMPL') {
        
        ?>
        <header class="container-fluid">
            <div class="row title">
                
            <?php include_once 'C:\xampp\htdocs\MEDIATHEQUE\Vues\MenuTitre.php';?>    
               
                <div class="col-3 col-md-2 m-4">
                    <?php include_once 'ButtonLogOut.php'; ?>
                </div>
            </div>       
        </header>

        <main>
            <div class="container">    
                <div class="row"> 
                    <div class="col-3 mt-5 ml-5"> 
                        <p class="little">Informations<br>livres réservés</p> 
                        <form action="../Controleurs/ControlSearchBook.php" method="post">
                            <input type="text" placeholder="titre du livre" id="titre" name="titre">  
                            <div class="mt-5">
                                <button class="button2" type="submit">Rechercher</button>
                            </div>
                        </form>   
                    </div>
                    
                    <div class="col-3 mt-5">
                        <form action="../Vues/BooksListPage.php">
                            <p class="little">Liste des livres</p>
                            <button class="button2" type="submit">Cliquez ici</button>
                        </form>
                    </div>

                    <div class="col-3 mt-5">
                        <p class="little">Rechercher<br>un utilisateur</p>
                        <form action="../Controleurs/ControlSearchUser.php" method="post">                            
                            <input type="text" placeholder="email" id="email" name="email">
                            <div class="mt-5">
                                <button class="button2" type="submit">Rechercher</button>
                            </div> 
                        </form>    
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