<?php require_once '../header.php'; ?>

<!--Form di inserimento nella tabella venditore-->
<form action="../controller/update_venditore.php?action=save" method="POST">

    <div class="container-sm">
        <h3 class="display-6 text-center">Inserisci un nuovo venditore</h3>
        <div class="form-group row justify-content-center my-4">
            <div>
                <input type="hidden" name="VenditoreID" id="VenditoreID">
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-md-10">
                    <input type="text" class="form-control" name="VenditoreRagioneSociale" id="VenditoreRagioneSociale" placeholder="Nome" required>
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-md-10">
                    <input type="text" class="form-control" name="VenditoreIndirizzo" id="VenditoreIndirizzo" placeholder="Indirizzo">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="VenditoreCitta" id="VenditoreCitta" placeholder="Citta">
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="VenditoreProvincia" id="VenditoreProvincia" placeholder="Prov">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-md-2">
                    <input type="text" class="form-control" name="VenditorePrefisso" id="VenditorePrefisso" placeholder="Prefisso telefonico">
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="VenditoreNumero" id="VenditoreNumero" placeholder="Numero">
                </div>
            </div>
            <div class="row my-3 justify-content-center">
                <div class="col-md-10">
                        <input type="text" class="form-control" name="VenditoreSito" id="VenditoreSito" placeholder="Sito">
                </div>
            </div>
            <div class="col-md-2 my-3">
                <button class="btn btn-primary" type="submit">Salva</button>
            </div>  

        </div>
    </div>

</form>
