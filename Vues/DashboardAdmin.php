<?php require '../base.html';?> 

<body>
    <?php
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'ADMIN' && $_SESSION['token'] === $token) {
        include_once '../Controleurs/ControlAutomaticChecks.php';
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
                <div class="col-md-6 col-xl-3 mt-5 ml-5"> 
                    <form action="../Controleurs/ControlCreateUser.php" method="post">
                        <p class="little">Créer Employé<br>ou Admin</p>
                        <input type="text" placeholder="nom" id="nom" name="nom">                          
                        <input type="text" placeholder="prénom" id="prenom" name="prenom"><br>
                        <input type="date" id="date_naissance" name="date_naissance"><br>
                        <input type="text" placeholder="email" id="email" name="email">
                        <input type="password" placeholder="mot de passe" id="password" name="password"><br>                           
                        <input type="text" placeholder="adresse" id="adresse" name="adresse"><br>  
                        <input type="text" placeholder="ROLE" id="role" name="role"><br>      
                        <div class="mt-3">
                            <button class="button2" type="submit">Créer</button>
                        </div>
                    </form> 
                </div>
                <div class="col-md-6 col-xl-3 mt-5">
                    <form action="../Vues/ReadUserPage.php" method="post">
                        <p class="little">Liste de tous<br>les utilisateurs</p>
                        <div>
                            <?php
                            echo '<select name="list_email">';
                            require_once '../Modeles/UsersList.php';
                            echo '</select>';
                            ?>
                        </div>
                        <div class="mt-3">
                            <button class="button2" type="submit">Voir</button>
                        </div>
                    </form>                       
                </div>
                <div class="col-md-6 col-xl-3 mt-5">
                    <form action="../Vues/BooksListPage.php">
                        <p class="little">Liste des livres</p>
                        <button class="button2" type="submit">Cliquez ici</button>
                    </form>
                </div>
                <div class="col-md-6 col-xl-3 mt-5">
                    <p class="little">Rechercher<br>un utilisateur</p>
                    <form action="../Controleurs/ControlSearchUser.php" method="post">                            
                        <input type="text" placeholder="email" id="email" name="email">
                        <div class="mt-5">
                            <button class="button2 mb-5" type="submit">Rechercher</button>
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