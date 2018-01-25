<?php
//// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    // On instancie un objet PDO. Le host est l'adresse locale sur laquelle on se connecte. dbname correspond au nom de la base de données.
    $database = new PDO('mysql:host=localhost; dbname=HospitalE2N; charset=utf8', 'root', '789789');
} catch (Exception $ex) {
    // Die arrête le script PHP en cas d'erreur et affiche ce qu'on lui met en paramètre
    die('Erreur : ' . $ex->getMessage());
}
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$requete = $database->query('SELECT id, lastname, firstname FROM patients');
/** 
 * fetchAll() va retourner le résultat sous la forme du paramètre demandé
 * PDO::FETCH_OBJ est le paramètre qui permet d'avoir un tableau d'objet.
 */
$result = $requete->fetchAll();
if (!empty($_POST['date']) && !empty($_POST['time'])) {
    // Gràce à ->prepare on éxécute la requête SQL qui permet d'inserer des valeurs
    $requete = $database->prepare('INSERT INTO appointments(dateHour, idPatients) VALUES (\'' . $_POST['date'] . ' ' . $_POST['time'] . '\', \'' . $_POST['id'] . '\')');
    // On execute la requête
    $requete->execute();
    $message_agreed = 'Vôtre rendez-vous à était pris en compte';
}
// On affecte NULL à l'objet PDO qui à servie de se connecter, pour pouvoir fermer la connexion à la base de donnée
$database = NULL;
