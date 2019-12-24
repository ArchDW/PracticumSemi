<?php
  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_maestros       = count_by_id_maestros('maestros');
 $c_alumnos          = count_by_id_alumnos('alumnos');
 $c_user          = count_by_id('users');
 $c_lic           =count_by_id_lic('licenciatura');
 $c_tutor         =count_by_id_tutor('tutores');
 $c_plnaE         =count_by_id_planE('planEstudios');
?>
<?php include_once('layouts/header.php');  ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <div class="col-md-4">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Usuarios</p>
        </div>
       </div>
    </div>
    <div class="col-md-4">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_maestros['total']; ?> </h2>
          <p class="text-muted">Maestros</p>
        </div>
       </div>
    </div>
    <div class="col-md-4">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_alumnos['total']; ?> </h2>
          <p class="text-muted">Alumnos</p>
        </div>
       </div>
    </div>
   <!-- <div class="col-md-4">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-yellow">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_tutor['total']; ?> </h2>
          <p class="text-muted">Tutores</p>
        </div>
       </div>
    </div>
    <div class="col-md-4">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_lic['total']; ?> </h2>
          <p class="text-muted">Licenciaturas</p>
        </div>
       </div>
    </div>
    <div class="col-md-4">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_plnaE['total']; ?> </h2>
          <p class="text-muted">Plan de Estudios</p>
        </div>
       </div>
    </div>-->
    
    <center>
      <img style="width: 50%; height: 50%;" src="Logo.png">
    </center>
       
    
</div>
  
<?php include_once('layouts/footer.php'); ?>
