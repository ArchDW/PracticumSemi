<?php
  $page_title = 'Agregar Acciones';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  //$groups = find_all('user_groups');
  $groups = find_all('licenciatura');
?>
<?php
  if(isset($_POST['add_desarrollo'])){ 
   if(empty($errors)){
     
      $accion   = remove_junk($db->escape($_POST['accion']));
      $fecha   = remove_junk($db->escape($_POST['fecha']));
      $evaluacion   = (int) remove_junk($db->escape($_POST['evaluacion']));
        $query = "INSERT INTO acciones (";
        $query .="accion,protocolo,fecha,evaluacion";
        $query .=") VALUES (";
        $query .=" '{$accion}','{$_GET['p']}','{$fecha}','{$evaluacion}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',' Se Agrego correctamente la Acción.');
          redirect('add_desarrollo.php?cl='.$_GET['cl'].'&p='.$_GET['p'], false);
        } else {
          //failed
          $session->msg('d',' No se Agrego correctamente la Acción.');
          redirect('add_desarrollo.php?cl='.$_GET['cl'].'&p='.$_GET['p'], false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_desarrollo.php?cl='.$_GET['cl'].'&p='.$_GET['p'],false);
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
          <span>Agregar Acción</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
            
            <form method="post" action="add_desarrollo.php?cl=<?php echo $_GET['cl']; ?>&p=<?php echo $_GET['p']; ?>">
            <div class="form-group">
                <label for="accion">Ación</label>
                <textarea type="text" class="form-control" name ="accion"></textarea>
               
            </div>
            <div class="form-group">
                <label for="fecha">Fecha Limite</label>
                <input type="text" class="form-control" name="fecha" placeholder="Ejemplo: <?php echo date("d/m/Y");?>"  required>
            </div>
            <div class="form-group">
                <label for="evaluacion">Evaluación</label>
                <select class="form-control" name="evaluacion">
                  <option selected>Seleccione:</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_desarrollo" class="btn btn-primary">Guardar</button>
              <a href="desarrollo.php?cl=<?php echo $_GET['cl']; ?>&p=<?php echo $_GET['p']; ?>" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>