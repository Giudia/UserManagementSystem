<?php
  // Al click inverto direzione ordinamento
  $orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
?>

<table class='table table-striped'>
  <thead>
    <tr><th colspan ="6" class="text-center"> Utenti totali: <?=$totalUsers?></th></tr>
    <tr>
      <th class="<?= ($orderby=='UserID')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserID"> Id</th>
      <th>Avatar</th>
      <th class="<?= ($orderby=='UserName')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserName">Nome</th>
      <th class="<?= ($orderby=='UserCodiceFiscale')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserCodiceFiscale">Codice Fiscale</th>
      <th class="<?= ($orderby=='UserEmail')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserEmail">Email</th>
      <th class="<?= ($orderby=='UserEta')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserEta">Età</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <!-- qui il contenuto-->
    <?php if ($users){

      $avatar_dir = getConfig('avatar_dir');
      $web_avatar_dir = getConfig('web_avatar_dir');
      $thumbWidth = getConfig('thumbnail_width'); 

      foreach($users as $user){?>

        <?php $avatarImg = file_exists($avatar_dir.$user['UserAvatar']) ?  $web_avatar_dir.$user['UserAvatar'] : $web_avatar_dir.'placeholder.png'; ?>


        <tr>
          <!--Nomi dei campi a db-->
          <!-- ATTENZIONE!! CASE SENSITIVE!!!-->
          <td><?= $user['UserID'];?></td>
        <td><img src="<?=$avatarImg?>" width="<?=getConfig('thumbnail_width')?>" alt=""></td>
          <td><?= $user['UserName'];?></td>
          <td><?= $user['UserCodiceFiscale'];?></td>
          <td><a href="mailto:<?= $user['UserEmail'] ?>"><?= $user['UserEmail'];?></a></td>
          <td><?= $user['UserEta'];?></td>
          <td>
            <div class="row">
              <div class="col-4"><a class="btn btn-primary" href="<?=$urlUpdate?>?<?=$navOrderByQueryString?>&page=<?=$page?>&action=store&id=<?=$user['UserID']?>"><i class="fas fa-user-edit"></i> Update</a></div>

              <div class="col-4">
                <a class="btn btn-danger" onclick="return confirm('Confermi di voler cancellare?')"
                  href="<?=$urlDelete?>?<?=$navOrderByQueryString?>&page=<?=$page?>&action=delete&id=<?=$user['UserID']?>">
                  <i class="fas fa-user-times"></i> Delete
                </a>
              </div>

            </div>
          </td>
        </tr>

        <?php
      }?>
      </tbody>
      <tfoot><tr><td colspan ="6">
      <?php require_once 'navigation.php';
      echo '</td></tr></tfoot>';
    }else{?>
      <tr>
        <td colspan="5" class="text-center">Nessun record trovato</td>
      </tr>

    <?php
    };?>

</table>
