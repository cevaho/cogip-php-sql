<?php require 'header.php';

try

{
$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', 'webtech_one_becode','BEcode2019');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}


$req = $bdd->query('SELECT * FROM remi_contact');?>

<h3>Supprimer un contact</h3>
<ul>
<?php while ($donnees = $req->fetch()){?>
<li><a href="supcontact.php?id=<?= $donnees['id'];?>&name=<?= $donnees['name'];?>&first_name=<?= $donnees['first_name'];?>"><?= $donnees['name'].' '.$donnees['first_name'];?></a></li>

<?php
}
?>
</ul>
