<?php
  $page_title = 'Agregar Materia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_materias'])){

   //$req_fields = array('full-name','username','password','level' );
   //validate_fields($req_fields);

   if(empty($errors)){
      $claveLic = remove_junk($db->escape($_POST['claveLic']));
      $nombre   = remove_junk($db->escape($_POST['nombre']));
      $planEst   = remove_junk($db->escape($_POST['planEst']));
      $activo   = $db->escape($_POST['activo']);
        $query = "INSERT INTO licenciatura (";
        $query .="claveLic,nombre,planEst,activo";
        $query .=") VALUES (";
    $query .=" '{$claveLic}','{$nombre}','{$planEst}','{$activo}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Se agrego correctamente la Materia");
          redirect('add_materias.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar la Materia.');
          redirect('add_materias.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_materias.php',false);
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
          <span>Agregar Materia</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_materias.php">
            <div class="form-group">
                <label for="claveLic">Clave de la Materia</label>
                <input type="text" class="form-control" name="claveLic" placeholder="Clave de la Materia" required>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
                <label for="planEst">Plan de Estudio</label>
                <input type="text" class="form-control" name="planEst" placeholder="Plan de Estudio" required>
            </div>
            <div class="form-group">
              <label for="level">Activo</label>
                <select class="form-control" name="activo">
                   <option>Activo</option>
                   <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_materias" class="btn btn-primary">Guardar</button>
              <a href="materias.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
