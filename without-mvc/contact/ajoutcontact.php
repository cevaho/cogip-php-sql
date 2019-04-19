<?php require 'header.php';

try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

if(isset($_POST["envoyer"])){

        $valeurname = htmlspecialchars($_POST['name']);
        $valeurfirst_name = htmlspecialchars($_POST['first_name']);
        $valeurn_tel = htmlspecialchars($_POST['n_tel']);
        $valeurmail = htmlspecialchars($_POST['mail']);
        $valeurname_societe = htmlspecialchars($_POST['name_societe']);
///////////fonction qui verifie que les champs pas vides par default
function verif_null($var){
      if($var!=""
    && $var!="votre nom"
    && $var!="votre prénom"
    && $var!="votre n° de tel"
    && $var!="votre email"
    && $var!="choix"
    ){
           return $var;
        }
  else{echo"veuillez compléter les vides";}
}

// si les champs ne sont pas vide ou de valeur par défaut active la requete vers la DB
if(verif_null($valeurname)
          && verif_null($valeurfirst_name)
          && verif_null($valeurn_tel)
          && verif_null($valeurmail)
          && verif_null($valeurname_societe)){


  $message = "Le contact ".$valeurname." dont la societe ".$valeurname_societe." est créé";

  $requete=$bdd->prepare('INSERT INTO remi_contact (name, first_name, n_tel, mail, name_societe) VALUES (:name, :first_name, :n_tel, :mail, :name_societe)');
  $requete->execute(array(
                          'name'=> $valeurname,
                          'first_name'=> $valeurfirst_name,
                          'n_tel'=> $valeurn_tel,
                          'mail'=> $valeurmail,
                          'name_societe'=> $valeurname_societe
                        ));

                      }
                    }
$req = $bdd->query('SELECT * FROM remi_societe');

?>
<section>
  <div class ="row ml-5 mt-5">

	<form action="#" method="post">
        <div class="form-group">
					<label for="nom">Nom :</label>
					<input class="form-control" name="name" type="text" placeholder="votre nom ">
				</div>
				<div class="form-group">
					<label for="prenom">Prénom :</label>
					<input class="form-control" name="first_name" type="text" placeholder="votre prénom">
				</div>
				<div class="form-group">
					<label for="numtel">Téléphone :</label>
					<input class="form-control" name="n_tel" type="int" placeholder="votre n° de tel">
				</div>
        <div class="form-group">
					<label for="mail">Mail :</label>
					<input class="form-control" name="mail" type="text" placeholder="votre email">
				</div>

        <div class="form-group">
	    				<label for="text">Société :</label>
		    			<select name="name_societe">
                <option>choix</option>
                <?php while ($donnees = $req->fetch()){ ?>

		      				<option><?= $donnees['name_societe']?></option>
                <?php
                }
                ?>
		    			</select>
	  			</div>
        <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
			</form>
<?php echo $message; ?>

  </div>
</section>
