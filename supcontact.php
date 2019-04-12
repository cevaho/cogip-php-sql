<?php require 'header.php';

try

{
$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', 'webtech_one_becode','BEcode2019');
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
