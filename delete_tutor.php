<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_clave('tutores',$_GET['id'],$_GET['matricula']);
  if($delete_id){
      $session->msg("s","Tutor eliminado");
      redirect('tutores.php');
  } else {
      $session->msg("d","Se ha producido un error en la eliminación del Tutor");
      redirect('tutores.php');
  }
?>
