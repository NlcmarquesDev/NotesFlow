<?php


function view($view, $args = [])
{
    extract($args);

    require(BASE_PATH . '/views/' . $view . '.view.php');

    return $args;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function redirect($url)
{
    header('Location:/notes_app_php' . $url);
    exit();
}


function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
