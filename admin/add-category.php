<?php

include('partials/header.php');

$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);

?>


<div class="container">
  <div class="category-form-area mx-auto">
    <h1 class="mt-5">Add Category</h1>
    <?php if (isset($_SESSION['add-category'])) : ?>
      <p class="text-danger">
        <?= $_SESSION['add-category'];
        unset($_SESSION['add-category']);
        ?>
      </p>
    <?php endif ?>

    <form method="post" enctype="" action="<?= ROOT_URL ?>admin/add-category-logic.php" class="mt-4">
      <div class="form-group mb-3">
        <label for="category-title">Category Name</label>
        <input type="text" name="title" value="<?= $title ?>" class="form-control mt-2" id="category-title" placeholder="Title">
      </div>
      <div class="form-group">
        <label for="category-desc">Description</label>
        <textarea class="form-control mt-2" name="description" value="<?= $description ?>" id="category-desc" cols="30" rows="5" placeholder="write something..."></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary mt-3">Add Category</button>
    </form>

  </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>