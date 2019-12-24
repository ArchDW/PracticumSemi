<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_alumno('alumnos',$_GET['id'],$_GET['activo']);
  if($delete_id){
      $session->msg("s","Alumno Modificado");
      redirect('alumnos.php');
  } else {
      $session->msg("d","Se ha producido un error en la Modificación del Alumno");
      redirect('alumnos.php');
  }
?>
