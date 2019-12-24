<?php
  $page_title = 'Agregar Licenciatura';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_licenciatura'])){

   //$req_fields = array('full-name','username','password','level' );
   //validate_fields($req_fields);

   if(empty($errors)){
      $claveLic = remove_junk($db->escape($_POST['claveLic']));
      $nombre   = remove_junk($db->escape($_POST['nombre']));
      $planEst   = remove_junk($db->escape($_POST['planEst']));
      $activo   = $db->escape($_POST['activo']);
        $query = "INSERT INTO licenciatura (";
        $query .="claveLic,nombre,activo";
        $query .=") VALUES (";
    $query .=" '{$claveLic}','{$nombre}','{$activo}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Se agrego correctamente la Licenciatura");
          redirect('add_licenciatura.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar la Licenciatura.');
          redirect('add_licenciatura.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_licenciatura.php',false);
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
          <span>Agregar Licenciatura</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_licenciatura.php">
            <div class="form-group">
                <label for="claveLic">Clave de Licenciatura</label>
                <input type="text" class="form-control" name="claveLic" placeholder="Clave de Licenciatura" required>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
              <label for="level">Activo</label>
                <select class="form-control" name="activo">
                  <option>Seleccione:</option>
                  <option>Activo</option>
                  <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_licenciatura" class="btn btn-primary">Guardar</button>
              <a href="licenciatura.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
