<?php
// Simple disconnect helper - closes the PDO connection (if any)
// and prints a confirmation message.
require_once 'connexion.php';
try {
    $pdo = null;
    echo 'You have been disconnected';
} catch (PDOException $e) {
    die('error: ' . $e->getMessage());
}

?>
