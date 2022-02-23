<!--Form di inserimento nella tabella specie-->
<h3 class="display-6 text-center">Inserisci una nuova specie</h3>

<form action="../controller/update_specie.php?action=save" method="POST">
    <div class="container-sm">
        <div class="form-group row justify-content-center my-4">

            <div class="row my-3 justify-content-center">
                <div class="col-md-8 my-3">
                    <select class="form-select" id="GenereID" name="GenereID" required>
                        <option selected >Seleziona</option>

                        <?php 
                        //Carico tutei i generi
                        $Generi = GetGeneri();
                        //creo un option per ciascun record
                        foreach($Generi as $Genere):?>
                            <option value="<?=$Genere['GenereID']?>"><?=$Genere['GenereNome']?></option>
                        <?php endforeach ?>
                        
                    </select>
                </div>
            </div>

            <div class="row my-1 justify-content-center">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="SpecieNome" id="SpecieNome" placeholder="Genere" required>
                </div>
            </div>
            <div class="col-md-2 my-3">
                <button class="btn btn-primary" type="submit">Salva</button>
            </div>   

        </div>
    </div>

</form>
