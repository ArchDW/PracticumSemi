<?php
$page_title = 'Lista de Diagnosticos';
require_once('includes/load.php');
$diagnostico = join_diagnostico_table();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <?php echo display_msg($msg); ?>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <div class="pull-right">
                    <a href="add_diagnostico.php?cl=<?php echo $_GET['cl']; ?>" class="btn btn-primary">Agragar Diagnostico</a>
                </div>
            </div>
            <div class="panel-body">
                <table id="lookup" class="table table-bordered">
                    <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
                        <tr>
                            <th class="text-center">Fortalezas</th>
                            <th class="text-center">Debilidades </th>
                            <th class="text-center">Aspectos</th>
                            <th class="text-center">Estrategias </th>
                            <th class="text-center">Matricula</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($diagnostico as $diagnostico) :
                        ?>
                            <tr>
                                <td class="text-center"> <?php echo remove_junk($diagnostico['fortaleza']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($diagnostico['debilidad']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($diagnostico['aspecto']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($diagnostico['estrategia']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($diagnostico['matricula']); ?></td>
                                <td class="text-center"> <?php echo remove_junk($diagnostico['nombre']); ?></td>
                                <td class="text-center">
                                    <?php if ($diagnostico['estado'] === '0') : ?>
                                        <span class="label label-success"><?php echo "Activo"; ?></span>
                                    <?php else : ?>
                                        <span class="label label-danger"><?php echo "Inactivo"; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <!--<a href="add_actividad_diagnostico.php?cl=<?php echo $_GET['cl']; ?>&m=<?php echo $diagnostico['matricula']; ?>" class="btn btn-info btn-xs" title="Actividades" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>-->
                                        <?php if ($diagnostico['estado'] === '0') : ?>
                                            <a href="delete_diag.php?cl=<?php echo $_GET['cl']; ?>&id=<?php echo $diagnostico['id']; ?>&estado=1" class="btn btn-danger btn-xs" title="Inactivar" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a>
                                        <?php else : ?>
                                            <a href="delete_diag.php?cl=<?php echo $_GET['cl']; ?>&id=<?php echo $diagnostico['id']; ?>&estado=0" class="btn btn-success btn-xs" title="Activar" data-toggle="tooltip"><span class="glyphicon glyphicon-ok"></span></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>