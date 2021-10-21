<?php

require_once 'index.html'; 

if($createOk) {
    echo 'Le nouvel ' .$_POST['role']. ' est créé';
} else {
    echo 'création impossible';
} 
