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

// affiche les contacts modifiables
$req = $bdd->query('SELECT * FROM remi_contact');
if($_GET['name']){
$namar= filter_var($_GET['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nomer = substr($namar, 0, 30);
//echo "name : ".$nomer."<br>";
}

//selectionne les champs de valeur=au get name
$affich = $bdd->prepare("SELECT * FROM remi_contact WHERE name=:name");
$affich->execute(array(
	'name'=> $nomer
));

$message="";

// partie UPDATE
if(isset($_POST["envoyer"])){

	// place les valeurs entrees par l'utilisateur dans une variable

        $nvnamo = filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvname = substr($nvnamo, 0, 20);

        $nvfirst_namo = filter_var($_POST['first_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvfirst_name = substr($nvfirst_namo, 0, 20);

        $nvn_telo = filter_var($_POST['n_tel'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvn_tel = substr($nvn_telo, 0, 10);

        $nvmailo = filter_var($_POST['mail'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$nvmail = substr($nvmailo, 0, 30);

        $ida = filter_var($_GET['id'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $ider = substr($ida, 0, 5);



	// fonction qui verifie que les champs pas vides par le phrase placeholder
	function verif_null($var){
	      if($var!=""
	    	&& $var!="modifier le nom"
	    	&& $var!="modifier le prenom"
	    	&& $var!="modifier le n° de tel."
	    	&& $var!="modifier l'e-mail"
	        ){return $var;}
	      else{echo"veuillez compléter les vides";}
	}

	// on active la fontion pour chaque variable/si verif null=true alors fait active la requette

	if(verif_null($nvname)
    && verif_null($nvfirst_name)
    && verif_null($nvn_tel)
    && verif_null($nvmail)
  ){
    //echo "nomer dans verifnull egal ".$nomer." | ";
    $message="<br> le contact : ".$nvname.", prénom : ".$nvfirst_name.", n° de tel ".$nvn_tel." dont l'email est ".$nvmail." a été créé<br>";
    //echo "<br> valeur de message egal ".$message."<br>";

    $datar=[
      'nvname'=> $nvname,
      'nvfirst_name'=> $nvfirst_name,
      'nvn_tel'=> $nvn_tel,
      'nvmail'=> $nvmail,
      'ider'=> $ider
      ];

    /*echo "<br> valeur de nvname dans datar = ".$datar['nvname'].
          "<br> valeur de nvfirst_name dans datar = ".$datar['nvfirst_name'].
          "<br> valeur de nvn_tel dans datar = ".$datar['nvn_tel'].
          "<br> valeur de nvmail dans datar = ".$datar['nvmail'].
          "<br> valeur de ider dans datar = ".$datar['ider']."<br>";

    if(is_int($datar['ider'])){
      echo $datar['ider']." est un integer";
    }
    if(is_int($datar['nvn_tel'])){
      echo $datar['nvn_tel']." est un integer";
    }*/

    $qler="UPDATE `remi_contact`
    SET name=:nvname, first_name=:nvfirst_name, n_tel=:nvn_tel, mail=:nvmail
    WHERE id=:ider";

    $requete=$bdd->prepare($qler);
    $requete->execute($datar);
    /*echo "<br><br>";
    var_dump($requete);

		echo "<br><br> envoi vers la DB";*/
         }

}

?>
<div class="container">
  <div class="row">
	<div class="col-12"><h2>Modifier un contact</h2></div>
  </div>

<div class="row">
	<div class="col-6">
		<section class="fromsociete">
			<div class="row">
				<div class="col-12">

  <ul>
    <?php
      while ($donnees = $req->fetch()){?>
        <li><a href="modifcontact.php?id=<?= $donnees['id'];?>&name=<?= $donnees['name'];?>&first_name=<?= $donnees['first_name'];?>"><?= $donnees['name'].' '.$donnees['first_name'];?></a>
        </li>
    <?php
    }
    // fin de la requete $req
    $req->closeCursor();
    ?>

</ul>
				</div>
			</div>
		</section>
	</div>
</div>
</div>
<?php
	echo $message;
?>

<?php
	if(isset($_GET['name'])){
  			$donneees = $affich->fetch()
?>
  <h3>Contact à modifier</h3>
  <div class="container">
  <div class="row">
    <div class="col-6">
  <div class="row m-3">
   <div class="col">Contact :</div>
   <div class="col"><?php echo $nomer;?></div>
  </div>
  <div class="row m-3">
   <div class="col">Nom de la société :</div>
   <div class="col"><?php echo $donneees["name_societe"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Email :</div>
   <div class="col"><?php echo $donneees["mail"];?></div>
  </div>
  <div class="row m-3">
   <div class="col">Phone :</div>
   <div class="col"><?php echo $donneees["n_tel"];?></div>
  </div>
</div>
<div class="col-6">
  <form action="#" method="post">
        			<div class="form-group">
					<label for="nom">Nom :</label>
					<input class="form-control" name="nom" type="text" placeholder="modifier le nom">
				</div>
				<div class="form-group">
					<label for="first_name">Prénom :</label>
					<input class="form-control" name="first_name" type="text" placeholder="modifier le prénom">
				</div>
				<div class="form-group">
					<label for="n_tel">Téléphone : (10 chiffres max.)</label>
					<input class="form-control" name="n_tel" type="int" placeholder="modifier le n° de tel.">
				</div>
        			<div class="form-group">
					<label for="mail">E-mail :</label>
					<input class="form-control" name="mail" type="text" placeholder="modifier l'e-mail">
				</div>
          <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
        </div>
      </div>
    </div>
<style>
	.container h2{margin-top:20px;}
	.fromsociete{margin-top:30px;}
	.fromsociete .row{min-height:25px;}
</style>
<?php
	/*$affich->closeCursor();*/
	}
?>
