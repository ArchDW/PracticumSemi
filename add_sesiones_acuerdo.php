<?php
$page_title = 'Agregar Acuerdo';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
//$groups = find_all('user_groups');
?>
<?php
if (isset($_POST['add_sesiones_acuerdo'])) {
    if (empty($errors)) {

        $acuerdo   = remove_junk($db->escape($_POST['acuerdo']));

        $query = "Update sesiones SET ";
        $query .= "acuerdos='{$acuerdo}' ";
        $query .= "Where id='{$_GET['id']}'";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se Agrego correctamente el Acuerdo " );
            redirect('add_sesiones_acuerdo.php?cl=' . $_GET['cl'] . '&id=' . $_GET['id'], false);
        } else {
            //failed
            $session->msg('d', ' No Se Agrego correctamente el Acuerdo ' );
            redirect('add_sesiones_acuerdo.php?cl=' . $_GET['cl'] . '&id=' . $_GET['id'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_sesiones_acuerdo.php?cl=' . $_GET['cl'] . '&id=' . $_GET['id'], false);
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
                <span>Agregar Acuerdo</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="add_sesiones_acuerdo.php?cl=<?php echo $_GET['cl']; ?>&id=<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label for="sesion">Acuerdos</label>
                        <textarea type="text" class="form-control" name="acuerdo" placeholder="Acuerdos"></textarea>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_sesiones_acuerdo" class="btn btn-primary">Guardar</button>
                        <a href="sesiones.php?cl=<?php echo $_GET['cl']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>