<?php

use App\Core\Router;

Router::showPartials('header');
Router::showPartials('navbar');



?>
<div class=" px-4 py-5 my-auto ">
    <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
        <div class="col d-flex flex-column align-items-start gap-2">
            <h4 class="text-body-secondary fst-italic fw-bold">
                "Your thoughts, organized effortlessly. Welcome to NoteFlow."
            </h4>
        </div>

        <div class="col">
            <div class="row row-cols-1 row-cols-sm-2 g-4">
                <main class="form-signin w-100 m-auto">
                    <form action="/notes_app_php/login" method="POST">
                        <h1 class="h3 mb-3 fw-normal">Please Log in</h1>
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control mb-3" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput"><?= isset($_SESSION['oldValue']) ? $_SESSION['oldValue'] : "Email address" ?> </label>
                        </div>

                        <div class="form-floating">
                            <input type="password" name="password" class="form-control mb-3" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <?php if (isset($_SESSION['errors'])) : ?>
                            <div class="alert alert-danger fw-light fs-6 " role="alert">
                                <?= $_SESSION['errors'] ?>
                            </div>
                        <?php endif  ?>
                        <button class="btn btn-primary w-100 py-2" type="submit">Log in</button>

                    </form>
                </main>
            </div>
        </div>
    </div>
</div>

<?php
unset($_SESSION['errors']);

Router::showPartials('footer');
?>