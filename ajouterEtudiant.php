<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<?php require_once 'nav.php'?>
<?php
// Handle the "add student" form submission.
// - Validate required fields
// - Sanitize input
// - Check for duplicate student code
// - Insert new student into the `etudiant` table inside a transaction
try {
  if (isset($_POST['ajouter'])) {
    // Basic required-field validation
    if (empty($_POST['code']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse']) || empty($_POST['classe'])) {
      ?>
      <div class="alert alert-danger" role="alert">All fields are required</div>
      <?php
    } else {
      // Sanitize incoming values to avoid XSS when echoed back
      $code = htmlspecialchars($_POST['code']);
      $nom = htmlspecialchars($_POST['nom']);
      $prenom = htmlspecialchars($_POST['prenom']);
      $adresse = htmlspecialchars($_POST['adresse']);
      $classe = htmlspecialchars($_POST['classe']);

      // Connect to database and check for existing student code
      require_once 'connexion.php';
      $requete = $pdo->query('select codeEtudiant from etudiant where codeEtudiant=' . $code);
      $trouver = $requete->fetch();

      if (empty($trouver)) {
        // Insert new student inside a transaction
        $pdo->beginTransaction();
        $sql = $pdo->prepare('INSERT INTO etudiant values(?,?,?,?,?)');
        $sql->execute([$code, $nom, $prenom, $adresse, $classe]);
        $pdo->commit();
        ?>
        <div class="alert alert-success" role="alert">Student number <?php echo $code; ?> successfully added</div>
        <?php
      } else {
        // Duplicate code: inform the user
        ?>
        <div class="alert alert-danger" role="alert">Student number <?php echo $code; ?> already exists</div>
        <?php
      }
    }
  }

  ?>
  <a href='listeEtudiants.php'><button>show list</button></a>
  <?php

} catch (PDOException $e) {
  // On error, display message and rollback any open transaction
  $pdo->rollBack();
  die($e->getMessage());
}
?>


<div class="container ">


<form method="POST">
  <div class="mb-3">
    <label for="code"   class="form-label">code</label>
    <input type="number"  name="code" class="form-control" id="code" >
  </div>

  <div class="mb-3">
    <label for="nom"   class="form-label">nom</label>
    <input type="text" name="nom" class="form-control" id="nom">
  </div>

  <div class="mb-3">
    <label for="prenom"  class="form-label">prenom</label>
    <input type="text" name="prenom" class="form-control" id="prenom">
  </div>

  <div class="form-floating">
     <textarea class="form-control" name="adresse" id="adresse" style="height: 100px"></textarea>
     <label for="adresse">adresse</label>
  </div>

  <div class="mb-3">
    <label for="classe"  class="form-label">classe</label>
    <input type="text" name="classe" class="form-control" id="classe">
  </div>

  <button type="submit" class="btn btn-primary" name="ajouter">creer</button>
</form>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>