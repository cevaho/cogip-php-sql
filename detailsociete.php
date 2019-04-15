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
$societeName=htmlspecialchars($_GET[societe]);

$societa= $bdd->prepare("
	SELECT 
		remi_societe.n_tva as societva,
		remi_societe.type_societe as societype
	FROM 
		`remi_societe`
	WHERE
		remi_societe.name_societe =:societar
");
$societa->execute(array(
	'societar'=> $societeName
));

$contactSociete= $bdd->prepare("
	SELECT 
		remi_contact.mail as mail,
		remi_contact.n_tel as tel,
		remi_contact.name as namer,
		remi_contact.name_societe as societe
	FROM 
		`remi_contact`
	WHERE
		remi_contact.name_societe =:societ
");
$contactSociete->execute(array(
	'societ'=> $societeName
)); 

$factureDate= $bdd->prepare("
	SELECT 
		remi_facture.n_facture as numero,
		remi_facture.date_facture as date,
		remi_facture.name_contact as namecont,
		remi_facture.name_societe as societe
	FROM 
		`remi_facture`
	WHERE
		remi_facture.name_societe =:societo
");
$factureDate->execute(array(
	'societo'=> $societeName
));
/*
SELECT 
	remi_facture.n_facture as numero,
	remi_facture.date_facture as date,
	remi_facture.name_contact as namecont,
	remi_contact.mail as mail,
	remi_contact.n_tel as tel,
	remi_contact.name_societe as societe
FROM 
	`remi_facture`
INNER JOIN
	`remi_contact`
ON 
	remi_facture.name_contact = remi_contact.name
AND
	remi_facture.name_societe ='$societeName'
$factur = $factureDate->fetch();
$facturDeux = $factureDate->fetch();
$contacteur = $bdd->query('SELECT * FROM remi_facture WEHERE remi_facture.');
$contact=$contacteur->fetch();*/

?>
<div class="container">
  <div class="row">
    	<div class="col-12"><h2 class="text-center">Société : <?php echo $societeName;?></h2></div>
  </div>
  <div class="row">
	<div class="col-6">
		<section>
			<div class="row">
				<div class="col-12">
<?php 
$societi = $societa->fetch()
?>
						<p><span class="bold">N° de TVA</span> : <?php echo $societi['societva'];?></p>
						<p><span class="bold">Type</span> : <?php echo $societi['societype'];?></p>
<?php $societa->closeCursor();?>
				</div>
			</div>
		</section>

		<section>
			<h3>Personnes de contact :</h3>
			<div class="row">
				<div class="col-4">Nom du contact</div>
				<div class="col-4">e-mail</div>
				<div class="col-4">Tel.</div>
			</div>

			<div class="row">
<?php
while ($conta = $contactSociete->fetch()){ 
?>
				<div class="col-4"><?php echo $conta['namer'];?></div>
				<div class="col-4"><?php echo $conta['mail'];?></div>
				<div class="col-4"><?php echo $conta['tel'];?></div>
<?php };?>
			</div>

		</section>

<?php $contactSociete->closeCursor();?>

		<section>
			<h3>Factures de la société :</h3>
			<div class="row">
				<div class="col-4">N° de facture</div>
				<div class="col-4">Date</div>
				<div class="col-4">Nom du contact</div>
			</div>

			<div class="row">
<?php 
while ($factur = $factureDate->fetch()){ 
?>
				<div class="col-4"><?php echo $factur['numero'];?></div>
				<div class="col-4"><?php echo $factur['date'];?></div>
				<div class="col-4"><?php echo $factur['namecont'];?></div>
<?php };?>
<?php $factureDate->closeCursor();?>
			</div>

		</section>
	</div>
	<div class="col-6">
	</div>
  </div>
</div>
