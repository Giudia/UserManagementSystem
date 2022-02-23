<?php require_once '../header.php'; ?>

<div class="container">

    <h1 class="display-4 text-center">Generi</h1>

    <div class="d-grid gap-2 col-2 mx-auto my-5">
        <!-- POP UP INSERIMENTO NUOVO GENERE -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#popUpGenere">
            Nuovo genere
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="popUpGenere" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <?php include_once 'insert_genere.php'?>
                </div>

            </div>
        </div>
    </div>

   

    <div class="row justify-content-center">

        <div class="col-md-8">

            <ul class="list-group list-group-flush">

                <?php //per ogni genere a db inserisco una riga
                    
                    $generi = GetGeneri();

                    foreach($generi as $genere):
                ?>        
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <span class="badge bg-danger rounded-pill"><a href="../controller/update_genere.php?action=delete&GenereID=<?=$genere['GenereID']?>"><i class="fa-solid fa-xmark"></i></a></span>    
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><?=$genere['GenereNome']?></div>
                            </div>
                            <span class="badge bg-primary rounded-pill">0</span>
                        </li>

                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>


<?php require_once '../footer.php'; ?>