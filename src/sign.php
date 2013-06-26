<?php
    require_once 'db.php';
    require_once 'urls.php';
    require_once 'errors.php';

    foreach(['email', 'name', 'year_of_birth', 'city',
        'postal_code', 'address', 'latitude', 'longitude'] as $k)
    {
        if (!array_key_exists($k, $_POST))
        {
            header('Status: 400');
            die;
        }
        else if (!$_POST[$k])
            set_form_error($k, 'Cannot be empty!');
    }

    # Get the form data:
    $email = $_POST['email'];

    $name = $_POST['name'];
    $year_of_birth = $_POST['year_of_birth'];

    $city = $_POST['city'];
    $postal = $_POST['postal_code'];
    $address = $_POST['address'];

    $lat = $_POST['latitude'];
    $lng = $_POST['longitude'];

    # Validate:
    $errors = [];

    if (!preg_match('/\@.+\.\w{2,}/', $email))
        $errors['email'] = 'Invalid e-mail!';

    if (intval($year_of_birth) > intval(date('Y')))
        $errors['year_of_birth'] = 'Howdy, visitors from the future!';

    if (!preg_match('/^\d{2}\-\d{3}$/', $postal)) # Polish postal code format
        $errors['postal_code'] = 'Invalid postal code!';

    foreach ($errors as $k => $v)
        set_form_error($k, $v);

    # Insert:
    $db = get_db();

    $query = $db->prepare("INSERT INTO signatures
        (name, email, city, postal_code, address, year_of_birth)
        VALUES (?, ?, ?, ?, ?, ?)");

    $query->execute(array($name, $email, $city, $postal, $address, $year_of_birth));

    # Redirect back:
    header('Location: '.$urls['index']);
?>
