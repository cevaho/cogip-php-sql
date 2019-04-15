<?php require 'header.php';


//////////////////////////////CONNECTION BDD
try

{
$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

$name = $_POST['numero_facture'];
$first_name = $_POST['date_facture'];
$n_tel = $_POST['n_tel'];
$mail = $_POST['mail'];
$name_societe = $_POST['name_societe'];

$requete=$bdd->prepare('INSERT INTO remi_contact (numero_facture, date_facture, n_tel, mail, name_societe) VALUES (:name, :first_name, :n_tel, :mail, :name_societe)');
$requete->execute(array(
  'numero_facture'=> $numero_facture,
  'date_facture'=> $date_facture,
  'n_tel'=> $n_tel,
  'mail'=> $mail,
  'name_societe'=> $name_societe
));
?>

<section>
  <div class ="row ml-5 mt-5">
<h2>Ajout de facture</h2>
	<form action="#" method="post">
        <div class="form-group">
					<label for="numero_facture">Nom :</label>
					<input class="form-control" name="numero facture" type="text" placeholder="numero facture ">
				</div>
				<div class="form-group">
					<label for="date_facture">Prénom :</label>
					<input class="form-control" name="date facture" type="text" placeholder="date facture">
				</div>
				<div class="form-group">
					<label for="n_tel">Téléphone :</label>
					<input class="form-control" name="n_tel" type="int" placeholder="votre n° de tel.">
				</div>
        <div class="form-group">
					<label for="mail">Mail :</label>
					<input class="form-control" name="mail" type="text" placeholder="votre email.">
				</div>
        <div class="form-group">
					<label for="name_societe">Société :</label>
					<input class="form-control" name="name_societe" type="text" placeholder="votre sociéte.">
				</div>

				<button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
			</form>


  </div>
</section>
