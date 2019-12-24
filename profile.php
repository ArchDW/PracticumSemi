<?php
$page_title = 'Mi perfil';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(3);
?>
<?php
$user_id = (int) $_GET['id'];
if (empty($user_id)) :
  redirect('home.php', false);
else :
  $user_p = find_by_id('users', $user_id);
endif;
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-4">
    <div class="panel profile">
      <div class="jumbotron text-center bg-red">
        <img class="img-circle img-size-2" src="uploads/users/<?php echo $user_p['image']; ?>" alt="">
        <h3><?php echo first_character($user_p['name']); ?></h3>
      </div>
      <?php if ($user_p['id'] === $user['id']) : ?>
        <ul class="nav nav-pills nav-stacked">
          <?php if ($user['user_level'] === '2') : ?>
            <li><a href="edit_account.php?cl=<?php echo $_GET['cl']; ?>"> <i class="glyphicon glyphicon-edit"></i> Editar perfil</a></li>
          <?php elseif ($user['user_level'] === '3') : ?>
            <li><a href="edit_account.php?m=<?php echo $_GET['m']; ?>"> <i class="glyphicon glyphicon-edit"></i> Editar perfil</a></li>
          <?php else : ?>
            <li><a href="edit_account.php"> <i class="glyphicon glyphicon-edit"></i> Editar perfil</a></li>
          <?php endif; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>