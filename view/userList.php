<?php
  // Al click inverto direzione ordinamento
  $orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';

  require_once 'navbar.php'
?>

<table class='table table-striped'>
  <thead>
    <tr>
      <th class="<?= ($orderby=='UserID')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserID"> Id</th>
      <th>Avatar</th>
      <th class="<?= ($orderby=='UserName')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserName">Nome</th>
      <th class="<?= ($orderby=='UserCodiceFiscale')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserCodiceFiscale">Codice Fiscale</th>
      <th class="<?= ($orderby=='UserEmail')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserEmail">Email</th>
      <th class="<?= ($orderby=='UserEta')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserEta">Età</th>
      <th>Ruolo</th>
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

        <?php 

          //Per ogni user controllo se esiste un avatar, se ha una thumbnail e se ha una preview
          $avatarThumbImg = $user['UserAvatar'] && file_exists($avatar_dir.'thumb_'.$user['UserAvatar']) ?  $web_avatar_dir.'thumb_'.$user['UserAvatar'] : $web_avatar_dir.'placeholder.png'; 
          $avatarPreviewImg = $user['UserAvatar'] && file_exists($avatar_dir.'prev_'.$user['UserAvatar']) ?  $web_avatar_dir.'prev_'.$user['UserAvatar'] : '';
          $avatarImg = $user['UserAvatar'] && file_exists($avatar_dir.$user['UserAvatar']) ?  $web_avatar_dir.$user['UserAvatar'] : ''; 
          
        ?>


        <tr>
          <!--Nomi dei campi a db-->
          <!-- ATTENZIONE!! CASE SENSITIVE!!!-->
          <td><?= $user['UserID'];?></td>

          <td>
            <?php if($avatarImg) : ?>
              <a href="<?=$avatarImg?>" target="_blank" class="thumbnail">
                <img src="<?=$avatarThumbImg?>" class="avatar" width="<?=getConfig('thumbnail_width')?>" alt="">

                  <?php if($avatarPreviewImg):?>
                    <span>
                      <img src="<?=$avatarPreviewImg?>" class="avatar" alt="">
                    </span>
                  <?php endif?>

              </a>
            <?php else :?>
              <img src="<?=$avatarThumbImg?>" class="avatar" width="<?=getConfig('thumbnail_width')?>" alt="">
            <?php endif?>
          </td>

          <td><?= $user['UserName'];?></td>
          <td><?= $user['UserCodiceFiscale'];?></td>
          <td><a href="mailto:<?= $user['UserEmail'] ?>"><?= $user['UserEmail'];?></a></td>
          <td><?= $user['UserEta'];?></td>
          <td><?= $user['UserRoleType'];?></td>
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
