<?php

try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8', '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

/////////affiche les factures modifiables
$req = $bdd->query('SELECT * FROM remi_facture');

/////////selectionne les champs de valeur=au get
$affich = $bdd->prepare("SELECT * FROM remi_facture WHERE n_facture=:n_facture");
$affich->execute(array(
'n_facture'=> $_GET['n_facture']
));

////////////partie UPDATE
if(isset($_POST["envoyer"])){
///////////place les valeurs entrees par l'utilisateur dans une variable
        $nvdate_facture = htmlspecialchars($_POST['date_facture']);
        $nvdate_prestation = htmlspecialchars($_POST['date_prestation']);
        $nvname_societe = htmlspecialchars($_POST['name_societe']);
        $nvname_contact = htmlspecialchars($_POST['name_contact']);

///////////fonction qui verifie que les champs pas vides par le phrase placeholder
function verif_null($var){
      if($var!=""
    && $var!="modifier la date facture"
    && $var!="modifier la date prestation"
    && $var!="modifier le nom societe"
    && $var!="modifier le nom contact"
    ){
           return $var;
        }
  else{echo"veuillez compléter les vides";}
}

////////////on active la fontion pour chaq variable/si verif null=true alors fait ect
if(verif_null($nvdate_facture)
          && verif_null($nvdate_prestation)
          && verif_null($nvname_societe)
          && verif_null($nvname_contact)
        )
        {
$message = "La facture dont la societe est ".$nvname_societe." est modifiée";



          $requete=$bdd->prepare('UPDATE remi_facture
          SET date_facture=:date_facture, date_prestation=:date_prestation, name_societe=:name_societe, name_contact=:name_contact
          WHERE n_facture=:n_facture');
  $requete->execute(array(
                          'date_facture'=> $nvdate_facture,
                          'date_prestation'=> $nvdate_prestation,
                          'name_societe'=> $nvname_societe,
                          'name_contact'=> $nvname_contact,
                          'n_facture'=> $_GET['n_facture']
                        ));
}}
?>

<h3>Modifier une facture</h3>
  <ul>
    <?php
      while ($donnees = $req->fetch()){?>
        <li><a href="modiffacture.php?id=<?= $donnees['id'];?>&n_facture=<?= $donnees['n_facture'];?>&date_facture=<?= $donnees['date_facture'];?>"><?= $donnees['n_facture'].' '.$donnees['date_facture'];?></a>
        </li>
    <?php
    }
    ?>

</ul>
<?php

if(isset($_GET['n_facture'])){
  $donneees = $affich->fetch()
  ?>
  <h3>Facture à modifier</h3>
  <div class="container">
  <div class="row">
    <div class="col-6">
  <div class="row m-3">
   <div class="col">Numero de facture :</div>
   <div class="col"><?php echo $donneees["n_facture"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Date facture :</div>
   <div class="col"><?php echo $donneees["date_facture"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Date prestation :</div>
   <div class="col"><?php echo $donneees["date_prestation"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Nom société :</div>
   <div class="col"><?php echo $donneees["name_societe"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Nom contact :</div>
   <div class="col"><?php echo $donneees["name_contact"];?></div>
  </div>
</div>
<div class="col-6">
  <form action="#" method="post">
        <div class="form-group">
					<label for="numero facture">numero facture :</label>
					<input class="form-control" name="n_facture" type="hidden">
				</div>
				<div class="form-group">
					<label for="date facture">date facture :</label>
					<input class="form-control" name="date_facture" type="text" placeholder="<?php echo $donneees["date_facture"];?>">
				</div>
				<div class="form-group">
					<label for="date prestation">date prestation :</label>
					<input class="form-control" name="date_prestation" type="text" placeholder="<?php echo $donneees["date_prestation"];?>">
				</div>
        <div class="form-group">
					<label for="nom societe">nom societe :</label>
					<input class="form-control" name="name_societe" type="text" placeholder="<?php echo $donneees["name_societe"];?>">
				</div>
        <div class="form-group">
					<label for="nom client">nom client :</label>
					<input class="form-control" name="name_contact" type="text" placeholder="<?php echo $donneees["name_contact"];?>">
				</div>
          <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
        </form>
        </div>
      </div>
    </div>
<?php
echo $message; }
?>
