<?php
require_once '../Controllers/controller.php';
$users = waitingList();


try {
    foreach ($users as $user) {
        if ($user->getRole() === 'En attente') {
            $_SESSION['IdToChange'] = $user->getId();
            $email = $user->getEmail();
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            echo "<option value=$email> $prenom $nom </option>";
        } 
    }         
} catch (PDOException $e) {
    echo 'Impossible de récupérer la liste des administrateurs';
}

