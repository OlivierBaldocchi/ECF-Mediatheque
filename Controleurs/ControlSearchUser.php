<?php

require_once '../Modeles/User.php';
require_once '../Modeles/UserManager.php';

use Modeles\User; 
use Modeles\UserManager; 

$use = new User();
$useManager = new UserManager();


$finds = $useManager->search($_POST['email'].'%');
    
