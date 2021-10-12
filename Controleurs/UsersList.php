<?php

require_once '../Modeles/User.php';
require_once '../Modeles/UserManager.php';

use Modeles\User; 
use Modeles\UserManager; 


$userManager = new UserManager();

try {
    $users = $userManager->readAll();

    foreach ($users as $user) {
        $email = $user->getEmail();
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        echo "<option value=$email> $prenom $nom </option>";
        
    }         
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des administrateurs';
}

