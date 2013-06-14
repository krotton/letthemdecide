<?php
    require_once '../vendor/autoload.php';

    phpinfo();

    # Parse the config.
    $config = parse_ini_file('../config.ini', true);
    
    if ($config === FALSE)
        die('Config file not found or unparseable!');

    # Connect to the database.
    try
    {
        $db = new PDO($config['database']['dsn']);
    }
    catch (PDOException $e)
    {
        die("Could not connect to the database! Error: {$e->getMessage()}");
    }

    # Initialize templating.
    $twig = new Twig_Environment(
        new Twig_Loader_Filesystem('templates')
    );

    echo $twig->render('index.html', array('name' => 'Krotton'));
?>
