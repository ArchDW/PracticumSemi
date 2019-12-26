<?php
require_once('includes/load.php');

/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table)
{
  global $db;
  if (tableExists($table)) {
    return find_by_sql("SELECT * FROM " . $db->escape($table));
  }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
  return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_alumno($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE matricula='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_act($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_maestro($table, $id)
{
  global $db;
  $id = $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE claveD='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_lic($table, $id)
{
  global $db;
  $id = (int) $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE claveLic='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
function find_by_id_plan($table, $id)
{
  global $db;
  $id = $id;
  if (tableExists($table)) {
    $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE idPlanEst='{$db->escape($id)}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql))
      return $result;
    else
      return null;
  }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_clave($table, $id, $matricula)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE claveD=" . $db->escape($id);
    $sql .= " AND matricula=" . $db->escape($matricula);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_docente($table, $id, $activo)
{
  global $db;
  if (tableExists($table)) {
    $sql = "UPDATE " . $db->escape($table);
    $sql .= " SET activo = '" . $db->escape($activo);
    $sql .= "'";
    $sql .= " WHERE claveD='" . $db->escape($id);
    $sql .= "' LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_alumno($table, $id, $activo)
{
  global $db;
  if (tableExists($table)) {
    $sql = "UPDATE " . $db->escape($table);
    $sql .= " SET activo = '" . $db->escape($activo);
    $sql .= "'";
    $sql .= " WHERE matricula=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}

function delete_by_id($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE id=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_lic($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE claveLic=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_plan($table, $id)
{
  global $db;
  if (tableExists($table)) {
    $sql = "DELETE FROM " . $db->escape($table);
    $sql .= " WHERE idPlanEst='" . $db->escape($id);
    $sql .= "' LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
function delete_by_actividades($table, $id, $activo)
{
  global $db;
  if (tableExists($table)) {
    $sql = "UPDATE " . $db->escape($table);
    $sql .= " SET estado = " . $db->escape($activo);
    $sql .= " WHERE id=" . $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
  }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table)
{
  global $db;
  if (tableExists($table)) {
    $sql    = "SELECT COUNT(id) AS total FROM " . $db->escape($table);
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}
function count_by_id_maestros($table)
{
  global $db;
  if (tableExists($table)) {
    $sql    = "SELECT COUNT(claveD) AS total FROM " . $db->escape($table);
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}
function count_by_id_alumnos($table)
{
  global $db;
  if (tableExists($table)) {
    $sql    = "SELECT COUNT(matricula) AS total FROM " . $db->escape($table);
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}
function count_by_id_lic($table)
{
  global $db;
  if (tableExists($table)) {
    $sql    = "SELECT COUNT(claveLic) AS total FROM " . $db->escape($table);
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}
function count_by_id_planE($table)
{
  global $db;
  if (tableExists($table)) {
    $sql    = "SELECT COUNT(idPlanEst) AS total FROM " . $db->escape($table);
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}
function count_by_id_tutor($table)
{
  global $db;
  if (tableExists($table)) {
    $sql    = "SELECT COUNT(claveD) AS total FROM " . $db->escape($table);
    $result = $db->query($sql);
    return ($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table)
{
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM ' . DB_NAME . ' LIKE "' . $db->escape($table) . '"');
  if ($table_exit) {
    if ($db->num_rows($table_exit) > 0)
      return true;
    else
      return false;
  }
}
/*--------------------------------------------------------------*/
/* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
function authenticate($username = '', $password = '')
{
  global $db;
  $username = $db->escape($username);
  $password = $db->escape($password);
  $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    $password_request = sha1($password);
    if ($password_request === $user['password']) {
      return $user['id'];
    }
  }
  return false;
}
/*--------------------------------------------------------------*/
/* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
function authenticate_v2($username = '', $password = '')
{
  global $db;
  $username = $db->escape($username);
  $password = $db->escape($password);
  $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    $password_request = sha1($password);
    if ($password_request === $user['password']) {
      return $user;
    }
  }
  return false;
}


/*--------------------------------------------------------------*/
/* Find current log in user by session id
  /*--------------------------------------------------------------*/
function current_user()
{
  static $current_user;
  global $db;
  if (!$current_user) {
    if (isset($_SESSION['user_id'])) :
      $user_id = intval($_SESSION['user_id']);
      $current_user = find_by_id('users', $user_id);
    endif;
  }
  return $current_user;
}
/*--------------------------------------------------------------*/
/* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
function find_all_user()
{
  global $db;
  $results = array();
  $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
  $sql .= "g.group_name ";
  $sql .= "FROM users u ";
  $sql .= "LEFT JOIN user_groups g ";
  $sql .= "ON g.group_level=u.user_level ORDER BY u.user_level ASC";
  $result = find_by_sql($sql);
  return $result;
}
function find_all_user_level($usernameL)
{
  global $db;

  $sql = "SELECT u.user_level ";
  $sql .= "FROM users u ";
  $sql .= "LEFT JOIN user_groups g ";
  $sql .= "ON g.group_level=u.user_level";
  $sql .= " WHERE u.username = '{$usernameL}'";
  $result = $db->fetch_assoc($sql);
  return $result;
}
/*--------------------------------------------------------------*/
/* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

function updateLastLogIn($user_id)
{
  global $db;
  $date = make_date();
  $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
  $result = $db->query($sql);
  return ($result && $db->affected_rows() === 1 ? true : false);
}

/*--------------------------------------------------------------*/
/* Find all Group name
  /*--------------------------------------------------------------*/
function find_by_groupName($val)
{
  global $db;
  $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
  $result = $db->query($sql);
  return ($db->num_rows($result) === 0 ? true : false);
}
/*--------------------------------------------------------------*/
/* Find group level
  /*--------------------------------------------------------------*/
function find_by_groupLevel($level)
{
  global $db;
  $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
  $result = $db->query($sql);
  return ($db->num_rows($result) === 0 ? true : false);
}
/*--------------------------------------------------------------*/
/* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
function page_require_level($require_level)
{
  global $session;
  $current_user = current_user();
  $login_level = find_by_groupLevel($current_user['user_level']);
  //if user not login
  if (!$session->isUserLoggedIn(true)) :
    $session->msg('d', 'Por favor Iniciar sesión...');
    redirect('index.php', false);
  //if Group status Deactive
  elseif ($login_level['group_status'] === '0') :
    $session->msg('d', 'Este nivel de usaurio esta inactivo!');
    redirect('home.php', false);
  //cheackin log in User level and Require level is Less than or equal to
  elseif ($current_user['user_level'] <= (int) $require_level) :
    return true;
  else :
    $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
    redirect('home.php', false);
  endif;
}
/*--------------------------------------------------------------*/
/* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
function join_maestros_table()
{
  global $db;
  $sql  = " SELECT claveD,nombre,primerAp,SegundoAp,edad,email,activo,GradoAc";
  $sql  .= " FROM maestros ";
  $sql  .= " ORDER BY claveD ASC";
  return find_by_sql($sql);
}
function join_alumnos_table()
{
  global $db;
  $sql  = " SELECT a.matricula AS matricula,a.nombre AS nombre,a.primerAp AS primerAp,a.SegundoAp AS SegundoAp,a.edad AS edad,a.email AS email,a.activo AS activo,a.Semestre AS Semestre,l.nombre AS Licenciatura";
  $sql  .= " FROM alumnos a, licenciatura l";
  $sql .= " WHERE a.Licenciatura = l.claveLic";
  $sql  .= " ORDER BY matricula ASC";
  return find_by_sql($sql);
}
function join_actividades_table()
{
  global $db;
  $sql  = " SELECT a.matricula AS matricula,a.nombre AS nombre,a.primerAp AS primerAp,a.SegundoAp AS SegundoAp,a.edad AS edad,a.email AS email,a.activo AS activo,a.Semestre AS Semestre,l.nombre AS Licenciatura";
  $sql  .= " FROM alumnos a, licenciatura l";
  $sql .= " WHERE a.Licenciatura = l.claveLic";
  $sql  .= " ORDER BY matricula ASC";
  return find_by_sql($sql);
}
function join_tutores_table()
{
  global $db;
  $sql  = " SELECT t.claveD AS ClaveD,t.matricula AS Matricula,a.nombre AS Alumno,m.nombre AS Docente";
  $sql  .= " FROM tutores t, maestros m, alumnos a";
  $sql .= " WHERE m.claveD=t.claveD AND a.matricula = t.matricula";
  $sql  .= " ORDER BY t.claveD ASC ";
  return find_by_sql($sql);
}
function join_asesor_table()
{
  global $db;
  $sql  = " SELECT a.matricula AS matricula,a.nombre AS nombre,a.primerAp AS primerAp,a.SegundoAp AS SegundoAp,a.edad AS edad,a.email AS email,a.activo AS activo,a.Semestre AS Semestre,l.nombre AS Licenciatura";
  $sql  .= " FROM alumnos a, licenciatura l, tutores t";
  $sql .= " WHERE a.Licenciatura = l.claveLic AND a.activo='Activo' AND a.matricula = t.matricula  ";
  $sql  .= " ORDER BY matricula ASC";
  return find_by_sql($sql);
}
function join_asesor2_table($idD)
{
  global $db;
  $sql  = " SELECT a.matricula AS matricula,a.nombre AS nombre,a.primerAp AS primerAp,a.SegundoAp AS SegundoAp,a.edad AS edad,a.email AS email,a.activo AS activo,a.Semestre AS Semestre,l.nombre AS Licenciatura";
  $sql  .= " FROM alumnos a, licenciatura l, tutores t";
  $sql .= " WHERE a.Licenciatura = l.claveLic AND a.activo='Activo' AND t.claveD = '{$idD}' AND a.matricula = t.matricula  ";
  $sql  .= " ORDER BY matricula ASC";
  return find_by_sql($sql);
}
function join_protocolo_table($idD)
{
  global $db;
  $sql  = " SELECT m.nombre AS modalidad, i.matricula AS matricula, i.nombre AS Proyecto, i.tematica AS Tematica, i.estado AS estado, a.nombre AS nombre";
  $sql .= " FROM modalidad m, inducion i, alumnos a";
  $sql .= " WHERE a.matricula = i.matricula AND i.modalidad = m.id";
  $sql .= " ORDER BY m.id ASC";
  return find_by_sql($sql);
}
function join_inducion_table()
{
  global $db;
  $sql  = " SELECT i.id AS id,i.nombre AS proyecto,i.matricula AS matricula,i.estado AS estado,i.evaluacion AS evaluacion, a.nombre AS nombre";
  $sql .= " FROM inducion i, alumnos a";
  $sql .= " WHERE a.matricula = i.matricula";
  $sql  .= " ORDER BY i.id ASC";
  return find_by_sql($sql);
}
function join_lic_table()
{
  global $db;
  $sql  = " SELECT claveLic,nombre,activo";
  $sql  .= " FROM licenciatura ";
  $sql  .= " ORDER BY claveLic ASC";
  return find_by_sql($sql);
}
function join_plan_table()
{
  global $db;
  $sql  = " SELECT idPlanEst,ano,estado";
  $sql  .= " FROM planEstudios ";
  $sql  .= " ORDER BY idPlanEst ASC";
  return find_by_sql($sql);
}
function join_encuestas_table()
{
  global $db;
  $sql  = " SELECT id, titulo, fecha";
  $sql  .= " FROM encuestas";
  return find_by_sql($sql);
}
function join_datos_table($valor)
{
  global $db;
  $sql  = " SELECT a.titulo as titulo, a.fecha as fecha, b.id as id, b.nombre as nombre, b.valor as valor";
  $sql  .= " FROM encuestas a INNER JOIN opciones b ON a.id = b.id_encuesta";
  $sql .= " WHERE a.id = {$valor}";
  return find_by_sql($sql);
}
function join_valor_table($valor)
{
  global $db;
  $sql  = " SELECT SUM(valor) as valor";
  $sql  .= " FROM opciones";
  $sql  .= " WHERE id_encuesta = {$valor}";
  return find_by_sql($sql);
}
function join_idenc_table($valor)
{
  global $db;
  $sql  = " SELECT a.titulo as titulo, a.fecha as fecha, b.id as id, b.nombre as nombre, b.valor as valor";
  $sql  .= " FROM encuestas a INNER JOIN opciones b ON a.id = b.id_encuesta";
  $sql  .= " WHERE id_encuesta = {$valor}";
  return find_by_sql($sql);
}
function join_sesiones_table()
{
  global $db;
  $sql  = " SELECT s.nombre AS id,s.proposito AS proposito,s.matricula AS matricula, a.nombre AS nombre, s.id AS IDE, s.acuerdos AS acuerdos";
  $sql  .=" FROM sesiones s, alumnos a";
  $sql  .=" WHERE s.matricula = a.matricula";
  $sql  .= " ORDER BY s.id ASC";
  return find_by_sql($sql);
}
function join_acciones_table()
{
  global $db;
  $sql  = " SELECT p.protocolo AS id, p.accion AS accion, p.fecha AS fecha, p.evaluacion AS evaluacion, a.matricula AS matricula, a.nombre AS nombre";
  $sql  .= " FROM acciones p, alumnos a, inducion i";
  $sql  .=" WHERE p.protocolo = i.id AND i.matricula = a.matricula";
  $sql  .= " ORDER BY p.id ASC";
  return find_by_sql($sql);
}
function join_Act_table()
{
  global $db;
  $sql  = " SELECT s.actividad AS actividad, s.fecha AS fecha, a.matricula AS matricula, a.nombre AS nombre, s.id AS id, s.estado As estado";
  $sql  .= " FROM actividad s, alumnos a";
  $sql  .=" WHERE s.matricula = a.matricula";
  $sql .= " ORDER BY s.id ASC";
  return find_by_sql($sql);
}
function join_diagnostico_table()
{
  global $db;
  $sql  = " SELECT d.estado AS estado, a.nombre AS nombre, d.id AS id, d.fortaleza AS fortaleza, d.debilidad AS debilidad, d.aspecto AS aspecto, d.estrategia AS estrategia, d.matricula AS matricula";
  $sql  .= " FROM diagnosticos d, alumnos a";
  $sql  .=" WHERE d.matricula = a.matricula";
  $sql .= " ORDER BY d.id ASC";
  return find_by_sql($sql);
}
function join_Act_table_alumnos($matricula)
{
  global $db;
  $sql  = " SELECT s.actividad AS actividad, s.fecha AS fecha, a.matricula AS matricula, a.nombre AS nombre, s.id AS id, s.estado As estado";
  $sql  .= " FROM actividad s, alumnos a";
  $sql  .=" WHERE s.matricula = a.matricula AND s.matricula = $matricula AND s.estado = 0";
  $sql .= " ORDER BY s.id ASC";
  return find_by_sql($sql);
}
function join_sesiones_table_alumnos($matricula)
{
  global $db;
  $sql  = " SELECT s.nombre AS id,s.proposito AS proposito,s.matricula AS matricula, a.nombre AS nombre, s.id AS IDE, s.acuerdos AS acuerdos";
  $sql  .=" FROM sesiones s, alumnos a";
  $sql  .=" WHERE s.matricula = a.matricula AND s.matricula = $matricula";
  $sql  .= " ORDER BY s.id ASC";
  return find_by_sql($sql);
}
function join_diagnostico_table_alumnos($matricula)
{
  global $db;
  $sql  = " SELECT d.estado AS estado, a.nombre AS nombre, d.id AS id, d.fortaleza AS fortaleza, d.debilidad AS debilidad, d.aspecto AS aspecto, d.estrategia AS estrategia, d.matricula AS matricula";
  $sql  .= " FROM diagnosticos d, alumnos a";
  $sql  .=" WHERE d.matricula = a.matricula AND d.matricula = $matricula";
  $sql .= " ORDER BY d.id ASC";
  return find_by_sql($sql);
}
function join_induccion_table_alumnos($matricula)
{
  global $db;
  $sql  = " SELECT id";
  $sql  .= " FROM inducion";
  $sql  .=" WHERE matricula = $matricula";
  $sql  .= " ORDER BY id ASC";
  return find_by_sql($sql);
}
function join_acciones_table_alumnos($protocolo)
{
  global $db;
  $sql  = " SELECT id, accion, evaluacion, fecha";
  $sql  .= " FROM acciones";
  $sql  .=" WHERE protocolo = $protocolo";
  $sql  .= " ORDER BY id ASC";
  return find_by_sql($sql);
}
?>
