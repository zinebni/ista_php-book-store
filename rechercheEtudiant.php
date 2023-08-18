<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
// Student search results page - used by the navigation search form
require_once 'nav.php';
if (!empty($_GET['cherche'])) {
   require_once 'connexion.php';
   // Search by code or name (basic LIKE search)
   $sql = $pdo->query("select * from etudiant where codeEtudiant like '" . $_GET['cherche'] . "' or nom like '%" . $_GET['cherche'] . "%'");
   $etudiants = $sql->FETCHALL(PDO::FETCH_OBJ);
}
?>

<div class='container'>
 <table class="table">
      
    <thead>
       <tr>
         <th scope="col">code</th>
         <th scope="col">nom</th>
         <th scope="col">prenom</th>
         <th scope="col">adresse</th>
         <th scope="col">classe</th>
         
       </tr>
    </thead>
    
    
    <tbody>
 

      <?php foreach($etudiants as $etudiant){ ?>
       <tr>
        <td scope="row"><?php echo $etudiant->codeEtudiant?></td>
        <td><?php echo $etudiant->nom ?></td>
        <td><?php echo  $etudiant->prenom ?></td>
        <td><?php echo $etudiant->adresse ?></td>
        <td><?php echo $etudiant->classe ?></td>
       </tr>
    
      <?php }?>

   
    
   
    

    </tbody>
 
   </table>
</div>
</body>
</html>