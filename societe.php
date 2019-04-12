<?php 
require 'header.php';

//CONNECTION BDD
try
{
	$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', 'webtech_one_becode','BEcode2019');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}


$fournisseur=$bdd->query('SELECT * FROM `remi_societe` WHERE remi_societe.type_societe="fournisseur"');
$client=$bdd->query('SELECT * FROM `remi_societe` WHERE remi_societe.type_societe="client"');

?>
<div class="container">
  <div class="row">
    	<div class="col-12"><h2 class="text-center">Annuaire des sociétés</h2></div>
  </div>

<section>
  <div class ="row">
      <div class="col-12">Clients</div>
      <div class ="col-4">Nom de société :</div>
      <div class ="col-4">N° de TVA :</div>
      <div class ="col-4">Pays :</div>
  </div>

<?php
while ($clien = $client->fetch())//tant qu'il y a un resultat
{?>
  <div class ="row">
      <div class ="col-4"><a href="detailsociete.php?societe=<?= $clien['name_societe'];?>"><?php echo $clien['name_societe']?></a></div>
      <div class ="col-4"><?php echo $clien ['n_tva']?></div>
      <div class ="col-4"><?php echo $clien ['n_pays']?></div>
  </div>

<?php
}
?>
</section>
<section>
  <div class ="row">
      <div class="col-12">Fournisseurs</div>
      <div class ="col-4">Nom de société :</div>
      <div class ="col-4">N° de TVA :</div>
      <div class ="col-4">Pays :</div>
  </div>

<?php
while ($fournis = $fournisseur->fetch())//tant qu'il y a un resultat
{
?>
  <div class ="row">
      <div class ="col-4"><a href="detailsociete.php?societe=<?= $fournis['name_societe'];?>"><?php echo $fournis ['name_societe']?></a></div>
      <div class ="col-4"><?php echo $fournis ['n_tva']?></div>
      <div class ="col-4"><?php echo $fournis ['n_pays']?></div>
  </div>

<?php
}
?>
</section>


</div>
<?php require 'footer.php';?>
