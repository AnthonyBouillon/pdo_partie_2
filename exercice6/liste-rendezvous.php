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
        
        <div class="container-fluid">
            <div class="row">  
                <h1>La liste des rendez-vous</h1><hr/>
                <?php foreach ($results as $appointments) { ?>             
                    <div class="jumbotron  div_rendezvous col-lg-6">
                        <p><span class="bold"><?= 'Nom du patient : ' ?></span><a href="../exercice7/rendezvous.php?id=<?= $appointments->id ?>"><?= $appointments->lastname . ' ' . $appointments->firstname ?></a></p>
                        <p><span class="bold"><?= 'Date et heure du rendez-vous : ' ?></span><?= $appointments->dateHour; ?></p>
                    </div>
                <?php } ?>
            </div>

            <div class="row">
                <h2 class="text-center">Supprimer un rendez-vous</h2><hr/>
                
                <form method="POST" class="jumbotron center-block">
                    <label for="appointment">Vôtre patient : </label>
                    
                    <select name="appointment_delete" id="appointment">
                        
                        <?php foreach ($results AS $appointments) { 
                            ?>
                            <!-- La valeur des options et l'id du patient -->
                            
                            <option value="<?= $appointments->id; ?>">
                                <!-- Affiche le nom et prénom des patients suivant la valeur de leurs id -->
                                <?= $appointments->lastname . ' ' . $appointments->firstname; ?>
                            </option>
                        <?php } ?>       
                    </select><br/>  
                    
                    <input type="submit" value="Supprimer" id="submit"/><br/>
                </form>
                
            </div>

        </div>
    </body>
</html>

