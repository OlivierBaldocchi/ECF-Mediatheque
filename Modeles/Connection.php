<?php 
require_once '../base.html';

require_once '../Controleurs/ControlUser.php';

$user = $userManager->read($_POST['email']);

if ($user === null) {
    echo 'Identifiants Invalides';
} else { 
    if ($user->getRole() === 'En attente') {
    ?>
        <script type='text/javascript'>
            alert("Votre compte n'a pas encore été validé. Vous recevrez bientôt un email de confirmation, merci.");
            window.location = '../index.php';
        </script>
    <?php 
    } else { 
        if (password_verify($_POST['password'], $user->getMdp())) {
            
            session_start();
            $_SESSION['login'] = $user->getEmail();
            $_SESSION['id'] = $user->getId();
           
            if ($user->getRole() === 'ADMIN') {
                $_SESSION['role'] = 'ADMIN'; 
                include_once '../Controleurs/ControlAutomaticChecks.php';                    
            }
            elseif ($user->getRole() === 'EMPL') {
                $_SESSION['role'] = 'EMPL'; 
                 include_once '../Vues/DashboardEmploye.php';  
            }
            elseif ($user->getRole() === 'INSCR') {
                $_SESSION['role'] = 'INSCR'; 
                include_once '../Vues/DashboardUser.php';
            }                
        } else {
            echo 'Identifiants Invalides';
        } 
    }    
} 

