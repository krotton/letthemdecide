<?php
    require_once 'db.php';
    require_once 'urls.php';
    require_once 'errors.php';

    const msg = 'Invalid request!';

    # Get the form data:
    $email = $_POST['email'] or die(msg);

    $name = $_POST['name'] or die(msg);
    $year_of_birth = $_POST['year_of_birth'] or die(msg);

    $city = $_POST['city'] or die(msg);
    $postal = $_POST['postal_code'] or die(msg);
    $address = $_POST['address'] or die(msg);

    $lat = $_POST['latitude'] or die(msg);
    $lng = $_POST['longitude'] or die(msg);

    # Validate:
    $errors = [];

    if (!preg_match('/\@.+\.\w{2,}/', $email))
        $errors['email'] = 'Invalid e-mail!';

    if (int($year_of_birth) > int(date('Y')))
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
