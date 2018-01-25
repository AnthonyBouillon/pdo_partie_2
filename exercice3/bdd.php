<?php
/*
 * Connexion à la base de donnée
 * Récupère les messages d'erreur pour plus de sécurité
 */
try {
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}

/*
 * Si l'id existe 
 * Selectionne l'id, nom et prénom de la table patients
 * Assigne à une variable la lecture de toutes les lignes
 * Si le profil n'existe pas affiche un message d'erreur
 */
if (!empty($_GET['id'])) {
    $requete = $database->query('SELECT lastname, firstname, DATE_FORMAT(`birthdate`, \'%d-%m-%Y\') AS birthdate, phone, mail FROM patients WHERE id= ' . $_GET['id'] . ' ');
    $result = $requete->fetchAll();
} else {
    $message_error = 'Référez-vous à la liste des patients pour voir leurs profils.';
}
/**
 * Si le champ concerné à une valeur, dans ce cas ça le met à jour
 * Et ce pour chaques champs séparés ou unis
 */
if(!empty($_POST['lastname'])){
    $lastname = $_POST['lastname'];
    $requete = $database->prepare('UPDATE patients SET lastname=\'' . $lastname . '\' WHERE  id=' . $_GET['id'] . ' ');
    $requete->execute();
}
if(!empty($_POST['firstname'])){
    $firstname = $_POST['firstname'];
    $requete = $database->prepare('UPDATE patients SET firstname=\'' . $firstname . '\' WHERE  id=' . $_GET['id'] . ' ');
    $requete->execute();
}
if(!empty($_POST['birthdate'])){
    $birthdate = $_POST['birthdate'];
    $requete = $database->prepare('UPDATE patients SET birthdate=\'' . $birthdate . '\' WHERE  id=' . $_GET['id'] . ' ');
    $requete->execute();
}
if(!empty($_POST['phone'])){
    $phone = $_POST['phone'];
    $requete = $database->prepare('UPDATE patients SET phone=\'' . $phone . '\' WHERE  id=' . $_GET['id'] . ' ');
    $requete->execute();
}
if(!empty($_POST['email'])){
    $email = $_POST['email'];
    $requete = $database->prepare('UPDATE patients SET mail=\'' . $email . '\' WHERE  id=' . $_GET['id'] . ' ');
    $requete->execute();
}
/* Affiche le nom et prénom sur la page patient */
$requete_patients = $database->query('SELECT id, lastname, firstname FROM patients');
$results = $requete_patients->fetchAll();

// Ferme la connexion à la base de donnée
$database = NULL;
