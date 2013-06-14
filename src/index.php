<?php
    require_once '../vendor/autoload.php';

    # Initialize templating.
    $twig = new Twig_Environment(
        new Twig_Loader_Filesystem('templates')
    );

    echo $twig->render('index.html', array('name' => 'Krotton'));
?>
