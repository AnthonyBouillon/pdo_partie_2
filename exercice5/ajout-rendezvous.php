<?php include 'bdd.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <title>Ajouter un rendez-vous</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Menu</a></li>
                <li><a href="../exercice1/ajout-patient.php">Ajouter un patient</a></li>
                <li><a href="../exercice2/liste-patients.php">Afficher tous les données des patients</a></li>
                <li><a href="../exercice3/patients.php">La liste des patients</a></li>
                <li><a href="../exercice3/profil-patient.php">Profil du patient</a></li>
                <li><a href="">Ajouter un rendez-vous</a></li>
                <li><a href="../exercice6/liste-rendezvous.php">La liste des rendez-vous</a></li>
                <li><a href="../exercice7/rendezvous.php">Rendez-vous du patient</a></li>
            </ul>
        </nav>
        <h1 class="text-center">Prenez un rendez-vous</h1><hr/>
        
        <!-- FORMULAIRE D'AJOUT DE RENDEZ-VOUS -->
        <form method="POST" class="jumbotron center-block"> 
            <label for="appointment">Vôtre patient : </label><select name="id" class="select_ajoutRendezVous" id="appointment">

                <?php foreach ($result AS $patients) { ?>
                    <!-- La valeur des options et l'id du patient -->
                    <option value="<?= $patients->id ?>">
                        <!-- Affiche le nom et prénom des patients suivant la valeur de leurs id -->
                        <?= $patients->lastname . ' ' . $patients->firstname ?>
                    </option>
                <?php } ?>  
                    
            </select><br/>
            <label for="date">Date du rendez-vous  : </label><input type="date" name="date" id="date" /><br/><br/>
            <label for="time">Heure du rendez-vous  : </label><input type="time" name="time" id="time" /><br/><br/>
            <input type="submit" value="Validez" id="submit"/><br/>
        </form>
        <!-- Message de validation de prise de rendez-vous -->
        <p class="text-center"><?php if (!empty($_POST['date']) && !empty($_POST['time'])) { echo $message_agreed;} ?></p>
    </body>
</html>