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

            <!-- BLOCK RECHERCHE -->
            <form method="POST">
                <input type="search" placeholder="Recherche" name="search">
                <input type="submit" name="send" />
            </form>
        </nav>
        <h1>Tous les patients</h1><hr/>
        <div class="row">
            <!-- Affiche toutes les données lus de la base de donnée -->
            <?php foreach ($result AS $patients) { ?>
                <div class="container jumbotron col-lg-6 identity">
                    <p><span class="bold">Nom : </span><?= $patients->lastname; ?></p>
                    <p><span class="bold">Prénom : </span><?= $patients->firstname; ?></p>
                    <p><span class="bold">Date de naissance : </span><?= $patients->birthdate; ?></p>
                    <p><span class="bold">Téléphone : </span><?= $patients->phone; ?></p>
                    <p><span class="bold">Adresse e-mail : </span><?= $patients->mail; ?></p>
                </div>
            <?php } ?>           
        </div>
        
        <!-- PAGINATION -->
        <div class="row">
            <p class="text-center">
            <?php
            for ($i = 1; $i <= $numberOfPages; $i++) {
                if ($i == $currentPage) {
                    echo ' [ ' . $i . ' ] ';
                } else {
                    echo ' <a href="liste-patients.php?page=' . $i . '">' . $i . '</a> ';
                }
            }
            ?></p>
        </div>
        
        <!-- SUPPRESION D'UN PATIENT -->
        <div class="row">
            <h2 class="text-center">Supprimer un patient et ses rendez-vous</h2><hr/>
            <form method="POST" class="jumbotron center-block">
                <label for="appointment">Supprimer le patient  : </label> 
                <select name="patient_appointment_delete" id="appointment"> 
                    <?php foreach ($result AS $patients) { ?>
                        <option value="<?= $patients->id; ?>">
                            <?= $patients->lastname . ' ' . $patients->firstname; ?>
                        </option>
                    <?php } ?>    
                </select><br/>  
                <input type="submit" value="Supprimer" id="submit"/><br/>
            </form>
        </div>
        
    </body>
</html>
