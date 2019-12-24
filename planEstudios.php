<?php
  $page_title = 'Lista de Plan de Estudios';
  require_once('includes/load.php');
  $plan = join_plan_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_planEstudios.php" class="btn btn-primary">Agragar Plan de Estudio</a>
         </div>
        </div>
        <div class="panel-body">
          <table id="lookup" class="table table-bordered">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Clave del Plan de Estudios</th>
                <th class="text-center">Año</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Modificación</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($plan as $plan):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($plan['idPlanEst']); ?></td>
                <td class="text-center"> <?php echo remove_junk($plan['ano']); ?></td>
                <td class="text-center">
                  <?php if($plan['estado'] === 'Activo'): ?>
                    <span class="label label-success"><?php echo remove_junk($plan['estado']); ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo remove_junk($plan['estado']); ?></span>
                  <?php endif;?></td>
                
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_planEstudios.php?id=<?php echo $plan['idPlanEst'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    
                    <a href="delete_planEstudios.php?id=<?php echo $plan['idPlanEst'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
   
  <?php include_once('layouts/footer.php'); ?>
