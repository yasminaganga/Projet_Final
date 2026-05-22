
<?php


$host = 'sql212.infinityfree.com';
$dbname = 'if0_41984060_solicode_db';
$username = 'if0_41984060';
$password = '4DL0bGF68bIdNF';

// $host = 'localhost';
// $dbname = 'wordpress_test';
// $username = 'root';
// $password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("KAYN MOCHKIL F CONNEXION:" . $e->getMessage());
}


?>