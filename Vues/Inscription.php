
<?php require '../index.html';?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
        <?php include_once '../Vues/MenuTitre.php';?>  
              
        </div>        
    </header>

    <main>
        <div class="container">    
            <div class="row"> 
                <div class="col-1">                    
                </div>
                <div class="col-10 col-lg-5 little">
                    <form action="WaitingInscription.php" method="post">
                        <p>Veuillez entrer vos informations <br>ci-dessous s'il vous plait</p><br>
                        <input type="text" placeholder="nom" id="nom" name="nom">                          
                        <input type="text" placeholder="prénom" id="prenom" name="prenom"><br>
                        <div class="infos" style="color:black"> - date de naissance - </div>
                        <input style="width:32vh" type="date" id="date_naissance" name="date_naissance"><br>
                        <input type="text" placeholder="email" id="email" name="email">
                        <input type="password" placeholder="mot de passe" id="password" name="password"><br>                           
                        <input type="text" placeholder="adresse" id="adresse" name="adresse"><br>                            
                                                                                
                        <div class="mt-3">
                            <button class="button2" type="submit">Envoyer</button> 
                        </div>
                        <p class="little">Aprés validation de votre inscription<br>vous pourrez vous connecter.</p>
                    </form>    
                </div> 
                <div class="col-5 col-sm-4">
                    <?php require_once '../Vues/BooksImage.php'; ?>                        
                </div>
            </div>
        </div>         
    </main>
</body>