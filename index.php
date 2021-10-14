<?php require_once 'base.html';?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'Vues\MenuTitre.php';?>   
              
            <div class="col-3 col-md-2">
                <form class="form_connexion" action="Modeles/Connection.php" method="post">
                    <div>
                        <input type="text" placeholder="email" id="email" name="email">
                    </div>
                    <div class="mt-1">
                        <input type="password" placeholder="mot de passe" id="password" name="password">
                    </div>
                    <div class="mt-3">
                        <button class="button1" type="submit">Connectez-vous</button>
                    </div>
                </form>    
            </div>
        </div>       
    </header>
   
    <main>
        <div class="container">    
            <div class="row"> 
                <div class="col-2"></div> 
                <div class="col-5 mt-5 little">
                    <p>Votre médiathèque <br> se modernise !</p>
                    <p>Connectez-vous<br>et profitez du<br>"Click and Collect !"</p>
                    <p class="little">Si vous n'avez pas encore<br>de compte, inscrivez-vous ici</p>
                    <form action="Vues/Inscription.php">
                        <button class="button2" type="submit">S'inscrire</button>  
                    </form>                        
                </div>
                <div class="col-4">
                    <?php require_once 'Vues\BooksImage.php'; ?>                        
                </div>                           
            </div>
        </div>         
    </main>
</body> 

