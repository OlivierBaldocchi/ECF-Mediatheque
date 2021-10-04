<?php require_once 'C:\xampp\htdocs\ECF\base.html';?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?=include_once 'C:\xampp\htdocs\ECF\vues\menu-titre.php';?>   
              
            <div class="col-3 col-md-2">
                <form class="form_connexion" action="">
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
                <div class="cont-img"> 
                    <div>
                        <img src="http://localhost/ECF/vues/images/mediatheque.jpg" alt="photo de la médiathèque" style="width:auto; height:60vh" class="img">
                    </div>
                    <div class="textimage">
                        <p>Votre médiathèque <br> se modernise !</p>
                        <p>Connectez-vous<br>et profitez du<br>"Click and Collect !"</p>
                        <p class="little">Si vous n'avez pas encore<br>de compte, inscrivez-vous ici</p>
                        <form action="modeles/inscription.php">
                            <button class="button2" type="submit">S'inscrire</button>  
                        </form>                        
                    </div>                     
                </div>
            </div>
        </div>         
    </main>
</body>

