<form action="controller/updateUser.php" class="needs-validation" novalidate>
  <!--passo in un campo nascosto l'id dell'utente e la action, necessari durante il salvataggio-->
  <input type="hidden" class="form-control col-form-label-lg" id="inputID" placeholder="ID" value="<?=$user['UserID']?>" required>
  <input type="hidden" class="form-control col-form-label-lg" id="action" placeholder="ID" value="<?=$user['UserID']?'store':'save'?>" required>

  <div class="row mb-3">
    <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-form-label-lg" id="inputName" placeholder="Nome" value="<?=$user['UserName']?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control col-form-label-lg" id="inputEmail" placeholder="Email" value="<?=$user['UserEmail']?>" required>
    </div>
  </div>

    <div class="row mb-3">
      <label for="inputEmail" class="col-sm-2 col-form-label">CodiceFiscale</label>
      <div class="col-sm-10">
        <input type="text" class="form-control col-form-label-lg" id="inputCF" placeholder="Codice fiscale" value="<?=$user['UserCodiceFiscale']?>" required>
      </div>
    </div>

  <div class="row mb-3">
    <label for="inputAge" class="col-sm-2 col-form-label">Età</label>
    <div class="col-sm-10">
      <input type="number" min="0" max"120" class="form-control col-form-label-lg" id="inputAge" value="<?=$user['UserEta']?>" required>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-auto">
      <button class="btn btn-danger">
        <i class="fas fa-user-times"></i> Cancella
      </button>
    </div>

    <div class="col-auto">
      <button class="btn btn-success">
        <i class="fas fa-user-times"></i> Aggiorna
      </button>
    </div>
  </div>

</form>
