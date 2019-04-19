<?php 
require 'header.php';

//CONNECTION BDD
try
{
	$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8',  '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}


$fournisseur=$bdd->query('SELECT * FROM `remi_societe` WHERE remi_societe.type_societe="fournisseur" ORDER BY remi_societe.name_societe');
$client=$bdd->query('SELECT * FROM `remi_societe` WHERE remi_societe.type_societe="client" ORDER BY remi_societe.name_societe');

?>
<div class="container">
  <div class="row">
    	<div class="col-12"><h2 class="text-center">Annuaire des sociétés</h2></div>
  </div>

<section class="fromsociete">
  <div class ="row">
      <div class="col-12"><h3>Clients</h3></div>
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
<section class="fromsociete">
  <div class ="row">
      <div class="col-12"><h3>Fournisseurs</h3></div>
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
<style>
	.container h2{margin-top:20px;}
	.fromsociete{margin-top:30px;}
	.fromsociete .row{min-height:25px;}
</style>

</div>
<?php require 'footer.php';?>
