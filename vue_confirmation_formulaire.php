<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include "composant/head.html";
    ?>
</head>
<body>
<?php
    include "composant/header.html";?>
    <main class="confirmationForm">
<?php
    if($requetePreparee){

        echo "<h1>Merci ".$pseudo." !</h1><br>";

        ?>
        <p>Votre demande à bien était transmise a l'équipe d'<strong>in.fluence</strong>, nous vous répondrons dans les plus brefs délais</p>
        <a class="btn" href="index.php">Retour a l'accueil</a>
        <?php
    }
    else{
        echo "une erreur est survenue";
    }
    ?>

    
    </main>
    <?php
    include "composant/footer.html";
    ?>
</body>

</html>

<?php


?>