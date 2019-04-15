<?php require 'header.php';
//////////////////////////////CONNECTION BDD
try

{
$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}
///////////req remi facture ts les champs et remi sct pour recuperer le type
$resultat = $bdd->query('SELECT * FROM `remi_facture` INNER JOIN remi_societe ON remi_facture.name_societe = remi_societe.name_societe ');?>


<h3 class="text-center">COGIP : Listing facture</h3>
<div class="row m-3">
  <div class="col-3">N°facture</div>
  <div class="col-3">Date</div>
  <div class="col-3">Société</div>
  <div class="col-3">Type</div>
</div>
<?php
while ($donnees = $resultat->fetch())
{
?>
<div class="row m-3">
  <div class="col-3">
  <a href="detailfacture.php?n_facture=<?= $donnees['n_facture'];?>"><?= $donnees['n_facture'];?></a>
</div>

  <div class="col-3"><?= $donnees["date_facture"];?></div>
  <div class="col-3"><?= $donnees["name_societe"];?></div>
  <div class="col-3"><?= $donnees["type_societe"];?></div>
</div>
<?php
}

require 'footer.php';?>
