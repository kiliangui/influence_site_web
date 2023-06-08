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
<!--AIzaSyBVYNBvj_INzPu4d6SvzG1zk05SIrGuIfc--->
<body>
    <?php
    include "composant/header.html";

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_URL);
    include "connexion.php";

    $sql = "SELECT * FROM in_influenceur WHERE adherant is true AND `Id_influenceur` = :id;";
    $requetePreparee = $bd->prepare($sql);
    $requetePreparee->BindValue(":id",$id);
    $requetePreparee->execute();
    $influenceur = $requetePreparee->fetch();

    $sql = "SELECT uid,url,nom,compteur FROM in_lien JOIN in_plateform WHERE in_lien.Id_plateform = in_plateform.Id_plateform AND in_lien.Id_influenceur =:id;";
    $requetePreparee = $bd->prepare($sql);
    $requetePreparee->BindValue(":id",$id);
    $requetePreparee->execute();
    $socials = $requetePreparee->fetchAll();


    $bd = NULL;
    ?>
    <main id="influenceur" class="main_i">
        <img src="<?php echo $influenceur["pdpUrl"];?>" alt="">
        <div>
            <h1><?php
                echo $influenceur["pseudo"];   
        ?></h1>
        
        <p><?php
                echo $influenceur["presentation"];?></p>
                <div>
                    <ul>
                        <?php
                        foreach ($socials as $key => $social) {
                            $comp = $social["compteur"];
                        if(intval($social["compteur"]) > 1000000){
                            $comp = strval($social["compteur"]/1000000)."M";
                        }else if (intval($social["compteur"]) > 1000){
                            $comp = strval($social["compteur"]/1000)."K";
                        }
                            echo "<li id='".$social["uid"]."' class='social stats ".$social["nom"]."'><img class='svg' src='img/".$social["nom"].".svg' alt='social svg'><p>".$comp."</p>"."<li>";
                        }

                        ?>
                    </ul>
                </div>
        </div>
    </main>
    <?php
    include "composant/footer.html";
    ?>
    
    
    
</body>
</html>


