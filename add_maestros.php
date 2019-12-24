<?php
  $page_title = 'Agregar Mestros';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_maestros'])){

   //$req_fields = array('full-name','username','password','level' );
   //validate_fields($req_fields);

   if(empty($errors)){
      $claveD = remove_junk($db->escape($_POST['claveD']));
      $nombre   = remove_junk($db->escape($_POST['nombre']));
      $primerAp   = remove_junk($db->escape($_POST['ApellidoAp']));
      $SegundoAp   = remove_junk($db->escape($_POST['ApellidoAm']));
      $edad = (int)$db->escape($_POST['edad']);
      $email   = remove_junk($db->escape($_POST['email']));
      $GradoAc   = remove_junk($db->escape($_POST['GradoAc']));
      $activo   = $db->escape($_POST['activo']);
      
        $query = "INSERT INTO maestros (";
        $query .="claveD,nombre,primerAp,SegundoAp,edad,email,activo,GradoAc";
        $query .=") VALUES (";
        $query .=" '{$claveD}', '{$nombre}', '{$primerAp}', '{$SegundoAp}','{$edad}','{$email}','{$activo}','{$GradoAc}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Se agrego correctamente el Docente");
          $password = sha1($claveD);
          $user_level = 2;
          $status = 1;
            $query2 = "INSERT INTO users (";
            $query2 .="name,username,password,user_level,status";
            $query2 .=") VALUES (";
            $query2 .=" '{$nombre}', '{$email}', '{$password}', '{$user_level}','1'";
            $query2 .=")";
            if($db->query($query2)){
              //sucess
              $session->msg('s'," Cuenta de usuario ha sido creada");
              redirect('add_maestros.php', false);
            } else {
              //failed
              $session->msg('d',' No se pudo crear la cuenta.');
              redirect('add_maestros.php', false);
            }
          
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar el Docente.');
          redirect('add_maestros.php', false);
        }

   } else {
     $session->msg("d", $errors);
      redirect('add_maestros.php',false);
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
          <span>Agregar Maestro</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_maestros.php">
            <div class="form-group">
                <label for="claveD">Clave del Docente</label>
                <input type="text" class="form-control" name="claveD" placeholder="Clave del Docente" required>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
                <label for="apellidoAp">Apellido Paterno</label>
                <input type="text" class="form-control" name="ApellidoAp" placeholder="Apellido Paterno">
            </div>
            <div class="form-group">
                <label for="apellidoAm">Apellido Materno</label>
                <input type="text" class="form-control" name ="ApellidoAm"  placeholder="Apellido Materno">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="text" class="form-control" name ="edad"  placeholder="Edad">
            </div>
            <div class="form-group">
                <label for="name">Correo Electronico</label>
                <input type="email" class="form-control" name ="email"  placeholder="e-mail">
            </div>
            <div class="form-group">
                <label for="GradoAc">Grado Académico</label>
                 <select class="form-control" name="GradoAc">
                   <option value="null">Seleccione:</option>
                   <option>Doctorado</option>
                   <option>Maestria</option>
                   <option>Licenciatura</option>
                </select>
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
              <button type="submit" name="add_maestros" class="btn btn-primary">Guardar</button>
              <a href="maestros.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>