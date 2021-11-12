<?php
session_start();
$token = $_SESSION['token'];

if ($_SESSION['role'] === 'ADMIN') {  
    require_once '../Vues/DashboardAdmin.php';                    
} 
elseif ($_SESSION['role'] === 'EMPL') { 
    require_once '../Vues/DashboardEmploye.php';   
}
elseif ($_SESSION['role'] === 'INSCR') { 
    require_once '../Vues/DashboardUser.php';
}                
