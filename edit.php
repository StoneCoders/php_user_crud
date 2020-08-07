<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM users WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $address = $row['address'];
    $phone = $row['phone'];
    $email = $row['email'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $name= $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $query = "UPDATE users set name = '$name', address = '$address', phone = '$phone', email = '$email' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'User Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update Name">
        </div>
        <div class="form-group">
          <input name="address" type="text" class="form-control" value="<?php echo $address; ?>" placeholder="Update Address">
        </div>
        <div class="form-group">
          <input name="phone" type="text" class="form-control" value="<?php echo $phone; ?>" placeholder="Update Phone">
        </div>
        <div class="form-group">
          <input name="email" type="email" class="form-control" value="<?php echo $email; ?>" placeholder="Update Email">
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
