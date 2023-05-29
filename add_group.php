<?php
  $page_title = 'Ajouter Groupe';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(1);
?>
<?php
  if(isset($_POST['add'])){

   $req_fields = array('nom-groupe','groupe-level');
   validate_fields($req_fields);

   if(find_by_groupName($_POST['nom-groupe']) === false ){
     $session->msg('d','Groupe déjà dans la base de donnée!');
     redirect('add_group.php', false);
   }elseif(find_by_groupLevel($_POST['groupe-level']) === false) {
     $session->msg('d','Groupe level déjà dans la base de donnée!');
     redirect('add_group.php', false);
   }
   if(empty($errors)){
           $name = remove_junk($db->escape($_POST['nom-groupe']));
          $level = remove_junk($db->escape($_POST['groupe-level']));
         $status = remove_junk($db->escape($_POST['statut']));

        $query  = "INSERT INTO user_groups (";
        $query .="group_name,group_level,group_status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$level}','{$status}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Groupe créé avec succès! ");
          redirect('add_group.php', false);
        } else {
          //failed
          $session->msg('d',' Échec création groupe!');
          redirect('add_group.php', false);
        }
   } else {
     $session->msg("d", "Information Incorrecte ou Vide");
      redirect('add_group.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Ajouter Nouveau Groupe</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="add_group.php" class="clearfix">
        <div class="form-group">
              <label for="name" class="control-label">Nom du Groupe</label>
              <input type="name" class="form-control" name="nom-groupe">
        </div>
        <div class="form-group">
              <label for="level" class="control-label">Groupe Level</label>
              <input type="number" class="form-control" name="groupe-level">
        </div>
        <div class="form-group">
          <label for="status">Statut</label>
            <select class="form-control" name="statut">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
        </div>
        <div class="form-group clearfix">
                <button type="submit" name="add" class="btn btn-info">Ajouter</button>
        </div>
    </form>
</div>

<?php include_once('layouts/menu.php'); ?>
