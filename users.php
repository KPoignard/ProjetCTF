<?php
  $page_title = 'Tous les utilisateurs';
  require_once('includes/load.php');
?>
<?php
// Mettre à jour le temps de connexion
 page_require_level(1);
//extraire toute la base de données des formulaires utilisateur
 $all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Utilisateurs</span>
       </strong>
         <a href="add_user.php" class="btn btn-info pull-right">Ajouter Utilisateur</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 15%;">#</th>
            <th class="text-center" style="width: 15%;">Nom</th>
            <th class="text-center" style="width: 15%;">Username</th>
            <th class="text-center" style="width: 15%;">Role</th>
            <th class="text-center" style="width: 15%;">Statut</th>
            <th class="text-center" style="width: 15%;">Dernière Connexion</th>
            <th class="text-center" style="width: 15%;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
           <td class="text-center">
           <?php if($a_user['status'] === '1'): ?>
            <span class="label label-success"><?php echo "Active"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Inactive"; ?></span>
          <?php endif;?>
           </td>
           <td><?php echo read_date($a_user['last_login'])?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editer">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="sup_user.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Supprimer">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/menu.php'); ?>
