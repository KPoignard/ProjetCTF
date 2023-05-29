<?php
  $page_title = 'Ajouter utilisateur';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_user'])){

   $req_fields = array('nom-complet','username','password','level' );
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['nom-complet']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $user_level = (int)$db->escape($_POST['level']);
       $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
        $query .=")";
        if($db->query($query)){
          //succés
          $session->msg('s',"Compte Utilisateur créé avec succés! ");
          redirect('add_user.php', false);
        } else {
          //échec
          $session->msg('d',' Échec de la création du compte utilisateur!');
          redirect('add_user.php', false);
        }
   } else {
     $session->msg("d", 'Information Incorrecte ou Vide');
      redirect('add_user.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Ajouter Nouvel Utilisateur</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_user.php">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="nom-complet" placeholder="Nom Complet">
            </div>
            <div class="form-group">
                <label for="username">Nom Utilisateur</label>
                <input type="text" class="form-control" name="username" placeholder="Nom Utilisateur">
            </div>
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" class="form-control" name ="password"  placeholder="Mote de Passe">
            </div>
            <div class="form-group">
              <label for="level">Role</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_user" class="btn btn-primary">Ajouter Utilisateur</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/menu.php'); ?>
