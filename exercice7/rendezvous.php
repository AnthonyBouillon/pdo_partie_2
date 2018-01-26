<?php include 'bdd.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <title>Affiche le rendez-vous du patient</title>
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
                <li><a href="">Rendez-vous du patient</a></li>
            </ul>
        </nav>
        <h1><?php
             /*  
              *  Affiche le nom et prénom du client suivant l'id récupéré 
              *  Affiche un message d'erreur si aucun id est affiché
             */
            if (!empty($_GET['id'])) {
                foreach ($results AS $appointments) {
                    echo 'Rendez-vous du patient : ';
                    echo $appointments->lastname . ' ';
                    echo $appointments->firstname;
                }
            }else{
                echo 'Référez-vous à la liste des rendez-vous';
            }
            ?></h1><hr/>
            
        <?php
        if (!empty($_GET['id'])) {
        foreach ($results as $appointments) { ?>  
            <div class="jumbotron  div_rendezvous2">
                <p><span class="bold"><?= 'Nom du patient : ' ?></span><?= $appointments->lastname . ' ' . $appointments->firstname ?></p>
                <p><span class="bold"><?= 'Date et heure du rendez-vous : ' ?></span><?= $appointments->dateHour; ?></p>
            </div>
        <?php } } ?>

        <form method="POST" class="jumbotron center-block">
            <legend class="text-center">Modification du rendez-vous : </legend>
            <label for="date">Date du rendez-vous  : </label><input type="date" name="date" id="date" /><br/><br/>
            <label for="time">Heure du rendez-vous  : </label><input type="time" name="time" id="time" /><br/><br/>
            <input type="submit" value="Validez" id="submit"/><br/>
        </form> 

        <p class="text-center"><?php if (!empty($_POST['date']) && !empty($_POST['time'])) { $message_agreed; }?></p>

    </body>
</html>
