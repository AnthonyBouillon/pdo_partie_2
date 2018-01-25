<?php
// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}  
if (!empty($_GET['id'])) {
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$requete = $database->query('SELECT DATE_FORMAT(appointments.dateHour, "%d/%m/%Y à %Hh%i") AS dateHour, appointments.id, patients.lastname, patients.firstname FROM appointments INNER JOIN patients ON patients.id = appointments.idPatients WHERE appointments.id= ' . $_GET['id'] . '');

/** 
 * fetchAll() va retourner le résultat sous la forme du paramètre demandé
 * PDO::FETCH_OBJ est le paramètre qui permet d'avoir un tableau d'objet.
 */
$results = $requete->fetchAll(PDO::FETCH_OBJ);
}
// Si lesdeux champs sont rempli -> execute le reste..
if (!empty($_POST['date']) && !empty($_POST['time'])) {
    // Gràce à ->prepare on éxécute la requête SQL qui permet d'inserer des valeurs
    $requete = $database->prepare('UPDATE appointments SET dateHour = \'' . $_POST['date'] . ' ' . $_POST['time'] . '\' WHERE id=' . $_GET['id'] . ' ');
    // On execute la requête
    $requete->execute();
    $message_agreed = 'La modification du rendez-vous à était pris en compte';
}
$database = NULL;
