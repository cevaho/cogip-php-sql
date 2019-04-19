<?php require 'header.php';

try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}


$req = $bdd->query('SELECT * FROM remi_facture');?>

<h3>Supprimer une facture</h3>
<ul>
<?php while ($donnees = $req->fetch()){?>
<li><a href="supfacture.php?id=<?= $donnees['id'];?>&n_facture=<?= $donnees['n_facture'];?>&date_facture=<?= $donnees['date_facture'];?>"><?= $donnees['n_facture'].' '.$donnees['date_facture'];?></a></li>

<?php
}
?>
</ul>
