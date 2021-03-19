<?php
DEFINE('DB_USER', 'abuauqjn_haitham');
DEFINE('db_passowrd', "Alex5563566");
$dsn = "mysql:host=localhost;dbname=abuauqjn_hm1";

try {
    $db = new PDO($dsn, DB_USER, db_passowrd);
} catch (PDOException $e) {
    $err_msg = $e->getMessage();
    include("db_error.php");
    exit();
}
