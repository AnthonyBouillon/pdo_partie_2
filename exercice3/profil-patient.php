<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <title>Affiche le profil du patient</title>
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
        <h1 class="h1_profil">                
            <?php
            // TITRE : IDENTITÉ DU PATIENT OR MESSAGE D'ERREUR
            if (!empty($_GET['id'])) {
                foreach ($result AS $patients) {
                    echo 'Profil du patient : ';
                    echo $patients->lastname . ' ';
                    echo $patients->firstname;
                }
            } else {
                echo $message_error;
            } ?>     
        </h1><hr/>
        
        <?php
        // IDENTITÉ DU PATIENT
        if (!empty($_GET['id'])) {
            foreach ($result AS $patients) { ?>
                <div class="container jumbotron ">
                    <p><span class="bold">Nom : </span><?= $patients->lastname; ?></p>
                    <p><span class="bold">Prénom : </span><?= $patients->firstname; ?></p>
                    <p><span class="bold">Date de naissance : </span><?= $patients->birthdate; ?></p>
                    <p><span class="bold">Téléphone : </span><?= $patients->phone; ?></p>
                    <p><span class="bold">Adresse e-mail : </span><?= $patients->mail; ?></p>
                </div>
        <?php  }
        }
        
        // RENDEZ-VOUS DU PATIENT      
        if (!empty($_GET['id'])) {
        foreach ($results as $appointments) { ?>  
            <div class="jumbotron  div_rendezvous2">
                <p><span class="bold"><?= 'Date et heure du rendez-vous : ' ?></span><?= $appointments->dateHour; ?></p>
            </div>
        <?php }    
        } 
        
        // FORMULAIRE MODIFICATION DU PROFIL
        if (!empty($_GET['id'])) { ?>
            <form method="POST" class="jumbotron center-block">
                <legend class="text-center">Modification du profil du patient</legend>
                <label for="lastName">Nom : </label><input type="text" name="lastname" id="lastName" /><br/>
                <label for="firstName">Prénom : </label><input type="text" name="firstname" id="firstName" /><br/>
                <label for="date">Date de naissance : </label><input type="date" name="birthdate" id="date" /><br/><br/>
                <label for="phone">Téléphone : </label><input type="tel" name="phone" id="phone" /><br/>
                <label for="email">Adresse e-mail : </label><input type="email" name="email" id="email" /><br/>
                <input type="submit" value="Validez" />
            </form> 
            <?php } ?>
    </body>
</html>