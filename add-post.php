<?php

include('partials/header.php');
?>

<main>

  <div class="container mt-lg-5 mb-5">

    <h1 class="mb-4">Add Blog</h1>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-4">
        <label for="title" class="form-label">Blog Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="title..." required>
      </div>
      <div class="mb-4">
        <label for="category" class="form-label">Blog Categories</label>
        <select class="form-select" aria-label="Default select example" name="category" id="category" required>
          <option selected>Choose one</option>
          <option value="Food">Food</option>
          <option value="Travel">Travel</option>
          <option value="Wild">Wild</option>
        </select>
      </div>
      <div>
        <label for="editor" class="form-label">Blog Description</label>
        <!-- <textarea name="" id="editor" cols="30" rows="10"></textarea> -->
        <div id="editor" style="height: 50vh;">write something...</div>
      </div>
      <div class="form-group form-check mt-3">
        <input type="checkbox" class="form-check-input" id="is_featured">
        <label class="form-check-label" for="is_featured">Featured</label>
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label mt-4">Add Thumbnail</label>
        <input class="form-control mt-1" type="file" id="formFile" name="thumbnail" required>
      </div>

      <!-- <div class="img-wrapper rounded mx-auto">
        
    <img src="" alt="" id="image">
    <i class="fa-solid fa-cloud-arrow-up text-primary pt-5" style="font-size: 3rem"></i>
    <h6 class="text-info">No file chosen, yet!</h6>

  </div>

  <div class="profile-img-input">
    <input id="default-btn" type="file" name="userImage" hidden />
    <button
      onclick="defaultBtnActive()"
      id="custom-btn"
      class="btn btn-info mt-3"
      style="width: 12rem">
      Choose a file
    </button>
  </div> -->

      <button type="submit" name="submit" class="btn btn-primary mt-4">Post Blog</button>
    </form>
  </div>

</main>

<?php

include('partials/category.php');

?>
</main>

<?php

include('partials/footer.php');

?>