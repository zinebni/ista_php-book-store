<?php
// Helper page: accept a student code and set it in the session
// then redirect to `modifierEtudiant.php` for editing.
session_start();
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


<?php
// When the form is submitted, validate the code and store it in the session
// then redirect the user to the editor page.
try {
  if (isset($_GET['valider'])) {
    if (!empty($_GET['code'])) {
      $code = $_GET['code'];
      require_once 'connexion.php';
      $sql = $pdo->query('select codeEtudiant from etudiant where codeEtudiant=' . $code);
      $result = $sql->fetch();
      if (!empty($result)) {
        $_SESSION['code'] = $code;
        header('location: modifierEtudiant.php');
        exit();
      } else {
        ?>
        <div class="alert alert-danger" role="alert">Student not found</div>
        <?php
      }
    } else {
      ?>
      <div class="alert alert-danger" role="alert">Please provide the student code to edit</div>
      <?php
    }
  }

} catch (PDOException $e) {
  die($e->getMessage());
}

?>

<div class="container ">


<form method="GET" >
  <div class="mb-3">
    <label for="code"   class="form-label">code</label>
    <input type="number"  name="code" class="form-control" id="code" >
  </div>

  
  <button type="submit" class="btn btn-primary" name="valider">modifier</button>
</form>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>