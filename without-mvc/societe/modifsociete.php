<?php

try

{
$bdd = new PDO('mysql:host=localhost;dbname=Test;charset=utf8',  '*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

$message="";
/////////affiche les factures modifiables
$req = $bdd->query('SELECT * FROM remi_societe');

/////////selectionne les champs de valeur=au get
$affich = $bdd->prepare("SELECT * FROM remi_societe WHERE name_societe=:name_societe");
$affich->execute(array(
'name_societe'=> $_GET['name_societe']
));

////////////partie UPDATE
if(isset($_POST["envoyer"])){
///////////place les valeurs entrees par l'utilisateur dans une variable
        $nvn_pays = htmlspecialchars($_POST['n_pays']);
        $nvn_tel = htmlspecialchars($_POST['n_tel']);
        $nvn_tva = htmlspecialchars($_POST['n_tva']);
        $nvtype_societe = htmlspecialchars($_POST['type_societe']);
///////////fonction qui verifie que les champs pas vides par le phrase placeholder
function verif_null($var){
      if($var!=""
    && $var!="modifier le pays"
    && $var!="modifier le n° de tel"
    && $var!="modifier le n° de tva"
    && $var!="modifier le type de societe"
    ){
           return $var;
        }
  else{echo"veuillez compléter les vides";}
}

////////////on active la fontion pour chaq variable/si verif null=true alors fait ect
if(verif_null($nvn_pays)
          && verif_null($nvn_tel)
          && verif_null($nvn_tva)
          && verif_null($nvtype_societe)
        )
        {
$nvname_societe = $_GET['name_societe'];
$message = "La societe ".$nvname_societe." a ete modifiée";
echo "nom de société est : ".$nvname_societe;


  $requete=$bdd->prepare('UPDATE remi_societe
          SET n_pays=:n_pays, n_tel=:n_tel, n_tva=:n_tva, type_societe=:type_societe
          WHERE name_societe=:name_societe');
  $requete->execute(array(
                          'n_pays'=> $nvn_pays,
                          'n_tel'=> $nvn_tel,
                          'n_tva'=> $nvn_tva,
                          'type_societe'=> $nvtype_societe,
                          'name_societe'=> $_GET['name_societe']
                        ));
}}
?>

<h3>Modifier une societe</h3>
  <ul>
    <?php
      while ($donnees = $req->fetch()){?>
        <li><a href="modifsociete.php?id=<?= $donnees['id'];?>&name_societe=<?= $donnees['name_societe'];?>"><?= $donnees['name_societe']?></a>
        </li>
    <?php
    }
    ?>

</ul>
<?php

if(isset($_GET['name_societe'])){
  $donneees = $affich->fetch()
  ?>
  <h3>Societe à modifier</h3>
  <div class="container">
  <div class="row">
    <div class="col-6">
  <div class="row m-3">
   <div class="col">Nom de la societe :</div>
   <div class="col"><?php echo $donneees["name_societe"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">pays :</div>
   <div class="col"><?php echo $donneees["n_pays"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">tel :</div>
   <div class="col"><?php echo $donneees["n_tel"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">tva :</div>
   <div class="col"><?php echo $donneees["n_tva"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">type :</div>
   <div class="col"><?php echo $donneees["type_societe"];?></div>
  </div>
</div>
<div class="col-6">
  <form action="#" method="post">
        <div class="form-group">
					<label for="nom societe">nom societe : <?php echo $_GET['name_societe'];?></label>
					<input class="form-control" name="name_societe" type="hidden">
				</div>
				<div class="form-group">
					<label for="pays">pays :</label>
					<input class="form-control" name="n_pays" type="text" placeholder="<?php echo $donneees["n_pays"];?>">
				</div>
				<div class="form-group">
					<label for="tel">tel :</label>
					<input class="form-control" name="n_tel" type="text" placeholder="<?php echo $donneees["n_tel"];?>">
				</div>
        <div class="form-group">
					<label for="tva">tva :</label>
					<input class="form-control" name="n_tva" type="text" placeholder="<?php echo $donneees["n_tva"];?>">
				</div>
        <div class="form-group">
	    				<label for="text">Type :</label>
		    			<select name="type_societe">
                <option>client</option>
                <option>fournisseur</option>
		    			</select>
	  			</div>
          <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
        </form>
        </div>
      </div>
    </div>
<?php
echo $message; }
?>
