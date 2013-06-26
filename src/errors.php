<?php
    function get_form_errors()
    {
        $errors = [];

        foreach ($_COOKIES as $k => $v)
            if (!strncmp($k, 'err_', 4))
            {
                $errors[] = $v;
                setcookie($k, '', time() - 3600, '/'); # Delete the cookie.
            }

        return $errors;
    }

    function set_form_error($name, $message)
    {
        setcookie("err_$name", $message, 0, '/');
    }
?>
