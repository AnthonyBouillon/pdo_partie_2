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




//Nous récupérons le contenu de la requête dans $retour_total
$requete = $database->query('SELECT COUNT(*) AS total FROM patients');
$result = $requete->fetchAll(PDO::FETCH_ASSOC);

foreach($result AS $total){
    $messagesParPage = 3;
    $nombreDePages=ceil($total['total']/$messagesParPage);
}

if(isset($_GET['page'])){
     $pageActuelle=intval($_GET['page']);
     if($pageActuelle>$nombreDePages){
          $pageActuelle=$nombreDePages;
     }
}
else {
     $pageActuelle=1;
}
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$requete = $database->query('SELECT * FROM patients ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
$result = $requete->fetchAll(PDO::FETCH_ASSOC);







/*** SUPPRESSION DU PATIENT ET DE SES RENDEZ-VOUS
 * Si la l'id du patient existe
 * Supprimer dans la table rendez-vous et patients le champ de l'id sélectionné
 ***/
if(isset($_POST['patient_appointment_delete'])){
$requete = $database->query('DELETE FROM `appointments` WHERE idPatients=' . $_POST['patient_appointment_delete'] . '');
$requete = $database->query('DELETE FROM `patients` WHERE id=' . $_POST['patient_appointment_delete'] . '');
// Si la requête est exécuté, actualisé
header('refresh:0, url=liste-patients.php');
}

/*** BARRE DE RECHERCHE DES PATIENTS
 * Affiche le résultat de la valeur donnée dans la barre de recherche
 ***/
if(isset($_POST['search'])){
 $requete = $database->query('SELECT id, lastname, firstname, DATE_FORMAT(birthdate,  \' %d/%m/%Y \') AS birthdate, phone, mail  FROM patients WHERE lastname LIKE  \'%' . $_POST['search'] . '%\'  OR firstname LIKE \'%' . $_POST['search'] . '%\' ');
 $result = $requete->fetchAll();
}
// On affecte NULL à l'objet PDO qui à servie de se connecter, pour pouvoir fermer la connexion à la base de donnée
$database = NULL;
