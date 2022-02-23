<?php require_once '../header.php'; ?>

<div class="container">

    <h1 class="display-4 text-center my-3">Venditori</h1>

    <div class="d-grid gap-2 col-2 mx-auto my-5">
        <!-- POP UP INSERIMENTO NUOVO GENERE -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popUpVenditore">
            Nuovo venditore
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="popUpVenditore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php include_once 'insert_venditore.php'?>
                </div>

            </div>
        </div>
    </div>
   
    <div class="row justify-content-center my-3">

        <div class="col-md-12">

            <ul class="list-group list-group-flush">

                <?php //per ogni venditore a db inserisco una riga
            
                    $venditori = GetVenditori();
                    foreach($venditori as $venditore):
                ?>        
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <span class="badge bg-danger rounded-pill mx-3"><a href="../controller/update_venditore.php?action=delete&VenditoreID=<?=$venditore['VenditoreID']?>"><i class="fa-solid fa-xmark"></i></a></span>    
                            <div class="col-md-3 me-auto">
                                <div class="fw-bold"><?=$venditore['VenditoreRagioneSociale']?></div>
                            </div>
                            <div class="col-md-4 me-auto">
                                <div>
                                    <?php if(!empty($venditore['VenditoreIndirizzo'])):?>
                                        <?=$venditore['VenditoreIndirizzo']?>,
                                    <?php endif?>

                                    <?php if(!empty($venditore['VenditoreCitta'])):?>
                                        <?=$venditore['VenditoreCitta']?>
                                    <?php endif?>

                                    <?php if(!empty($venditore['VenditoreProvincia'])):?>
                                        (<?=$venditore['VenditoreProvincia']?>)
                                    <?php endif?>

                                </div>
                            </div>
                            <div class="col-md-2 me-auto">
                                <?php if(!empty($venditore['VenditoreNumero'])):?>
                                    <div>(+<?=$venditore['VenditorePrefisso']?>) <?=$venditore['VenditoreNumero']?></div>
                                <?php endif?>
                            </div>
                            <div class="col-md-3 me-auto">
                                <?php if(!empty($venditore['VenditoreSito'])):?>
                                    <div><a href="http://<?=$venditore['VenditoreSito']?>"><?=$venditore['VenditoreSito']?></a></div>
                                <?php endif?>
                            </div>
                            
                        </li>

                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>

<?php require_once '../footer.php'; ?>