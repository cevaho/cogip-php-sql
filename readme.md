# Accounting Application COGIP

## Group project of [Dorothée Weiss](https://github.com/doropro), [Cédric Van Hove](https://github.com/cevaho), [Dorian Vanderheyden](https://github.com/dorianbec).

*Exercice made as from 8th april 2019 to 12th april 2019, working team for the [BeCode](https://www.becode.org/) Web Developper training*

## Project

For this project, we have created an accounting application for the fictive company *COGIP* using PHP, SQL and MVC architecture.

### Link to the complete instructions
https://github.com/becodeorg/BXL-Johnson-3.9/tree/master/Projets/COGIPapp


### Distribution of tasks


* Dorothée :
    - Page contact(list display, single detail page, adding new one, delete existing one and modify existing contact);
    - Invoices pages(list invoices display, single detail page, adding new one);

* Cédric :
    - Society pages(list invoices display, single detail page, adding new one, delete existing one);

* Dorian :
    - Architecture MVC (controler, vue), splitting the original php files in models and vues, loading the vue depending on the url parameters;
    - Daschboard admin (index.php);

## Searchable site

[dorian-one.com hosting](https://remi.webtech.one/dorian/)

## samples of pages without mvc can be seen in this repository

- [contact page](https://github.com/cevaho/cogip-php-sql/blob/master/contact.php)
- [detail contact page](https://github.com/cevaho/cogip-php-sql/blob/master/detailcontact.php)
- [society page](https://github.com/cevaho/cogip-php-sql/blob/master/societe.php)
- [detail society page](https://github.com/cevaho/cogip-php-sql/blob/master/societe-delete.php)

## Used Languages and technologies

* PHP MySql html and css
* BOOTSTRAP
* MVC structure

## Screenshot
![Screenshot Application](Cogip_index-php.png)


Objectifs d'évaluation

    Utiliser des paramètres URL et des noms de fichiers différents *ok*
    Bien utiliser la sanitization pour éviter les injections SQL dans votre DB (un esprit malveillant pourrait tenter de delete l'intégralité de votre DB) *à compléter su certaines pages*
    Valider les données afin que Ranu n'encode pas n'importe quoi *peutmettre ce qu'il veut tant que ce sont des caractères normaux, il fautune vallidation sur les emails, qu'ils soient uniques aussi, une meilleure validation de la tv et et du tel*
    Contruire une base de données relationnelles fonctionnelle *OK pas de table de liaison pour l'instant*
    Utiliser des jointures correctes en SQL *ok avec et sans join*
    Utiliser des alias dans vos requêtes SQL *ok quand on ne fait pas de select all*
    Implémenter un CRUD :
        réaliser une interface qui permette de lire des données *ok*
        réaliser une interface qui permette d'ajouter des données *ok*
        réaliser une interface qui permette de modifier des données *pas encore pour société, à voir pour facture*
        réaliser une interface qui permette de supprimer des données *ok, vérifier pour factures*

Objectifs d'apprentissage

    Crypter le mot de passe dans la base de données (il ne doit pas apparaître en clair) *pas fait*
    Utiliser la structure MVC pour ranger vos fichiers et vos fonctionnalités *ok*
    Utiliser un routeur *plus ou moins ok, s'en assurer*
    Savoir mettre en place une session *pas ok*
    Permettre ou non l'accès à certaines pages en fonction des permissions de session *à verifier quand la session sera faite*

N'oubliez pas de mettre le fichier SQL avec la structure et les données dans votre repo. *à faire*
Les données dont Jean-Christian a besoin *ok*

Absolument et non négociable : les données relatives aux personnes, sociétés et factures. *ok*

Pour les personnes, il nous faudra :

    le nom
    le prénom
    l'e-mail
*ok*

Pour les sociétés :

    le nom de la société
    le pays
    le n° de TVA
*ok*

Pour les factures :

    le numéro de la facture
    la date de la facture
*ok*

Pour le type (d'entreprises)

    le type (soit client, soit fournisseur)
*ok*

Eclaircissement :

    Une société de type "client" va acheter quelque chose à la COGIP, on va donc lui envoyer une facture.
    Quand la COGIP achète quelque chose à une autre société (ça peut être une nouvelle calculatrice ou de l'électricité), elle l'achète à un fournisseur qui fournit un produit ou un service.*ok*

Notes

    Concernant les relations entre les tables, il faudra :
        societes --- type *ok*
        societes --- factures *ok*
        personnes --- factures *ok*
        personnes --- societes *ok*

L'app pour Ranu
page d'accueil

Affichera :

    un message d'accueil pour Jean-Christian Ranu (s'il est connecté)
    la liste des 5 dernières factures, classées par date *attention 5 factures mais pas les dernières*
    la liste des 5 dernières personnes encodées dans la base de données *pas les 5 dernières*
    la liste des 5 dernières entreprises encodées dans la base de données *pas les 5 dernières*
    un lien vers la page fournisseurs *OK*
    un lien vers la page clients *OK*

page sociétés

Affichera la liste des sociétés par ordre alphabétique. *à faire par ordre alphabetique !*

Le nom de chaque société sera un lien qui renverra vers une nouvelle page detailsociete dont le contenu sera généré en fonction de l'id de la société choisie. *ok*

page factures

Affichera la liste des factures par date la plus récente vers la date la plus lointaine. *verifier l'ordre*

Chaque numéro de facture sera un lien qui, au clic, renverra vers une page detailfacture dont le contenu sera généré en fonction de l'id de la facture sélectionnée. *ok*

page annuaire

Affichera la liste de toutes les personnes de contact de la base de données, par ordre alphabétique. *vérifier l'ordre !*

Le nom de chaque personne sera un lien qui renverra vers une nouvelle page detailcontact dont le contenu sera généré en fonction de l'id de la personne choisie. *ok*

page fournisseurs

Affichera la liste de toutes les sociétés de type fournisseur. Chaque nom de société renvoie, à l'aide d'un lien, vers sa page detailsociete dédiée. *à faire ?*

page clients

Affichera la liste de toutes les sociétés de type client. Chaque nom de société renvoie, à l'aide d'un lien, vers sa page detailsociete dédiée. *à faire ?*


detailsociete

Affichera les informations suivantes selon la société choisie :

    nom de la société
    numéro de TVA de la société
    liste des factures liées à la société
    liste des personnes de contact travaillant dans la société
*OK*

detailfacture

Affichera les informations suivantes selon la facture choisie :

    numéro
    date
    société liée à la facture
    type de la société liée à la facture (fournisseur ou client)
    personne de contact liée à la facture

detailcontact

Affichera les informations suivantes selon la personne de contact choisie :

    nom, prénom
    e-mail
    nom de la société où travaille la personne
    la liste des factures liées à la personne
*OK*

Partie admin de Ranu

Avant-propos :
Faites en sorte que les paramètres URL ne soient pas les mêmes que les noms de vos fichiers PHP. *mauvais*

Par exemple : imagine un site internet dont l'url pour modifier les recettes serait recettes.com/?modifplat=17
mais ferait appel au fichier nommé updaterecipe.php

De quoi Ranu a-t-il besoin ?

Une fois que vous avez réalisé la partie consultation de la base de données comptable de Jean-Christian, vous allez lui créer une interface administration pour qu'il puisse encoder, modifier et supprimer lui-même ses données depuis une chouette interface.

Il aura besoin d'un dashboard dans lequel il pourra avoir un accès direct aux :

    5 dernières factures (n° de facture, date, société). En cliquant sur le numéro de la facture, Jean-Christian arrivera sur une page qui lui permettra de modifier la facture. Au clic du nom de la société, il pourra modifier les infos de la société.
    5 dernières sociétés (nom de la société et type de société). En cliquant sur le nom de société, Jean-Christian arrivera sur une page qui lui permettra de modifier la société.
    5 derniers contacts (prénom+nom, email, nom de société). En cliquant sur le nom du contact, Jean-Christian arrivera sur une page qui lui permettra de modifier la facture. Au clic du nom de la société, il pourra modifier les infos de la société.

On prévoiera également que sur la même ligne de chaque élément, il y ait une petite icône représentant une poubelle afin qu'au clic de l'icône, on puisse supprimer l'élement de la ligne.

Il aura aussi des accès rapides (à l'aide de boutons) pour pouvoir ajouter :

    une nouvelle facture *OK*
    un nouveau contact *OK*
    une nouvelle société *OK*

Et vous prévoirez un message d'accueil pour la personne connectée. Selon qu'il s'agisse de Jean-Christian ou de Muriel. *à faire*

GODMODE
S'il a un accès godmode, l'utilisateur connecté (par défaut Jean-Christian a un accès godmode. Son mot de passe est son nom de famille.), il aura également un bouton pour pouvoir gérer les utilisateurs. Ce bouton l'amènera vers un dashboard qui lui permettra de voir les utilisateurs connectés, leurs accès et de pouvoir les modifier.
*on en est où ?*

MODE MODO
Le mode modérateur (ou mode modo) sera attribué à Muriel, la collaboratrice de Jean-Christian. Elle a accès au dashboard admin, elle peut ajouter des factures, sociétés et personnes mais elle ne peut ni modifier, ni supprimer des éléments de la base de données. Son mot de passe est également son nom de famille.
*on en est où ?*
