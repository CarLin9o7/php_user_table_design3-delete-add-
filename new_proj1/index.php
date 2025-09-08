<?php
require_once('connection.php');
require_once('classes/User.php');
$user = new User($connect);
$result = $user ->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class = "container-fluid pt-5">
      <button type="button" class="btn btn-primary m-2 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Insert
</button>
        <table class="table table-dark table-bordered table-striped-columns">
          <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Gender</th>
          <th scope="col">Address</th>
          <th scope="col">Actions</th>
        </tr>
          </thead>
          <tbody>
            <?php foreach($result as $values):?>
        <tr>
          <th scope="row"><?=$values->user_id ?></th>
          <td><?php echo $values->first_name ?></td>
          <td><?php echo $values->last_name ?></td>
          <td><?php echo $values->email ?></td>
          <td><?php echo $values->gender ?></td>
          <td><?php echo $values->user_address ?></td>
          <td><button type="button" class = "btn btn-warning">Update</button>
        <button type="button" class = "btn btn-danger" data-bs-toggle= "modal" data-bs-target= "#deleteModal<?=$values->user_id ?>">Delete</button></td>
        </tr>

        <div class="modal fade" id = "deleteModal<?=$values->user_id ?>" tabindex="-1">
  <div class="modal-dialog">
    <form action="backend/user_code.php" method = "post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name = "user_id" value = "<?=$values->user_id ?>">
        <strong>You sure?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name = "delete_btn">Delete</button>
      </div>
    </div>
    </form>
  </div>
</div>
        <?php endforeach; ?>
          </tbody>
        </table>
    </div>
    
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-large">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="backend/user_code.php" method="post">
  <div class="row g-3">
  <div class="col-12">
    <input type="text" class="form-control" placeholder="First Name" aria-label="First name" name = "first_name">
  </div>
  <div class="col-12">
    <input type="text" class="form-control" placeholder="Last Name" aria-label="Last name" name = "last_name">
  </div>
  <div class="col-12">
    <input type="email" class="form-control" placeholder="Email" aria-label="Email" name = "email">
  </div>
  <div class="col-12">
    <input type="text" class="form-control" placeholder="Gender" aria-label="Gender" name = "gender">
  </div>
  <div class="col-12">
    <input type="text" class="form-control" placeholder="Address" aria-label="Address" name = "user_address">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name = "save_btn">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <!-- form:Post -->
</body>
</html>
