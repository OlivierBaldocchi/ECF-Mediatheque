<?php

session_start();
session_destroy();
session_unset();
header("location:http://localhost/MEDIATHEQUE/Accueil.php");