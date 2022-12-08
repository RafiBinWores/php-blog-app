<?php

include('partials/header.php');

$username = $_SESSION['register-data']['username'] ?? null;
$email = $_SESSION['register-data']['email'] ?? null;
$password = $_SESSION['register-data']['password'] ?? null;
$confirmPassword = $_SESSION['register-data']['confirmPassword'] ?? null;
$username = $_SESSION['register-data']['username'] ?? null;
// $is_admin = $_SESSION['register-data']['userrole'] ?? null;

// delete session data 
unset($_SESSION['add-user-data']);
?>

<section>
  <div class="container">
    <div class="category-form-area mx-auto">
      <h1 class="mt-5">Add User</h1>
      <?php
      if (isset($_SESSION['add-user'])) : ?>
        <p class="text-danger">
          <?= $_SESSION['add-user'];
          unset($_SESSION['add-user']);
          ?>
        </p>
      <?php endif ?>
      <form method="post" enctype="multipart/form-data" action="<?= ROOT_URL ?>admin/add-user-logic.php" class="mt-4">
        <div class="mb-3">
          <input type="text" class="form-control" name="username" value="<?= $username ?>" id="username" placeholder="Username">
        </div>

        <div class="mb-3">
          <input type="email" class="form-control" name="email" value="<?= $email ?>" id="email" placeholder="Email">
        </div>

        <div class="mb-3">
          <input type="password" class="form-control" name="password" value="<?= $password ?>" id="password" placeholder="Password">
        </div>

        <div class="mb-3">
          <input type="password" class="form-control" name="confirmPassword" value="<?= $confirmPassword ?>" id="confirmPassword" placeholder="Confirm Password">
          <!-- <div class="form-text">Password must be 8 digit long.</div> -->
        </div>

        <div class="mb-4">
          <select class="form-select" name="userrole" required>
            <option value="0">Author</option>
            <option value="1">Admin</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="user-avatar">User Avatar</label>
          <input type="file" class="form-control mt-2" name="avatar" id="user-avatar" placeholder="Password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add User</button>
      </form>
    </div>
  </div>
</section>

<?php

include('../partials/footer.php');
?>