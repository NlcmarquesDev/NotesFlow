<?php

use App\Core\Authtenticator;



(new Authtenticator)->logout();

redirect('/');
