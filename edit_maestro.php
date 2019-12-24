<?php
  $page_title = 'Editar Maestro';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(1);
?>
<?php
  $e_maestro = find_by_id_maestro('maestros',$_GET['id']);
  //$groups  = find_all('user_groups');
  if(!$e_maestro){
    $session->msg("d","Missing user id.");
    redirect('maestros.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    //$req_fields = array('name','username','level');
    //validate_fields($req_fields);
    if(empty($errors)){
      $id = $e_maestro['claveD'];
      $name = remove_junk($db->escape($_POST['nombre']));
      $primerAp = remove_junk($db->escape($_POST['primerAp']));
      $segundoAp = remove_junk($db->escape($_POST['SegundoAp']));
      $status   = remove_junk($db->escape($_POST['activo']));
      $edad = (int)$db->escape($_POST['edad']);
      $status   = remove_junk($db->escape($_POST['status']));
      $gradoAc = remove_junk($db->escape($_POST['GradoAc']));
      $email = remove_junk($db->escape($_POST['email']));
      $sql = "UPDATE maestros SET nombre ='{$name}', primerAp ='{$primerAp}',SegundoAp='{$segundoAp}',edad='{$edad}',email='{$email}',activo='{$status}',GradoAc='{$gradoAc}' WHERE claveD='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Datos Actualizados ");
            redirect('edit_maestro.php?id='.$e_maestro['id'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_maestro.php?id='.$e_maestro['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_maestro.php?id='.$e_maestro['id'],false);
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
          Actualiza Maestro: Clave del Docente <?php echo remove_junk(ucwords($e_maestro['claveD'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_maestro.php?id=<?php echo $e_maestro['claveD'];?>" class="clearfix">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input required type="text" class="form-control" name="nombre"  value=<?php echo remove_junk(ucwords($e_maestro['nombre'])); ?> >
            </div>
            <div class="form-group">
                <label for="apellidoAp">Apellido Paterno</label>
                <input required type="text" class="form-control" name="primerAp" value=<?php echo remove_junk(ucwords($e_maestro['primerAp'])); ?>>
            </div>
            <div class="form-group">
                <label for="apellidoAm">Apellido Materno</label>
                <input required type="text" class="form-control" name ="SegundoAp"  value=<?php echo remove_junk(ucwords($e_maestro['SegundoAp'])); ?>>
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input required type="text" class="form-control" name ="edad"  value=<?php echo remove_junk(ucwords($e_maestro['edad'])); ?>>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" class="form-control" name ="email"  value=<?php echo remove_junk(ucwords($e_maestro['email'])); ?>>
            </div>
            <div class="form-group">
                <label for="GradoAc">Grado Academico</label>
                <select class="form-control" name="GradoAc">
                  <option <?php if($e_maestro['GradoAc'] === 'Doctorado') echo 'selected="selected"';?> >Doctorado</option>
                  <option <?php if($e_maestro['GradoAc'] === 'Maestria') echo 'selected="selected"';?> >Maestria</option>
                  <option <?php if($e_maestro['GradoAc'] === 'Licenciatura') echo 'selected="selected"';?> >Licenciatura</option>
                </select>
            </div>
            <div class="form-group">
              <label for="status">Estado</label>
                <select class="form-control" name="status">
                  <option <?php if($e_maestro['activo'] === 'Activo') echo 'selected="selected"';?> >Activo</option>
                  <option <?php if($e_maestro['activo'] === 'Inactivo') echo 'selected="selected"';?> >Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
                    <a href="maestros.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
       </div>
     </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
