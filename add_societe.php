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

if(isset($_POST["envoyer"])){

	if($bdd){

		//convertit la valeur de nom avec des entités html pour les caractères spéciaux 
		//ainsi que les quotes et double quotes
		//limite le nombre de caractère envoyé-> contre hacker
		//le nom de variable ne doit pas être le même que le nam de l'input associé
		$nomsocieteV = filter_var ( $_POST["nomsociete"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		//$nomsocieteV = htmlspecialchars($_POST["nomsociete"], ENT_NOQUOTES);
		$nomsocieteVal = substr($nomsocieteV, 0, 30);

		//$paysV = htmlspecialchars($_POST["pays"], ENT_NOQUOTES);
		$paysV = filter_var ( $_POST["pays"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$paysVal = substr($paysV, 0, 20);

		//$numtvaV = htmlspecialchars($_POST["numtva"], ENT_NOQUOTES);
		$numtvaV = filter_var ( $_POST["numtva"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$numtvaVal = substr($numtvaV, 0, 15);

		//$numtelV = htmlspecialchars($_POST["numtel"], ENT_NOQUOTES);
		$numtelV = filter_var ( $_POST["numtel"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$numtelVal = substr($numtelV, 0,15);

		echo $numtelV."<br>".$numtelVal;
		
		//$typerV = htmlspecialchars($_POST["typer"], ENT_NOQUOTES);
		$typerV = filter_var ( $_POST["typer"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$typerVal = substr($typerV, 0, 15);

		// fonction qui verifie si le champs est vide, ou placeholder par défaut
		function verif_null($var){
		    	if($var!="" 
				&& $var!="Inscrivez ici nom de la société" 
				&& $var!="Inscrivez ici le n° de TVA"
				&& $var!="Inscrivez ici le n° de tel." 
				&& $var!="Inscrivez ici le nom du pays" 
				&& $var!="Choix du type :"
				){
		    		   return $var;
		    		}
			else{echo"veuillez compléter les champs vides";}
		}

		// si les champs ne sont pas vide ou de valeur par défaut active la requete vers la DB
		if(verif_null($nomsocieteVal) && verif_null($paysVal) && verif_null($numtvaVal) && verif_null($numtelVal)){
			
			$message = "La société : ".$nomsocieteVal." dont le n°de TVA est : ".$numtvaVal.
				" au n°de téléphone : ".$numtelVal." de type : ".$typerVal." est créée";

			//prepare la requete avec d'autres nom de variable pour limiter les hacks
			//echo $nomsocieteVal." ".$paysVal." ".$numtvaVal." ".$numtelVal." ".$typerVal." | ";

			$data=[
				'societer'=>$nomsocieteVal,
				'payer'=>$paysVal,
				'teler'=>$numtelVal,
				'tver'=>$numtvaVal,
				'typerer'=>$typerVal
				];

			$sqler="INSERT INTO `remi_societe` (name_societe,n_pays,n_tel,n_tva,type_societe)
				VALUES (:societer, :payer, :teler,:tver,:typerer)";

			$stmt= $bdd->prepare($sqler);
			$stmt->execute($data);
		}

		else{$message ="Veuillez remplir les champs pour enregistrer une nouvelle société";}
		//header('location:add_societe.php');
	}

}
?>
<div class="container">
  <div class="row">
    	<div class="col-12"><h2 class="text-center">Ajout d'une nouvelle société</h2></div>
  </div>

<section class="fromsociete">
  <div class ="row">
	<div class="col-6">
      
	<form action="#" method="post" id="addsociete">
				
				<div class="form-group">
					<label for="nomsociete">Nom de la société :</label>		
					<input class="form-control" name="nomsociete" type="text" placeholder="Inscrivez ici le nom de la société">
				</div>
				<div class="form-group">
					<label for="pays">Basé dans le pays :</label>		
					<input class="form-control" name="pays" type="text" placeholder="Inscrivez ici le nom du pays">
				</div>
				<div class="form-group">
					<label for="numtva">Numéro de TVA (2 lettres, 10 chiffres):</label>		
					<input class="form-control" name="numtva" type="text" placeholder="Inscrivez ici le n° de TVA">
				</div>
				<div class="form-group">
					<label for="numtel">Numéro de téléphone (15 chiffres max):</label>		
					<input class="form-control" name="numtel" type="text" placeholder="Inscrivez ici le n° de tel.">
				</div>
				<div class="form-group">
	    				<label for="typer">Type :</label>
		    			<select name="typer">
						<option>Choix du type :</option>
		      				<option>client</option>
		      				<option>fournisseur</option>
		    			</select>
	  			</div>
				
				<button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
			</form>
			<?php echo $message; ?>

	</div>

  </div>
</section>

<style>
	.container h2{margin-top:20px;}
	.fromsociete{margin-top:30px;}
	.fromsociete .row{min-height:25px;}
</style>
</div>
<?php require 'footer.php';?>
