# Cogip-php-sql

Application developement for accountants
using PHP mySql and bootstrap

https://github.com/becodeorg/BXL-Johnson-3.9/blob/master/Projets/COGIPapp/readme.md
https://github.com/becodeorg/BXL-Johnson-3.9/blob/master/Projets/COGIPapp/mockup.md
https://github.com/cevaho/cogip-php-sql/tree/cedric

https://webtech.one/remi/doro/societe.php


Hôte : ssh.webtech.one
Nom d’utilisateur : webtech.one
Port : 22
mdp: becode2019


Créer votre table à votre nom (le même que le sous domain) dans la DB

https://dbadmin.one.com/tbl_structure.php?db=webtech_one_becode&table=remi_societe
Hôte :
webtech.one.mysql

Base de données:
webtech_one_becode

Utilisateur:
webtech_one_becode

Mot de passe:
BEcode2019



("SELECT * 
FROM remi_societe 
INNER JOIN remi_facture 
ON remi_facture.name_societe = remi_societe.name_societe
AND remi_facture.n_facture='$numerofacture'")




SELECT * 
FROM remi_societe 
INNER JOIN remi_facture 
ON remi_facture.name_societe = remi_societe.name_societe
AND remi_facture.n_facture=23145623
