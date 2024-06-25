<?php

use App\Core\Router;

Router::showPartials('header');
Router::showPartials('navbar');

?>
<div class="my-5">
    <div class="d-flex flex-wrap px-0 gap-2 mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="card text-center" style="max-width: 19rem; min-width: 12rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle text-primary m-auto" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
        </button>

        <!-- Modal -->
        <div class="modal fade text-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($notes)) : ?>
            <!-- Para fazer os alertas das mensagena ao usuário -->
            <?php foreach ($notes as $note) : ?>

                <div class="card" style="max-width: 19rem;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"><?= $note['body'] ?></p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <div class="card alert alert-info" style="max-width: 19rem;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5>Empty notes!</h5>
                </div>
            </div>

        <?php endif ?>
    </div>
</div>





<?php

Router::showPartials('footer');
?>