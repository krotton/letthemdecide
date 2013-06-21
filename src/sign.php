<?php
    require_once 'db.php';
    require_once 'urls.php';

    const msg = 'Invalid request!';

    # Get the form data:
    $email = $_POST['email'] or die(msg);

    $name = $_POST['name'] or die(msg);
    $year_of_birth = $_POST['year_of_birth'] or die(msg);

    $city = $_POST['city'] or die(msg);
    $postal = $_POST['postal_code'] or die(msg);
    $address = $_POST['year_of_birth'] or die(msg);

    $lat = $_POST['latitude'] or die(msg);
    $lng = $_POST['longitude'] or die(msg);

    # Insert:
    $db = get_db();

    $query = $db->prepare("INSERT INTO signatures
        (name, email, city, postal_code, address, year_of_birth)
        VALUES (?, ?, ?, ?, ?, ?)");

    $query->execute(array($name, $email, $city, $postal, $address, $year_of_birth));

    # Redirect back:
    header('Location: '.$urls['index']);
?>
