<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(1);
?>
<?php
  $delete_id = delete_by_plan('planEstudios',$_GET['id']);
  if($delete_id){
      $session->msg("s","Plan de Estudio eliminado");
      redirect('planEstudios.php');
  } else {
      $session->msg("d","Se ha producido un error en la eliminación del Plan de Estudio");
      redirect('planEstudios.php');
  }
?>
