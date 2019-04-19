<?php

try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8',  '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}



if(isset($_GET['name_societe'])){//Si get name dans url
$resultat = $bdd->prepare('DELETE FROM remi_societe WHERE name_societe=:name_societe');
$resultat->execute(array(
'name_societe'=> $_GET['name_societe']
));
///////////////////////redirige vers la page supprimc.php
header("location:supprimsociete.php");


     }

?>
