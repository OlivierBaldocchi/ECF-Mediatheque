<?php

require_once '../Modeles/User.php';
require_once '../Modeles/UserManager.php';

use Modeles\User; 
use Modeles\UserManager; 

$user = new User();

$userManager = new UserManager();

$id = $_SESSION['IdToChange'];
$createOk = $userManager->ConfirmRole($id);  