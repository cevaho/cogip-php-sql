<?php require 'header.php';


//////////////////////////////CONNECTION BDD
try

{
$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', 'webtech_one_becode','BEcode2019');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

$resultat = $bdd->query('SELECT * FROM remi_contact ORDER BY name ASC');
?>

<div class="container">
  <div class="row">
    <div class="col-12"><h2 class="text-center">Annuaire des contacts</h2></div>
  </div>
<?php
while ($donnees = $resultat->fetch())//tant qu'il y a un resultat
{?>
  <div class ="row">
      <div class ="col-md-3">
        <a href="detailcontact.php?name=<?= $donnees['name'];?>&first_name=<?= $donnees['first_name'];?>"><?= $donnees['name'].' '.$donnees['first_name'];?></a>
      </div>
      <div class ="col-md-3"><?php echo $donnees ['n_tel']?></div>
      <div class ="col-md-3"><?php echo $donnees ['mail']?></div>
      <div class ="col-md-3"><?php echo $donnees ['name_societe']?></div>
    </div>

<?php

}?>
  </div>
<?php require 'footer.php';?>
