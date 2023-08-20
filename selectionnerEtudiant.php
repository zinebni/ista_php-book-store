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
    // Include navigation partial and render search form for students
    require_once 'nav.php';
    ?>
<div class="container">
   <form method="GET">
       <div class="mb-3">
         <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='critere'>
            <option selected>critere</option>
            <option value="1">code</option>
            <option value="2">nom</option>
            <option value="3">prenom</option>
            <option value="4">adresse</option>
            <option value="5">classe</option>
         </select>
        </div>

        <div class="mb-3">
          <label for="valeur" class="form-label">valeur</label>
          <input type="text" name="valeur" class="form-control" id="valeur">
        </div>

       <button type="submit" class="btn btn-primary" name="rechercher">rechercher</button>
   </form>

</div>

<?php
    // Handle student selection/search. Build a simple query based on chosen criterion.
    if (isset($_GET['rechercher']) && !empty($_GET['valeur'])) {
        $critere = $_GET['critere'];
        switch ($critere) {
            case '1':
                $requete = "select * from etudiant where codeEtudiant like " . $_GET['valeur'];
                break;
            case '2':
                $requete = "select * from etudiant where nom like '%" . $_GET['valeur'] . "%'";
                break;
            case '3':
                $requete = "select * from etudiant where prenom like '%" . $_GET['valeur'] . "%'";
                break;
            case '4':
                $requete = "select * from etudiant where adresse like '%" . $_GET['valeur'] . "%'";
                break;
            case '5':
                $requete = "select * from etudiant where classe like '%" . $_GET['valeur'] . "%'";
                break;
        }

        require_once 'connexion.php';
        $sql = $pdo->query($requete);
        $etudiants = $sql->FETCHALL(PDO::FETCH_OBJ);
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
        
        <?php
    }
 ?>
</body>
</html>