<?php

include('partials/header.php');

if (isset($_GET['id'])) {
  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  $sql = "SELECT * FROM categories WHERE id=$id";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) == 1) {
    $category = mysqli_fetch_assoc($res);
  }
} else {
  header('location:' . ROOT_URL . 'admin/manage-category.php');
  die();
}
?>


<div class="container" style="height: 90vh;">
  <div class="category-form-area mx-auto">
    <h1 class="mt-5">Edit Category</h1>
    <form method="post" action="<?= ROOT_URL ?>admin/edit-category-logic.php" class="mt-4">

      <input type="hidden" name="id" value="<?= $category['id'] ?>">

      <div class="form-group mb-3">
        <label for="category-title">Category Name</label>
        <input type="text" class="form-control mt-2" name="" value="<?= $category['title'] ?>" placeholder="Title">
      </div>
      <div class="form-group">
        <label for="category-desc">Description</label>
        <textarea class="form-control mt-2" name="category-desc" id="category-desc" cols="30" rows="5" placeholder="write something..."> <?= $category['description'] ?></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary mt-3">Update Category</button>
    </form>
  </div>
</div>



<?php

include('../partials/footer.php');
?>