<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
try{
if(isset($_POST['empr'])){
if(!empty($_SESSION['codeE'])){
    if(!empty($_POST['livre'])){
        $livre=$_POST['livre'];
        require_once 'connexion.php';
        $pdo->beginTransaction();
        $sql=$pdo->prepare('insert into emprunter(codeEtudiant,codeLivre) values(?,?)');
        $sql->execute([$_SESSION['codeE'],$livre]);
        $pdo->commit();
    }
}else{
    echo 'connecter vous svp';
    require_once'deconnexion.php';
}}
}catch(PDOException $e){
    die('erreur'.$e->getMessage());
    $pdo->rollBack();
}

?>



    <form method="post">
        <label for='livre'>code du livre </label>
        <input type='number' name='livre' id='livre'>
        <button name='empr'>emprinter</button>
    </form>


</body>
</html>