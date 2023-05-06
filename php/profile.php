<?php
session_start();

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$dbname = "testing_new_db";
$collection = "users";

$token = $_POST['token'];

$user_id = base64_decode($token);

$filter = ['_id' => new MongoDB\BSON\ObjectID($user_id)];
$query = new MongoDB\Driver\Query($filter);
$rows = $manager->executeQuery("$dbname.$collection", $query);
$user = current($rows->toArray());

if ($user) {
  $data = array(
    'name' => $user->name,
    'email' => $user->email,
    'age' => $user->age,
    'address' => $user->address,
    'phonenumber' =>$user->phonenumber
  );
  echo json_encode($data);
} else {
  echo 'error';
}
?>