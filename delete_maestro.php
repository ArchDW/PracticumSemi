<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_docente('maestros',$_GET['id'],$_GET['activo']);
  if($delete_id){
      $session->msg("s","Docente Modificado");
      redirect('maestros.php');
  } else {
      $session->msg("d","Se ha producido un error en la Modificación del Docente");
      redirect('maestros.php');
  }
?>
