<?php require 'index.html';?>

<body>
    <?php
    
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'INSCR' && $_SESSION['token'] === $token) {
        ?>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'Vues/MenuTitre.php'; ?>    
              
            <div class="col-10 col-lg-5 col-xl-2 m-4">
                <?php 
                include_once 'Vues/ButtonLogOut.php'; ?>
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row"> 
                             
                <div class="col-md-6 col-xl-3 mt-5">
                    <p class="little">Rechercher un livre</p>
                    <div class="mt-5">   
                        <form action="router.php" method="post">                               
                            <input type="hidden" name="route" value="readbytitre">                           
                            <input valeur="" type="text" class="input" id="searchInput" name="book" placeholder="Rechercher..." style="width:30vh">
                            <div id="suggestions" style="font-size:1.5vw"></div>
                            <div>
                                <button class='button2 mt-5' type="submit">Voir</button>
                            </div>  
                        </form>                                            
                        <?php require_once 'Modeles/BooksListJava.php'; ?>  
                        
                                        <script type='text/javascript'>
                                        <?php echo "list = '".implode("<>", $titres)."'.split('<>');"; ?>
                                                                                        
                                        const searchinput = document.getElementById('searchInput');

                                        searchinput.addEventListener('keyup', function(){
                                            const input = searchinput.value;

                                            const result = list.filter(item => item.toLocaleLowerCase().includes(input.toLocaleLowerCase()));

                                            let suggestion = '';

                                            if(input!='') {
                                                result.forEach(resultItem =>
                                                    suggestion +=`
                                                        <div class="suggestion" onClick="choix('${resultItem}')">${resultItem}</div>
                                                    `
                                                )
                                            }                            
                                            document.getElementById('suggestions').innerHTML = suggestion;
                                        })

                                        function choix(valeur) {
                                            document.getElementById('searchInput').value=valeur;
                                        }
                                        </script>      
                    </div>                
                </div>                    
                                       
                <div class="col-md-6 col-xl-4 mt-5">
                    <p class="little">Mes livres réservés</p>
                    <?php 
                    
                    require_once 'controller.php'; 
                    $id = $_SESSION['id'];
                    $list = userReservedBooks($id);
                    require_once 'Modeles/MyReserved.php';
                    ?>
                </div>

                <div class="col-md-6 col-xl-4 mt-5">
                    <p class="little">Mes livres empruntés</p>
                    <?php
                    require_once 'controller.php'; 
                    $id = $_SESSION['id'];
                    $list = userReservedBooks($id);
                    require_once 'Modeles/MyEmprunts.php';

                    ?>
                </div>

                <div class="col-md-6 col-xl-3 mt-5 mb-5">
                    <form action="router.php" method="post">
                        <input type="hidden" name="route" value="booklist">
                        <p class="little">Liste des livres</p>
                        <button class="button2" type="submit">Cliquez ici</button>
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