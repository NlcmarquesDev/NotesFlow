<?php

use App\Core\Router;

Router::showPartials('header');
Router::showPartials('navbar');

?>
<div class="my-5">
    <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">


        <div class="d-flex flex-wrap justify-content-center container px-0 gap-2 mt-3">
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
                <div class="alert alert-info">
                    <p>Empty notes!</p>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>





<?php

Router::showPartials('footer');
?>