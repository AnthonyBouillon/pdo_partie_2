<?php
// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}                 
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$requete = $database->query('SELECT DATE_FORMAT(`appointments`.`dateHour`, \'%d/%m/%Y à %Hh%i\') AS dateHour, `appointments`.`id`, `patients`.`lastname`, `patients`.`firstname` FROM `appointments` INNER JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients`');
$results = $requete->fetchAll(PDO::FETCH_OBJ);

// SUPPRESSION DE RENDEZ-VOUS
if(isset($_POST['appointment_delete'])){
    $requete = $database->query('DELETE FROM `appointments` WHERE `id`= '. $_POST['appointment_delete'] . '');
    // Rafraichissement de la page suite à la suppression du rendez-vous
    header('refresh:0, url=liste-rendezvous.php');
}

// On affecte NULL à l'objet PDO qui à servie de se connecter, pour pouvoir fermer la connexion à la base de donnée
$database = NULL;
