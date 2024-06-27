<?php

use App\Core\Router;

Router::showPartials('header');
Router::showPartials('navbar');

?>
<div class="my-5">
    <?php if (isset($_SESSION['alert'])) : ?>
        <div class="alert alert-success">
            <h4><?= $_SESSION['alert'] ?></h4>
        </div>
    <?php endif ?>
    <div class="d-flex justify-content-center px-0 gap-2 mt-3 row  ">
        <!-- Button trigger modal -->
        <button type="button" class="card col col-sm-6 col-md-4 col-lg-3 text-center" style="width: 19rem; height: 15rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle text-primary m-auto" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
        </button>

        <!-- Modal -->
        <?php include('./../views/components/modalForm.view.php'); ?>
        <?php if (!empty($notes)) : ?>
            <!-- Para fazer os alertas das mensagena ao usuário -->
            <?php foreach ($notes as $note) : ?>
                <div class="card col col-sm-6 col-md-4 col-lg-3" style="width: 19rem; height: 15rem;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between ">
                            <h5 class="card-title"><?= $note['title'] ?></h5>
                            <span class="badge text-bg-<?= $note['priority'] === 1 ? 'danger' : 'success' ?> my-auto">Priority</span>
                        </div>
                        <p class="card-text"><?= $note['body'] ?></p>
                        <div class="d-flex justify-content-between ">
                            <p class="card-text my-auto"><small class="text-body-secondary"><?= $note['date_note'] ?></small></p>
                            <!-- <a href="/notes_app_php/edit-note?id=<?= $note['id'] ?>"> -->
                            <button type="button" class="btn btn-outline-primary border-0" data-bs-toggle="modal" data-bs-target="#editModal<?= $note['id'] ?>">Edit
                            </button>
                            <!-- <Modal for Edit> -->
                            <div class="modal fade text-center" id="editModal<?= $note['id'] ?>" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Note </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/notes_app_php/edit-note" method="POST">
                                            <input type="hidden" name="id" value="<?= $note['id'] ?>">
                                            <div class="modal-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" name="title" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput"><?= $note['title'] ?></label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" name="message" placeholder="Leave a message here" rows="14" cols="30" id="floatingTextarea"></textarea>
                                                    <label for="floatingTextarea"><?= $note['body'] ?></label>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <div class="form-check  ">
                                                        <input class="form-check-input" type="checkbox" name="priority" value="1" <?= $note['priority'] === 1 ? 'checked' : '' ?> id="flexCheckDefault">
                                                        <label class="form-check-label me-0" for="flexCheckDefault">
                                                            Priority
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Note</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- </a> -->

                            <!-- </form> -->
                            <a href="/notes_app_php/note?id=<?= $note['id'] ?>">
                                <button class="btn btn-outline-danger border-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                        <path d="M2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                    </svg>
                                </button>
                                <!-- </form> -->
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <div class="card alert alert-info col-sm-6 col-md-4 col-lg-3 " style="width: 19rem; height: 15rem;">

                <h5 class="m-auto">Empty notes!</h5>

            </div>

        <?php endif ?>
    </div>
</div>

<?php
unset($_SESSION['alert']);
Router::showPartials('footer');
?>