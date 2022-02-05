
<form action="controller/updateUser.php?<?=$defaultParms?>" method="post" enctype="multipart/form-data">
  <!--passo in un campo nascosto l'id dell'utente e la action, necessari durante il salvataggio-->
  <input type="hidden" class="form-control col-form-label-lg" id="UserID" name="UserID" placeholder="ID" value="<?=$user['UserID']?>">

  <div class="row mb-3">
    <label for="UserName" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-form-label-lg" id="UserName" name="UserName" placeholder="Nome" value="<?=$user['UserName']?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="UserEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control col-form-label-lg" id="UserEmail" name="UserEmail" placeholder="Email" value="<?=$user['UserEmail']?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="UserPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control col-form-label-lg" id="UserPassword" name="UserPassword" placeholder="Password" value="">
    </div>
  </div>

  <div class="row mb-3">
    <label for="UserRoleType" class="col-sm-2 col-form-label">Ruolo</label>
    <div class="col-sm-10">
      <select name="UserRoleType" id="UserRoleType" class="form-control col-form-label-lg" >
       
        <?php 
          $UserRoleType = getConfig('UserRoleType', []);
          foreach( $UserRoleType as $role ) : 
          $sel = ($user['UserRoleType'] === $role)? 'selected' : ''; ?>
            
            <option value="<?=$role?>" <?=$sel?>> <?=$role?> </option>

        <?php endforeach?>

      </select>

    </div>
  </div>
  
    <div class="row mb-3">
      <label for="userCodiceFiscale" class="col-sm-2 col-form-label">CodiceFiscale</label>
      <div class="col-sm-10">
        <input type="text" class="form-control col-form-label-lg" id="userCodiceFiscale" name="userCodiceFiscale" placeholder="Codice fiscale" value="<?=$user['UserCodiceFiscale']?>" required>
      </div>
    </div>

  <div class="row mb-3">
    <label for="UserEta" class="col-sm-2 col-form-label">Età</label>
    <div class="col-sm-10">
      <input type="number" min="0" max="120" class="form-control col-form-label-lg" id="UserEta" name="UserEta" value="<?=$user['UserEta']?>" required>
    </div>
  </div>

  <!-- per funzionare il form deve avere enctype = multipart-->
  <div class="row mb-3">
    <label for="UserAvatar" class="col-sm-2 col-form-label">Avatar</label>
    <div class="col-sm-10">
      <input type="hidden" name="MAX_FILE_SIZE" value="<?=getConfig('max_ini_file')?>"> <!--Regola la dimensione massima del file caricato. Va messo prima del campo file -->
      <input onchange="previewFile()" type="file" value="" accept="image/jpg" class="form-control col-form-label-lg" id="UserAvatar" name="UserAvatar">
    </div>
  </div>

   <!-- se l'utente ha già impostato un'immagine la visualizzo-->
   <div class="form-group" >
    <?php
      //Controllo, se non esiste carico un place holder genererico
      $avatar_dir = getConfig('avatar_dir');
      $web_avatar_dir = getConfig('web_avatar_dir');

      //Perchè se faccio il controllo sull'immagine not thumb non funziona in inserimento nuovo utente?
      $avatarImg = file_exists($avatar_dir.'thumb_'.$user['UserAvatar']) ?  $web_avatar_dir.$user['UserAvatar'] : $web_avatar_dir.'placeholder.png';
      $thumbWidth = getConfig('thumbnail_width');
    ?>
    <img class="col-md-2 offset-md-2 mb-3 avatar" src="<?=$avatarImg?>" alt="Avatar" width="<?=$thumbWidth?>">
  </div>


  <div class="form-group row offset-md-2">
    <?php if ($user['UserID']): ?>
      <div class="col-auto">
        <a class="btn btn-danger" href="<?=$urlDelete?>?id=<?=$user['UserID']?>&action=delete" onclick="return confirm('Cancellare?')" >
          <i class="fas fa-user-times"></i> Cancella
        </a>
      </div>
    <?php endif ?>

    <div class="col-auto ">
      <button class="btn btn-success">
        <i class="fas fa-user-edit"></i>
        <?= $user['UserID']?'Aggiorna' : 'Inserisci'?>
      </button>
    </div>
  </div>

</form>
