<?php

include 'config/constants.php';

$username = $_SESSION['register-data']['username'] ?? null;
$email = $_SESSION['register-data']['email'] ?? null;
$password = $_SESSION['register-data']['password'] ?? null;
$confirmPassword = $_SESSION['register-data']['confirmPassword'] ?? null;
$username = $_SESSION['register-data']['username'] ?? null;

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="assets/img/navlogo.png" type="image/x-icon">

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/8629e48487.js" crossorigin="anonymous"></script>

  <!-- bootstrap -->
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">

  <!-- css -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <section class="body">
    <div class="form-conainer bg-white shadow p-3 bg-body rounded" style="width: 25rem;">

      <form action="<?= ROOT_URL ?>register-logic.php" method="post" enctype="multipart/form-data">
        <h3 class="d-flex justify-content-center mt-4 mb-4 fw-bold">Sign Up</h3>

        <?php if (isset($_SESSION['register'])) : ?>
          <div class="alert alert-danger" role="alert">
            <p>
              <?= $_SESSION['register'];
              unset($_SESSION['register']);
              ?>
            </p>
          </div>

        <?php endif ?>

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
          <label for="avatar">User Avatar</label>
          <input type="file" class="form-control mt-1" name="avatar" id="avatar" placeholder="Password">
        </div>

        <button type="submit" name="submit" class="singup-btn" style="width: 100%;">SIGN UP</button>

      </form>
      <p class="text-center mt-3 text-secondary" style="font-size: 14px;">By continuing you agree to our <br><a href="" class="signup-links">Terms and Conditions</a></p>

      <p class="mt-5" style="font-size: 14px;">Have an account? <a href="login.php" class="signup-links">SIGN IN</a> </p>

    </div>
  </section>

  <!-- scripts -->
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>