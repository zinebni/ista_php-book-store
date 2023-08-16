<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Page to record a book loan (emprunt)
// - Expects the logged-in student stored in session (`codeE`)
session_start();
try {
    if (isset($_POST['empr'])) {
        if (!empty($_SESSION['codeE'])) {
            if (!empty($_POST['livre'])) {
                $livre = $_POST['livre'];
                require_once 'connexion.php';
                // Insert loan record linking student and book
                $pdo->beginTransaction();
                $sql = $pdo->prepare('insert into emprunter(codeEtudiant,codeLivre) values(?,?)');
                $sql->execute([$_SESSION['codeE'], $livre]);
                $pdo->commit();
            }
        } else {
            echo 'Please login first';
            require_once 'deconnexion.php';
        }
    }
} catch (PDOException $e) {
    // Rollback on error and display message
    $pdo->rollBack();
    die('error: ' . $e->getMessage());
}

?>



    <form method="post">
        <label for='livre'>code du livre </label>
        <input type='number' name='livre' id='livre'>
        <button name='empr'>emprinter</button>
    </form>


</body>
</html>