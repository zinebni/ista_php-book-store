<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <?php
    // Include navigation and show page header
    require_once 'nav.php';
    ?>

<div class='container'><h1 class="display-3">Student list</h1> </div>
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

<?php   
    
    // Fetch all students from the database and display them in a table
    require_once 'connexion.php';
    $sql = $pdo->query('SELECT * FROM etudiant');
    $sql->execute();
    $etudiants = $sql->fetchAll(PDO::FETCH_OBJ);
   
 
?>

    <tbody>

    <?php foreach($etudiants as $etudiant){ ?>
       <tr>
        <td scope="row"><?=$etudiant->codeEtudiant?></td>
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