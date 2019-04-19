<?php

try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}



if(isset($_GET['n_facture'])){//Si get name dans url
$resultat = $bdd->prepare('DELETE FROM remi_facture WHERE n_facture=:n_facture');
$resultat->execute(array(
'n_facture'=> $_GET['n_facture']
));
///////////////////////redirige vers la page supprimc.php
header("location:supprimfacture.php");


     }

?>
