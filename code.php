<?php 
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
try {
  if(isset($_GET['valider'])){
    if(!empty($_GET['code'])){ 
        $code=$_GET['code'];
        require_once 'connexion.php';
        $sql=$pdo->query('select codeEtudiant from etudiant where codeEtudiant='.$code);
        $result=$sql->fetch();
        if(!empty($result)){
          
         $_SESSION['code']=$code;
          
          
           header('location: modifierEtudiant.php');
        }else{?> 
         
         <div class="alert alert-danger" role="alert">etudiant non trouver</div>
        
        <?php }
       
    }
    else{
        ?>
        <div class="alert alert-danger" role="alert">donner le code de l'etudiant à modifier</div>
        <?php
    }
   
  }
   
           
} catch(PDOException $e) {
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