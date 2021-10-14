<?php

require_once '../Modeles/User.php';
require_once '../Modeles/UserManager.php';
require_once '../Modeles/Book.php';
require_once '../Modeles/BookManager.php';
require_once '../Modeles/Emprunt.php';
require_once '../Modeles/EmpruntManager.php';

use Modeles\User; 
use Modeles\UserManager; 

use Modeles\Book; 
use Modeles\BookManager; 

use Modeles\Emprunt; 
use Modeles\EmpruntManager; 

$user = new User();   
$userManager = new UserManager();

$book = new Book();
$bookManager = new BookManager();

$emprunt = new Emprunt();
$empruntManager = new EmpruntManager();

require_once '../Modeles/AutomaticChecks.php';