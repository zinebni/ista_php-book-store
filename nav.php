<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<!-- Navigation partial: top menus for authentication, students, books, and loans -->
<!-- login link -->
<nav class="navbar navbar-dark bg-dark">
<div class="container-fluid">
   
  <a class="navbar-brand" href="login.php">login</a>
    
    
</div>    
</nav>
<!-- Student management navigation -->
   <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">gestion des etudiants</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#etudiants" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="etudiants">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ajouterEtudiant.php">nouveau etudiants</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="supEtudiant.php">supprimer un etudiant</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="code.php">modifier informations</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="selectionnerEtudiant.php">selectionner</a>
        </li>

        
      </ul>
      <!-- search bar for student lookup -->
      <form class="d-flex" methode="get" action="rechercheEtudiant.php">
       
        <input name='cherche' class="form-control me-2" type="search" placeholder="rechercher"  aria-label="Search">
        
        <button class="btn btn-outline-success" type="submit">Search</button>

      </form>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="listeEtudiants.php">liste d'etudients</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
   
<!---------------------------------------------------------------------------------------------------->
<!--nav de livre-->
<nav class="navbar navbar-dark bg-primary">
<div class="container-fluid">
    <a class="navbar-brand" href="#">gestion des livres</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#livre" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="livre">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ajouterLivre.php">ajouter un livre</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="supLivre.php">supprimer un livre</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="modifierLivre.php">modifier</a>
        </li>
       

        <li class="nav-item">
          <a class="nav-link" href="selectionnerLivre.php">selectionner</a>
        </li>

        
        
        
      </ul>
      <!--bare de recherche-->
      <form class="d-flex" methode="GET" action="rechercheLivre.php">
        <input name="cherche" class="form-control me-2" type="search" placeholder="chercher par numero " aria-label="Search" >
        <button class="btn btn-outline-success" type="submit" name='search'>Search</button>
      </form>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="listeLivre.php">liste des livres</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>


<!---------------------------------------------------------------------------------------------------->
<!-- Loan management navigation -->
   <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">gestion des emprunts</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#emprunts" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="emprunts">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="emprint.php">emprunter un livre</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">retour d'un livre</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">liste des livres</a>
        </li>

        
        
        
      </ul>
      
    </div>
  </div>
   </nav>



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>