<?php
require_once 'Classes/User.php';
require_once 'Classes/UserManager.php';
require_once 'Classes/Book.php';
require_once 'Classes/BookManager.php';
require_once 'Classes/Emprunt.php';
require_once 'Classes/EmpruntManager.php';

use Classes\User; 
use Classes\UserManager; 

use Classes\Book; 
use Classes\BookManager; 

use Classes\Emprunt; 
use Classes\EmpruntManager; 

$bookManager = new BookManager();

$read = $bookManager->read(8);   

var_dump($read->getImage());
echo ' <img style="width:20%; height:auto" src= " '.$read->getImage().' " /> ';