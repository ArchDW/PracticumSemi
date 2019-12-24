<?php
$inducion = join_inducion_table();
?>
<ul>
  <li>
    <a href="asesores.php?cl=<?php echo $_GET['m']; ?>">
      <i class="glyphicon glyphicon-home"></i>
      <span>Panel de control</span>
    </a>
  </li>
  
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Tutoría Academica</span>
    </a>
    <ul class="nav submenu">
      <li><a href="PlanAccionTutorial.php?m=<?php echo $_GET['m']; ?>">Plan de Acción Tutorial</a> </li>
      <li><a href="sesiones.php?m=<?php echo $_GET['m']; ?>">Sesiones</a> </li>
   </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Tutoría Profesional</span>
    </a>
    <ul class="nav submenu">
      <li><a href="diagnostico.php?m=<?php echo $_GET['m']; ?>">Diagnostico</a></li>
      <li><a href="#?m=<?php echo $_GET['m']; ?>">Desarrollo de Habilidades</a></li>
      <li><a href="#?m=<?php echo $_GET['m']; ?>">Biblioteca</a></li>
   </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Aesosoria de Titulación</span>
    </a>
    <ul class="nav submenu">
      <li><a href="protocolo.php?m=<?php echo $_GET['m']; ?>">Inducción</a></li>
      <?php foreach ($inducion as $inducion ):?>
        <li><a href="desarrollo.php?m=<?php echo $_GET['m']; ?>&p=<?php echo ucwords($inducion['id']);?>"><?php echo ucwords($inducion['proyecto']);?></a></li>
      <?php endforeach;?>
      <li><a href="EvaluacionFInal.php?m=<?php echo $_GET['m']; ?>">Evalucaión Final del Documento</a> </li>
      <li><a href="#?cl=<?php echo $_GET['m']; ?>">Biblioteca</a> </li>
   </ul>
  </li>

</ul>