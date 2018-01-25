<?php
/*
 * Connexion à la base de donnée
 * Récupère les messages d'erreur pour plus de sécurité
 */
try {
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
}
catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
/*
 * Si elle existe, créer une regex et affichage des balises
 * Si les regex correspondent inserent les données du formulaire
 * Confirme l'inscription
 */
if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
    
    $regexLastname = htmlspecialchars(preg_match('#^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ]{1,60}$#', $_POST['lastname']));
    $regexFirstname = htmlspecialchars(preg_match('#^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ]{1,60}$#', $_POST['firstname']));
    $regexPhone = htmlspecialchars(preg_match('#^[0-9]{0,10}$#', $_POST['phone']));
    $regexEmail = htmlspecialchars(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email']));
    
    if (!empty($_POST['lastname']) == $regexLastname && !empty($_POST['firstname']) == $regexFirstname && !empty($_POST['phone']) == $regexPhone && !empty($_POST['email']) == $regexEmail) {
      
        $requete = $database->prepare("INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (' " . $_POST['lastname'] . " ', ' " . $_POST['firstname'] . " ', ' " . $_POST['birthdate'] . " ', ' " . $_POST['phone'] . " ', ' " . $_POST['email'] . " ') ");
        $requete->execute();
        $agreed = 'Vous êtes bien inscrit';
    }
    $database = NULL;

     // Message d'erreur pour chaque champs si la regex ne correspond pas
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
}
