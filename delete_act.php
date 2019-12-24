<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
  $delete_id = delete_by_actividades('actividad',$_GET['id'],$_GET['estado']);
  if($delete_id){
      $session->msg("s","Actividad Modificado");
      redirect('PlanAccionTutorial.php?cl='.$_GET['cl']);
  } else {
      $session->msg("d","Se ha producido un error en la Modificación de la Actividad");
      redirect('PlanAccionTutorial.php?cl='.$_GET['cl']);
  }
?>
