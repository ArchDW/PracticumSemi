 <?php
  $page_title = 'Lista de Tutores';
  require_once('includes/load.php');
  $tutores = join_tutores_table();
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
           <a href="add_tutores.php" class="btn btn-primary">Agragar Tutor</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered" id="iddatatable">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Clave del Docente</th>
                <th class="text-center">Docente</th>
                <th class="text-center">Matricula</th>
                <th class="text-center">Alumno</th>
                <th class="text-center">Eliminación</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tutores as $tutores):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($tutores['ClaveD']); ?> </td>
                <td class="text-center"> <?php echo remove_junk($tutores['Docente']); ?> </td>
                <td class="text-center"> <?php echo remove_junk($tutores['Matricula']); ?> </td>
                <td class="text-center"> <?php echo remove_junk($tutores['Alumno']); ?> </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="delete_tutor.php?id=<?php echo $tutores['ClaveD'];?>&matricula=<?php echo $tutores['Matricula'];?>" class="btn btn-danger btn-xs"  title="eliminar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
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
  <script type="text/javascript">
  $(document).ready(function() {
    $('#iddatatable').DataTable();
  } );
</script>
  <?php include_once('layouts/footer.php'); ?>