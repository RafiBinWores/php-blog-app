<?php

include('partials/header.php');
?>

<section>
  <div class="container">
    <div class="category-form-area mx-auto">
      <h1 class="mt-5">Add User</h1>
      <form method="post" enctype="" action="" class="mt-4">
        <div class="mb-3">
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>

        <div class="mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>

        <div class="mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>

        <div class="mb-3">
          <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
          <!-- <div class="form-text">Password must be 8 digit long.</div> -->
        </div>

        <div class="mb-4">
          <select class="form-select" aria-label="Default select example" id="category" required>
            <option value="0">Author</option>
            <option value="1">Admin</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="user-avatar">User Avatar</label>
          <input type="file" class="form-control mt-2" name="-user-avatar" id="user-avatar" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Add User</button>
      </form>
    </div>
  </div>
</section>

<?php

include('../partials/footer.php');
?>