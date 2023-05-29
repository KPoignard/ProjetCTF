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
    height:10cm;
  }
</style>
  <div class="row">
     
    <div class="">

    <h1>Decodage et MD5</h1>
<div>Le MD5, pour Message Digest 5, est une fonction de hachage cryptographique qui permet d'obtenir l'empreinte numérique d'un fichier (on parle souvent de message). Il a été inventé par Ronald Rivest en 1991.
<br><br>
Si l'algorithme MD5 présente un intérêt historique important, il est aujourd'hui considéré comme dépassé et absolument impropre à toute utilisation en cryptographie ou en sécurité1,2. Il est toutefois encore utilisé pour vérifier l'intégrité d'un fichier après un téléchargement.</div>
 <br><br>
<iframe src="https://www.frameip.com/decrypter-dechiffrer-cracker-hash-md5/" frameborder="0"></iframe>

<label for="">LIENS</label><br>
    <a href="https://www.dcode.fr/code-multitap-abc">- dcode</a><br>
<a href="https://www.openwall.com/john/">- John the Ripper</a>



<?php include_once('layouts/menu.php'); ?>
