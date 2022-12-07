<?php

include('partials/header.php');
?>

<section>
  <div class="container" style="height: 60vh;">
    <div class="category-form-area mx-auto">
      <h1 class="mt-5 text-color-secondary">Edit User</h1>
      <form method="post" enctype="" action="" class="mt-4">
        <div class="mb-3">
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>

        <div class="mb-4">
          <label for="category" class="mb-1">User Role</label>
          <select class="form-select" aria-label="Default select example" id="category" required>
            <option value="0">Author</option>
            <option value="1">Admin</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
      </form>
    </div>
  </div>
</section>

<?php

include('../partials/footer.php');
?>