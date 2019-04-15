<?php 
require 'header.php';

//CONNECTION BDD
try
{
	$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}


$fournisseur=$bdd->query('SELECT * FROM `remi_societe` WHERE remi_societe.type_societe="fournisseur"');
$client=$bdd->query('SELECT * FROM `remi_societe` WHERE remi_societe.type_societe="client"');


if(isset($_POST['supprim'])){
				echo"bon alors c'est checké !";
				
				$new = $_POST["societaler"];

				foreach ($new as $key => $vali){

					echo 'valeur à supprimer : '.$vali;

					$sqlDelete = $bdd->prepare("
						DELETE FROM `remi_societe` 
						WHERE remi_societe.name_societe = ?");

					$response = $sqlDelete->execute(array($vali));
					//header("Location:societe.php");
					//die();
				}
	}

?>
<div class="container">
  <div class="row">
    	<div class="col-12"><h2 class="text-center">Annuaire des sociétés</h2></div>
  </div>

<section class="fromsociete">
  <div class="row">
      <div class="col-12"><h3>Clients</h3></div>
      <div class="col-4">Nom de société :</div>
      <div class="col-4">N° de TVA :</div>
      <div class="col-4 payzer">Pays :
		<div class="deleter">
			<img src="https://findicons.com/files/icons/1580/devine_icons_part_2/128/trash_recyclebin_empty_closed.png" width="20"></div>
	</div>
  </div>
<form action="societe-delete.php" method="post">
<?php
while ($clien = $client->fetch())//tant qu'il y a un resultat
{?>
  <div class="row">
      <div class="col-4"><a href="detailsociete.php?societe=<?= $clien['name_societe'];?>"><?php echo $clien['name_societe']?></a></div>
      <div class="col-4"><?php echo $clien['n_tva']?></div>
      <div class="col-4 payzer"><?php echo $clien['n_pays']?>
	<div class="deleter"><input type="checkbox" value="<?php echo $clien['name_societe']?>" name="societaler[]" /></div>
	</div>
  </div>

<?php
}
?>
  <div class="row">
	<div class="col-8"></div>
	<div class="col-4 buttondelete"><button  type="submit" name="supprim">Effacer de la liste</button></div>
  </div>
  </form>
</section>

<section class="fromsociete">
  <div class="row">
      <div class="col-12"><h3>Fournisseurs</h3></div>
      <div class="col-4">Nom de société :</div>
      <div class="col-4">N° de TVA :</div>
      <div class="col-4">Pays :


		<div class="deleter">
			<img src="https://findicons.com/files/icons/1580/devine_icons_part_2/128/trash_recyclebin_empty_closed.png" width="20">
		</div>

	</div>
  </div>

  <form action="societe-delete.php" method="post">

<?php
while ($fournis = $fournisseur->fetch())//tant qu'il y a un resultat
{
?>
  <div class="row">
      <div class="col-4"><a href="detailsociete.php?societe=<?= $fournis['name_societe'];?>"><?php echo $fournis['name_societe']?></a></div>
      <div class="col-4"><?php echo $fournis['n_tva']?></div>
      <div class="col-4 payzer"><?php echo $fournis['n_pays']?>

		<div class="deleter">
			<input type="checkbox" value="<?php echo $fournis['name_societe']?>" name="societaler[]" />
		</div>

	</div>
  </div>

<?php
}
?>

  <div class="row">
	<div class="col-8"></div>
	<div class="col-4 buttondelete"><button  type="submit" name="supprim">Effacer de la liste</button></div>
  </div>
  </form>


</section>
<style>
	.container h2{margin-top:20px;}
	.fromsociete{margin-top:30px;}
	.fromsociete .row{min-height:25px;}
	.payzer{position:relative}
	div.deleter{position:absolute;right:0;top:4px;width:40px;height:20px;}
	div.buttondelete{display:flex;justify-content:flex-end;}
</style>


</div>
<?php require 'footer.php';?>
