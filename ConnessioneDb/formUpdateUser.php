<?php
  require_once 'header.php'
?>

<main role="main" class="container">
   <h1 class="text-center">USER MANAGEMENT SYSTEM </h1>
   <hr>

  <?php
    $id = getParms('id', 0);
    $action = getParms('action', '');
    $orderDir = getParms('orderDir', 'ASC');
    $search = getParms('search' ,'') ;
    $page = getParms('page',1);
    $parms = compact('orderby','orderDir','page','search','action');
    $defaultParms = http_build_query($parms, '','&amp;');

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
