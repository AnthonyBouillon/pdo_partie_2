<?php

// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
/* * * LES VERIFICATIONS DU FORMULAIRE
 * Si les champs ne sont pas vide
 * Convertit les caractères spéciaux en entités HTML
 * Assigne une regex avec le champ concerné
 * * */
if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
    $regexLastname = htmlspecialchars(preg_match('#^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ]{1,60}$#', $_POST['lastname']));
    $regexFirstname = htmlspecialchars(preg_match('#^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ]{1,60}$#', $_POST['firstname']));
    $regexPhone = htmlspecialchars(preg_match('#^[0-9]{0,10}$#', $_POST['phone']));
    $regexEmail = htmlspecialchars(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email']));
    /*
     *  Création du message d'erreur si différent de la regex assigné au champ
     * Insere les données du formulaire si les regex correspondent aux champs
     * Message de confirmation d'inscription
     */
    if (!empty($_POST['lastname']) && !empty($_POST['lastname']) != $regexLastname) {
        $error_lastname = 'Seuls les lettres, nombres et accents sont autorisés';
    }
    if (!empty($_POST['firstname']) && !empty($_POST['firstname']) != $regexFirstname) {
        $error_firstname = 'Seuls les lettres, nombres et accents sont autorisés';
    }
    if (!empty($_POST['phone']) && !empty($_POST['phone']) != $regexPhone) {
        $error_phone = 'Le numéro doit-être écrit sans espaces : 0105055587';
    }
    if (!empty($_POST['email']) && !empty($_POST['email']) != $regexEmail) {
        $error_email = 'Votre email doit-être de ce format : exemple@email.com';
    }

    if (!empty($_POST['lastname']) == $regexLastname && !empty($_POST['firstname']) == $regexFirstname && !empty($_POST['phone']) == $regexPhone && !empty($_POST['email']) == $regexEmail) {
        $requete = $database->prepare('INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES ( \'' . $_POST['lastname'] . '\' , \'' . $_POST['firstname'] . '\' ,  \'' . $_POST['birthdate'] . '\', \'' . $_POST['phone'] . '\' , \'' . $_POST['email'] . '\') ');
        $requete->execute();
        $agreed = 'Vous êtes bien inscrit';
    }
}
// On affecte NULL à l'objet PDO qui à servie à se connecter, pour pouvoir fermer la connexion à la base de donnée
$database = NULL;