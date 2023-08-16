<?php
// Simple login page for library users (students)
// Verifies student code and name, then stores them in session on success.
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
require_once 'nav.php';
// Process login form submission
if (isset($_POST['login'])) {
    if (!empty($_POST['code']) && !empty($_POST['nom'])) {
        $code = htmlspecialchars($_POST['code']);
        $nom = htmlspecialchars($_POST['nom']);

        require_once 'connexion.php';

        // Find a matching student by code and (approximate) name
        $sql = $pdo->query("select * from etudiant where codeEtudiant=" . $code . " and nom like'%" . $nom . "%'");
        $result = $sql->FETCH();
        if (!empty($result)) {
            // Store logged-in student data in session
            $_SESSION['codeE'] = $code;
            $_SESSION['nomE'] = $nom;
            echo 'hello';
        } else {
            echo 'You are not registered in the library';
        }
    }
}

?>
<div class="container ">


<form method="post" >
  <div class="mb-3">
    <label for="code"   class="form-label">code</label>
    <input type="number"  name="code" class="form-control" id="code" >

    <label for="nom"   class="form-label">nom</label>
    <input type="text"  name="nom" class="form-control" id="nom" >
  </div>

  
  <button type="submit" class="btn btn-primary" name="login">login</button>
</form>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>