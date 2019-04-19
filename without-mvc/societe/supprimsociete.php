<?php require 'header.php';

try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}


$req = $bdd->query('SELECT * FROM remi_societe');?>

<h3>Supprimer une societe</h3>
<ul>
<?php while ($donnees = $req->fetch()){?>
<li><a href="supsociete.php?id=<?= $donnees['id'];?>&name_societe=<?= $donnees['name_societe'];?>&n_pays=<?= $donnees['n_pays'];?>"><?= $donnees['n_tel'].' '.$donnees['n_tel'];?></a></li>

<?php
}
?>
</ul>
