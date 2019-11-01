<?php
define('DB_SERVER', 'sqll.njit.edu');
define('DB_USERNAME', 'rr543');
define('DB_PASSWORD', 'd4FeqW2JJ');
define('DB_NAME', 'Login');
 
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
