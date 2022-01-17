<form action="controller/updateUser.php" class="needs-validation" novalidate>

  <div class="row mb-3">
    <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-form-label-lg" id="inputName" placeholder="Nome" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputSurname" class="col-sm-2 col-form-label">Cognome</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-form-label-lg" id="inputNSurname" placeholder="Cognome" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control col-form-label-lg" id="inputEmail" placeholder="Email" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputAge" class="col-sm-2 col-form-label">Età</label>
    <div class="col-sm-10">
      <input type="number" min="0" max"120" class="form-control col-form-label-lg" id="inputAge" required>
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
