<?php

session_start();
session_destroy();
session_unset();
unset($_SESSION['token']);
header("location:https://ecf-mediatheque.herokuapp.com/");