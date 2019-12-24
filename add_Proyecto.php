<?php
  $page_title = 'Agregar Proyecto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  if(isset($_POST['add_proyecto'])){

   //$req_fields = array('full-name','username','password','level' );
   //validate_fields($req_fields);

   if(empty($errors)){
      $matricula = remove_junk($db->escape($_POST['matricula']));
      $nombre   = remove_junk($db->escape($_POST['nombre']));
     
      $activo   = $db->escape($_POST['activo']);
        $query = "INSERT INTO  (";
        $query .="matricula,Nombre,activo";
        $query .=") VALUES (";
        $query .=" '{$matricula}','{$nombre}','{$activo}'";
        $query .=")";
        if($db->query($query)){
          //sucess
              $session->msg('s'," Se agrego correctamente el Proyecto");
              redirect('add_proyecto.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar Alumno.');
          redirect('add_proyecto.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_proyecto.php',false);
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
          <span>Agregar Proyecto</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_proyecto.php">
            <div class="form-group">
                <label for="name">Nombre del Proyecto</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
                <label for="matricua">Matricula</label>
                <input type="text" class="form-control" name="matricula" placeholder="Matricula" required>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
              <label for="level">Activo</label>
                <select class="form-control" name="activo">
                   <option value="0">Seleccione:</option>
                   <option>Activo</option>
                   <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_proyecto" class="btn btn-primary">Guardar</button>
              <a href="EvaluacionFInal.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>