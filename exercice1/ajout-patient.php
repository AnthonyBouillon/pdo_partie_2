<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <title>Écrire des données</title>
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

        <h1 class="text-center">Créer un formulaire permettant d'y inserer un patient</h1><hr/>

        <form method="POST" class="jumbotron center-block">
            <legend class="text-center h1_ajout_patient">Formulaire d'inscription</legend>

            <label for="lastName">Nom : </label>
            <input type="text" name="lastname" id="lastName" required /><br/>
            <!-- Si le champ n'est pas vide et qu'il ne correspond pas à la regex . Affiche un message d'erreur -->
            <span class="red"><?php if(!empty($_POST['lastname']) && !empty($_POST['lastname']) != $regexLastname){ echo $error_lastname; } ?></span><br/>
                
            <label for="firstName">Prénom : </label>
            <input type="text" name="firstname" id="firstName" required /><br/>
            <span class="red"><?php if(!empty($_POST['firstname']) && !empty($_POST['firstname']) != $regexFirstname){ echo $error_firstname; } ?></span><br/>
                
            <label for="date">Date de naissance : </label>
            <input type="date" name="birthdate" id="date" required /><br/><br/>
                
            <label for="phone">Téléphone : </label>
            <input type="tel" name="phone" id="phone" required /><br/>
            <span class="red"><?php if(!empty($_POST['phone']) && !empty($_POST['phone']) != $regexPhone){ echo $error_phone; } ?></span><br/>
                
            <label for="email">Adresse e-mail : </label>
            <input type="email" name="email" id="email" required /><br/>
            <span class="red"><?php if(!empty($_POST['email']) && !empty($_POST['email']) != $regexEmail){ echo $error_email; } ?></span><br/>
                
            <input type="submit" value="Validez" id="submit"/><br/>      
        </form>
        <p class="text-center confirmation"><?php if(!empty($_POST)){ echo $agreed; } ?></p>
    </body>
</html>