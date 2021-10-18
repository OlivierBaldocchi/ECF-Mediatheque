<?php

require_once '../Modeles/User.php';
require_once '../Modeles/UserManager.php';

use Modeles\User; 
use Modeles\UserManager; 

$user = new User();
        
$user->setNom($_POST['nom'])
    ->setPrenom($_POST['prenom'])
    ->setDateNaissance($_POST['date_naissance'])
    ->setEmail($_POST['email'])
    ->setMdp($_POST['password'])
    ->setAdresse($_POST['adresse']);
    
$userManager = new UserManager();

$createOk = $userManager->create($user);       

  