<?php
  $page_title = 'Editar Plan de Estudios';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(1);
?>
<?php
  $e_plan = find_by_id_plan('planEstudios',$_GET['id']);
  //$groups  = find_all('user_groups');
  if(!$e_plan){
    $session->msg("d","No se Encontro lo clave del Plan de Estudios.");
    redirect('planEstudios.php');
  }
?>

<?php
//Update User basic info
  if(isset($_POST['update'])) {
    //$req_fields = array('name','username','level');
    //validate_fields($req_fields);
    if(empty($errors)){
      $id = $e_plan['idPlanEst'];
      $ano = remove_junk($db->escape($_POST['ano']));
      $status   = remove_junk($db->escape($_POST['status']));
      $sql = "UPDATE planEstudios SET ano ='{$ano}',estado='{$status}' WHERE idPlanEst='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('edit_planEstudios.php?id='.$e_plan['idPlanEst'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('edit_planEstudios.php?id='.$e_plan['idPlanEst'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_planEstudios.php?id='.$e_plan['idPlanEst'],false);
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
          Actualiza el PLan de Estudio: Clave del Plan de Estudios <?php echo remove_junk(ucwords($e_plan['idPlanEst'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_planEstudios.php?id=<?php echo $e_plan['matricula'];?>" class="clearfix">
            <div class="form-group">
                <label for="ano">Año</label>
                <input required type="text" class="form-control" name="ano" value=<?php echo remove_junk(ucwords($e_plan['ano'])); ?>>
            </div>
            <div class="form-group">
              <label for="status">Estado</label>
                <select class="form-control" name="status">
                   <option>Seleccione:</option>
                  <option>Activo</option>
                  <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
                    <a href="planEstudios.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
       </div>
     </div>
  </div>

 </div>
<?php include_once('layouts/footer.php'); ?>
