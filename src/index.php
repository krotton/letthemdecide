<?php
    require_once '../vendor/autoload.php';

    require_once 'config.php';

    $config = get_config();

    # Initialize templating.
    $twig = new Twig_Environment(
        new Twig_Loader_Filesystem('templates')
    );

    echo $twig->render('index.html', array(
        'gmaps_key' => $config['maps']['gmaps_key']
    ));
?>
