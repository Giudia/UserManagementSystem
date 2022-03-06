<?php require_once '../header.php'; ?>

<div class="container">

    <h1 class="display-4 text-center">Specie</h1>

    <div class="d-grid gap-2 col-2 mx-auto my-5">
        <!-- POP UP INSERIMENTO NUOVO GENERE -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popUpSpecie">
            Nuova specie
        </button>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="popUpSpecie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php include_once 'insert_specie.php'?>
                </div>

            </div>
        </div>
    </div>
   

    <div class="row justify-content-center">

        <div class="col-md-8">

            <ul class="list-group list-group-flush">

                <?php //per ogni genere a db inserisco una riga
                    
                    $species = GetSpecie();

                    foreach($species as $specie):
                ?>        
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <span class="badge bg-danger rounded-pill mx-3"><a href="../controller/update_specie.php?action=delete&SpecieID=<?=$specie['SpecieID']?>"><i class="fa-solid fa-xmark"></i></a></span>    
                            <div class="col-md-3 me-auto"><?=$specie['GenereNome']?></div>
                            <div class="col-md-5 me-auto"><?=$specie['SpecieNome']?></div>
                            <span class="badge bg-primary rounded-pill">0</span>
                        </li>

                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>

<?php require_once '../footer.php'; ?>