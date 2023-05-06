<?php
session_start();
$dsn = 'mysql:host=localhost;dbname=testing_new_db';
$username = 'root';
$password = '';
$options = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
  $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}
$redis = new Redis();
$redis->connect('localhost', 6379);

  $email_new = $_POST['email'];
  $password_new = $_POST['password'];

  $stmt = $db->prepare("SELECT * FROM users WHERE email=:email_new AND password=:password_new");
  $stmt->execute(array(':email_new' => $email_new, ':password_new' => $password_new));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  $redis->set($email_new, $password_new);
  if ($user) {
    echo "<script>localStorage.setItem('name', '{$user['name']}');</script>";
  echo "<script>localStorage.setItem('email', '{$user['email']}');</script>";
    header("Location: ../profile.html");
  } else {
    echo 'error';
  }

?>
