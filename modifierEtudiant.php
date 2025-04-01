<?php
session_start();
 require_once 'nav.php';
 
 //afficher les info initiales 
 require_once 'connexion.php';

 $sql=$pdo->query('select * from etudiant where codeEtudiant ='.$_SESSION['code']);
 $etudiant=$sql->fetch(PDO::FETCH_ASSOC);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container ">


<form method="POST">
  <div class="mb-3">
    <label for="code"   class="form-label">code</label>
    <input type="number"  name="code" class="form-control" id="code" value="<?php echo $etudiant["codeEtudiant"] ?>">
  </div>

  <div class="mb-3">
    <label for="nom"   class="form-label">nom</label>
    <input type="text" name="nom" class="form-control" id="nom" value="<?php echo $etudiant["nom"] ?>">
  </div>

  <div class="mb-3">
    <label for="prenom"  class="form-label">prenom</label>
    <input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo $etudiant["prenom"] ?>">
  </div>

  <div class="form-floating">
     <textarea class="form-control" name="adresse" id="adresse" style="height: 100px"><?php echo $etudiant["adresse"] ?></textarea>
     <label for="adresse">adresse</label>
  </div>

  <div class="mb-3">
    <label for="classe"  class="form-label">classe</label>
    <input type="text" name="classe" class="form-control" id="classe" value="<?php echo $etudiant["classe"] ?>">
  </div>

  <button type="submit" class="btn btn-primary" name="modifier">modifier</button>
</form>

</div>

<!------------------------------------------------------------->


<?php


//modifier les infos 
try{ if(isset($_POST['modifier'])){
  $code=htmlspecialchars($_POST['code']);
  $nom=htmlspecialchars($_POST['nom']);
  $prenom=htmlspecialchars($_POST['prenom']);
  $adresse=htmlspecialchars($_POST['adresse']);
  $classe=htmlspecialchars($_POST['classe']);
  
  $pdo->beginTransaction();
 
  $modify=$pdo->prepare("UPDATE  etudiant SET  codeEtudiant= ?, nom=?, prenom=?, adresse=? , classe=? WHERE codeEtudiant=".$_SESSION['code']);
  $modify->execute([$code,$nom,$prenom,$adresse,$classe]);



  $pdo->commit();
  ?>
      <div class='alert alert-success' role='alert'>les donnée sont modifiés avec succé</div>
  
  <?php
 
 }
}catch(PDOException $e){
  die('erreur dans la modification des données:'.$e->getMessage());
  $pdo->rollBack();
}
  
?>   
     





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>