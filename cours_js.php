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
</style>
  <div class="row">
     
    <div class="">

    <h1>Javascript</h1>
JavaScript est un langage de programmation orienté objet (à prototype) principalement utilisé sur le web. Notez en passant qu’il n’a rien à voir avec Java. Il est interprété par votre navigateur et, en somme, c’est lui qui permet d’afficher des messages comme « Veuillez remplir tous les champs » lorsque vous souhaitez faire un achat sans mettre le numéro de votre carte bleue.
<br><br>
Il est très pratique pour rendre les sites web interactifs.
<br><br>
Avec JavaScript on se situe au niveau de l’ordinateur client. Nous détaillerons les termes « client » et « serveur » par la suite.
<br><br>
JavaScript est déjà un minimum sécurisé, vous ne pouvez par exemple pas accéder au registre de Windows ou créer des dossiers et fichiers par défaut. Bien que ce soit faisable avec VBScript sous Internet Explorer uniquement.
<br><br>
Vous ne pouvez pas non plus accéder aux variables des autres sites ni voir les autres pages ouvertes par le navigateur (politique Same Origin). Vous pouvez par contre définir des cookies.


<div class="l-canvas type_wide">
  <h2>Pourquoi il ne faut pas faire confiance à Javascript si vous êtes propriétaire d&rsquo;un site web</h2><p>Un exemple vaut mieux que 100 mots : <a title="sécurité avec javascript" href="https://www.leblogduhacker.fr/sandbox/faillejs.html" target="_blank" rel="noopener">https://www.leblogduhacker.fr/sandbox/faillejs.html</a></p><p>Cet exemple est issu d&rsquo;un autre site web (qui pensait bien faire) et a été copié à l&rsquo;identique. Essayez de trouver le mot de passe.</p><div style="min-height:50px;"><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8843738609740637" data-ad-slot="2898411308" data-ad-format="auto"></ins></div><p>Les plus aguerris d&rsquo;entre vous l&rsquo;auront trouvé, il suffit d&rsquo;afficher <strong>le code source de la page</strong> (CTRL + U) pour afficher ce magnifique bout de code JavaScript:</p><pre> function Login(){
            var password=document.login.password.value;
            if (password=="kztYq8") {
                window.location="bravo.htm";
            }
            else
            {
                window.location="dommage.htm";
            }
        }
        </pre>
<h1>Attention</h1>
<div>Vérifier le code source et regarder s'il n'y a rien d'anormale. Il se peut que certain script reste affiché, et ainsi vous pouvez y trouver des informations.</div>
<?php include_once('layouts/menu.php'); ?>
