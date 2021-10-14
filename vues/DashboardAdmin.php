<?php require 'https://ecf-mediatheque.herokuapp.com/base.html';?>

<body>
    <?php
    if (isset($_SESSION['role']) and $_SESSION['role'] === 'ADMIN') {
        ?>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'https://ecf-mediatheque.herokuapp.com/Vues/MenuTitre.php';?>
                            
            <div class="col-3 col-md-2 m-4">
                <?php include_once 'ButtonLogOut.php'; ?>
            </div>
        </div>       
    </header>
 
    <main>
        <div class="container">    
            <div class="row"> 
                <div class="col-3 mt-5 ml-5"> 
                    <form action="../Vues/ConfirmUserPage.php" method="post">
                        <p class="little">Liste des utilisateurs<br>non confirmés</p>
                        <div> 
                            <?php
                            echo '<select name="list_email">';
                            require_once '../Modeles/WaitingList.php';
                            echo '</select>';
                            ?>
                        </div>
                        <div class="mt-3">
                            <button class="button2" type="submit">Voir</button>
                        </div>
                    </form> 
                </div>
                <div class="col-3 mt-5">
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