<?php
  // Al click inverto direzione ordinamento
  $orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
?>

<table class='table table-striped'>
  <thead>
    <tr><th colspan ="5" class="text-center"> Utenti totali: <?=$totalUsers?></th></tr>
    <tr>
      <th class="<?= ($orderby=='UserID')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserID"> Id</th>
      <th class="<?= ($orderby=='UserName')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserName">Nome</th>
      <th class="<?= ($orderby=='UserCodiceFiscale')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserCodiceFiscale">Codice Fiscale</th>
      <th class="<?= ($orderby=='UserEmail')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserEmail">Email</th>
      <th class="<?= ($orderby=='UserEta')?$orderDir:'' ?>"><a href="<?=$url?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderby=UserEta">Età</th>
    </tr>
  </thead>
  <tbody>
    <!-- qui il contenuto-->
    <?php if ($users){
      foreach($users as $user){?>

        <tr>
          <!--Nomi dei campi a db-->
          <!-- ATTENZIONE!! CASE SENSITIVE!!!-->
          <td><?= $user['UserID'];?></td>
          <td><?= $user['UserName'];?></td>
          <td><?= $user['UserCodiceFiscale'];?></td>
          <td><a href="mailto:<?= $user['UserEmail'] ?>"><?= $user['UserEmail'];?></a></td>
          <td><?= $user['UserEta'];?></td>
        </tr>

        <?php
      }?>
      </tbody>
      <tfoot><tr><td colspan ="5">
      <?php require_once 'navigation.php';
      echo '</td></tr></tfoot>';
    }else{?>
      <tr>
        <td colspan="5" class="text-center">Nessun record trovato</td>
      </tr>

    <?php
    };?>

</table>
