<?php

include('db.php');

if (isset($_POST['save_user'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $query = "INSERT INTO users(name, address, phone, email) VALUES ('$name', '$address', '$phone', '$email')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'User Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
