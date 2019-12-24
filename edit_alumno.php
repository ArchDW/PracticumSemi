<?php
  $page_title = 'Editar Alumno';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(1);
  $groups = find_all('licenciatura');
?>
<?php
  $e_alumno = find_by_id_alumno('alumnos',$_GET['id']);
  //$groups  = find_all('user_groups');
  if(!$e_alumno){
    $session->msg("d","Missing user id.");
    redirect('alumnos.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    //$req_fields = array('name','username','level');
    //validate_fields($req_fields);
    if(empty($errors)){
      $id = $e_alumno['matricula'];
      $nombre = remove_junk($db->escape($_POST['nombre']));
      $primerAp = remove_junk($db->escape($_POST['ApellidoAp']));
      $segundoAp   = remove_junk($db->escape($_POST['ApellidoAm']));
      $licenciatura =remove_junk($db->escape($_POST['licenciatura']));
      $email = remove_junk($db->escape($_POST['email']));
      $edad = (int)$db->escape($_POST['edad']);
      $status   = remove_junk($db->escape($_POST['status']));
      $sql = "UPDATE alumnos SET nombre ='{$nombre}', primerAp ='{$primerAp}',SegundoAp='{$segundoAp}',edad='{$edad}',activo='{$status}', licenciatura ='{$licenciatura}', email='{$email}' WHERE matricula='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('edit_alumno.php?id='.$e_alumno['matricula'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_alumno.php?id='.$e_alumno['matricula'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_alumno.php?id='.$e_alumno['matricula'],false);
    }
  }
?>

<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Actualiza Alumno: Matricula <?php echo remove_junk(ucwords($e_alumno['matricula'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_alumno.php?id=<?php echo $e_alumno['matricula'];?>" class="clearfix">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input required type="text" class="form-control" name="nombre" value=<?php echo remove_junk(ucwords($e_alumno['nombre'])); ?>>
            </div>
            <div class="form-group">
                <label for="apellidoAp">Apellido Paterno</label>
                <input required type="text" class="form-control" name="ApellidoAp" value=<?php echo remove_junk(ucwords($e_alumno['primerAp'])); ?>>
            </div>
            <div class="form-group">
                <label for="apellidoAm">Apellido Materno</label>
                <input required type="text" class="form-control" name ="ApellidoAm"  value=<?php echo remove_junk(ucwords($e_alumno['SegundoAp'])); ?> >
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="text" class="form-control" name ="edad"  value=<?php echo remove_junk(ucwords($e_alumno['edad'])); ?>>
            </div>
            <div class="form-group">
                <label for="semestre">Semestre</label>
                <input required type="text" class="form-control" name ="semestre"  value=<?php echo remove_junk(ucwords($e_alumno['Semestre'])); ?>>
            </div>

            <div class="form-group">
                <label for="name">Correo Electronico</label>
                <input required type="email" class="form-control" name ="email"  value=<?php echo remove_junk(ucwords($e_alumno['email'])); ?>>
            </div>
            <div class="form-group">
              <label for="licenciatura">Licenciatura</label>
                <select class="form-control" name="licenciatura">
                   <?php foreach ($groups as $group ):?>
                   <option <?php if($group['claveLic'] === $e_alumno['Licenciatura']) echo 'selected="selected"';?> value="<?php echo $group['claveLic'];?>"><?php echo ucwords($group['nombre']);?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <label for="status">Estado</label>
                <select class="form-control" name="status">
                  <option <?php if($e_alumno['activo'] === 'Activo') echo 'selected="selected"';?> >Activo</option>
                  <option <?php if($e_alumno['activo'] === 'Inactivo') echo 'selected="selected"';?> >Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
                    <a href="alumnos.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
       </div>
     </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
