<?php

use App\Core\Router; ?>
<header class="py-3 border-bottom">
    <div class="d-flex flex-wrap align-items-center justify-content-between ">

        <div class="col-md-3 mb-2 mb-md-0 ">
            <a href="/notes_app_php/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <h1>NoteFlow</h1>
            </a>
        </div>
        <div class="col-md-3 text-end">
            <?php if (isset($_SESSION['user'])) : ?>
                <form action="/notes_app_php/logout" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-primary">logout</button>
                </form>
            <?php else : ?>
                <a href="/notes_app_php/login" type="button" class="btn btn-outline-primary me-2">Login</a>
                <a href="/notes_app_php/register" type="button" class="btn btn-primary">Sign-up</a>
            <?php endif ?>
        </div>
    </div>
    <?php
    if (isset($_SESSION['user'])) {

        Router::showPartials('usernav');
    }
    ?>
</header>