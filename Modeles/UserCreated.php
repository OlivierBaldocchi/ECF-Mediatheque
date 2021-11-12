<?php

require_once '../index.html'; 

if($createOk) {
    echo 'Le nouvel ' .$_POST['role']. ' est créé';
} else {
    echo 'création impossible';
} 
session_start();
include_once '../Vues/ButtonLogOut.php'; 
include_once '../Vues/ButtonBack.php';