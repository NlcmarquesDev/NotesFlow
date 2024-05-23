<?php

use App\Core\Router;

Router::showPartials('header');
Router::showPartials('navbar');


?>
<div class="container my-5">
    <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
        <div class="row row-cols-1 row-cols-lg-2 align-items-md-center g-5 py-5">
            <div class="col ">

                <img class="img-gif" src="/notes_app_php/public/assets/giphy.gif" alt="">
            </div>
            <div class="col">
                <div class="d-flex flex-column">

                    <h1 class="text-body-emphasis mb-5"><?= $title ?></h1>
                    <p class="col-lg-6 mx-auto mb-5 w-100">
                        Capture your ideas, organize your thoughts, and never miss an inspiration. With Notable, all your notes are at your fingertips, quickly and easily. Let your creativity flow, plan your day, or jot down that important thought – all in one place. Simple, intuitive, and powerful. Make Notable your perfect note-taking companion.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center align-items-center gap-sm-4 gap-2">

                        <a href="/notes_app_php/login" class="btn btn-primary px-5 mb-5" type="button">
                            Log in
                        </a>
                        <a href="/notes_app_php/register" class="btn btn-primary px-5 mb-5" type="button">
                            Sign-in
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php

Router::showPartials('footer');
?>