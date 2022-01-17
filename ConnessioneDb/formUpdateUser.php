<?php
  require_once 'header.php'
?>

<main role="main" class="container">
   <h1 class="text-center">USER MANAGEMENT SYSTEM </h1>
   <hr>

  <?php
    $id = getParms('id', 0);
    $action = getParms('action', '');

    if ($id) {
      $user = getUser($id);
    }else{
      $user = [
        'UserID' => '',
        'UserName'=>'',
        'UserEmail' =>'',
        'UserCodiceFiscale' =>'',
        'UserEta' => '',
      ];
    };

    //var_dump($user);
    require_once 'view/formUser.php';
  ?>
</main>

<?php
  require_once 'view/footer.php'

 ?>
