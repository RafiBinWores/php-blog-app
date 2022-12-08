<?php

include('partials/header.php');

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  $sql = "SELECT * FROM users WHERE id = $id";
  $res = mysqli_query($conn, $sql);

  $user = mysqli_fetch_assoc($res);
} else {
  header('location:' . ROOT_URL . 'admin/manage-users.php');
}
?>

<section>
  <div class="container" style="height: 60vh;">
    <div class="category-form-area mx-auto">
      <h1 class="mt-5 text-color-secondary">Edit User</h1>
      <form method="post" action="<?= ROOT_URL ?>admin/edit-user-logic.php" class="mt-4">

        <div class="">
          <input type="hidden" class="form-control" name="id" value="<?= $user['id'] ?>" id="username">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" id="username" placeholder="Username">
        </div>

        <div class="mb-4">
          <label for="userrole" class="mb-1">User Role</label>
          <select class="form-select" name="userrole" id="userrole" required>
            <option value="0">Author</option>
            <option value="1">Admin</option>
          </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Update User</button>
      </form>
    </div>
  </div>
</section>

<?php

include('../partials/footer.php');
?>