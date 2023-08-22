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
    // Include navigation and retrieve list of books from the database
    require_once 'nav.php';
    require_once 'connexion.php';
    $sql = $pdo->query('select * from livre');
    $livres = $sql->fetchall(PDO::FETCH_ASSOC);
?>

<div class='container'><h1 class="display-3">Book list</h1> </div>

<div class='container'>
    <table>
        <thead>
        <tr>
            <th scope="col">code de livre</th>
            <th scope="col">titre</th>
            <th scope="col">auteur</th>
            <th scope="col">edition</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($livres as $livre){?>
            <tr>
                <td  scope="row"><?php echo $livre['codeLivre'] ?></td>
                <td><?php echo $livre['titre']?></td>
                <td><?php echo $livre['auteur']?></td>
                <td><?php echo $livre['dateEdition']?></td>
            </tr>
        <?php }?> 
     </tbody>   
    </table>
</div>
</body>
</html>