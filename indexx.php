<?php
  require_once('includes/load.php');
  $req = join_alumnos_table();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Sistema de encuestas</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="wrap">
        <h1>Encuestas</h1>
        <ul class="votacion index">
        <?php
            foreach ($req as $req):
                echo '<li><a href="encuesta.php?id='.$req['id'].'">'.$req['titulo'].'</a></li>';
            endforeach;
        ?>
        </ul>
        <a href="agregar.php">+ Agregar nueva encuesta</a>
    </div>
</body>
</html>