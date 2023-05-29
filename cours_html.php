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

  iframe{
    width:100%;
  }
</style>
  <div class="row">
     
    <div class="">

<h1>HTML</h1>

<div>HTML (HyperText Markup Language) is the most basic building block of the Web. It defines the meaning and structure of web content. Other technologies besides HTML are generally used to describe a web page's appearance/presentation (CSS) or functionality/behavior (JavaScript).</div>
<br>
<div>"Hypertext" refers to links that connect web pages to one another, either within a single website or between websites. Links are a fundamental aspect of the Web. By uploading content to the Internet and linking it to pages created by other people, you become an active participant in the World Wide Web.</div>

<h1>Remarque</h1>
<div>Toujours vérifier le code source pour voir si tout est bien afficher et bien utilisé.</div>
  <?php include_once('layouts/menu.php'); ?>
