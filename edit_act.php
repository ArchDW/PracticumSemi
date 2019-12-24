<?php
$page_title = 'Editar Actividad';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
$alumnos = join_asesor2_table($_GET['cl']);
?>
<?php
$e_alumno = find_by_id_act('actividad', $_GET['id']);
//$groups  = find_all('user_groups');
if (!$e_alumno) {
    $session->msg("d", "Missing user id.");
    redirect('add_actividad.php?cl=' . $_GET['cl'] . '&id=' . $_GET['id'], false);
}
?>
<?php
//Update User basic info
if (isset($_POST['update'])) {
    //$req_fields = array('name','username','level');
    //validate_fields($req_fields);
    if (empty($errors)) {
        $id = $_GET['id'];
        $actividad = remove_junk($db->escape($_POST['Actividad']));
        $fecha = remove_junk($db->escape($_POST['fecha']));
        $estado = remove_junk($db->escape($_POST['estado']));
            $sql = "UPDATE actividad SET actividad='{$actividad}', fecha='{$fecha}', estado='{$estado}' WHERE id='{$db->escape($id)}'";
            $result = $db->query($sql);
            if ($result && $db->affected_rows() === 1) {
                $session->msg('s', "Acount Updated ");
                redirect('edit_act.php?cl=' . $_GET['cl'] . '&id=' . $_GET['id'], false);
            } else {
                $session->msg('d', ' Lo siento no se actualizó los datos.');
                redirect('edit_act.php?cl=' . $_GET['cl'] . '&id=' . $_GET['id'], false);
            }
        
    } else {
        $session->msg("d", $errors);
        redirect('edit_act.php?cl=' . $_GET['cl'] . '&id=' . $_GET['id'], false);
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
                    Actualiza Actividad
                </strong>
            </div>
            <div class="panel-body">
                <form method="post" action="edit_act.php?id=<?php echo $e_alumno['id']; ?>" class="clearfix">
                    <div class="form-group">
                        <label for="actividad">Actividad</label>
                        <textarea class="form-control" name="Actividad" required><?php echo remove_junk($e_alumno['actividad']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="text" class="form-control" name="fecha" value="<?php echo remove_junk($e_alumno['fecha']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Estado</label>
                        <select class="form-control" name="estado">
                            <option <?php if ($e_alumno['estado'] === '0') echo 'selected'; ?> value="0">Activo</option>
                            <option <?php if ($e_alumno['estado'] === '1') echo 'selected'; ?> value="1">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="update" class="btn btn-info">Actualizar</button>
                        <a href="PlanAccionTutorial.php?cl=<?php echo $_GET['cl']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>