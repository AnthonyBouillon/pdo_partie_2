<?php
// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$requete = $database->query('SELECT lastname, firstname, DATE_FORMAT(birthdate,  \' %d/%m/%Y \') AS birthdate, phone, mail FROM patients');
// fetchAll() va retourner le résultat sous la forme du paramètre demandé
$result = $requete->fetchAll();
// On affecte NULL à l'objet PDO qui à servie de se connecter, pour pouvoir fermer la connexion à la base de donnée
$database = NULL;
