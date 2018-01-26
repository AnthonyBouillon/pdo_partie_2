<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <title>Affiche la liste des patients</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Menu</a></li>
                <li><a href="../exercice1/ajout-patient.php">Ajouter un patient</a></li>
                <li><a href="../exercice2/liste-patients.php">Afficher tous les données des patients</a></li>
                <li><a href="../exercice3/patients.php">La liste des patients</a></li>
                <li><a href="../exercice3/profil-patient.php">Profil du patient</a></li>
                <li><a href="../exercice5/ajout-rendezvous.php">Ajouter un rendez-vous</a></li>
                <li><a href="../exercice6/liste-rendezvous.php">La liste des rendez-vous</a></li>
                <li><a href="../exercice7/rendezvous.php">Rendez-vous du patient</a></li>
            </ul>
        </nav>
        <h1>La liste des patients</h1><hr/>
        <?php 
        // Un lien qui diffère suivant l'id de la ligne lu
        foreach ($results AS $patient) { ?>
            <div class="container">
                <p><i class="fa fa-user"></i><a href="profil-patient.php?id=<?= $patient->id ?>"><?= $patient->lastname . ' ' . $patient->firstname; ?></a></p>
            </div>
            <?php } ?>
    </body>
</html>
