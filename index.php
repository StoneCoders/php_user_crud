<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD USER FORM -->
      <div class="card card-body">
        <form action="save_user.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" autofocus required>
          </div>
          <div class="form-group">
              <input type="text" name="address" class="form-control" placeholder="Address" required>
          </div>
          <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
          </div>
          <input type="submit" name="save_user" class="btn btn-success btn-block" value="Save User">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM users";
          $result_users = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($result_users)) { ?>
          <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
