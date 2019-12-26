<?php
$page_title = 'Lista de Diagnosticos';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
$diagnostico = join_diagnostico_table_alumnos($_GET['m']);
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('layouts/footer.php'); ?>