<?php
$inducion = join_inducion_table();
?>
<ul>
  <li>
    <a href="asesores.php?cl=<?php echo $_GET['cl']; ?>">
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
      <li><a href="PlanAccionTutorial.php?cl=<?php echo $_GET['cl']; ?>">Plan de Acción Tutorial</a> </li>
      <li><a href="sesiones.php?cl=<?php echo $_GET['cl']; ?>">Sesiones</a> </li>
   </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Tutoría Profesional</span>
    </a>
    <ul class="nav submenu">
      <li><a href="diagnostico.php?cl=<?php echo $_GET['cl']; ?>">Diagnostico</a></li>
      <li><a href="#?cl=<?php echo $_GET['cl']; ?>">Desarrollo de Habilidades</a></li>
      <li><a href="#?cl=<?php echo $_GET['cl']; ?>">Biblioteca</a></li>
   </ul>
  </li>

  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Aesosoria de Titulación</span>
    </a>
    <ul class="nav submenu">
      <li><a href="protocolo.php?cl=<?php echo $_GET['cl']; ?>">Inducción</a></li>
      <?php foreach ($inducion as $inducion ):?>
        <li><a href="desarrollo.php?cl=<?php echo $_GET['cl']; ?>&p=<?php echo ucwords($inducion['id']);?>"><?php echo ucwords($inducion['proyecto']);?></a></li>
      <?php endforeach;?>
      <li><a href="EvaluacionFInal.php?cl=<?php echo $_GET['cl']; ?>">Evalucaión Final del Documento</a> </li>
      <li><a href="#?cl=<?php echo $_GET['cl']; ?>">Biblioteca</a> </li>
   </ul>
  </li>

</ul>