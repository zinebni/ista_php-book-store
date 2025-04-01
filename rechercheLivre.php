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
        
            if(!empty($_GET['cherche'])){
                $ch=$_GET['cherche'];
                require_once 'connexion.php';
                $sql=$pdo->query("select * from livre where codeLivre=".$ch);
                $livres=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
        

    
    ?>

    <div class="container">
        <table>
            <thead>
                <th>code</th>
                <th>titre</th>
                <th>auteur</th>
                <th>edition</th>
            </thead>
            <tbody>
                <?php foreach($livres as $livre){?>
                <td><?php echo $livre['codeLivre'] ?></td>
                <td><?php echo $livre['titre']?></td>
                <td><?php echo $livre['auteur']?></td>
                <td><?php echo $livre['dateEdition']?></td>
                <?php }?>
            </tbody>
        </table>
    </div>
    
</body>
</html>