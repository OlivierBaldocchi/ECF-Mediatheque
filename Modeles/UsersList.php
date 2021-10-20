<?php

require_once 'controller.php';
$users = readAllUsers();

try {
    foreach ($users as $user) {
        $email = $user->getEmail();
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        echo "<option value=$email> $prenom $nom </option>";
        
    }         
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des administrateurs';
}
