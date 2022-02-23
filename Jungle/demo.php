<?php
include 'header.php'
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popUpGenere">
  Nuovo genere
</button>

<!-- Modal -->
<div class="modal fade" id="popUpGenere" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Inserisci un nuovo genere</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <?php include 'view/insert_genere.php'?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
        <button type="button" class="btn btn-primary">Salva</button>
      </div>

    </div>
  </div>
</div>

<?php
    include 'footer.php'
?>