<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <?php
    include "composant/head.html";
    ?>
    <script src="script/script.js" defer></script>

</head>
<body>
    <?php
    include "composant/header.html";
    include "connexion.php";

                            $sql = "SELECT * FROM in_plateform;";
                            $requetePreparee = $bd->prepare($sql);
                            $requetePreparee->execute();
                            $tabLignes = $requetePreparee->fetchAll();
                            $bd = null;
    ?>

<div id="contactP">
    <main >
    <h1 ><strong>Contactez</strong> nous !</h1>
    <p>Envie de développer votre projet avec nous ?<br>
Contactez-nous maintenant et avançons ensemble !
</p>
    <form action="ctrl_formulaire.php" method="post">
        <h2>Informations</h2>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo">
        </div>
        <div>
            <label for="mail">Mail :</label>
            <input type="text" name="mail" id="mail">
        </div>
        
        
        <div>
            <label for="presentation">Présentation :</label>
            <textarea name="presentation" id="presentation" cols="30" rows="10"></textarea>
        </div>
        <h2 id="rs">Réseaux sociaux</h2>
        <div>
            <ul id="formSocials">
                <li > 
                    <div>
                        <label for="socialType1">Quel réseaux ?</label>
                        <select name="socialType1" id="socialType1">
                            <option value="">Choisir une option</option>
                            <?php
                            foreach ($tabLignes as $key => $plateform) {
                                echo "<option value='".$plateform["Id_plateform"]."'>".$plateform["nom"]."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                        <div class="flex1">
                            <label for="socialUrl1">URL du profil</label>
                            <div class="blockUrl">
                            <input type="text" name="socialUrl1" id="socialUrl1">
                            <button class="first remove">X</button>
                        </div>
                        </div>
                        
                            
                </li>
            </ul>
            <button id="add">Ajouter</button>
        </div>
        <button id="btnenv" type="submit">ENVOYEZ</button>
    </form>
    <p class="conditionForm">En remplissant le présent formulaire de contact à l’attention de in.fluence, responsable de traitement, celle-ci traitera vos données personnelles afin de pouvoir satisfaire au mieux votre demande.</p>
    </main>
    <aside>
             <div>
                 <p class="heading">Email</p>
                 <p><a href="mailto:influence@gmail.com">influence@gmail.com</a> </p>
                        </div>    
                        <div>
                 <p class="heading">Socials</p>
                 <p><a href="http://instagram.com" target="_blank" rel="noopener noreferrer">Instagram</a></p>
                 
                 <p><a href="http://twitter.com" target="_blank" rel="noopener noreferrer">Twitter</a></p>
                 
                 <p><a href="http://facebook.com" target="_blank" rel="noopener noreferrer">Facebook</a></p>
                        </div>               
    </aside>
                        </div>
    <?php
    include "composant/footer.html";
    ?>
</body>
</html>