<?php

require_once '../Modeles/User.php';
require_once '../Modeles/UserManager.php';

use Modeles\User; 
use Modeles\UserManager; 


$userManager = new UserManager();

$email = $_SESSION['emailToRead'];

$read = $userManager->read($email);    