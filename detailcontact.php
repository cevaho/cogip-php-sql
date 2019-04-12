<?php
require 'header.php';

try
{
$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', 'webtech_one_becode','BEcode2019');

}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

?>

<?php
////////////////SELECTIONNE CHAMP /GETNAME
$affich = $bdd->prepare("SELECT * FROM remi_contact WHERE name=:name");
$affich->execute(array(
'name'=> $_GET['name']
));

////////SELECTIONNE FACTURE/NOM GET
$resultat = $bdd->prepare("SELECT * FROM remi_facture WHERE name_contact=:name_contact");
$resultat->execute(array(
'name_contact'=> $_GET['name']
));

///////////////RECUPERE VALEUR URL
?>
<div class="container">
<h3 class="text-center m-5"><?php echo $_GET[name];?> <?php echo $_GET[first_name];?> :</h3>

<?php $donneees = $affich->fetch()
?>
<div class="row m-3">
  <div class="col-6">Contact :</div>
  <div class="col-6"><?php echo $_GET[name];?></div>
</div>
<div class="row m-3">
  <div class="col-6">Nom de la société :</div>
  <div class="col-6"><?php echo $donneees["name_societe"];?></div>
</div>
<div class="row m-3">
  <div class="col-6">Email :</div>
  <div class="col-6"><?php echo $donneees["mail"];?></div>
</div>
<div class="row m-3">
  <div class="col-6">Phone :</div>
  <div class="col-6"><?php echo $donneees["n_tel"];?></div>
</div>

<?php $affich->closeCursor();?>
<h4>Contact pour les factures :</h4>
<div class="row m-3">
  <div class="col-6">N°facture</div>
  <div class="col-6">Date</div>
</div>

<?php
while ($donnees = $resultat->fetch())
{
?>
<div class="row m-3">
  <div class="col-6"><?= $donnees["n_facture"];?></div>
  <div class="col-6"><?= $donnees["date_facture"];?></div>
</div>
<?php
}
?>
</div>
<?php require 'footer.php';
?>
