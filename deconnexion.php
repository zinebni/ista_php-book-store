<?php
require_once 'connexion.php';
try{$pdo=null;
     echo'vous etes deconnecter';
}catch(PDOException $e){
    die('erreur'.$e->getMessage());
}

?>
