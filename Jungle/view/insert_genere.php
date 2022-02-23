<!--Form di inserimento nella tabella genere-->
<h3 class="display-6 text-center">Inserisci un nuovo genere</h3>
<form action="../controller/update_genere.php?action=save" method="POST">
    <div class="container-sm">
        <div class="form-group row justify-content-center my-4">
            <div class="col-md-8">
                <input type="text" class="form-control" name="GenereNome" id="GenereNome" placeholder="Genere" required>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary" type="submit">Aggiungi</button>
            </div>  

        </div>
    </div>

</form>

