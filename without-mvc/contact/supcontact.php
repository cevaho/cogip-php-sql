<?php require 'header.php';

try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}



if(isset($_GET['name'])){//Si get name dans url
$resultat = $bdd->prepare('DELETE FROM remi_contact WHERE name=:name');
$resultat->execute(array(
'name'=> $_GET['name']
));
///////////////////////redirige vers la page supprimcontact.php
header("location:supprimcontact.php");


     }

?>
