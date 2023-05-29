<?php
  $page_title = 'Tous les Groupes';
  require_once('includes/load.php');
  // Verification du niveau d'autorisation
   page_require_level(1);
  $all_groups = find_all('user_groups');
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
        <span>Groupes</span>
     </strong>
       <a href="add_group.php" class="btn btn-info pull-right btn-sm"> Ajouter Groupe</a>
    </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 15%;">#</th>
            <th class="text-center" style="width: 15%;">Nom du Groupe</th>
            <th class="text-center" style="width: 15%;">Level Groupe</th>
            <th class="text-center" style="width: 15%;">Statut</th>
            <th class="text-center" style="width: 15%;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_groups as $a_group): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_group['group_name']))?></td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_group['group_level']))?>
           </td>
           <td class="text-center">
           <?php if($a_group['group_status'] === '1'): ?>
            <span class="label label-success"><?php echo "Active"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Inactive"; ?></span>
          <?php endif;?>
           </td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_group.php?id=<?php echo (int)$a_group['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editer">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="sup_group.php?id=<?php echo (int)$a_group['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Supprimer">
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
