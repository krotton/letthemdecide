<?php
    function get_db()
    {
        try
        {
            $db = new PDO($config['database']['dsn']);
        }
        catch (PDOException $e)
        {
            die("Could not connect to the database! Error: {$e->getMessage()}");
        }
    }
?>
