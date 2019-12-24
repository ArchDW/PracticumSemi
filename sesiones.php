<?php
$page_title = 'Lista de Sesiones';
require_once('includes/load.php');
$alumnos = join_sesiones_table();
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
          <a href="add_sesiones.php?cl=<?php echo $_GET['cl']; ?>" class="btn btn-primary">Agragar Sesión</a>
        </div>
      </div>
      <div class="panel-body">
        <table id="lookup" class="table table-bordered">
          <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
            <tr>
              <th class="text-center" style="width: 10%;">Sesiones</th>
              <th class="text-center" style="width: 25%;">Proposito </th>
              <th class="text-center" style="width: 10%;">Matricula</th>
              <th class="text-center" style="width: 15%;">Nombre</th>
              <th class="text-center" style="width: 30%;">Acuerdos</th>
              <th class="text-center" style="width: 10%;">Modificación</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($alumnos as $alumnos) : ?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['id']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['proposito']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['acuerdos']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="add_actividad_Sesion.php?cl=<?php echo $_GET['cl']; ?>&m=<?php echo $alumnos['matricula']; ?>" class="btn btn-info btn-xs" title="Actividades" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="add_sesiones_acuerdo.php?cl=<?php echo $_GET['cl']; ?>&id=<?php echo $alumnos['IDE']; ?>" class="btn btn-success btn-xs" title="Acuerdos" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-pushpin"></span>
                    </a>
                    <a href="#?cl=<?php echo $_GET['cl']; ?>" class="btn btn-warning btn-xs" title="Evaluación " data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
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