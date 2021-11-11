<?php
$db_host = "localhost";
$db_username = "85748_dieren";
$db_password = "Pocketoli";
$db_database = "dierenverblijf";

try{
    $database = new PDO("mysql:host={$db_host};dbname={$db_database}", $db_username, $db_password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "connectie gelukt" . "<br/>";
    // $database = null;
} catch (PDOException $exception){
    // echo "connectie mislukt";
    print "Error!: " . $e->getMessage() . "<br/>";
    // die();
}
