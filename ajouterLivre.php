<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
  <?php
  require_once 'nav.php';
  if(isset($_POST['ajouter'])){
    if( !empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['edition'])){
                    
                    $titre=htmlspecialchars($_POST['titre']);
                    $auteur=htmlspecialchars($_POST['auteur']);
                    $edition=htmlspecialchars($_POST['edition']);


                    require_once 'connexion.php';
                   
                   
                    $pdo->beginTransaction();
                    $sql=$pdo->prepare('INSERT INTO livre(titre,auteur,dateEdition) values (?,?,?) ');
                    $sql->execute([$titre,$auteur,$edition]);
                    $pdo->commit();
                 
                    ?>
                    
                    <div class="alert alert-success" role="alert"> livre <?php echo $titre ?> est bien ajouter </div>
                    
                    <?php
    }else{
      ?>
                    
                    <div class="alert alert-danger" role="alert">  veillez saisir tous les champs </div>
                    
                    <?php
    }

  }
  ?>

<div class="container ">



<form method="POST">
  

  <div class="mb-3">
    <label for="titre"   class="form-label">titre</label>
    <input type="text" name="titre" class="form-control" id="titre">
  </div>

  <div class="mb-3">
    <label for="auteur"  class="form-label">auteur</label>
    <input type="text" name="auteur" class="form-control" id="auteur">
  </div>

  

  <div class="mb-3">
    <label for="edition"  class="form-label">date d'edition</label>
    <input type="text" name="edition" class="form-control" id="edition">
  </div>

  <button type="submit" class="btn btn-primary" name="ajouter">creer</button>
</form>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>