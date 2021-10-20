<?php require '../base.html'; ?> 

<body>
    <?php
    if (isset($_SESSION['role']) and $_SESSION['role'] === 'EMPL' && $_SESSION['token'] === $token) {
        ?>
    <header class="container-fluid">
        <div class="row title">

            <?php include_once '../Vues/MenuTitre.php';?>
            
            <div class="col-10 col-lg-5 col-xl-2 m-4">
                <?php include_once '../Vues/ButtonLogOut.php'; ?>
            </div>
        </div>       
    </header>

        <main>
            <div class="container">    
                <div class="row"> 
                    
                    <div class="col-10">
                        <p class="little">Ajouter un livre</p>
                        <form action="newB" method="post">
                            <input type="text" placeholder="titre" id="titre" name="titre">
                            <input type="text" placeholder="parution" id="parution" name="parution">
                            <input type="text" placeholder="description" id="description" name="description">
                            <input type="text" placeholder="auteur" id="auteur" name="auteur">
                            <input type="text" placeholder="genre" id="genre" name="genre">                                <button class="button2" type="submit">Envoyer</button>
                        </form>
                    </div>
            
                    <div class="col-md-6 col-xl-3 mt-5 ml-5"> 
                        <form action="confirmU" method="post">
                            <p class="little">Liste des utilisateurs<br>non confirmés</p>
                            <div> 
                                <?php
                                echo '<select name="list_email">';
                                include_once '../Modeles/WaitingList.php';
                                echo '</select>';
                                ?>
                            </div>
                            <div class="mt-3">
                                <button class="button2" type="submit">Voir</button>
                            </div>
                        </form> 
                    </div>
            
                    <div class="col-10 col-xl-4 mt-5 ml-3"> 
                        <p class="little">Livres réservés</p> 

                        <?php 
                        include_once '../Controleurs/ControlReservedBooksList.php'; 
                        
                        include_once '../Modeles/ReservedList.php';
                                        
                        ?>
                    </div>

                    <div class="col-10 col-xl-5 mt-5 ml-3"> 
                        <p class="little">Livres empruntés</p> 

                        <?php 
                        
                        include_once '../Controleurs/ControlReservedBooksList.php'; 
                        
                        include_once '../Modeles/EmpruntsList.php';
                                        
                        ?>
                    </div>
                
                    <div class="col-10 col-xl-3 mt-5">
                        <form action="livres">
                            <p class="little">Liste des livres</p>
                            <button class="button2" type="submit">Cliquez ici</button>
                        </form>
                    </div>

                    <div class="col-10 col-xl-4 mt-5 mb-5">
                        <p class="little">Rechercher<br>un utilisateur</p>
                        <form action="searchU" method="post">                            
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