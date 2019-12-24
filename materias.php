<?php
  $page_title = 'Lista de Materias';
  require_once('includes/load.php');
  $lic = join_lic_table();
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
           <a href="add_materias.php" class="btn btn-primary">Agragar Materia</a>
         </div>
        </div>
        <div class="panel-body">
          <table id="lookup" class="table table-bordered">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Clave de la Materia</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Plan de Estudio</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Modificación</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lic as $lic):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($lic['claveLic']); ?></td>
                <td class="text-center"> <?php echo remove_junk($lic['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($lic['planEst']); ?></td>
                <td class="text-center"> 
                  <?php if($lic['activo'] === 'Activo'): ?>
                    <span class="label label-success"><?php echo remove_junk($lic['activo']); ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo remove_junk($lic['activo']); ?></span>
                  <?php endif;?></td>
                
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_materias.php?id=<?php echo $lic['claveLic'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    
                    <a href="delete_materias.php?id=<?php echo (int)$lic['claveLic'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
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
