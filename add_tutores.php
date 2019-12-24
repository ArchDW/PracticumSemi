<?php
  $page_title = 'Agregar Tutores';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(1);
  //$groups = find_all('user_groups');
  $alumnos = join_alumnos_table();
  $maestros = join_maestros_table();
?>
<?php
  if(isset($_POST['add_tutores'])){

   //$req_fields = array('full-name','username','password','level' );
   //validate_fields($req_fields);

   if(empty($errors)){
      $matricula = remove_junk($db->escape($_POST['matricula']));
      $claveD   = remove_junk($db->escape($_POST['claveD']));
        $query = "INSERT INTO tutores (";
        $query .="claveD,matricula";
        $query .=") VALUES (";
    $query .=" '{$claveD}','{$matricula}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Se agrego correctamente el Tutor");
          redirect('add_tutores.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar Tutor.');
          redirect('add_tutores.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_tutores.php',false);
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
          <span>Agregar Tutor</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_tutores.php">
            <div class="form-group">
                <label for="matricua">Matricula</label>
                <input type="text" class="form-control" name="matricula" placeholder="Matricula" required>
            </div>

            <table id="alumnos" class="table table-bordered">
            <thead>
              <tr>
                 <th class="text-center">Matricula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Licenciatura</th>
                <th class="text-center">Semestre</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alumnos as $alumnos):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Licenciatura']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Semestre']); ?></td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>

            <div class="form-group">
                <label for="name">Clave del Docente</label>
                <input type="text" class="form-control" name="claveD" placeholder="Nombre completo" required>
            </div>

            <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Clave Docente</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Grado Académico</th>
            </thead>
            <tbody>
              <?php foreach ($maestros as $maestros):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($maestros['claveD']); ?></td>
                <td class="text-center"> <?php echo remove_junk($maestros['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($maestros['GradoAc']); ?></td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
          
         
            
            <div class="form-group clearfix">
              <button type="submit" name="add_tutores" class="btn btn-primary">Guardar</button>
              <a href="tutores.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
