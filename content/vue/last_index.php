<?php
try
{
$bdd = new PDO('mysql:host=;dbname=;charset=utf8', '','');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}
?>
<br>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>
        Dernière factures :
      </h3>
    </div>
    <div class="col-3">
    Numéro de facture
    </div>
    <div class="col-3">
    Date de facture
    </div>
    <div class="col-3">
    Nom de la société
    </div>
  </div>
  <br>
  <?php
  $resultat_facture = $bdd->query('SELECT * FROM remi_facture LIMIT 5');
  while ($donnees_facture = $resultat_facture->fetch())//tant qu'il y a un resultat
  {
  ?>
  <div class="row">
    <div class="col-3">
    <?php echo $donnees_facture['n_facture'] ?>
    </div>
    <div class="col-3">
    <?php echo $donnees_facture['date_facture'] ?>
    </div>
    <div class="col-3">
    <?php echo $donnees_facture['name_societe'] ?>
    </div>
  </div>
  <?php
  }
  ?>
  <br>
    <div class="row">
      <div class="col-12">
        <h3>
          Dernière contacts :
        </h3>
      </div>
      <div class="col-3">
      Nom
      </div>
      <div class="col-3">
      Téléphone
      </div>
      <div class="col-3">
      E-mail
      </div>
      <div class="col-3">
      Société
      </div>
    </div>
    <br>
  <?php
  $resultat_contact = $bdd->query('SELECT * FROM remi_contact LIMIT 5');
  while ($donnees_contact = $resultat_contact->fetch())//tant qu'il y a un resultat
  {
  ?>
  <div class="row">
      <div class="col-3">
      <?php echo $donnees_contact['name'] ?>
      </div>
      <div class="col-3">
      <?php echo $donnees_contact['n_tel'] ?>
      </div>
      <div class="col-3">
      <?php echo $donnees_contact['mail'] ?>
      </div>
      <div class="col-3">
      <?php echo $donnees_contact['name_societe'] ?>
      </div>
  </div>
  <?php
  }
  ?>
  <br>
    <div class="row">
      <div class="col-12">
        <h3>
          Dernière sociétés :
        </h3>
      </div>
      <div class="col-3">
      Nom de la société
      </div>
      <div class="col-3">
      T.V.A.
      </div>
      <div class="col-3">
      Pays
      </div>
      <div class="col-3">
      Type
      </div>
    </div>
  <br>
  <?php
  $resultat_societe = $bdd->query('SELECT * FROM remi_societe LIMIT 5');
  while ($donnees_societe = $resultat_societe->fetch())//tant qu'il y a un resultat
  {
  ?>
    <div class="row">
      <div class="col-3">
      <?php echo $donnees_societe['name_societe'] ?>
      </div>
      <div class="col-3">
      <?php echo $donnees_societe['n_tva'] ?>
      </div>
      <div class="col-3">
      <?php echo $donnees_societe['n_pays'] ?>
      </div>
      <div class="col-3">
      <?php echo $donnees_societe['type_societe'] ?>
      </div>
    </div>
  <?php
  }
  ?>
</div>
