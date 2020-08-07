<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'php_users'
) or die(mysqli_erro($mysqli));

?>
