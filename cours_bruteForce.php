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

    <h1>Hydra et le bruteforce de protocoles – vos premiers pas</h1>
<div>Aujourd’hui, nous allons à la découverte d’un « nouvel » outil, hydra. Hydra a toute sa place dans votre arsenal de hacking car c’est un puissant outil de bruteforce de mot de passes qui supporte une liste impressionnante de protocoles. <br><br>

Si vous avez envie par exemple de tester la solidité du mot de passe utilisé pour la connexion à un système distant, hydra peut donc s’avérer un excellent outil pour vous permettre cela.
<br><br>
</div>

<h1>Hydra, c'est quoi</h1>
<div>Hydra est un cracker de connexion parallélisé qui prend en charge de nombreux protocoles d’attaque. Il est très rapide et flexible, et peut être étendu grâce à des modules supplémentaires.
<br><br>

La liste des protocoles supportée est impressionnante, je cite: Astérisque, AFP, Cisco AAA, authentification Cisco, activation Cisco, CVS, Firebird, FTP, HTTP-FORM-GET, HTTP-FORM-POST, HTTP-GET, HTTP-HEAD, HTTP-POST, HTTP-PROXY, HTTPS-FORM -GET, HTTPS-FORM-POST, HTTPS-GET, HTTPS-HEAD, HTTPS-POST, proxy HTTP, ICQ, IMAP, IRC, LDAP, MS-SQL, MYSQL, NCP, NNTP, auditeur Oracle, Oracle SID, Oracle , PC-Anywhere, PCNFS, POP3, POSTGRES, RDP, Rexec, Rlogin, Rsh, RTSP, SAP / R3, SIP, SMB, SMTP, Enum SMTP, SNMP v1 + v2 + v3, SOCKS5, SSH (v1 et v2), SSHKEY, Subversion, Teamspeak (TS2), Telnet, VMware-Auth, VNC et XMPP.</div>
<br><br>
<h2 class="wp-block-heading" id="2-comment-fonctionne-hydra-">Comment fonctionne hydra ?</h2>
  <p>Pour que Hydra fonctionne avec un protocole, nous aurons besoin des paramètres comme :</p>
    <ul>
      <li>un nom d &rsquo;utilisateur (-l) ou une liste de noms d &rsquo;utilisateur (-L),</li>
      <li>un mot de passe (-p) ou d &rsquo;une liste de mots de passe (-P)</li>
      <li>une adresse IP cible associée au protocole.</li>
    </ul>
      <p>La syntaxe générale est</p>
      <pre class="wp-block-preformatted">hydra -l &lt;nom d'utilisateur &gt;-P &lt;mot de passe &gt;&lt;protocole &gt;: // &lt;ip &gt;</pre>
      <p>vous pouvez également le faire de la manière suivante :</p>
      <pre class="wp-block-preformatted">hydra -l &lt;nom d'utilisateur &gt;-P &lt;mot de passe fichier de &gt;-s &lt;port &gt;-V &lt;ip &gt;&lt;protocole &gt;</pre>
      <p>avec l &rsquo;option -s pour le port et l &rsquo;option -V pour la verbosité.</p>
      <h2 class="wp-block-heading" id="3-comment-utiliser-hydra-pour-faire-du-brute-force-sur-le-ssh">Comment utiliser hydra pour faire du brute force sur le ssh?</h2>
      <p>Si nous connaissons le nom d &rsquo;utilisateur, nous allons procéder de la manière suivante.</p>
      <pre id="4-hydra-l-molly-p-rockyoutxt-1010219212-ssh-" class="wp-block-preformatted">
        <code>hydra -l admin -P rockyou.txt 10.10.219.212 ssh</code>
      </pre>
      <p>sinon</p>
        <pre class="wp-block-preformatted">
          <code>hydra -L user.txt -P rockyou.txt 10.10.219.212 ssh</code>
          </pre>
<h1>Conclusion</h1>
<div>Hydra peut être utilisé de diverses manières. Il dispose de plusieurs autres options pour optimiser son exécution et gagner en efficacité. Tout dépendra du contexte dans lequel vous allez l’utiliser…

  <?php include_once('layouts/menu.php'); ?>
