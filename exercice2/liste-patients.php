<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <title>Affiche la liste des patients</title>
    </head>
    <body>
        
         <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Menu</a></li>
                <li><a href="../exercice1/ajout-patient.php">Ajouter un patient</a></li>
                <li><a href="liste-patients.php">Afficher tous les données des patients</a></li>
                <li><a href="../exercice3/patients.php">La liste des patients</a></li>
                <li><a href="../exercice3/profil-patient.php">Profil du patient</a></li>
                <li><a href="../exercice5/ajout-rendezvous.php">Ajouter un rendez-vous</a></li>
                <li><a href="../exercice6/liste-rendezvous.php">La liste des rendez-vous</a></li>
                <li><a href="../exercice7/rendezvous.php">Rendez-vous du patient</a></li>
            </ul>
        </nav>
        
        <h1>Tous les patients</h1><hr/>
        
        <?php
        
         // Affiche toutes les données lus de la base de donnée
        foreach ($result AS $patients) { ?>
        
            <div class="container jumbotron col-lg-6 identity">
                <p><span class="bold">Nom : </span><?= $patients['lastname']; ?></p>
                <p><span class="bold">Prénom : </span><?= $patients['firstname']; ?></p>
                <p><span class="bold">Date de naissance : </span><?= $patients['birthdate']; ?></p>
                <p><span class="bold">Téléphone : </span><?= $patients['phone']; ?></p>
                <p><span class="bold">Adresse e-mail : </span><?= $patients['mail']; ?></p>
            </div>
        
            <?php } ?>
        
    </body>
</html>
