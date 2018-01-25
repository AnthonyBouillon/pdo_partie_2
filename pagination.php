<?php

//Nous récupérons le contenu de la requête dans $retour_total
$requete = $database->query('SELECT COUNT(*) AS total FROM patients');
$result = $requete->fetchAll(PDO::FETCH_ASSOC);

foreach($result AS $total){
    echo $total['total'];
    $messagesParPage = 3;
    $nombreDePages=ceil($total['total']/$messagesParPage);
}
if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$requete = $database->query('SELECT * FROM patients ORDER BY id DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
 
foreach($requete AS $donnees_messages) // On lit les entrées une à une grâce à une boucle
{

     echo $donnees_messages['lastname'];

}
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }	
     else //Sinon...
     {
          echo ' <a href="liste-patients.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';

-----------------------------