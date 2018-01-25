<?php
/*** CONNEXION À  LA BASE DE DONNÉE HOSPITALE2N
 * On essaye de se connecte
 * Si cela echoue, récupère les erreurs
 * die : Arrête le script
 ***/
try {
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}

if (!empty($_GET['id'])) {
    $requete = $database->query('SELECT lastname, firstname, DATE_FORMAT(`birthdate`, \'%d-%m-%Y\') AS birthdate, phone, mail FROM patients WHERE id= ' . $_GET['id'] . ' ');
    $result = $requete->fetchAll();
} else {
    $message_error = 'Référez-vous à la liste des patients pour voir leurs profils.';
}

// Affiche le nom et prénom sur la page patient 
$requete_patients = $database->query('SELECT id, lastname, firstname FROM patients');
$results = $requete_patients->fetchAll();

/*** AFFICHE LES RENDEZ-VOUS DES PATIENTS
 *  Date au format français 
 * Affiche le rendez-vous associer à l'id du patient
 * ID récupéré dans l'url
 */
if (!empty($_GET['id'])) {
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$requete = $database->query('SELECT DATE_FORMAT(appointments.dateHour, "%d/%m/%Y à %Hh%i") AS dateHour, patients.id, patients.lastname, patients.firstname FROM appointments INNER JOIN patients ON patients.id = appointments.idPatients WHERE patients.id= ' . $_GET['id'] . '');
$results = $requete->fetchAll(PDO::FETCH_OBJ);
}

/*** MODIFICATION DES INFORMATIONS DU PATIENT
 * Si le champ concerné à une valeur
 * Met à jour à la ligne de l'id récupéré dans l'url
 ***/
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

// Ferme la connexion à la base de donnée
$database = NULL;
