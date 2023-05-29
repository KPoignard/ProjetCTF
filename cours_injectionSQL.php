<?php
  $page_title = 'Brute force facile';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
<style>
  h1{
    color:rgb(83, 106, 234);
    font-size:3rem;
  }
  .e{
    color:orange;
  }

  h6{
    font-weight:bold;

  }
</style>
  <div class="row">
     
    <div class="">

    <h1>Qu'est-ce qu'une injection SQL ?</h1>
<div>Une injection SQL, comme son nom l'indique, consiste à injecter du code SQL dans une donnée afin de continuer ou plutôt de détourner la requête et de lui faire faire autre chose que ce pour quoi elle a été conçue. Cela permet de manipuler la base de données et d'accéder, par exemple, à des données "normalement" inaccessibles (tables des utilisateurs avec tout ce qu'elle contient : login, mot de passe, adresse mail etc…) ou encore d'effectuer des opérations qu'un utilisateur classique ne devrait pas pouvoir faire (suppression de la base de données, ajout/modification d'enregistrements, création/lecture de fichiers etc…).</div>
<br>
<h1>Premier cas : injection SQL sur une chaîne de caractères</h1>
<div>
En langage SQL, une chaîne de caractère est entourées de guillemets (simples ou doubles).
<br>
Examinons la requête suivante :
<br>
<h6>1 : $query = "SELECT id, titre, texte FROM articles WHERE titre LIKE '%".$_GET['titre']."%'"; </h3>
<br>
Cette requête va rechercher l'article dont le titre contient le terme envoyé par la variable titre, variable de type GET (mais ça aurait pu être POST, cela ne change rien).
</div>
<br>

<div>

Tentons maintenant cela :

<h6>1: http://www.monsite.com/article.php?titre=article' AND 1=2 --</h6>
De nouveau pas d'erreur… mais cette fois l'article ne s'affiche pas.
<br><br>
Cela n'a rien de magique si l'on y réfléchit bien : la première condition est vérifiée, la seconde par contre ne l'est pas (1 n'est pas égal à 2). Le AND exige que les 2 conditions renvoient TRUE pour que le tout le soit, or là nous avons une condition renvoyant FALSE d'où l'absence de résultat. Ceci étant dit la requête est syntaxiquement juste et la présence ou l'absence de résultat nous prouve que le code SQL a bien été exécuté et qu'il est donc possible d'en injecter afin de détourner la requête initiale.

<h1>Comment s'en protéger ?</h1>

Pour le cas des chaînes de caractères, il faut les échapper comme on dit. C'est à dire qu'un antislash ( \ ) sera ajouté devant les caractères potentiellement dangereux comme les guillemets ainsi que d'autres caractères. Cet antislash signifiera que le caractère qui suit doit être interprété comme du simple texte. Le guillemet injecté ne sera donc plus considéré comme la fin de la chaîne mais comme un guillemet. Il sera donc impossible au pirate de fermer la chaîne et par conséquent, impossible d'exécuter son injection SQL.
<br>
Pour ça, il faut utiliser des fonctions comme mysqli_real_escape_string() ou la préparation de requête si vous utilisez des outils comme PDO (encore une fois, à adapter si vous utilisez autre chose).
<br>
Nous avons abordé le cas d'une injection SQL sur une chaîne de caractères mais ce n'est pas le seul existant. Dans l'exemple suivant, vous comprendrez que l'échappement des chaînes n'est pas forcément suffisant pour contrer ce type d'attaque.
<br>

<h1>Second cas : injection SQL sur un nombre</h1>
L'échappement est une bonne chose mais n'est pas toujours suffisant et nous allons en apporter la preuve avec cet exemple.

Cette fois nous rechercherons notre article sur la base de son identifiant, identifiant qui est un nombre entier.

<h6>1: $query = "SELECT id, titre, texte FROM articles WHERE id = ".$_GET['id']; </h6>

Cette requête va afficher l'article correspondant à l'id qu'on lui a passé en paramètre.

<h6>1: http://www.monsite.com/article.php?id=1 </h6>

L'article possédant l'id 1 sera affiché.

<h6>1: SELECT id, titre, texte FROM articles WHERE id = 1 </h6>

La principale différence avec une injection sur une chaîne de caractères réside dans le fait qu'un nombre n'a pas forcément besoin d'être entouré de guillemets (bien qu'il peut l'être). Le pirate n'a donc ici plus besoin de chercher à fermer la chaîne. Il peut directement injecter du code SQL après l'identifiant.

De ce fait, tant qu'il n'utilise pas de chaînes de caractères (et donc des guillemets) son injection sera prise en considération sans aucun problème. L'échappement n'est donc pas suffisant dans ce cas ci pour se protéger.

Exemple :

<h6>1: http://www.monsite.com/article.php?id=1 AND 1=2 --</h6>

ce qui donnera :


SELECT id, titre, texte FROM articles WHERE id = 1 AND 1=2 --
Aucun guillemet n'a été utilisé et notre requête a bien été exécutée. 

</div>


<h1>Comment alors réellement s'en protéger dans tous les cas ?</h1>
<div>
Il y a un dicton dans le milieu informatique qui dit :
<br>
Ne faites JAMAIS confiance aux données provenant de l'utilisateur !
<br>
En bref, vous DEVEZ vérifier que la donnée reçue correspond bien à ce que vous attendez et prévoir que l'utilisateur peut tenter d'injecter des caractères non prévus (caractères alphanumériques, guillemets, slash, signes de ponctuation, etc.). Ces caractères ne doivent pas affecter le comportement de votre requête sinon ça signifie qu'il est potentiellement probable qu'on puisse la détourner.
<br><br>
Par exemple, si l'identifiant de votre article est un nombre et que vous savez que ça sera toujours un nombre, alors vérifiez que la variable reçue est bien un nombre (en PHP cela peut se faire notamment avec la fonction is_numeric). Si vous recevez une chaîne de caractères, assurez-vous de la gérer et ne permettez pas à l'utilisateur de pouvoir fermer cette chaîne et, par conséquent, d'injecter ce qu'il veut à la suite (en bref : échappez-là).


</div>
<?php include_once('layouts/menu.php'); ?>
