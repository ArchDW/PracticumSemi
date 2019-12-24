<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(1);
?>
<?php
  $delete_id = delete_by_lic('licenciatura',$_GET['id']);
  if($delete_id){
      $session->msg("s","Licenciatura eliminado");
      redirect('licenciatura.php');
  } else {
      $session->msg("d","Se ha producido un error en la eliminación de la licenciatura");
      redirect('licenciatura.php');
  }
?>
