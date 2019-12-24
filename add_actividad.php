<?php
$page_title = 'Agregar Actividad';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
$alumnos = join_asesor2_table($_GET['cl']);
?>
<?php
if (isset($_POST['add_actividad'])) {

  //$req_fields = array('full-name','username','password','level' );
  //validate_fields($req_fields);

  if (empty($errors)) {
    $actividad = remove_junk($db->escape($_POST['Actividad']));
    $fecha = remove_junk($db->escape($_POST['fecha']));
    $estado = remove_junk($db->escape($_POST['estado']));
    foreach ($_POST['matriculas'] as $matriculas) :
      $query = "INSERT INTO actividad(";
      $query .= "actividad, fecha, matricula, estado";
      $query .= ") VALUES (";
      $query .= " '{$actividad}','{$fecha}','{$matriculas}','{$estado}'";
      $query .= ")";
      if ($db->query($query)) {
        //sucess
        $session->msg('s', " Se agrego correctamente la Actividad");
      } else {
        //failed
        $session->msg('d', ' No Se agrego correctamente la Actividad');
        redirect('add_actividad.php?cl=' . $_GET['cl'], false);
      }
    endforeach;
    redirect('add_actividad.php?cl=' . $_GET['cl'], false);
  } else {
    $session->msg("d", $errors);
    redirect('add_actividad.php?cl=' . $_GET['cl'], false);
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
        <span>Agregar Actividad</span>
      </strong>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post" action="add_actividad.php?cl=<?php echo $_GET['cl']; ?>">
          <div class="form-group">
            <label for="actividad">Actividad</label>
            <textarea class="form-control" name="Actividad" placeholder="Actividad" required></textarea>
          </div>
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="text" class="form-control" name="fecha" placeholder="Ejemplo: <?php echo date("d/m/Y"); ?>" required>
          </div>
          <div class="panel-body">
            <table id="lookup" class="table table-bordered">
              <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                <tr>
                  <th class="text-center">Matricula</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido Paterno</th>
                  <th class="text-center">Apellido Materno</th>
                  <th class="text-center">Licenciatura</th>
                  <th class="text-center">Semestre</th>
                  <th class="text-center">Selección</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($alumnos as $alumnos) : ?>
                  <tr>
                    <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['primerAp']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['SegundoAp']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['Licenciatura']); ?></td>
                    <td class="text-center"> <?php echo remove_junk($alumnos['Semestre']); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <input type="checkbox" name="matriculas[]" value="<?php echo remove_junk($alumnos['matricula']); ?>">
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="form-group">
            <label for="level">Estado</label>
            <select class="form-control" name="estado">
              <option value="0">Activo</option>
              <option value="1">Inactivo</option>
            </select>
          </div>
          <div class="form-group clearfix">
            <button type="submit" name="add_actividad" class="btn btn-primary">Guardar</button>
            <a href="PlanAccionTutorial.php?cl=<?php echo $_GET['cl']; ?>" class="btn btn-default btn-danger">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>