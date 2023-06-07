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
    <h1>Envoie ta <strong>candidature</strong> !</h1><br>
    <form action="c_formulaire.php" method="post">
        <div>
            <label for="pseudo">pseudo :</label>
            <input type="text" name="pseudo" id="pseudo">
        </div>
        <div>
            <label for="mail">mail :</label>
            <input type="text" name="mail" id="mail">
        </div>
        <div>
            <label for="nom">nom :</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="prenom">prénom :</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div>
            <label for="presentation">presentation :</label>
            <textarea name="presentation" id="presentation" cols="30" rows="10"></textarea>
        </div>
        <div>
            <ul id="formSocials">
                <li > 
                    <div>
                        <label for="socialType1">Quel réseaux ?</label>
                        <select name="socialType1" id="socialType1">
                            <option value="">select an option</option>
                            <?php
                            foreach ($tabLignes as $key => $plateform) {
                                echo "<option value='".$plateform["Id_plateform"]."'>".$plateform["nom"]."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="flex1">
                        <label for="socialUrl1">réseaux</label>
                        <input type="text" name="socialUrl1" id="socialUrl1">
                    </div>
                    <button class="first">X</button>
                </li>
            </ul>
            <button id="add">Add</button>
        </div>
        <button type="submit">ENVOYE N0US TA CANDID</button>
    </form>
    <?php
    include "composant/footer.html";
    ?>
</body>
</html>