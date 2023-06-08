<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js" defer></script>
    <?php
    include "composant/head.html";
    ?>
</head>
<body>
<?php
    include "composant/header.html";
?>
<main>
    <?php
    
    include "connexion.php";

    $sql = "SELECT * FROM in_influenceur WHERE adherant is true;";
    $requetePreparee = $bd->prepare($sql);
    $requetePreparee->execute();
    $tabLignes = $requetePreparee->fetchAll();
    foreach ($tabLignes as $key => $influenceur) {
        $sql = "SELECT uid,url,nom,compteur FROM in_lien JOIN in_plateform WHERE in_lien.Id_plateform = in_plateform.Id_plateform AND in_lien.Id_influenceur =:id;";
        $requetePreparee = $bd->prepare($sql);
        $requetePreparee->BindValue(":id",$influenceur["Id_influenceur"]);
        $requetePreparee->execute();
        $socials = $requetePreparee->fetchAll();
        $tabLignes[$key]["socials"] = $socials;
    }

    $bd = NULL;


    echo "<h1 class='text-center'>Nos <strong>in.fluenceurs</strong></h1><br>";
    echo "<ul class='cardList'>";

    foreach ($tabLignes as $key => $influenceur) {


        echo "<li><a href='influenceur.php?id=".$influenceur["Id_influenceur"]."'>";
        echo '<div class="card"><div class="img">';
        echo '<img src="'.$influenceur["pdpUrl"].'" alt="">';
        echo '<ul class="tags">';
        foreach ($influenceur["socials"] as $key => $social) {
            $comp = $social["compteur"];
             if(intval($social["compteur"]) > 1000000){
                 $comp = strval($social["compteur"]/1000000)."M";
             }else if (intval($social["compteur"]) > 1000){
                 $comp = strval($social["compteur"]/1000)."K";
             }
            echo '<li id="'.$social["uid"].'" class="stats social '.$social["nom"].'"><img class="svg" src="img/'.$social["nom"].'.svg" alt="social svg"> <p>'.$comp.'</p>'.'</li>';
        }
        echo '</ul></div>';
        echo "<h2>".$influenceur["pseudo"]."</h2>";
        echo "<p>Sous titre</p></div>";
        echo"</a></li>";
    }
    echo "</ul>";

    ?>   
    
    <!--
<div class="card">
    <div class="img">
        <img src="" alt="">
        <ul>
            <li class="youtube">YTB</li>
            <li class="tiktok">TIKTOK</li>
        </ul>
    </div>
    <h2></h2>
    <p></p>
</div>
    -->

</main>
<?php
    include "composant/footer.html";
    ?>
</body>
</html>
