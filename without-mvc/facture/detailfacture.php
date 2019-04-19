<?php
require 'header.php';

try
{
$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', '*','*');

}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

?>

<?php
$factureNum = htmlspecialchars($_GET['n_facture']);
$facture = substr($factureNum, 0, 15);
////////////////SELECTIONNE CHAMP /GETNAME
$affich = $bdd->prepare(
"SELECT *
FROM remi_facture, remi_societe
WHERE remi_facture.name_societe = remi_societe.name_societe
AND n_facture=:n_facture");
$affich->execute(array(
'n_facture'=> $facture
));

$resultat = $bdd->prepare(
"SELECT *
FROM remi_facture, remi_contact
WHERE remi_facture.name_contact = remi_contact.name
AND n_facture=:n_facture");
$resultat->execute(array(
'n_facture'=> $facture
));

///////////////RECUPERE VALEUR URL CODE VISIBLE
?>
<div class="container">
<h3 class="text-center m-5">Facture n°:<?php echo $facture;?></h3>

<h5>Société liée à la facture</h5>
<?php $donnees = $affich->fetch()
?>
<?php if($donnees !=""){
?>
<div class="row m-3">
  <div class="col-4">Nom société</div>
  <div class="col-4">TVA</div>
  <div class="col-4">Type de société</div>
</div>

<div class="row m-3">
  <div class="col-4"><?php echo $donnees[name_societe];?></div>
  <div class="col-4"><?php echo $donnees[n_tva];?></div>
  <div class="col-4"><?php echo $donnees[type_societe];?></div>
</div>

<?php }
else{echo"société supprimée/inexistante";
}
?>
<?php $affich->closeCursor();?>

<h5>Personne de contact</h5>
<?php $donneees = $resultat->fetch()
?>
<?php if($donneees !=""){
?>
<div class="row m-3">
  <div class="col-4">Nom du contact</div>
  <div class="col-4">Email</div>
  <div class="col-4">Phone</div>
</div>
<div class="row m-3">
  <div class="col-4"><?php echo $donneees[name];?></div>
  <div class="col-4"><?php echo $donneees[mail];?></div>
  <div class="col-4"><?php echo $donneees[n_tel];?></div>
</div>

<?php }
else{echo"contact supprimé";
}
?>
<?php $resultat->closeCursor();?>
