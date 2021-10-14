<?php

require_once '../Controleurs/ControlUsersList.php';

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
