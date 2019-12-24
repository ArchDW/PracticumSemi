<?php
  $page_title = 'Editar Materia';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(1);
?>
<?php
  $e_lic = find_by_id_lic('materias',$_GET['id']);
  //$groups  = find_all('user_groups');
  if(!$e_lic){
    $session->msg("d","No se Encontro la clave de la Materia.");
    redirect('materias.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    //$req_fields = array('name','username','level');
    //validate_fields($req_fields);
    if(empty($errors)){
      $id = $e_lic['claveLic'];
      $nombre = remove_junk($db->escape($_POST['nombre']));
      $planEst   = remove_junk($db->escape($_POST['planEst']));
      $status   = remove_junk($db->escape($_POST['status']));
      $sql = "UPDATE materias SET nombre ='{$nombre}',planEst='{$planEst}'activo='{$status}' WHERE claveLic='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('edit_materias.php?id='.$e_lic['claveLic'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_materias.php?id='.$e_lic['claveLic'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_materias.php?id='.$e_lic['claveLic'],false);
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
          Actualiza Materia: Clave de la Materia <?php echo remove_junk(ucwords($e_lic['claveLic'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_materias.php?id=<?php echo $e_lic['matricula'];?>" class="clearfix">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input required type="text" class="form-control" name="nombre" value=<?php echo remove_junk(ucwords($e_lic['nombre'])); ?>>
            </div>
            <div class="form-group">
                <label for="planEst">Plan de Estudio</label>
                <input type="text" class="form-control" name="planEst" value=<?php echo remove_junk(ucwords($e_lic['planEst'])); ?> required>
            </div>
            <div class="form-group">
              <label for="status">Estado</label>
                <select class="form-control" name="status">
                  <option>Activo</option>
                  <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
                    <a href="materias.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
       </div>
     </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
