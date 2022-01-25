<?php //var_dump($defaultParms) ?>
<form action="controller/updateUser.php?<?=$defaultParms?>" method="post">
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
      <label for="userCodiceFiscale" class="col-sm-2 col-form-label">CodiceFiscale</label>
      <div class="col-sm-10">
        <input type="text" class="form-control col-form-label-lg" id="userCodiceFiscale" name="userCodiceFiscale" placeholder="Codice fiscale" value="<?=$user['UserCodiceFiscale']?>" required>
      </div>
    </div>

  <div class="row mb-3">
    <label for="UserEta" class="col-sm-2 col-form-label">Età</label>
    <div class="col-sm-10">
      <input type="number" min="0" max"120" class="form-control col-form-label-lg" id="UserEta" name="UserEta" value="<?=$user['UserEta']?>" required>
    </div>
  </div>

  <!-- per funzionare il form deve avere enctype = multipart-->
  <div class="row mb-3">
    <label for="UserAvatar" class="col-sm-2 col-form-label">Avatar</label>
    <div class="col-sm-10">
      <input type="hidden" name="MAX_FILE_SIZE" value="<?=getConfig('max_ini_file')?>"> <!--Regola la dimensione massima del file caricato. Va messo prima del campo file -->
      <input type="file" accept="image/*" class="form-control col-form-label-lg" id="UserAvatar" name="UserAvatar">
    </div>
  </div>

  <div class="form-group row">

    <?php if ($user['UserID']): ?>
      <div class="col-auto">
        <a class="btn btn-danger" href="<?=$urlDelete?>?id=<?=$user['UserID']?>&action=delete" onclick="return confirm('Cancellare?')" >
          <i class="fas fa-user-times"></i> Cancella
        </a>
      </div>
    <?php endif ?>

    <div class="col-auto">
      <button class="btn btn-success">
        <i class="fas fa-user-edit"></i>
        <?= $user['UserID']?'Aggiorna' : 'Inserisci'?>
      </button>
    </div>
  </div>

</form>
