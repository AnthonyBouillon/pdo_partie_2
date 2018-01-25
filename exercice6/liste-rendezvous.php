<?php include 'bdd.php' ?>
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
                <li><a href="../exercice2/liste-patients.php">Afficher tous les données des patients</a></li>
                <li><a href="../exercice3/patients.php">La liste des patients</a></li>
                <li><a href="../exercice3/profil-patient.php">Profil du patient</a></li>
                <li><a href="../exercice5/ajout-rendezvous.php">Ajouter un rendez-vous</a></li>
                <li><a href="">La liste des rendez-vous</a></li>
                <li><a href="../exercice7/rendezvous.php">Rendez-vous du patient</a></li>
            </ul>
        </nav>
        <h1>La liste des rendez-vous</h1><hr/>

        <?php foreach ($result as $appointments) { ?>  
        
            <div class="jumbotron  div_rendezvous col-lg-6">
                <p><span class="bold"><?= 'Nom du patient : ' ?></span><a href="../exercice7/rendezvous.php?id=<?= $appointments->id ?>"><?= $appointments->lastname . ' ' . $appointments->firstname ?></a></p>
                <p><span class="bold"><?= 'Date et heure du rendez-vous : '?></span><?= $appointments->dateHour; ?></p>
            </div>
        
        <?php } ?>
    </body>
</html>
