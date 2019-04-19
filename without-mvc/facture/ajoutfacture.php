<?php require 'header.php';


//////////////////////////////CONNECTION BDD
try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

if(isset($_POST["envoyer"])){

  $valn_facture = htmlspecialchars($_POST['n_facture']);
  $valdate_facture = htmlspecialchars($_POST['date_facture']);
  $valdate_prestation = htmlspecialchars($_POST['date_prestation']);
  $valname_societe = htmlspecialchars($_POST['name_societe']);
  $valname_contact = htmlspecialchars($_POST['name_contact']);

///////////fonction qui verifie que les champs pas vides par default
function verif_null($var){
        if($var!=""
      && $var!="n facture"
      && $var!="date facture"
      && $var!="date prestation"
      && $var!="votre société"
      && $var!="name contact"
      ){
             return $var;
          }

        else{echo"veuillez compléter les vides";}
  }

  // si les champs ne sont pas vide ou de valeur par défaut active la requete vers la DB/active la fonction
  if(verif_null($valn_facture)
            && verif_null($valdate_facture)
            && verif_null($valdate_prestation)
            && verif_null($valname_societe)
            && verif_null($valname_contact)){
$message = "La facture ".$valn_facture." de la societe ".$valname_societe." est enregistrée";

$requete=$bdd->prepare('INSERT INTO remi_facture (n_facture, date_facture, date_prestation, name_societe, name_contact)
VALUES (:n_facture, :date_facture, :date_prestation, :name_societe, :name_contact)');
$requete->execute(array(
  'n_facture'=> $valn_facture,
  'date_facture'=> $valdate_facture,
  'date_prestation'=> $valdate_prestation,
  'name_societe'=> $valname_societe,
  'name_contact'=> $valname_contact
));
}}

$req = $bdd->query('SELECT * FROM remi_societe');
?>

<section>
  <h2>Ajout de facture</h2>
  <div class ="row ml-5 mt-5">

	<form action="#" method="post">
        <div class="form-group">
					<label for="n_facture">Numero facture :</label>
					<input class="form-control" name="n_facture" type="text" placeholder="n facture ">
				</div>
				<div class="form-group">
					<label for="date_facture">date prestation :</label>
					<input class="form-control" name="date_facture" type="text" placeholder="date facture">
				</div>
        <div class="form-group">
					<label for="date_prestation">date facture :</label>
					<input class="form-control" name="date_prestation" type="text" placeholder="date prestation">
				</div>
        <div class="form-group">
	    				<label for="text">Société :</label>
		    			<select name="name_societe">
                <option>choix</option>
                <?php while ($donneees = $req->fetch()){ ?>

		      				<option><?= $donneees['name_societe']?></option>
                <?php
                }
                ?>
		    			</select>
	  			</div>
          <div class="form-group">
  					<label for="name_contact">nom contact :</label>
  					<input class="form-control" name="name_contact" type="text" placeholder="name contact">
  				</div>
				<button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
			</form>

<?php echo $message;
?>
  </div>
</section>
