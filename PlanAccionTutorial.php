<?php
  $page_title = 'Lista de Acciones';
  require_once('includes/load.php');
  $alumnos = join_Act_table();
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
         <a href="#" class="btn btn-primary">Agragar Complemento</a>
           <a href="add_actividad.php?cl=<?php echo $_GET['cl']; ?> " class="btn btn-primary">Agragar Actividad</a>
         </div>
        </div>
        <div class="panel-body">
          <table id="lookup" class="table table-bordered">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Actividad</th>
                <th class="text-center">Matricula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Modificación</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alumnos as $alumnos):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['actividad']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['fecha']); ?></td>
                <td class="text-center">
                  <?php if($alumnos['estado'] === '0'): ?>
                    <span class="label label-success"><?php echo "Activo"; ?></span>
                  <?php else: ?>
                    <span class="label label-danger"><?php echo "Inactivo"; ?></span>
                  <?php endif;?>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_act.php?cl=<?php echo $_GET['cl']; ?>&id=<?php echo $alumnos['id'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    
                    <?php if($alumnos['estado'] === '0'): ?>
                        <a href="delete_act.php?cl=<?php echo $_GET['cl']; ?>&id=<?php echo $alumnos['id'];?>&estado=1" class="btn btn-danger btn-xs"  title="Inactivar" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
                      <?php else: ?>
                        <a href="delete_act.php?cl=<?php echo $_GET['cl']; ?>&id=<?php echo $alumnos['id'];?>&estado=0" class="btn btn-success btn-xs"  title="Activar" data-toggle="tooltip"><span class="glyphicon glyphicon-ok"></span></a>
                      <?php endif;?>
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
