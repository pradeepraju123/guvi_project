<?php
$dsn = 'mysql:host=localhost;dbname=testing_new_db';
$mongoURI = 'mongodb://localhost:27017';
$client = new MongoDB\Driver\Manager($mongoURI);
$username = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phonenumber = $_POST['phonenumber'];
$age = $_POST['age'];
$address = $_POST['address'];

try {
    $db = new PDO($dsn, $username, $password, $options);
    $dbmongo = $client->selectDatabase('testing_new_db');
    $collection = $dbmongo->users;
    $result = $collection->insertOne([
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'phonenumber' =>$phonenumber,
        'address' =>$address,
    ]);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$stmt = $db->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
$stmt->execute(array($name, $email, $password));

echo 'User registered successfully';
?>
