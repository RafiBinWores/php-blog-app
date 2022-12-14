<?php

require 'config/constants.php';

$email = $_SESSION['login-data']['email'] ?? null;
$password = $_SESSION['login-data']['password'] ?? null;

unset($_SESSION['login-data']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
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
    <div class="form-conainer bg-white shadow p-3 bg-body rounded" style="width: 25rem; max-height: 80vh;">
      <h3 class="d-flex justify-content-center mt-5 mb-4 fw-bolder">Login</h3>
      <?php
      if (isset($_SESSION['register-success'])) : ?>
        <p class="text-success">
          <?= $_SESSION['register-success'];
          unset($_SESSION['register-success']);
          ?>
        </p>
      <?php elseif (isset($_SESSION['login'])) : ?>
        <p class="text-danger">
          <?= $_SESSION['login'];
          unset($_SESSION['login']);
          ?>
        </p>
      <?php endif ?>
      <form method="post" action="<?= ROOT_URL ?>login-logic.php">

        <div class="mb-4">
          <input type="email" class="form-control" name="email" value="<?= $email ?>" id="email" placeholder="Email">
        </div>

        <div class="mb-2">
          <input type="password" class="form-control" name="password" value="<?= $password ?>" id="password" placeholder="Password">
        </div>

        <div class="mb-4 form-check">
          <a href="" class="d-flex justify-content-end login-links">Forgot password?</a>
        </div>

        <button type="submit" name="submit" class="signin-btn">SIGN IN</button>

      </form>
      <p class="text-center mt-3 text-secondary" style="font-size: 14px;">By continuing you agree to our <br><a href="" class="login-links">Terms and Conditions</a></p>

      <p class="mt-5" style="font-size: 14px;">New to Homies Blog? <a href="register.php" class="login-links">SIGN UP</a> </p>
    </div>

    </div>
  </section>

  <!-- scripts -->
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>