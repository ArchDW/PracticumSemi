<?php
  $page_title = 'Lista de Alumnos';
  require_once('includes/load.php');
  $req = join_encuestas_table();
?>
<?php 
    $id = $_GET['id'];
    if(isset($_POST['votar']))
    {
 
        if(isset($_POST['valor'])){
            $opciones = $_POST['valor'];
            $req = join_maestros_table($opciones);
            foreach ($req as $req):
                $valor = $req['valor']+1;// obtenemos el valor de 'valor' y le añadimos 1 unidad
                $sql= "UPDATE opciones SET valor ={$valor} Where id={$db->escape($opciones)}";
                $result = $db->query($sql);
                if($result && $db->affected_rows() === 1){
                    header('location: resultado.php?id='.$_GET['id']); // Por ultimo lo redireccionamos a la encuestas mostrando los resultados.
                } else {
                    $session->msg('d',' Lo siento no se actualizó los datos.');
                    header('location: resultado.php?id='.$_GET['id']);
                }
            endforeach;
            
        }
    }
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
                <form action="" method="post">
                    <?php
                        
                        $aux = 0;
                        $req = join_datos_table($_GET['id']);
                         
                        foreach ($req as $req):
                         
                            if($aux == 0){
                                echo '<h1>'.$req['titulo'].'</h1>';
                                $aux = 1;
                            }
                            echo '<ul>';
                            echo '<li><input name="valor" type="radio" value="'.$req['id'].'"><span>'.$req['nombre'].'</span></li>';
                            echo '</ul>';
                        endforeach;
                             
                         
                            if(!isset($_POST['valor'])){
                                echo "<div class='error'>Selecciona una opcion.</div>";
                            }
                            echo '<input name="votar" type="submit" value="votar">';
                            echo '<a href="resultado.php?cl='.$_GET['cl'].'&id='.$_GET['id'].'" class="resultado">Ver Resultados</a>';
                            echo '<a href="act.php?cl='.$_GET['cl'].'" class="volver">&larr; Volver</a>';
                 
                    ?>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
