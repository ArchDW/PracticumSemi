<?php
  $page_title = 'Asesorados página de inicio';
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

<?php include_once('layouts/header.php');  ?>

<?php include_once('layouts/footer.php'); ?>
