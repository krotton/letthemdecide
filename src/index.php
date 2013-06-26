<?php
    require_once '../vendor/autoload.php';

    require_once 'config.php';
    require_once 'errors.php';

    $config = get_config();

    # Initialize templating:
    $twig = new Twig_Environment(
        new Twig_Loader_Filesystem('templates')
    );

    # If there are form errors in the cookie, fetch them and clear the cookie:
    $errors = get_form_errors();

    echo $twig->render('index.html', array(
        'gmaps_key' => $config['maps']['gmaps_key'],
        'form_action' => $config['urls']['sign'],
        'form_errors' => $errors
    ));
?>
