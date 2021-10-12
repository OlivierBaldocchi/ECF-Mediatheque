<?php

require_once '../Modeles/Book.php';
require_once '../Modeles/BookManager.php';

use Modeles\Book; 
use Modeles\BookManager; 


$bookManager = new BookManager();

$id = $_GET['id'];

$read = $bookManager->read($id);     

