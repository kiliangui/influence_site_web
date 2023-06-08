<?php
    $socialType1 = filter_input(INPUT_POST,"socialType1", FILTER_SANITIZE_STRING);
    $socialUrl1 = filter_input(INPUT_POST,"socialUrl1", FILTER_SANITIZE_URL);

    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
    $mail = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $presentation = filter_input(INPUT_POST, 'presentation', FILTER_SANITIZE_STRING);

    include "connexion.php";

    $sql = "INSERT INTO in_influenceur(mail,pseudo,nom,prenom,presentation,date_demande) VALUES(:mail,:pseudo,:nom,:prenom,:presentation,CURRENT_DATE());";
    $requetePreparee = $bd->prepare($sql);
    $requetePreparee->BindValue(':mail', $mail);
    $requetePreparee->BindValue(':pseudo', $pseudo);
    $requetePreparee->BindValue(':nom', $nom);
    $requetePreparee->BindValue(':prenom', $prenom);
    $requetePreparee->BindValue(':presentation', $presentation);
    $requetePreparee->execute();

    $userId = $bd->lastInsertId();

    $i = 1;
    $socialType = filter_input(INPUT_POST,"socialType".$i, FILTER_SANITIZE_STRING);
    $socialUrl = filter_input(INPUT_POST,"socialUrl".$i, FILTER_SANITIZE_URL);
    while ($socialType != "" && $socialUrl != null && $i < 30) {

        $sql = "INSERT INTO in_lien (Id_lien, pseudo, url, Id_plateform, Id_influenceur) VALUES (NULL, :pseudo, :url, :plateformId, :userId); ";
        $requetePreparee = $bd->prepare($sql);
        $requetePreparee->BindValue(':pseudo', null);
        $requetePreparee->BindValue(':userId', $userId);
        $requetePreparee->BindValue(':plateformId', $socialType);
        $requetePreparee->BindValue(':url', $socialUrl);
        $requetePreparee->execute();
        $i=$i+1;
        $socialType = filter_input(INPUT_POST,"socialType".$i, FILTER_SANITIZE_STRING);
        $socialUrl = filter_input(INPUT_POST,"socialUrl".$i, FILTER_SANITIZE_URL);
    }

    
    $bd = NULL;

    include "vue_confirmation_formulaire.php";


