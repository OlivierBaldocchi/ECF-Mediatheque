<?php

if($token !== $_SESSION['token']) {
    exit ("Vous ne pouvez pas entrer sur cette page");
}