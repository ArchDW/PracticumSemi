<?php
  $page_title = 'Agregar Protocolo';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(1);
  //$groups = find_all('user_groups');
  $groups = find_all('modalidad');
?>
<?php
  if(isset($_POST['add_protocolo'])){

   if(empty($errors)){
      $matricula = (int) remove_junk($db->escape($_POST['matricula']));
      $titulacion = remove_junk($db->escape($_POST['titulacion']));
      $modalidad =(int) remove_junk($db->escape($_POST['modalidad']));
      $tematica = remove_junk($db->escape($_POST['tematica']));
      $activo   = $db->escape($_POST['activo']);
        $query = "INSERT INTO inducion (";
        $query .="nombre,modalidad,tematica,matricula,estado";
        $query .=") VALUES (";
        $query .="'{$titulacion}','{$modalidad}','{$tematica}','{$matricula}','{$activo}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Se agrego correctamente el proyecto");
          redirect('add_protocolo.php?cl='.$_GET['cl'], false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar el proyecto.');
          redirect('add_protocolo.php?cl='.$_GET['cl'], false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_protocolo.php?cl='.$_GET['cl'],false);
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
          <span>Agregar Protocolo</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_protocolo.php?cl=<?php echo $_GET['cl']; ?>">
            <div class="form-group">
                <label for="titulacion">Proyecto de Titulación</label>
                <input type="text" class="form-control" name="titulacion" placeholder="Proyecto de Titulación" required>
            </div>
            <div class="form-group">
                <label for="modalidad">Modalidad de Titulación</label>
                <select class="form-control" name="modalidad">
                   <option value="0">Seleccione:</option>
                   <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['id'];?>"><?php echo ucwords($group['nombre']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="matricua">Tematica o Problema de Interes </label>
                <textarea type="text" class="form-control" name="tematica" required></textarea>
            </div>
            <div class="form-group">
                <label for="matricua">Matricula</label>
                <input type="text" class="form-control" name="matricula" placeholder="Matricula" required>
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
              <button type="submit" name="add_protocolo" class="btn btn-primary">Guardar</button>
              <a href="protocolo.php?cl=<?php echo $_GET['cl']; ?>" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>