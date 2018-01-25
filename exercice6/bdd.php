<?php
// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}                 
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$requete = $database->query('SELECT DATE_FORMAT(appointments.dateHour, "%d/%m/%Y à %Hh%i") AS dateHour, patients.id, patients.lastname, patients.firstname FROM appointments INNER JOIN patients ON patients.id = appointments.idPatients');
/** 
 * fetchAll() va retourner le résultat sous la forme du paramètre demandé
 * PDO::FETCH_OBJ est le paramètre qui permet d'avoir un tableau d'objet.
 */
$result = $requete->fetchAll(PDO::FETCH_OBJ);
// On affecte NULL à l'objet PDO qui à servie de se connecter, pour pouvoir fermer la connexion à la base de donnée
$database = NULL;
