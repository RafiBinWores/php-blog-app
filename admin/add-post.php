<?php

include('partials/header.php');

//fetch category
$sql = "SELECT * FROM categories";
$res = mysqli_query($conn, $sql);
?>

<main>

  <div class="container mt-lg-5 mb-5">

    <h1 class="mb-4">Add Blog</h1>

    <?php if (isset($_SESSION['add-post'])) : ?>
      <p class="text-danger">
        <?= $_SESSION['add-post'];
        unset($_SESSION['add-post']);
        ?>
      </p>

    <?php endif ?>

    <form action="<?= ROOT_URL ?>admin/add-post-logic.php" method="POST" enctype="multipart/form-data">
      <div class="mb-4">
        <label for="title" class="form-label">Blog Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="title..." required>
      </div>
      <div class="mb-4">
        <label for="category" class="form-label">Blog Categories</label>
        <select class="form-select" name="category" id="category">
          <option selected>Choose one</option>
          <?php while ($category = mysqli_fetch_assoc($res)) : ?>

            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
          <?php endwhile ?>
        </select>

      </div>
      <div class="form-group mt-3">
        <label for="description">Blog Description</label>
        <textarea class="form-control mt-1" id="description" name="body" rows="8"></textarea>
      </div>
      <!-- <div>
        <label for="editor" class="form-label">Blog Description</label>
        <textarea name="" id="editor" cols="30" rows="10"></textarea>
        <div id="editor" style="height: 50vh;">write something...</div>
      </div> -->
      <?php if (isset($_SESSION['user-is-admin'])) : ?>

        <div class="form-group form-check mt-3">
          <input type="checkbox" class="form-check-input" name="is_featured" value="1" id="is_featured" checked>
          <label class="form-check-label" for="is_featured">Featured</label>
        </div>

      <?php endif ?>

      <div class="mb-3">
        <label for="formFile" class="form-label mt-4">Add Thumbnail</label>
        <input class="form-control mt-1" type="file" id="formFile" name="thumbnail" required>
      </div>



      <button type="submit" name="submit" class="btn btn-primary mt-4">Post Blog</button>
    </form>
  </div>

</main>

</main>

<?php

include('../partials/footer.php');

?>