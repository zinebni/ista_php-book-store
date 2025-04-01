<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  
<?php require_once 'nav.php' ?>
<div class="container">
   <form method="GET">
      
        <div class="mb-3">
         <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='critere'>
            <option selected>critere</option>
            <option value="1">code</option>
            <option value="2">titre</option>
            <option value="3">auteur</option>
            <option value="4">dateEdition</option>
           
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
 if(isset($_GET['rechercher']) && !empty($_GET['valeur'])){
  $critere=$_GET['critere'];
  $valeur=$_GET['valeur'];
  
  switch($critere){
    case '1':
        $requete='select * from livre where codeLivre='.$valeur;
        break;
    
    case'2':
        $requete="select * from livre where titre like '%".$valeur."%'";
        break;

    case'3':
            $requete="select * from livre where auteur like '%".$valeur."%'";
            break;

    case'4':
            
            $requete="select * from livre where dateEdition like '%".$valeur."%'";
            break;
    
}

require_once 'connexion.php';
$sql=$pdo->query($requete);
$livres=$sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class='container'>
 <table class="table">
      
    <thead>
       <tr>
         <th scope="col">code</th>
         <th scope="col">titre</th>
         <th scope="col">auteur</th>
         <th scope="col">date d'edition</th>
        
         
       </tr>
    </thead>
    
    
    <tbody>
 

      <?php foreach($livres as $livre){ ?>
       <tr>
        <td scope="row"><?php echo $livre['codeLivre']?></td>
        <td><?php echo $livre['titre'] ?></td>
        <td><?php echo  $livre['auteur'] ?></td>
        <td><?php echo $livre['dateEdition'] ?></td>
        
       </tr>
    
      <?php }?>

   
    
   
    

    </tbody>
 
   </table>
        

</body>
</html>