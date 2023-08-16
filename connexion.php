<?php
// Database connection helper
// Creates a PDO instance connected to the local MySQL 'biblio' database
// Throws an exception on error and stops execution.
try{
    $pdo = new PDO('mysql:host=localhost;dbname=biblio','root','');
    // Use exceptions for error handling so calling code can catch failures
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // If the connection fails, stop and show the error message
    die('error: '.$e->getMessage());
}

?>