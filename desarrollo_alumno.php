<?php
  $page_title = 'Lista de Acciones de los Proyectos';
  require_once('includes/load.php');
  page_require_level(3);
  $alumnos;
  $inducion = join_induccion_table_alumnos($_GET['m']); 
  foreach ($inducion as $inducion):
    $alumnos = join_acciones_table_alumnos($inducion['id']);
 endforeach;    
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
         <strong>
         algo     
         <?php 
         foreach ($inducion as $inducion):
            echo $inducion['modalidad'];
         endforeach;   
         ?>
        </strong>
         </div>
        </div>
        <div class="panel-body">
          <table id="lookup" class="table table-bordered">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center" style="width: 30%;">Acción</th>
                <th class="text-center" style="width: 20%;">Fecha Limite</th>
                <th class="text-center" style="width: 10%;">Evaluación</th>
                
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alumnos as $alumnos):?>
                <tr>
                    <td class="text-center"> <?php echo remove_junk($alumnos['accion']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['fecha']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['evaluacion']); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
