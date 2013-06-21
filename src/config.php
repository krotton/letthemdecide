<?php
    function get_config() {
        # Parse the config.
        $config = parse_ini_file('../config.ini', true);
        
        if ($config === FALSE)
            die('Config file not found or unparseable!');
    }
?>
