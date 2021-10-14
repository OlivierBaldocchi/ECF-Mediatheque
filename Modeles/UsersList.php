<?php

require_once '../Controleurs/ControlUser.php';

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
