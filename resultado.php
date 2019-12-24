<?php
 
require_once('includes/load.php');
 
    if(!isset($_GET['id'])){
        header('location: act.php');
    }
 
    $suma = 0;
    $id = $_GET['id'];
    $req = join_valor_table($_GET['id']);
    foreach ($req as $req):
        $suma = $req['valor'];
    endforeach;
 
?>

<?php include_once('layouts/header.php'); ?>

<link rel="stylesheet" href="estiloss.css">
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
          
        <div class="panel-body">
          <div class="wrap">
            <form action="" method="post">
              <?php
                  $aux = 0;
                  $req = join_idenc_table($_GET['id']);
                  foreach ($req as $req): 
                      if($aux == 0){
                              echo "<h1>".$req['titulo']."</h1>";
                              
                          $aux = 1;
                      }
                      echo "<ul class='votacion'>";
                      echo '<li><div class="fl">'.$req['nombre'].' '.round($req['valor']*100/$suma).'%</div><div class="fr">'.'Votos: '.$req['valor'].'</div>';
                      if($suma == 0){
                          echo '<div class="barra cero" style="width:0%;"></div></li>';
                      }else{
                          echo '<div class="barra" style="width:'.($req['valor']*100/$suma).'%;">'.'</div></li>';
                      }
                   
                  echo '</ul>'; 
                  endforeach;
                   
                  if(isset($aux)){
                      echo '<span class="fr">Total: '.$suma.'</span>';
                      echo '<a href="encuesta.php?cl='.$_GET['cl'].'&id='.$_GET['id'].'"" class="volver">← Volver</a>';
                  }
               
              ?>
            </ul>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
   
  <?php include_once('layouts/footer.php'); ?>
