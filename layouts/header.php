<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php if (!empty($page_title))
            echo remove_junk($page_title);
          elseif (!empty($user))
            echo ucfirst($user['name']);
          else echo "Sistema de Tutorias"; ?>
  </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
  <link rel="stylesheet" href="libs/css/main.css" />
  <link rel="stylesheet" href="datatables/dataTables.bootstrap.css" />

  <link type="text/css" href="css/bootstrap.css" rel="stylesheet">
  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link type="text/css" href="css/theme.css" rel="stylesheet">
  <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>



  <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
</head>

<body>
  <?php if ($session->isUserLoggedIn(true)) : ?>
    <header id="header">
      <div class="logo pull-left">
        <!--<img style="width: 100%; height: 64px" src="Logo.png">-->PRACTICUM </div>
      <div class="header-content">
        <div class="header-date pull-left">
          <strong><?php echo date("d/m/Y  g:i a"); ?></strong>
        </div>
        <div class="pull-right clearfix">
          <ul class="info-menu list-inline list-unstyled">
            <li class="profile">
              <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                <img src="uploads/users/<?php echo $user['image']; ?>" alt="user-image" class="img-circle img-inline">
                <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <?php if ($user['user_level'] === '2') : ?>
                    <a href="profile.php?id=<?php echo (int) $user['id']; ?>&cl=<?php echo $_GET['cl']; ?>">
                      <i class="glyphicon glyphicon-user"></i>
                      Perfil
                    </a>
                  <?php else : ?>
                    <a href="profile.php?id=<?php echo (int) $user['id']; ?>&m=<?php echo $_GET['m']; ?>">
                      <i class="glyphicon glyphicon-user"></i>
                      Perfil
                    </a>
                  <?php endif; ?>
                </li>
                <li>
                  <?php if ($user['user_level'] === '2') : ?>
                    <a href="edit_account.php?cl=<?php echo $_GET['cl']; ?>" title="edit account">
                      <i class="glyphicon glyphicon-cog"></i>
                      Configuración
                    </a>
                  <?php else : ?>
                    <a href="edit_account.php?m=<?php echo $_GET['m']; ?>" title="edit account">
                      <i class="glyphicon glyphicon-cog"></i>
                      Configuración
                    </a>
                  <?php endif; ?>
                </li>
                <li class="last">
                  <a href="logout.php">
                    <i class="glyphicon glyphicon-off"></i>
                    Salir
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <div class="sidebar">
      <?php if ($user['user_level'] === '1') : ?>
        <!-- admin menu -->
        <?php include_once('admin_menu.php'); ?>

      <?php elseif ($user['user_level'] === '2') : ?>
        <!-- Special user -->
        <?php include_once('tutores_menu.php'); ?>

      <?php elseif ($user['user_level'] === '3') : ?>
        <!-- User menu -->
        <?php include_once('alumnos_menu.php'); ?>

      <?php endif; ?>

    </div>
  <?php endif; ?>

  <div class="page">
    <div class="container-fluid">