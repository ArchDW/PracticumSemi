<?php
$page_title = 'Agregar Diagnostico';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);
?>
<?php
if (isset($_POST['add_diagnostico'])) {
    if (empty($errors)) {
        $fortaleza = remove_junk($db->escape($_POST['fortaleza']));
        $debilidad = remove_junk($db->escape($_POST['debilidad']));
        $aspecto = remove_junk($db->escape($_POST['aspecto']));
        $estrategia = remove_junk($db->escape($_POST['estrategia']));
        $matricula = remove_junk($db->escape($_POST['matricula']));
        $estado = remove_junk($db->escape($_POST['estado']));
        $query = "INSERT INTO diagnosticos(";
        $query .= "fortaleza, debilidad, aspecto, estrategia, matricula, estado";
        $query .= ") VALUES (";
        $query .= " '{$fortaleza}', '{$debilidad}', '{$aspecto}', '{$estrategia}', '{$matricula}', '{$estado}'";
        $query .= ")";
        if ($db->query($query)) {
            //sucess
            $session->msg('s', " Se agrego correctamente el Diagnostico");
            redirect('add_diagnostico.php?cl=' . $_GET['cl'], false);
        } else {
            //failed
            $session->msg('d', ' No se agrego correctamente el Diagnostico');
            redirect('add_diagnostico.php?cl=' . $_GET['cl'], false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('add_diagnostico.php?cl=' . $_GET['cl'], false);
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
                <span>Agregar Diagnostico</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="add_diagnostico.php?cl=<?php echo $_GET['cl']; ?>">
                    <div class="form-group ">
                        <label for="fortaleza">Fortaliza</label>
                        <textarea class="form-control" name="fortaleza" placeholder="Fortaleza" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="debilidad">Debilidad</label>
                        <textarea class="form-control" name="debilidad" placeholder="Debilidad" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="aspecto">Aspectos</label>
                        <textarea class="form-control" name="aspecto" placeholder="Aspectos para mejorar" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="estrategia">Estrategia</label>
                        <textarea class="form-control" name="estrategia" placeholder="Estrategia" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="debilidad">Matricula</label>
                        <input class="form-control" name="matricula" placeholder="Matricula" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Estado</label>
                        <select class="form-control" name="estado">
                            <option value="0">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" name="add_diagnostico" class="btn btn-primary">Guardar</button>
                        <a href="diagnostico.php?cl=<?php echo $_GET['cl']; ?>" class="btn btn-default btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>