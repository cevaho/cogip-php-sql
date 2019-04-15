<?php require 'header.php';

try

{
$bdd = new PDO('mysql:host=webtech.one.mysql;dbname=webtech_one_becode;charset=utf8','*','*');
}
catch(Exception $bdd)
{
  die('Erreur : '.$bdd->getMessage());
}

/////////affiche les contacts modifiables
$req = $bdd->query('SELECT * FROM remi_contact');

/////////selectionne les champs de valeur=au get name
$affich = $bdd->prepare("SELECT * FROM remi_contact WHERE name=:name");
$affich->execute(array(
'name'=> $_GET['name']
));

////////////partie UPDATE
if(isset($_POST["envoyer"])){
///////////place les valeurs entrees par l'utilisateur dans une variable
        $nvname = htmlspecialchars($_POST['name']);
        $nvfirst_name = htmlspecialchars($_POST['first_name']);
        $nvn_tel = htmlspecialchars($_POST['n_tel']);
        $nvmail = htmlspecialchars($_POST['mail']);


///////////fonction qui verifie que les champs pas vides par le phrase placeholder
function verif_null($var){
      if($var!=""
    && $var!="modifier le nom"
    && $var!="modifier le prenom"
    && $var!="modifier le n° de tel"
    && $var!="modifier l'email"

    ){
           return $var;
        }
  else{echo"veuillez compléter les vides";}
}

////////////on active la fontion pour chaq variable/si verif null=true alors fait ect
if(verif_null($nvname)
          && verif_null($nvfirst_name)
          && verif_null($nvn_tel)
          && verif_null($nvmail)
        ){
$message = "Le contact : ".$nvname." dont la societe : ".$nvmail." est modifié";
          $requete=$bdd->prepare('UPDATE remi_contact SET name=:nvname first_name=:nvfirst_name n_tel=:nvn_tel mail=:nvmail WHERE id=:id');
  $requete->execute(array(
                          'name'=> $nvname,
                          'first_name'=> $nvfirst_name,
                          'n_tel'=> $nvn_tel,
                          'mail'=> $nvmail,

                        ));

                      }

                    }
?>

<h3>Modifier un contact</h3>
  <ul>
    <?php
      while ($donnees = $req->fetch()){?>
        <li><a href="modifcontact.php?id=<?= $donnees['id'];?>&name=<?= $donnees['name'];?>&first_name=<?= $donnees['first_name'];?>"><?= $donnees['name'].' '.$donnees['first_name'];?></a>
        </li>
    <?php
    }
    ?>

</ul>
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
   <div class="col"><?php echo $_GET[name];?></div>
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
					<input class="form-control" name="name" type="text" placeholder="modifier le nom ">
				</div>
				<div class="form-group">
					<label for="prenom">Prénom :</label>
					<input class="form-control" name="first_name" type="text" placeholder="modifier le prénom">
				</div>
				<div class="form-group">
					<label for="numtel">Téléphone :</label>
					<input class="form-control" name="n_tel" type="int" placeholder="modifier le n° de tel.">
				</div>
        <div class="form-group">
					<label for="mail">Mail :</label>
					<input class="form-control" name="mail" type="text" placeholder="modifier l'email.">
				</div>
          <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
        </div>
      </div>
    </div>
<?php
echo $message; }
?>
