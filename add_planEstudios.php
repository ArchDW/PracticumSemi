<?php
  $page_title = 'Agregar Plan de Estudio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_planEstudios'])){

   //$req_fields = array('full-name','username','password','level' );
   //validate_fields($req_fields);

   if(empty($errors)){
      $idPlanEst = remove_junk($db->escape($_POST['idPlanEst']));
      $ano   = remove_junk($db->escape($_POST['ano']));
      $activo   = $db->escape($_POST['activo']);
        $query = "INSERT INTO planEstudios (";
        $query .="idPlanEst,ano,estado";
        $query .=") VALUES (";
    $query .=" '{$idPlanEst}','{$ano}','{$activo}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Se agrego correctamente el PLan de Estudio");
          redirect('add_planEstudios.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar el PLan de Estudio.');
          redirect('add_planEstudios.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_planEstudios.php',false);
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
          <span>Agregar Plan de Estudio</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_planEstudios.php">
            <div class="form-group">
                <label for="idPlanEst">Clave del PLan de Estudios</label>
                <input type="text" class="form-control" name="idPlanEst" placeholder="Clave del Plan de Estudio" required>
            </div>
            <div class="form-group">
                <label for="ano">año</label>
                <input type="text" class="form-control" name="ano" placeholder="año" required>
            </div>
            <div class="form-group">
              <label for="level">Estado</label>
                <select class="form-control" name="activo">
                   <option>Seleccione:</option>
                   <option>Activo</option>
                   <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_planEstudios" class="btn btn-primary">Guardar</button>
              <a href="planEstudios.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
