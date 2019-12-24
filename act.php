<?php
  $page_title = 'Lista de Alumnos';
  require_once('includes/load.php');
  $req = join_encuestas_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
       
<link rel="stylesheet" href="estiloss.css">
        <div class="panel-body">
            <div class="wrap">
                <h1>Encuestas</h1>
                <ul class="votacion index">
                <?php
                    foreach ($req as $req):
                        echo '<li><a href="encuesta.php?cl='.$_GET['cl'].'&id='.$req['id'].'">'.$req['titulo'].'</a></li>';
                        
                    endforeach;
                ?>
                </ul>
                <a href="agregar.php?cl=<?php echo $_GET['cl']; ?>">+ Agregar nueva encuesta</a>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
