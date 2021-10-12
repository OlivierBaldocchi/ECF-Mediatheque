<?php 
require 'C:\xampp\htdocs\MEDIATHEQUE\base.html';
?>

<body>
    <header class="container-fluid">
        <div class="row title">
            
            <?php include_once 'C:\xampp\htdocs\MEDIATHEQUE\Vues\MenuTitre.php'; ?>    
              
            <div class="col-3 col-md-2">
                
            </div>
        </div>       
    </header>

    <main>
        <div class="container">    
            <div class="row"> 
                <div class="col-1"></div>
                
                <div class="col-5 mt-5">
                    <p class="little">Rechercher un livre</p>
                    <div class="mt-5">
                        <?php require_once '../Controleurs/BooksList.php'; ?>

                        <form action="../Vues/BookInfosByTitrePage.php" method="post">                            
                            <input valeur="" type="text" class="input" id="searchInput" name="book" placeholder="Rechercher..." style="width:20vw">
                            
                            <div id="suggestions" style="font-size:1vw"></div>
                            <div>
                                <button type="submit">Voir</button>
                            </div>
                           
                        </form>
                       
                    </div>
                    
                    
                    <script type='text/javascript'>
                        <?php echo "var list = '".implode("<>", $titres)."'.split('<>');"; ?>
                                                                         
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
                
                <div class="col-4">
                    <?php require_once 'C:\xampp\htdocs\MEDIATHEQUE\Vues\BooksImage.php'; ?>                        
                </div>                              
            </div>
        </div>         
    </main>
</body>