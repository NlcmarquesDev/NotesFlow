<?php

use App\Core\Router;

Router::showPartials('header');
Router::showPartials('navbar');


?>
<div class="container my-5">
    <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">

        <h1 class="text-body-emphasis"><?= $title ?></h1>
        <p class="col-lg-6 mx-auto mb-4">
            This faded back jumbotron is useful for placeholder content. It's also a great way to add a bit of context to a page or section when no content is available and to encourage visitors to take a specific action.
        </p>
        <button class="btn btn-primary px-5 mb-5" type="button">
            Go to About
        </button>
    </div>
</div>

<?php

Router::showPartials('footer');
?>